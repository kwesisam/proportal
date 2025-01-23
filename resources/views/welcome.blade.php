<x-layout :navLinks="$navLinks" :filesByDepartment="$filesByDepartment" :role="$role" :fetchDepartments="$fetchDepartments"> 
    <section class="space-y-8 w-full lg:w-[75%] h-full lg:h-[88vh] py-4 px-2 rounded-md shadow-md bg-gray-50 dark:bg-neutral-900">
        <div class="space-y-4">
            <p class="montserrat-medium  md:text-lg header"><span class="text-gray-600">Today, </span>Monday, August 12 2024</p>

            <div class="grid md:grid-cols-3 gap-4">
                <div class="border rounded-md flex p-4 gap-2 shadow cursor-pointer">
                    <div class="rounded-full p-3 border bg-primary" >
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-folder w-full h-full text-white"><path d="M20 20a2 2 0 0 0 2-2V8a2 2 0 0 0-2-2h-7.9a2 2 0 0 1-1.69-.9L9.6 3.9A2 2 0 0 0 7.93 3H4a2 2 0 0 0-2 2v13a2 2 0 0 0 2 2Z"/></svg>
                    </div>
                    <div class="flex flex-col">
                        <div class="montserrat-bold text-lg header">{{ $dashboardData['projects_count'] }}</div>
                        <p class="text-sm montserrat-regular  header opacity-80">Projects</p>
                    </div>
                </div>
                <div class="border rounded-md flex p-4 gap-2 shadow cursor-pointer">
                    <div class="rounded-full p-3 border bg-primary" >
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-circle-gauge w-full h-full text-white"><path d="M15.6 2.7a10 10 0 1 0 5.7 5.7"/><circle cx="12" cy="12" r="2"/><path d="M13.4 10.6 19 5"/></svg>
                    </div>
                    <div class="flex flex-col">
                        <div class="montserrat-bold text-lg header">{{ $dashboardData['departments_count'] }}</div>
                        <p class="text-sm montserrat-regular header opacity-80">Departments</p>
                    </div>
                </div>
                <div class="border rounded-md flex p-4 gap-2 shadow cursor-pointer">
                    <div class="rounded-full p-3  bg-primary" >
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-files w-full h-full text-white"><path d="M20 7h-3a2 2 0 0 1-2-2V2"/><path d="M9 18a2 2 0 0 1-2-2V4a2 2 0 0 1 2-2h7l4 4v10a2 2 0 0 1-2 2Z"/><path d="M3 7.6v12.8A1.6 1.6 0 0 0 4.6 22h9.8"/></svg>
                    </div>
                    <div class="flex flex-col">
                        <div class="montserrat-bold text-lg header">{{ $dashboardData['files_count'] }}</div>
                        <p class="text-sm montserrat-regular header opacity-80">Files</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="rounded-med">
            <div class="grid  md:grid-cols-5 gap-4">
                <div>
                    <button id="createUser" class="border p-1">Create User</button>
                </div>
                <div>
                    <button id="updateUser" class="border p-1">Update User</button>
                </div>
                <div>
                    <button id="deleteUser" class="border p-1">Delete User</button>
                </div>
                <div>
                    <button id="getUser" class="border p-1">Get User</button>
                </div>
                <div>
                    <button id="getUsers" class="border p-1">Get users</button>
                </div>
                <div>
                    <button id='addDepart' class="border p-1">Add Department</button>
                </div>
                <div>
                    <button id='updateDepart' class="border p-1">Update Department</button>
                </div>
                <div>
                    <button id='deleteDepart' class="border p-1">Delete Department</button>
                </div>
                <div>
                    <button id='getDepart' class="border p-1">Get Department</button>
                </div>
                <div>
                    <button id='getDeparts' class="border p-1">Get Departments</button>
                </div>
            </div>
        </div>
    </section>
</x-layout>
