<x-layout :navLinks="$navLinks">

    <section class="w-full">
        @if($role === "manager")
            <p>Manager</p>
        @elseif($role === "admin")
            <p>Admin</p>
        @else
            <p>Employee</p>
        @endif
        <div class="border-y py-4 flex justify-between">
            <div>
                <p class="text-3xl montserrat-semibold text-gray-700">Profile</p>
            </div>
        </div>
        <div class="border-b py-4 space-y-8">
            <div class="grid grid-cols-3 ">
                <div class="col-span-1">
                    <p class="montserrat-medium">Profile</p>
                    <p class="text-sm montserrat-regular text-gray-600">Set your account detials</p>
                </div>
                <div class="col-span-2 grid grid-cols-4">
                    <div class="col-span-3 space-y-5">
                        <div class="flex gap-4">
                            <div class="w-full">
                                <label for="name" class="text-sm montserrat-regular text-gray-600">Name</label>
                                <input type="text" name="name" id="name" class="w-full text-sm border p-2 outline-none rounded" placeholder="First name">
                            </div>
                            <div class="w-full">
                                <label for="surname" class="text-sm montserrat-regular text-gray-600">Surname</label>
                                <input type="text" name="surname" id="surname" class="w-full text-sm border p-2 outline-none rounded" placeholder="Surname">
                            </div>
                        </div>
                        <div class="flex gap-4">
                            <div class="w-full">
                                <label for="email" class="text-sm montserrat-regular text-gray-600">Email</label>
                                <input type="text" name="email" id="email" class="w-full text-sm border p-2 outline-none rounded" placeholder="Email address">
                            </div>
                            <div class="w-full">
                                <label for="phone" class="text-sm montserrat-regular text-gray-600">Phone</label>
                                <input type="text" name="phone" id="phone" class="w-full text-sm border p-2 outline-none rounded" placeholder="Phone number">
                            </div>
                        </div>
                    </div>
                    <div class="col-span-1  flex flex-col space-y-2">
                        <div class="w-24 h-24 border rounded-full mx-auto overflow-hidden">
                            <img src="https://res.cloudinary.com/dsqvbry3t/image/upload/v1733174012/user-placeholder_xzyv42.jpg" alt="avatar" width="100" height="100" class="object-fit">
                        </div>
                        <div class="flex justify-center gap-2">
                            <button class="border rounded-3xl py-1 px-2 text-sm montserrat-regular">Edit Photo</button>
                            <button class="border rounded-full p-1">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-trash text-gray-600"><path d="M3 6h18"/><path d="M19 6v14c0 1-1 2-2 2H7c-1 0-2-1-2-2V6"/><path d="M8 6V4c0-1 1-2 2-2h4c1 0 2 1 2 2v2"/></svg>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
           
            <div class="grid grid-cols-3 border-t py-4">
                <div class="col-span-1">
                    <p class="montserrat-medium">Your work</p>
                    <p class="text-sm montserrat-regular text-gray-600">Add info about your postion</p>
                </div>
                <div class="col-span-2 grid grid-cols-3 gap-4">
                            <div>
                                <label for="employeenumber" class="text-sm montserrat-regular text-gray-600">Employee Number</label>
                                <input type="text" name="employeenumber" id="employeenumber" class="w-full text-sm border p-2 outline-none rounded" placeholder="Employee number">
                            </div>
                            <div class="w-full ">
                                <label class="text-sm montserrat-regular text-gray-600" for="jobrole">Job Role</label>
                                <select name="jobrole" id="jobrole" data-hs-select='{
                                    "placeholder": "Select option...",
                                    "toggleTag": "<button type=\"button\" aria-expanded=\"false\"></button>",
                                    "toggleClasses": "hs-select-disabled:pointer-events-none hs-select-disabled:opacity-50 relative py-2 ps-4 pe-9 flex gap-x-2 text-nowrap w-full cursor-pointer bg-white border border-gray-200 rounded-md text-start text-sm focus:outline-none focus:ring-2 focus:ring-0 montserrat-regular",
                                    "dropdownClasses": "mt-2 z-50 w-full max-h-72 p-1 space-y-0.5 bg-white border border-gray-200 rounded-lg overflow-hidden overflow-y-auto [&::-webkit-scrollbar]:w-2 [&::-webkit-scrollbar-thumb]:rounded-full [&::-webkit-scrollbar-track]:bg-gray-100 [&::-webkit-scrollbar-thumb]:bg-gray-300 dark:[&::-webkit-scrollbar-track]:bg-neutral-700 dark:[&::-webkit-scrollbar-thumb]:bg-neutral-500",
                                    "optionClasses": "py-2 px-4 w-full text-sm text-gray-800 cursor-pointer hs-select-disabled:pointer-events-none hs-select-disabled:opacity-50",
                                    "optionTemplate": "<div class=\"flex justify-between items-center w-full\"><span data-title></span><span class=\"hidden hs-selected:block\"><svg class=\"shrink-0 size-3.5 text-blue-600 dark:text-blue-500 \" xmlns=\"http:.w3.org/2000/svg\" width=\"24\" height=\"24\" viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"currentColor\" stroke-width=\"2\" stroke-linecap=\"round\" stroke-linejoin=\"round\"><polyline points=\"20 6 9 17 4 12\"/></svg></span></div>",
                                    "extraMarkup": "<div class=\"absolute top-1/2 end-3 -translate-y-1/2\"><svg class=\"shrink-0 size-3.5 text-gray-500 dark:text-neutral-500 \" xmlns=\"http://www.w3.org/2000/svg\" width=\"24\" height=\"24\" viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"currentColor\" stroke-width=\"2\" stroke-linecap=\"round\" stroke-linejoin=\"round\"><path d=\"m7 15 5 5 5-5\"/><path d=\"m7 9 5-5 5 5\"/></svg></div>"
                                  }' class="hidden">
                                    <option value="" selected></option>
                                    <option value="Development">Development</option>
                                    <option value="Marketing">Marketing</option>
                                    <option value="Research">Research</option>
                                </select>
                                <p class="text-xs text-red-500 hidden">Error</p>
                            </div>        
                            <div class="w-full ">
                                <label class="text-sm montserrat-regular text-gray-600" for="department">Department</label>
                                <select name="department" id="department" data-hs-select='{
                                    "placeholder": "Select option...",
                                    "toggleTag": "<button type=\"button\" aria-expanded=\"false\"></button>",
                                    "toggleClasses": "hs-select-disabled:pointer-events-none hs-select-disabled:opacity-50 relative py-2 ps-4 pe-9 flex gap-x-2 text-nowrap w-full cursor-pointer bg-white border border-gray-200 rounded-md text-start text-sm focus:outline-none focus:ring-2 focus:ring-0 montserrat-regular",
                                    "dropdownClasses": "mt-2 z-50 w-full max-h-72 p-1 space-y-0.5 bg-white border border-gray-200 rounded-lg overflow-hidden overflow-y-auto [&::-webkit-scrollbar]:w-2 [&::-webkit-scrollbar-thumb]:rounded-full [&::-webkit-scrollbar-track]:bg-gray-100 [&::-webkit-scrollbar-thumb]:bg-gray-300 dark:[&::-webkit-scrollbar-track]:bg-neutral-700 dark:[&::-webkit-scrollbar-thumb]:bg-neutral-500",
                                    "optionClasses": "py-2 px-4 w-full text-sm text-gray-800 cursor-pointer hs-select-disabled:pointer-events-none hs-select-disabled:opacity-50",
                                    "optionTemplate": "<div class=\"flex justify-between items-center w-full\"><span data-title></span><span class=\"hidden hs-selected:block\"><svg class=\"shrink-0 size-3.5 text-blue-600 dark:text-blue-500 \" xmlns=\"http:.w3.org/2000/svg\" width=\"24\" height=\"24\" viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"currentColor\" stroke-width=\"2\" stroke-linecap=\"round\" stroke-linejoin=\"round\"><polyline points=\"20 6 9 17 4 12\"/></svg></span></div>",
                                    "extraMarkup": "<div class=\"absolute top-1/2 end-3 -translate-y-1/2\"><svg class=\"shrink-0 size-3.5 text-gray-500 dark:text-neutral-500 \" xmlns=\"http://www.w3.org/2000/svg\" width=\"24\" height=\"24\" viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"currentColor\" stroke-width=\"2\" stroke-linecap=\"round\" stroke-linejoin=\"round\"><path d=\"m7 15 5 5 5-5\"/><path d=\"m7 9 5-5 5 5\"/></svg></div>"
                                  }' class="hidden">
                                    <option value="" selected></option>
                                    <option value="Development">Development</option>
                                    <option value="Marketing">Marketing</option>
                                    <option value="Research">Research</option>
                                </select>
                                <p class="text-xs text-red-500 hidden">Error</p>
                            </div> 
                
                </div>
            </div>
        </div>
        
    </section>
</x-layout>
