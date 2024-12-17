<?php

use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

$navLinks = [
    'Home' => [
        "name" => 'Dashboard',
        "url" => '/',
        "icon" => '<svg xmlns="http://www.w3.org/2000/svg" width="21" height="21" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-house"><path d="M15 21v-8a1 1 0 0 0-1-1h-4a1 1 0 0 0-1 1v8"/><path d="M3 10a2 2 0 0 1 .709-1.528l7-5.999a2 2 0 0 1 2.582 0l7 5.999A2 2 0 0 1 21 10v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"/></svg>'
    ],

    'About' => [
        "name" => 'Projects',
        "url" => '/project',
        "icon" => '<svg xmlns="http://www.w3.org/2000/svg" width="21" height="21" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-folder-closed"><path d="M20 20a2 2 0 0 0 2-2V8a2 2 0 0 0-2-2h-7.9a2 2 0 0 1-1.69-.9L9.6 3.9A2 2 0 0 0 7.93 3H4a2 2 0 0 0-2 2v13a2 2 0 0 0 2 2Z"/><path d="M2 10h20"/></svg>'
    ],

    'Services' => [
        "name" => 'Team',
        "url" => '/team',
        "icon" => '<svg xmlns="http://www.w3.org/2000/svg" width="21" height="21" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-house"><path d="M15 21v-8a1 1 0 0 0-1-1h-4a1 1 0 0 0-1 1v8"/><path d="M3 10a2 2 0 0 1 .709-1.528l7-5.999a2 2 0 0 1 2.582 0l7 5.999A2 2 0 0 1 21 10v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"/></svg>'
    ],
    'Contact' => [
        "name" => 'My Profile',
        "url" => '/profile',
        "icon" => '<svg xmlns="http://www.w3.org/2000/svg" width="21" height="21" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-circle-user-round"><path d="M18 20a6 6 0 0 0-12 0"/><circle cx="12" cy="10" r="4"/><circle cx="12" cy="12" r="10"/></svg>'
    ],
];

$role = 'manager';
Route::get('/', function () use ($navLinks) {
    return view('welcome', compact('navLinks'));
});


Route::get("/project", function () use ($navLinks, $role) {
    if ($role === 'manager') {
        return view("dashboard.manager.project", compact('navLinks'));
    } else if ($role === 'user') {
        return view("dashboard.user.project", compact('navLinks'));
    } else {
        return view("dashboard.admin.project", compact('navLinks'));
    }
});

Route::get("/team", function () use ($navLinks, $role) {
    if ($role === 'manager') {
        return view("dashboard.manager.team", compact('navLinks'));
    } else if ($role === 'user') {
        return view("dashboard.user.team", compact('navLinks'));
    } else {
        return view("dashboard.admin.team", compact('navLinks'));
    }
});

Route::get("/profile", function () use ($navLinks, $role) {
    return view("dashboard.profile", compact('navLinks', 'role'));
});

Route::get("/login", function () {
    return view("auth.login");
});

Route::post("/login", function (Request $request) {
    $validated = $request->validate([
        'username' => 'required|string|max:100',
        'password' => 'required|string|min:6'
    ]);

    $users = [
        'testuser' => 'P@55word',
    ];

    if (!array_key_exists($validated['username'], $users)) {
        Log::error("User not found", []);
        return response()->json(['error' => 'User not found'], 404);
    }

    if ($users[$validated['username']] !== $validated['password']) {
        Log::error("Invalid password", []);
        return response()->json(['error' => 'Invalid password'], 401);
    }


    Log::info("Data", $request->all());

    return response()->json(['message' => 'Login data received successfully']);
});

Route::get("/recoverpassword", function () {
    return view("auth.recoverpassword");
});

Route::post("/recoverpassword", function (Request $request) {
    $validated = $request->validate([
        'username' => 'required|string|max:100',
        'email' => 'required|email'
    ]);

    $users = [
        'testuser' => 'testuser@gmail.com',
    ];

    if (!array_key_exists($validated['username'], $users)) {
        Log::error("User not found", ['username' => $validated['username']]);
        return response()->json(['error' => 'User not found'], 404);
    }

    if ($users[$validated['username']] !== $validated['email']) {
        Log::error("Email does not match the username", [
            'username' => $validated['username'],
            'email' => $validated['email'],
        ]);
        return response()->json(['error' => 'Email does not match the username'], 401);
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
    // Example: Save to database (requires user identification)
    // Assuming a logged-in user is identified via $request->user()
    /*
    $user = $request->user();
    $user->password = bcrypt($validated['npassword']);
    $user->save();
    */

    // Return success response
    return response()->json(['message' => 'Password updated successfully']);
});
