<x-layout :navLinks="$navLinks">
    <section class="space-y-8 flex-grow ">
        <!--- Project Name --->
        <div class="">
            <h1 class="text-3xl montserrat-bold">Welcome to Laravel 8</hjson>
        </div>
        <!--- Project Description --->
        <div class="flex gap-2 border-b">
            <div class="border-b p-2 text-sm uppercase flex gap-2 text-emerald-400 border-emerald-400 montserrat-medium">
                <span>
                    <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-briefcase-business"><path d="M12 12h.01"/><path d="M16 6V4a2 2 0 0 0-2-2h-4a2 2 0 0 0-2 2v2"/><path d="M22 13a18.15 18.15 0 0 1-20 0"/><rect width="20" height="14" x="2" y="6" rx="2"/></svg>
                </span>
                PROJECT DETIALS
            </div>
            <div class="border-b p-2 text-sm uppercase flex gap-2 text-gray-600 montserrat-medium">
                <span>
                    <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22   " viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-circle-dot-dashed"><path d="M10.1 2.18a9.93 9.93 0 0 1 3.8 0"/><path d="M17.6 3.71a9.95 9.95 0 0 1 2.69 2.7"/><path d="M21.82 10.1a9.93 9.93 0 0 1 0 3.8"/><path d="M20.29 17.6a9.95 9.95 0 0 1-2.7 2.69"/><path d="M13.9 21.82a9.94 9.94 0 0 1-3.8 0"/><path d="M6.4 20.29a9.95 9.95 0 0 1-2.69-2.7"/><path d="M2.18 13.9a9.93 9.93 0 0 1 0-3.8"/><path d="M3.71 6.4a9.95 9.95 0 0 1 2.7-2.69"/><circle cx="12" cy="12" r="1"/></svg>
                </span>
                POSITIOn DETIALS
            </div>
            <div class="border-b p-2 text-sm uppercase flex gap-2 text-gray-600 montserrat-medium">
                <span>
                    <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-book-open"><path d="M12 7v14"/><path d="M3 18a1 1 0 0 1-1-1V4a1 1 0 0 1 1-1h5a4 4 0 0 1 4 4 4 4 0 0 1 4-4h5a1 1 0 0 1 1 1v13a1 1 0 0 1-1 1h-6a3 3 0 0 0-3 3 3 3 0 0 0-3-3z"/></svg>
                </span>
                PREFERENCE
            </div>
        </div>
        <!--- Project Details --->
        <div class="border  px-5 py-10 rounded-md shadow-sm bg-white space-y-8">
            <div class="border w-full rounded-md p-5 bg-gray-50">
                <div class="grid grid-cols-5 gap-3 divide-x-2">
                    <div class=" flex flex-col">
                        <div class="text-2xl montserrat-semibold">0/2</div>
                        <div class="text-sm montserrat-bold uppercase text-gray-500 ">Contracted</div>
                    </div>
                    <div class="p-1 flex flex-col">
                        <div class="text-2xl montserrat-semibold">$2000</div>
                        <div class="text-sm montserrat-bold uppercase text-gray-500 ">Budget</div>
                    </div>

                      <div class="p-1 flex flex-col">
                        <div class="text-2xl montserrat-semibold">0</div>
                        <div class="text-sm montserrat-bold uppercase text-gray-500 ">Unpaid Contract</div>
                    </div>

                     <div class="p-1 flex flex-col">
                        <div class="text-2xl montserrat-semibold">0/2</div>
                        <div class="text-sm montserrat-bold uppercase text-gray-500 ">Contracted</div>
                    </div>

                     <div class="p-1 flex flex-col">
                        <div class="text-2xl montserrat-semibold">0</div>
                        <div class="text-sm montserrat-bold uppercase text-gray-500 ">Unread Message</div>
                    </div>
                </div>
            </div>
            <div class="w-full p-5">
                <div class="grid grid-cols-5 gap-3">
                    <div class="flex flex-col p-1">
                        <div class="text-xs montserrat-bold uppercase text-gray-500 ">Start Date</div>
                        <p class="montserrat-semibold text-sm text-gray-700">Nov 12, 2024</p>
                    </div>
                    <div class="flex flex-col p-1">
                        <div class="text-xs montserrat-bold uppercase text-gray-500 ">End Data</div>
                        <p class="montserrat-semibold text-sm text-gray-700">Dec 12, 2024</p>
                    </div>
                    <div class="flex flex-col p-1">
                        <div class="text-xs montserrat-bold uppercase text-gray-500 ">Location</div>
                        <p class="montserrat-semibold text-sm text-gray-700">Starlet 91, Cape Coast</p>
                    </div>
                    <div class="flex flex-col p-1">
                        <div class="text-xs montserrat-bold uppercase text-gray-500 ">
                            Number
                        </div>
                        <p class="montserrat-semibold text-sm text-gray-700">2435</p>
                    </div>
                    <div class="flex flex-col p-1">
                        <div class="text-xs montserrat-bold uppercase text-gray-500 ">Project Manager</div>
                        <p class="montserrat-semibold text-sm text-gray-700">Samuel K. Mensah</p>
                    </div>
                </div>
            </div>
        </div>
        <!--- Project Info --->
        <div>
            <div class="flex gap-4 border-b">
                <div class="border-b p-2 text-sm uppercase flex gap-2 text-emerald-400 border-emerald-400 montserrat-medium">
                    Members
                </div>
                <div class="border-b p-2 text-sm uppercase flex gap-2 text-gray-600 montserrat-medium">
                    Questions
                </div>
                <div class="border-b p-2 text-sm uppercase flex gap-2 text-gray-600 montserrat-medium">
                    Payment
                </div>
                <div class="border-b p-2 text-sm uppercase flex gap-2 text-gray-600 montserrat-medium">
                    Complaince
                </div>
            </div>
            <!--- Members --->
           <div class="flex flex-col space-y-5 py-5">
                <div class="flex  justify-between">
                    <div class="montserrat-medium">7 Found</div>
                    <div class="flex gap-2">
                        <div class="items-center flex bg-gray-200 px-2 py-1 gap-1 rounded-md ">
                            <span>
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-search text-gray-400"><circle cx="11" cy="11" r="8"/><path d="m21 21-4.3-4.3"/></svg>
                            </span>
                            <input type="text" name="" id="" placeholder="Search" class="outline-none text-sm py-1 w-60 bg-gray-200">
                        </div>
                        <div class="bg-white cursor-pointer px-2 py-1 border rounded-md flex gap-1 items-center text-sm montserrat-regular">
                            <span>
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-toggle-right"><rect width="20" height="14" x="2" y="6" rx="6" ry="6"/><circle class="text-blue-500" fill cx="16" cy="13" r="5"/></svg>
                            </span>
                            Available
                        </div>
                        <div class="bg-white cursor-pointer px-2 py-1 border rounded-md flex gap-1 items-center text-sm montserrat-regular">
                            <span>
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-5">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 6h9.75M10.5 6a1.5 1.5 0 1 1-3 0m3 0a1.5 1.5 0 1 0-3 0M3.75 6H7.5m3 12h9.75m-9.75 0a1.5 1.5 0 0 1-3 0m3 0a1.5 1.5 0 0 0-3 0m-3.75 0H7.5m9-6h3.75m-3.75 0a1.5 1.5 0 0 1-3 0m3 0a1.5 1.5 0 0 0-3 0m-9.75 0h9.75" />
                                </svg>                                  
                            </span>
                            Filters
                        </div>
                    </div>
                </div>
                <div class="grid grid-cols-3 gap-4 ">
                    <div class="bg-white rounded-md p-4 shadow space-y-4">
                        <div class="flex gap-1 items-center">
                            <div class="size-12 border rounded-full"></div>
                            <div class="ml-2 overflow-hidden -space-y-1">
                                <p class=" montserrat-bold w-60 truncate ">Samuel K. Mensah</p>
                                <p class="text-sm text-slate-500  w-60 montserrat-regular truncate">Software Engineer</p>
                            </div>
                        </div>
                        <div class="grid grid-cols-2 divide-x-2 border px-1 shadow-sm py-2 rounded-md">
                            <div class="p-1 flex flex-col ">
                                <p class="text-sm montserrat-semibold truncate">kwesisam270@gmail.com</p>
                                <p class="text-xs montserrat-medium text-gray-500">Email</p>
                            </div>
                            <div class="p-1">
                                <p class="text-sm montserrat-semibold">$4000</p>
                                <p class="text-xs montserrat-medium text-gray-500">Salary</p>
                            </div>
                        </div>
                        <div class="flex gap-3 w-full  justify-between">
                            <button class="border w-full p-2 flex gap-1 justify-center text-sm items-center rounded-md">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-4">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12Z" />
                                  </svg>
                                  
                                Wishlist</button>
                            <button class="border w-full p-2 flex gap-1 justify-center text-sm rounded-md items-center text-emerald-400 montserrat-bold">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-4">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                                  </svg>
                                  
                                Invite</button>
                        </div>
                        <div>
                            <p class="text-center">Available</p>
                        </div>
                    </div>
                    <div class="bg-white rounded-md p-4 shadow space-y-4">
                        <div class="flex gap-1 items-center">
                            <div class="size-12 border rounded-full"></div>
                            <div class="ml-2 overflow-hidden -space-y-1">
                                <p class=" montserrat-bold w-60 truncate ">Samuel K. Mensah</p>
                                <p class="text-sm text-slate-500  w-60 montserrat-regular truncate">Software Engineer</p>
                            </div>
                        </div>
                        <div class="grid grid-cols-2 divide-x-2 border px-1 shadow-sm py-2 rounded-md">
                            <div class="p-1 flex flex-col ">
                                <p class="text-sm montserrat-semibold truncate">kwesisam270@gmail.com</p>
                                <p class="text-xs montserrat-medium text-gray-500">Email</p>
                            </div>
                            <div class="p-1">
                                <p class="text-sm montserrat-semibold">$4000</p>
                                <p class="text-xs montserrat-medium text-gray-500">Salary</p>
                            </div>
                        </div>
                        <div class="flex gap-3 w-full  justify-between">
                            <button class="border w-full p-2 flex gap-1 justify-center text-sm items-center rounded-md">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-4">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12Z" />
                                  </svg>
                                  
                                Wishlist</button>
                            <button class="border w-full p-2 flex gap-1 justify-center text-sm rounded-md items-center text-emerald-400 montserrat-bold">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-4">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                                  </svg>
                                  
                                Invite</button>
                        </div>
                        <div>
                            <p class="text-center">Available</p>
                        </div>
                    </div>
                    <div class="bg-white rounded-md p-4 shadow space-y-4">
                        <div class="flex gap-1 items-center">
                            <div class="size-12 border rounded-full"></div>
                            <div class="ml-2 overflow-hidden -space-y-1">
                                <p class=" montserrat-bold w-60 truncate ">Samuel K. Mensah</p>
                                <p class="text-sm text-slate-500  w-60 montserrat-regular truncate">Software Engineer</p>
                            </div>
                        </div>
                        <div class="grid grid-cols-2 divide-x-2 border px-1 shadow-sm py-2 rounded-md">
                            <div class="p-1 flex flex-col ">
                                <p class="text-sm montserrat-semibold truncate">kwesisam270@gmail.com</p>
                                <p class="text-xs montserrat-medium text-gray-500">Email</p>
                            </div>
                            <div class="p-1">
                                <p class="text-sm montserrat-semibold">$4000</p>
                                <p class="text-xs montserrat-medium text-gray-500">Salary</p>
                            </div>
                        </div>
                        <div class="flex gap-3 w-full  justify-between">
                            <button class="border w-full p-2 flex gap-1 justify-center text-sm items-center rounded-md">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-4">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12Z" />
                                  </svg>
                                  
                                Wishlist</button>
                            <button class="border w-full p-2 flex gap-1 justify-center text-sm rounded-md items-center text-emerald-400 montserrat-bold">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-4">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                                  </svg>
                                  
                                Invite</button>
                        </div>
                        <div>
                            <p class="text-center">Available</p>
                        </div>
                    </div>
                    <div class="bg-white rounded-md p-4 shadow space-y-4">
                        <div class="flex gap-1 items-center">
                            <div class="size-12 border rounded-full"></div>
                            <div class="ml-2 overflow-hidden -space-y-1">
                                <p class=" montserrat-bold w-60 truncate ">Samuel K. Mensah</p>
                                <p class="text-sm text-slate-500  w-60 montserrat-regular truncate">Software Engineer</p>
                            </div>
                        </div>
                        <div class="grid grid-cols-2 divide-x-2 border px-1 shadow-sm py-2 rounded-md">
                            <div class="p-1 flex flex-col ">
                                <p class="text-sm montserrat-semibold truncate">kwesisam270@gmail.com</p>
                                <p class="text-xs montserrat-medium text-gray-500">Email</p>
                            </div>
                            <div class="p-1">
                                <p class="text-sm montserrat-semibold">$4000</p>
                                <p class="text-xs montserrat-medium text-gray-500">Salary</p>
                            </div>
                        </div>
                        <div class="flex gap-3 w-full  justify-between">
                            <button class="border w-full p-2 flex gap-1 justify-center text-sm items-center rounded-md">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-4">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12Z" />
                                  </svg>
                                  
                                Wishlist</button>
                            <button class="border w-full p-2 flex gap-1 justify-center text-sm rounded-md items-center text-emerald-400 montserrat-bold">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-4">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                                  </svg>
                                  
                                Invite</button>
                        </div>
                        <div>
                            <p class="text-center text-emerald-400 montserrat-regular text-sm">Available</p>
                        </div>
                    </div>
                </div>
           </div>
        </div>
    </section>
</x-layout>