<section>
    <div class="border-y py-4 flex justify-between">
        <div>
            <p class="text-3xl montserrat-semibold text-gray-700">Got a new project? Start adding it now!</p>
        </div>
    </div>
    <div class="py-4 border-b">
        <div>
            <form  class="space-y-4 w-3/5 mx-auto " name="add-project-form">
                <!-- Client Name && Email -->
                <div class="flex gap-4">
                    <!-- Client Name -->
                    <div class="w-full space-y-1">
                        <label class="block text-xs montserrat-regular text-gray-600" for="clientName">Client Name</label>
                        <input type="text" id="clientName" name="clientName" class="w-full border border-gray-300 rounded-md p-2 text-sm montserrat-regular outline-none" placeholder="Enter client name" >
                        <p class="text-xs text-red-500 hidden" ></p>
                    </div>
                      <!-- Email -->
                    <div class="w-full space-y-1">
                        <label class="block text-xs montserrat-regular text-gray-600" for="email">Email</label>
                        <input type="text   " id="email" name="email" class="w-full border border-gray-300 rounded-md p-2 text-sm montserrat-regular outline-none" placeholder="Enter email" >
                        <p class="text-xs text-red-500 hidden"></p>
                    </div>
                </div>

                <!-- Country && Location -->
                <div class="flex gap-4">
                    <!-- Country 
                    <div class="w-full space-y-1">
                        <label class="block text-xs montserrat-regular text-gray-600" for="country">Country</label>
                        <input type="text" id="country" name="country" class="w-full border border-gray-300 rounded-md p-2 text-sm montserrat-regular outline-none" placeholder="Enter country" >
                        <p class="text-xs text-red-500 hidden">Error</p>
                    </div>-->
                    <div class="w-full space-y-1">
                        <label class="block text-xs montserrat-regular text-gray-600" for="country">Country</label>
                        <select id="country" name="country" data-hs-select='{
                            "hasSearch": true,
                            "searchPlaceholder": "Search...",
                            "searchClasses": "block w-full rounded-md outline-none border focus:ring-0 before:absolute before:inset-0 before:z-[1] dark:bg-transparent dark:placeholder-gray-500 py-2 text-sm px-3",
                            "searchWrapperClasses": "bg-white p-2 -mx-1 sticky top-0",
                            "placeholder": "Select option...",
                            "toggleTag": "<button type=\"button\" aria-expanded=\"false\"></button>",
                            "toggleClasses": "hs-select-disabled:pointer-events-none hs-select-disabled:opacity-50 relative py-2 ps-4 pe-9 flex gap-x-2 text-nowrap w-full cursor-pointer bg-white border border-gray-200 rounded-md text-start text-sm focus:outline-none focus:ring-2 focus:ring-0 montserrat-regular",
                            "dropdownClasses": "mt-2 z-50 w-full max-h-72 p-1 space-y-0.5 bg-white border border-gray-200 rounded-lg overflow-hidden overflow-y-auto [&::-webkit-scrollbar]:w-2 [&::-webkit-scrollbar-thumb]:rounded-full [&::-webkit-scrollbar-track]:bg-gray-100 [&::-webkit-scrollbar-thumb]:bg-gray-300 dark:[&::-webkit-scrollbar-track]:bg-neutral-700 dark:[&::-webkit-scrollbar-thumb]:bg-neutral-500",
                            "optionClasses": "py-2 px-4 w-full text-sm text-gray-800 cursor-pointer hs-select-disabled:pointer-events-none hs-select-disabled:opacity-50",
                            "optionTemplate": "<div class=\"flex justify-between items-center w-full\"><span data-title></span><span class=\"hidden hs-selected:block\"><svg class=\"shrink-0 size-3.5 text-blue-600 dark:text-blue-500 \" xmlns=\"http:.w3.org/2000/svg\" width=\"24\" height=\"24\" viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"currentColor\" stroke-width=\"2\" stroke-linecap=\"round\" stroke-linejoin=\"round\"><polyline points=\"20 6 9 17 4 12\"/></svg></span></div>",
                            "extraMarkup": "<div class=\"absolute top-1/2 end-3 -translate-y-1/2\"><svg class=\"shrink-0 size-3.5 text-gray-500 dark:text-neutral-500 \" xmlns=\"http://www.w3.org/2000/svg\" width=\"24\" height=\"24\" viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"currentColor\" stroke-width=\"2\" stroke-linecap=\"round\" stroke-linejoin=\"round\"><path d=\"m7 15 5 5 5-5\"/><path d=\"m7 9 5-5 5 5\"/></svg></div>"
                          }' class="hidden">
                            <option value="" selected></option>
                        </select>
                        <p class="text-xs text-red-500 hidden"></p>
                    </div>
                    <!-- Location -->
                    <div class="w-full space-y-1">
                        <label class="block text-xs montserrat-regular text-gray-600" for="location">Location</label>
                        <input type="text" id="location" name="location" class="w-full border border-gray-300 rounded-md p-2 text-sm montserrat-regular outline-none" placeholder="Enter location" >
                        <p class="text-xs text-red-500 hidden"></p>
                    </div>
                </div>

                <!-- Contact -->
                <div class="space-y-1">
                    <label class="block text-xs montserrat-regular text-gray-600" for="contact">Contact</label>
                    <input type="tel" id="contact" name="contact" class="w-full border border-gray-300 rounded-md p-2 text-sm montserrat-regular outline-none" placeholder="0540000000" >
                    <p class="text-xs text-red-500 hidden"></p>
                </div>
            
                <!-- Project Name -->
                <div class="space-y-1">
                    <label class="block text-xs montserrat-regular text-gray-600" for="projectName">Project Name</label>
                    <input type="text" id="projectName" name="projectName" class="w-full border border-gray-300 rounded-md p-2 text-sm montserrat-regular outline-none" placeholder="Enter project name" >
                    <p class="text-xs text-red-500 hidden"></p>
                </div>
                <!-- Project Description -->
                <div class="space-y-1">
                    <label class="block text-xs montserrat-regular text-gray-600" for="description">Project Description</label>
                    <textarea id="description" name="description" class="w-full border border-gray-300 rounded-md p-2 text-sm montserrat-regular outline-none" rows="4" placeholder="Enter project description"></textarea>
                    <p class="text-xs text-red-500 hidden"></p>
                </div>

                <!-- Category && Budget -->
                <div class="flex gap-4">
                    <!-- Category -->
                       <div class="w-full space-y-1">
                        <label class="block text-xs montserrat-regular text-gray-600" for="category">Project Category</label>
                        <select name="category" id="category" data-hs-select='{
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
                        <p class="text-xs text-red-500 hidden"></p>
                    </div>             
                    
                    <!-- Budget -->
                    <div class="w-full space-y-1">
                        <label class="block text-xs montserrat-regular text-gray-600" id="budgetlabel" for="budget">Budget (GHC)</label>
                        <input type="number" id="budget" name="budget" class="w-full border border-gray-300 rounded-md p-2 text-sm montserrat-regular outline-none" placeholder="Enter budget" min="0" >
                        <p class="text-xs text-red-500 hidden"></p>
                    </div>
                </div>

                <!-- Priority && Status -->
                <div class="flex gap-4">
                    <!-- Prority -->
                    <div class="w-full space-y-1">
                        <label class="block text-xs montserrat-regular text-gray-600" for="priority">Priority</label>
                        <select name="priority" id="priority" data-hs-select='{
                            "placeholder": "Select option...",
                            "toggleTag": "<button type=\"button\" aria-expanded=\"false\"></button>",
                            "toggleClasses": "hs-select-disabled:pointer-events-none hs-select-disabled:opacity-50 relative py-2 ps-4 pe-9 flex gap-x-2 text-nowrap w-full cursor-pointer bg-white border border-gray-200 rounded-md text-start text-sm focus:outline-none focus:ring-2 focus:ring-0 montserrat-regular",
                            "dropdownClasses": "mt-2 z-50 w-full max-h-72 p-1 space-y-0.5 bg-white border border-gray-200 rounded-lg overflow-hidden overflow-y-auto [&::-webkit-scrollbar]:w-2 [&::-webkit-scrollbar-thumb]:rounded-full [&::-webkit-scrollbar-track]:bg-gray-100 [&::-webkit-scrollbar-thumb]:bg-gray-300 dark:[&::-webkit-scrollbar-track]:bg-neutral-700 dark:[&::-webkit-scrollbar-thumb]:bg-neutral-500",
                            "optionClasses": "py-2 px-4 w-full text-sm text-gray-800 cursor-pointer hs-select-disabled:pointer-events-none hs-select-disabled:opacity-50",
                            "optionTemplate": "<div class=\"flex justify-between items-center w-full\"><span data-title></span><span class=\"hidden hs-selected:block\"><svg class=\"shrink-0 size-3.5 text-blue-600 dark:text-blue-500 \" xmlns=\"http:.w3.org/2000/svg\" width=\"24\" height=\"24\" viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"currentColor\" stroke-width=\"2\" stroke-linecap=\"round\" stroke-linejoin=\"round\"><polyline points=\"20 6 9 17 4 12\"/></svg></span></div>",
                            "extraMarkup": "<div class=\"absolute top-1/2 end-3 -translate-y-1/2\"><svg class=\"shrink-0 size-3.5 text-gray-500 dark:text-neutral-500 \" xmlns=\"http://www.w3.org/2000/svg\" width=\"24\" height=\"24\" viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"currentColor\" stroke-width=\"2\" stroke-linecap=\"round\" stroke-linejoin=\"round\"><path d=\"m7 15 5 5 5-5\"/><path d=\"m7 9 5-5 5 5\"/></svg></div>"
                          }' class="hidden">
                            <option value="" selected></option>
                            <option value="High">High</option>
                            <option value="Medium">Medium</option>
                            <option value="Low">Low</option>
                        </select>
                        <p class="text-xs text-red-500 hidden"></p>
                    </div>
                    
                    
                    <!-- Status -->
                    <div class="w-full space-y-1">
                        <label class="block text-xs montserrat-regular text-gray-600" for="status">Status</label>
                        <select name="status" id="status" data-hs-select='{
                            "placeholder": "Select option...",
                            "toggleTag": "<button type=\"button\" aria-expanded=\"false\"></button>",
                            "toggleClasses": "hs-select-disabled:pointer-events-none hs-select-disabled:opacity-50 relative py-2 ps-4 pe-9 flex gap-x-2 text-nowrap w-full cursor-pointer bg-white border border-gray-200 rounded-md text-start text-sm focus:outline-none focus:ring-2 focus:ring-0 montserrat-regular",
                            "dropdownClasses": "mt-2 z-50 w-full max-h-72 p-1 space-y-0.5 bg-white border border-gray-200 rounded-lg overflow-hidden overflow-y-auto [&::-webkit-scrollbar]:w-2 [&::-webkit-scrollbar-thumb]:rounded-full [&::-webkit-scrollbar-track]:bg-gray-100 [&::-webkit-scrollbar-thumb]:bg-gray-300 dark:[&::-webkit-scrollbar-track]:bg-neutral-700 dark:[&::-webkit-scrollbar-thumb]:bg-neutral-500",
                            "optionClasses": "py-2 px-4 w-full text-sm text-gray-800 cursor-pointer hs-select-disabled:pointer-events-none hs-select-disabled:opacity-50",
                            "optionTemplate": "<div class=\"flex justify-between items-center w-full\"><span data-title></span><span class=\"hidden hs-selected:block\"><svg class=\"shrink-0 size-3.5 text-blue-600 dark:text-blue-500 \" xmlns=\"http:.w3.org/2000/svg\" width=\"24\" height=\"24\" viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"currentColor\" stroke-width=\"2\" stroke-linecap=\"round\" stroke-linejoin=\"round\"><polyline points=\"20 6 9 17 4 12\"/></svg></span></div>",
                            "extraMarkup": "<div class=\"absolute top-1/2 end-3 -translate-y-1/2\"><svg class=\"shrink-0 size-3.5 text-gray-500 dark:text-neutral-500 \" xmlns=\"http://www.w3.org/2000/svg\" width=\"24\" height=\"24\" viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"currentColor\" stroke-width=\"2\" stroke-linecap=\"round\" stroke-linejoin=\"round\"><path d=\"m7 15 5 5 5-5\"/><path d=\"m7 9 5-5 5 5\"/></svg></div>"
                          }' class="hidden">
                            <option value="" selected></option>
                            <option value="Active">Active</option>
                            <option value="Pending">Pending</option>
                            <option value="Completed">Completed</option>
                        </select>
                        <p class="text-xs text-red-500 hidden"></p>
                    </div>
                </div>

                <!-- Date && Deadline -->
                <div class="flex gap-4">

                    <!-- Date -->
                    <div class="w-full space-y-1">
                        <label class="block text-xs montserrat-regular text-gray-600" for="startDate">Start Date</label>
                        <input type="date" id="startDate" name="startDate" class="w-full border montserrat-regular outline-none border-gray-300 rounded-md p-2 text-sm" >
                        <p class="text-xs text-red-500 hidden"></p>
                    </div>

                    <!-- Dead Line -->
                    <div class="w-full space-y-1">
                        <label class="block text-xs montserrat-regular text-gray-600" for="deadline">Deadline</label>
                        <input type="date" id="deadline" name="deadline" class="w-full border montserrat-regular outline-none border-gray-300 rounded-md p-2 text-sm" >
                        <p class="text-xs text-red-500 hidden"></p>
                    </div>
                </div>
                
                <!-- Submit Button -->
                <div class="space-y-1">
                    <button type="submit"  class="bg-emerald-400 w-full flex justify-center gap-2 text-white px-4 py-2 rounded-md text-sm hover:bg-emerald-700 montserrat-regular outline-none">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-loader animate-spin"><path d="M12 2v4"/><path d="m16.2 7.8 2.9-2.9"/><path d="M18 12h4"/><path d="m16.2 16.2 2.9 2.9"/><path d="M12 18v4"/><path d="m4.9 19.1 2.9-2.9"/><path d="M2 12h4"/><path d="m4.9 4.9 2.9 2.9"/></svg>
                        Submit</button>
                        <p class="text-xs text-red-500 hidden" id="managerProjectAddFormError"></p>

                </div>
               
            
            </form>
            
        </div>
    </div>
</section>