<?php

use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Models\Account;
use App\Models\AccountSession;
use App\Models\Department;
use App\Models\Project;
use App\Models\ProjectDepartment;
use Illuminate\Support\Facades\Auth;
use App\Models\Files;
use Illuminate\Support\Facades\Storage;

$navLinks = [
    'Home' => [
        "name" => 'Dashboard',
        "url" => '/',
        "icon" => '<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-house"><path d="M15 21v-8a1 1 0 0 0-1-1h-4a1 1 0 0 0-1 1v8"/><path d="M3 10a2 2 0 0 1 .709-1.528l7-5.999a2 2 0 0 1 2.582 0l7 5.999A2 2 0 0 1 21 10v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"/></svg>'
    ],

    'Projects' => [
        "name" => 'Projects',
        "url" => '/project',
        "icon" => '<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-folder-closed"><path d="M20 20a2 2 0 0 0 2-2V8a2 2 0 0 0-2-2h-7.9a2 2 0 0 1-1.69-.9L9.6 3.9A2 2 0 0 0 7.93 3H4a2 2 0 0 0-2 2v13a2 2 0 0 0 2 2Z"/><path d="M2 10h20"/></svg>'
    ],

    'Accounts' => [
        "name" => 'Accounts',
        "url" => '/account',
        "icon" => '<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-user-round"><circle cx="12" cy="8" r="5"/><path d="M20 21a8 8 0 0 0-16 0"/></svg>'
    ],

    'Profile' => [
        "name" => 'My Profile',
        "url" => '/profile',
        "icon" => '<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-circle-Account-round"><path d="M18 20a6 6 0 0 0-12 0"/><circle cx="12" cy="10" r="4"/><circle cx="12" cy="12" r="10"/></svg>'
    ],
];

$role = 'manager';

Route::post("/gg", function (Request $request) {
    Log::info("data", $request->all());
});

Route::get('/test', function () {
    if (Auth::check()) {
        return response()->json(['message' => 'User is authenticated']);
    } else {
        return response()->json(['message' => 'User is not authenticated']);
    }
});

/*Route::get("/", function () use ($navLinks, $role) {
    return view("welcome", compact('navLinks', 'role'));
});*/

Route::middleware(['web', 'auth'])->group(function () use ($navLinks) {
    Route::get("/", function () use ($navLinks) {
        $user = Auth::user();
        $role = $user->role;
        if (!$user) {
            return redirect('/login');
        }

        if ($role === "admin") {
            unset($navLinks['Projects']);
        } else {
            unset($navLinks['Accounts']);
        }


        return view("welcome", compact('navLinks', 'role'));
    });

    Route::get("/profile", function () use ($navLinks) {
        $user = Auth::user();
        $role = $user->role;
        if (!$user) {
            return redirect('/login');
        }

        if ($role === "admin") {
            unset($navLinks['Projects']);
        } else {
            unset($navLinks['Accounts']);
        }

        return view("dashboard.profile", compact('navLinks', 'role'));
    });

    Route::get("/project", function () use ($navLinks) {
        $user = Auth::user();
        if (!$user) {
            return redirect('/login');
        }
        $role = $user->role;
        if ($role === "admin") {
            unset($navLinks['Projects']);
        } else {
            unset($navLinks['Accounts']);
        }

        $projects = Project::all();
        Log::info('Projects', [$projects]);
        if ($role === 'user') {
            return view("dashboard.manager.project", compact('navLinks', 'projects', 'role'));
        }
    });

    Route::get("/project/{id}", function ($id) use ($navLinks) {
        $user = Auth::user();

        if (!$user) {
            return redirect('/login');
        }
        $role = $user->role;
        if ($role === "admin") {
            unset($navLinks['Projects']);
        } else {
            unset($navLinks['Accounts']);
        }

        Log::info('id', [$id]);
        $checkId = Project::find($id);
        if (!$checkId) {
            return redirect('/project');
        }

        $getAllProjectDeparment = ProjectDepartment::where('project_id', $id)->get();
        $getAllProjectDeparment = $getAllProjectDeparment->toArray();
        $getCurrentProjectAvailDepartment = array_map(function ($projectDeparment) use ($id) {
            return $projectDeparment['project_id'] == $id && $projectDeparment['created_by_id'] == Auth::user()->id ? $projectDeparment['department_id'] : null;
        }, $getAllProjectDeparment);

        $departments = Department::whereNotIn('id', $getCurrentProjectAvailDepartment)->get();
        $currentDepartment = Department::whereIn('id', $getCurrentProjectAvailDepartment)->get();

        $details = array_map(function ($projectDeparment) use ($id) {
            return $projectDeparment['project_id'] == $id && $projectDeparment['created_by_id'] == Auth::user()->id ?
                [$projectDeparment['created_by_id'], $projectDeparment['created_by'], $projectDeparment['created_at'], $projectDeparment['updated_at']] : null;
        }, $getAllProjectDeparment);

        Log::info('departments', [$departments, $currentDepartment, $details]);
        if (!$departments) {
            $departments = [];
        } else {
            $departments = $departments->toArray();
            $departments = array_map(function ($department) {
                return $department['department'];
            }, $departments);
        }

        if (!$currentDepartment) {
            $currentDepartment = [];
        }



        if ($role === 'user') {
            return view("dashboard.manager.projectInfo1", compact('navLinks', 'currentDepartment', 'id', 'role', 'departments', 'details'));
        }
    })->name('project.info');



    Route::get("/project/{id}/info/{folder}", function ($id, $folder) use ($navLinks) {
        $user = Auth::user();
        Log::info('Project id and folder anem', [$id, $folder]);
        if (!$user) {
            return redirect('/login');
        }
        $role = $user->role;
        $files = Files::where('project_id', $id)->where('folder', $folder)->get();
        if ($role === "admin") {
            unset($navLinks['Projects']);
        } else {
            unset($navLinks['Accounts']);
        }

        if (!$files) {
            $files = [];
        } else {
            $files = $files->toArray();
        }


        foreach ($files as &$file) {
            $file['actual_path'] = route('serve.file', ['filename' => basename($file['file_path'])]);
        }
        Log::info('Files', $files);
        if ($role === 'user') {
            return view("dashboard.manager.projectInfo2", compact('navLinks', 'id', 'folder', 'role', 'files'));
        }
    })->name('project.info.folder');


    //service files
    Route::get('/serve/{filename}', function ($filename) {

        // Path to the file in private storage
        $filePath = storage_path('app/private/uploads/' . $filename);
        Log::info('filepath', [$filePath]);
        // Check if the file exists
        if (file_exists($filePath)) {
            return response()->file($filePath);
        } else {
            return "";
        }
    })->name('serve.file');


    Route::post('/api/project/add', function (Request $request) {
        try {
            $validated = $request->validate([
                'project_name' => [
                    'required',
                    'string',
                    'min:3',
                    'max:50',
                    'not_regex:/^\d+$/',
                ],
            ], [
                'project_name.required' => 'Project name is required.',
                'project_name.min' => 'Project name must be at least 3 characters.',
                'project_name.not_regex' => 'Project name cannot consist only of numbers.',
            ]);

            Log::info('Validated Data:', $validated);

            $project = Project::create([
                'name' => $validated['project_name'],
                'owner_id' => Auth::user()->id,
                'owner_name' => Auth::user()->username,
            ]);

            Log::info('Project added:', ['project' => $project]);
            return response()->json(['message' => 'Project added successfully'], 200);
        } catch (\Exception $e) {
            Log::error('Error adding project:', ['error' => $e->getMessage()]);
            return response()->json(['message' => 'An error occurred. Please try again.'], 500);
        }
    })->name('addproject.submit');

    Route::post('/api/projectdepartment/add', function (Request $request) {
        try {
            $validated = $request->validate([
                'department' => [
                    'required',
                    'string',
                    'min:3',
                    'max:50',
                    'not_regex:/^\d+$/',
                ],
                'project_id' => ['required', 'integer'],
            ], [
                'department.required' => 'Department name is required.',
                'department.min' => 'Department name must be at least 3 characters.',
                'department.not_regex' => 'Department name cannot consist only of numbers.',
                'project_id.required' => 'Project ID  is required',
                'project_id.integer' => 'Project ID must be a valid number.',
            ]);

            Log::info('Validated Data:', $validated);
            $currentDepartment = Department::where('department', $validated['department'])->first();
            $currentProject =   Project::find($validated['project_id']);

            if (!$currentDepartment) {
                return response()->json(['message' => 'Department not found'], 404);
            }

            if (!$currentProject) {
                return response()->json(['message' => 'Project not found'], 404);
            }

            $projectDepartment = ProjectDepartment::create([
                'project_id' => $validated['project_id'],
                'department_id' => $currentDepartment->id,
                'created_by_id' => Auth::user()->id,
                'created_by' => Auth::user()->username,
            ]);

            Log::info('ProjectDeparment added:', ['project' => $projectDepartment]);
            return response()->json(['message' => 'ProjectDeparment added successfully'], 200);
        } catch (\Exception $e) {
            Log::error('Error adding ProjectDeparment:', ['error' => $e->getMessage()]);
            return response()->json(['message' => 'An error occurred. Please try again.'], 500);
        }
    })->name('projectDeparment.submit');


    Route::get("/api/project", function () {
        if (!Auth::check()) {
            return response()->json(['message' => 'User is not authenticated'], 401);
        }

        $projects = Project::all();
        if ($projects->isEmpty()) {
            return response()->json([
                'message' => 'No projects found.',
                'data' => [],
            ], 200);
        }

        return response()->json([
            'message' => 'Projects retrieved successfully.',
            'data' => $projects,
        ], 200);
    });

    Route::post("/api/file/upload", function (Request $request) {

        $request->validate([
            'files.*' => 'required|mimes:jpeg,jpg,png|max:10240',
            'project_id' => 'required|integer',
            'folder' => 'required|string|min:3|max:50|not_regex:/^\d+$/',
        ]);

        $fileDetials = [];
        // Process each uploaded file

        foreach ($request->file('files') as $file) {
            $filePath = $file->store('uploads', 'local');
            // Insert the file details into the database
            $fileRecord = Files::create([
                'file_name' => $file->getClientOriginalName(),
                'file_path' => $filePath,
                'file_type' => $file->getMimeType(),
                'file_size' => $file->getSize(),
                'file_extension' => $file->getClientOriginalExtension(),
                'created_by_id' => Auth::user()->id,
                'created_by' => Auth::user()->username,
                'project_id' => $request->project_id,
                'folder' => $request->folder,
            ]);

            $fileDetials[] = [
                'name' => $file->getClientOriginalName(),
                'size' => $file->getSize(),
                'path' => $filePath,
                'extension' => $file->getClientOriginalExtension(),
                'type' => $file->getMimeType()
            ];
        }

        Log::info("Data i want to store in db", [
            "project_id" => $request->project_id,
            "folder" => $request->folder,
            "created_by_id" => Auth::user()->id,
            "created_by" => Auth::user()->username,
            "file_details" => $fileDetials
        ]);

        return response()->json([
            'message' => 'Files uploaded successfully',
            'file_paths' => $fileDetials,
        ]);
    });
});



Route::get("/login", function () {
    Log::info('Auth status', ['is_authenticated' => Auth::check(), 'user' => Auth::user()]);

    if (Auth::check()) {
        return redirect('/');
    }
    return view("auth.login");
})->name('login');


Route::post("/api/login", function (Request $request) {

    // Validate the input fields
    $validated = $request->validate([
        'username' => 'required|string|max:100',
        'password' => 'required|string|min:6'
    ]);

    // Retrieve the Account by Accountname
    $user = Account::where('username', $validated['username'])->first();

    // Handle invalid Account or password
    if (!$user || !Hash::check($validated['password'], $user->password)) {
        Log::error("Invalid login attempt", ['username' => $validated['username']]);
        return back()->withErrors(['formerror' => 'Invalid username or password'])->withInput();
    }




    // Remove old tokens for the Account
    AccountSession::where('account_id', $user->id)->delete();

    // Generate a unique session token
    do {
        $token = Str::random(40);
    } while (AccountSession::where('session_token', $token)->exists());

    try {
        AccountSession::create([
            'account_id' => $user->id,
            'session_token' => $token,
            'expires_at' => now()->addDays(3),
        ]);
    } catch (\Exception $e) {
        logger($e->getMessage());
        return response()->json(['error' => $e->getMessage()], 500);
    }


    // Log the Account in
    //Auth::login($user);
    if (Auth::attempt(['username' => $validated['username'], 'password' => $validated['password']])) {
        $request->session()->regenerate();

        Log::info("Login successful", ['user' => $validated['username']]);
        Log::info('Auth status', ['is_authenticated' => Auth::check()]);
        // Redirect to the home page or intended route
        return redirect('/');
    }
    return back()->withErrors([
        'error' => 'Error logging in',
    ]);
})->name("login.submit");

Route::post('/api/logout', function (Request $request) {
    Log::info('Before logout', ['is_authenticated' => Auth::check(), 'user' => Auth::user()]);

    // Delete session data explicitly
    $id = Auth::id();
    AccountSession::where('account_id', $id)->delete();

    // Log the user out
    Auth::logout();
    Log::info('After logout', ['is_authenticated' => Auth::check(), 'user' => Auth::user()]);

    // Invalidate the session and regenerate the token
    $request->session()->invalidate();
    $request->session()->regenerateToken();

    Log::info('Session invalidated', ['is_authenticated' => Auth::check(), 'user' => Auth::user()]);

    // Redirect to login page
    $response = redirect('/login');
    $response->withCookie(cookie('laravel_session', '', -1));  // Expire the cookie
    Log::info('Session invalidated', ['is_authenticated' => Auth::check(), 'user' => Auth::user()]);

    // Clear history state using JavaScript
    $response->setContent('<script>
        window.history.replaceState(null, null, window.location.href);
        window.location.href = "/login";
    </script>');

    return $response;
})->name('logout');

Route::get("/recoverpassword", function () {
    return view("auth.recoverpassword");
});

Route::post("/recoverpassword", function (Request $request) {
    $validated = $request->validate([
        'Accountname' => 'required|string|max:100',
        'email' => 'required|email'
    ]);

    $Accounts = [
        'testAccount' => 'testAccount@gmail.com',
    ];

    if (!array_key_exists($validated['Accountname'], $Accounts)) {
        Log::error("Account not found", ['Accountname' => $validated['Accountname']]);
        return response()->json(['error' => 'Account not found'], 404);
    }

    if ($Accounts[$validated['Accountname']] !== $validated['email']) {
        Log::error("Email does not match the Accountname", [
            'Accountname' => $validated['Accountname'],
            'email' => $validated['email'],
        ]);
        return response()->json(['error' => 'Email does not match the Accountname'], 401);
    }


    Log::info("Password recovery data received", $request->all());

    return response()->json(['message' => 'Password recovery details are valid']);
});

Route::get("/newpassword", function () {
    return view("auth.newpassword");
});

Route::post("/newpassword", function (Request $request) {
    // Validate the input
    $validated = $request->validate([
        'npassword' => 'required|string|min:6',
        'cpassword' => 'required|string|min:6'
    ]);

    Log::info("Data", $request->all());

    // Check if passwords match
    if ($validated['npassword'] !== $validated['cpassword']) {
        return response()->json(['error' => 'Passwords do not match'], 400);
    }

    // If passwords match, handle password update logic
    // Example: Save to database (requires Account identification)
    // Assuming a logged-in Account is identified via $request->Account()
    /*
    $Account = $request->Account();
    $Account->password = bcrypt($validated['npassword']);
    $Account->save();
    */

    // Return success response
    return response()->json(['message' => 'Password updated successfully']);
});



// Account routes


Route::post("/api/user/add", function (Request $request) {
    Log::info("Data", $request->all());

    $validated = $request->validate([
        "username" => 'required|string|max:100',
        'full_name' => 'required|string|max:100',
        'email' => 'required|email',
        'password' => 'required|string|min:6',
        'role' => 'nullable|string|in:user,admin'
    ]);

    $validated['password'] = Hash::make($validated['password']);
    Account::create($validated);
    return response()->json(['message' => 'user created successfully'], 200);
});

Route::post('/api/depart/add', function (Request $request) {
    try {
        $validated = $request->validate([
            'department' => [
                'required',
                'string',
                'min:3',
                'max:50',
                'not_regex:/^\d+$/',
            ],
        ], [
            'department.required' => 'Department name is required.',
            'department.min' => 'Department name must be at least 3 characters.',
            'department.not_regex' => 'Department name cannot consist only of numbers.',
        ]);

        Log::info('Validated Data:', $validated);

        $depart = Department::create([
            'department' => $validated['department'],
            'created_by_id' => Auth::user()->id,
            'created_by' => Auth::user()->username,
        ]);

        Log::info('Department added:', ['Department' => $depart]);
        return response()->json(['message' => 'Department added successfully'], 200);
    } catch (\Exception $e) {
        Log::error('Error adding department:', ['error' => $e->getMessage()]);
        return response()->json(['message' => 'An error occurred. Please try again.'], 500);
    }
})->name('adddepartment.submit');

Route::put("/api/user/update/{id}", function (Request $request, $id) {
    $user = Account::find($id);

    if (!$user) {
        return response()->json([
            'message' => 'user not found.',
        ], 404);
    }

    $validatedData = $request->validate([
        'full_name' => 'nullable|string|max:255',
        'email' => 'nullable|email|max:255',
    ]);

    $user->update($validatedData);

    return response()->json([
        'message' => 'user updated successfully.',
        'data' => $user,
    ], 200);
});

Route::put("/api/depart/update/{id}", function (Request $request, $id) {
    $department = Department::find($id);
    Log::info('Department', [$department]);
    if (!$department) {
        return response()->json([
            'message' => 'Department not found.',
        ], 404);
    }

    $validated = $request->validate([
        'department' => [
            'required',
            'string',
            'min:3',
            'max:50',
            'not_regex:/^\d+$/',
        ],
    ], [
        'department.required' => 'Department name is required.',
        'department.min' => 'Department name must be at least 3 characters.',
        'department.not_regex' => 'Department name cannot consist only of numbers.',
    ]);

    $department->update($validated);

    return response()->json([
        'message' => 'user updated successfully.',
        'data' => $department,
    ], 200);
});

Route::delete("/api/user/delete/{id}", function ($id) {
    $user = Account::find($id);

    if (!$user) {
        return response()->json([
            'message' => 'user not found.',
        ], 404);
    }

    $user->delete();

    return response()->json([
        'message' => 'user deleted successfully.',
    ], 200);
});

Route::delete("/api/depart/delete/{id}", function ($id) {
    $department = Department::find($id);

    if (!$department) {
        return response()->json([
            'message' => 'Department not found.',
        ], 404);
    }

    $department->delete();

    return response()->json([
        'message' => 'Department deleted successfully.',
    ], 200);
});

Route::get("/api/user/{id}", function ($id) {
    $user = Account::find($id);

    if (!$user) {
        return response()->json([
            'message' => 'user not found.',
        ], 404);
    }
    return response()->json([
        'message' => 'user details retrieved successfully.',
        'data' => $user,
    ], 200);
});

Route::get("/api/depart/{id}", function ($id) {
    $department = Department::find($id);

    if (!$department) {
        return response()->json([
            'message' => 'Department not found.',
        ], 404);
    }
    return response()->json([
        'message' => 'Department details retrieved successfully.',
        'data' => $department,
    ], 200);
});
Route::get('/api/user', function () {
    $data = Account::all();

    if ($data->isEmpty()) {
        return response()->json([
            'message' => 'No Accounts found.',
            'data' => [],
        ], 200);
    }

    return response()->json([
        'message' => 'Accounts retrieved successfully.',
        'data' => $data,
    ], 200);
});

Route::get('/api/depart', function () {
    $data = Department::all();

    if ($data->isEmpty()) {
        return response()->json([
            'message' => 'No Department found.',
            'data' => [],
        ], 200);
    }

    return response()->json([
        'message' => 'Department retrieved successfully.',
        'data' => $data,
    ], 200);
});
