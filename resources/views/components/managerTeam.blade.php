<section>
    <div class="border-y py-4 flex justify-between">
        <div class="flex gap-2 items-center justify-start">
            <p class="text-3xl montserrat-semibold text-gray-700">Employees</p>
            <div class="text-xs gap-1 montserrat-regular flex">
                <div class="flex items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-dot"><circle cx="20" cy="12.1" r="1"/></svg>
                    Active 28
                </div>
                <div class="flex items-center relative -left-4">
                    <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-dot"><circle cx="20" cy="12.1" r="1"/></svg>
                    InActive 4
                </div>
            </div>
        </div>
        <div class="flex gap-2">
            <button class="border rounded-md flex items-center gap-1 px-2 text-sm montserrat-regular ">
                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-arrow-down-up"><path d="m3 16 4 4 4-4"/><path d="M7 20V4"/><path d="m21 8-4-4-4 4"/><path d="M17 4v16"/></svg>
                Sort
            </button>
            <button class="border rounded-md flex items-center gap-1 px-2 text-sm montserrat-regular">
                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-list-filter"><path d="M3 6h18"/><path d="M7 12h10"/><path d="M10 18h4"/></svg>
                More filters
            </button>
            <button class="border rounded-md px-2">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-5">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 12a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0ZM12.75 12a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0ZM18.75 12a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0Z" />
                  </svg>                  
            </button>
        </div>
    </div>
    <div class="flex gap-2 border-b pt-4">
        <button id="managerTeamBoard" class="border-b p-2 text-sm uppercase flex gap-2 text-emerald-400 border-emerald-400 montserrat-medium">
            <span>
                <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-blocks"><rect width="7" height="7" x="14" y="3" rx="1"/><path d="M10 21V8a1 1 0 0 0-1-1H4a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-5a1 1 0 0 0-1-1H3"/></svg>
            </span>
            BOARD
        </button>
        <button id="managerTeamList" class=" p-2 text-sm uppercase flex gap-2 border-emerald-400 text-gray-600 montserrat-medium">
            <span>
                <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-list"><path d="M3 12h.01"/><path d="M3 18h.01"/><path d="M3 6h.01"/><path d="M8 12h13"/><path d="M8 18h13"/><path d="M8 6h13"/></svg>
            </span>
            LIST
        </button>
      
    </div>

    <!-- content-->
    <div class="border-b py-4" id="managerTeamBoardContent">
        <div class="grid grid-cols-3 gap-4">
            <div class="border rounded-md">
                <div class="flex justify-between p-2">
                    <button class="text-xs border px-2 py-1 montserrat-regular rounded-md text-center">Active</button>
                    <button class="border px-2 py-1 rounded-md">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-ellipsis"><circle cx="12" cy="12" r="1"/><circle cx="19" cy="12" r="1"/><circle cx="5" cy="12" r="1"/></svg>
                    </button>
                </div>
                <div class="flex justify-center  py-4">
                    <div class="items-center ">
                        <div class="w-24 h-24 rounded-full border mx-auto"></div>
                        <div class="py-2 truncate">
                            <div class="text-base montserrat-semibold text-center">Samuel K Mensah</div>
                            <div class="text-sm montserrat-regular text-center text-gray-600">Senior Engineer</div>
                        </div>
                    </div>
                </div>
                <div class="border mx-2 rounded-md p-2 text-sm montserrat-regular">
                    <div class="grid gap-2">
                        <div class="flex gap-2">
                            <div>
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-hash text-gray-600 relative top-[2px]"><line x1="4" x2="20" y1="9" y2="9"/><line x1="4" x2="20" y1="15" y2="15"/><line x1="10" x2="8" y1="3" y2="21"/><line x1="16" x2="14" y1="3" y2="21"/></svg>
                            </div>
                            <div class="text-sm">
                                <div>EMP4440</div>
                            </div>
                        </div>
                        <div class="grid grid-cols-2 gap-4">
                            <div class="flex gap-2 overflow-hidden">
                                <div>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-folder-cog text-gray-600 relative top-[2px]"><circle cx="18" cy="18" r="3"/><path d="M10.3 20H4a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h3.9a2 2 0 0 1 1.69.9l.81 1.2a2 2 0 0 0 1.67.9H20a2 2 0 0 1 2 2v3.3"/><path d="m21.7 19.4-.9-.3"/><path d="m15.2 16.9-.9-.3"/><path d="m16.6 21.7.3-.9"/><path d="m19.1 15.2.3-.9"/><path d="m19.6 21.7-.4-1"/><path d="m16.8 15.3-.4-1"/><path d="m14.3 19.6 1-.4"/><path d="m20.7 16.8 1-.4"/></svg>
                                </div>
                                <div class="text-sm truncate">
                                    MIS
                                </div>
                            </div>
                            <div class="flex gap-2 ">
                                <div>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-circle-gauge text-gray-600 relative top-[2px]"><path d="M15.6 2.7a10 10 0 1 0 5.7 5.7"/><circle cx="12" cy="12" r="2"/><path d="M13.4 10.6 19 5"/></svg>
                                </div>
                                <div class="text-sm truncate">
                                    Full time
                                </div>
                            </div>
                        </div>
                     
                        <div class="flex gap-2">
                            <div>
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-mail relative top-[2px] text-gray-400"><rect width="20" height="16" x="2" y="4" rx="2"/><path d="m22 7-8.97 5.7a1.94 1.94 0 0 1-2.06 0L2 7"/></svg>
                            </div>
                            <div class="text-sm grid grid-cols-1 ">
                                <div class="truncate">kwesisam270@gmail.com</div>
                                <div class="truncate">0541754618</div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="m-2 text-sm montserrat-regular flex justify-between">
                    <div>
                        <span class="text-gray-600">
                            Joined at 
                        </span>
                    </div>
                    <button class="flex items-center gap-1">
                        <div class="underline  montserrat-regular underline-offset-4">View detials</div>
                        <div>
                            <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-chevron-right"><path d="m9 18 6-6-6-6"/></svg>
                        </div>
                    </button>
                </div>
            </div>
            <div class="border rounded-md">
                <div class="flex justify-between p-2">
                    <button class="text-xs border px-2 py-1 montserrat-regular rounded-md text-center">Active</button>
                    <button class="border px-2 py-1 rounded-md">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-ellipsis"><circle cx="12" cy="12" r="1"/><circle cx="19" cy="12" r="1"/><circle cx="5" cy="12" r="1"/></svg>
                    </button>
                </div>
                <div class="flex justify-center  py-4">
                    <div class="items-center ">
                        <div class="w-24 h-24 rounded-full border mx-auto"></div>
                        <div class="py-2 truncate">
                            <div class="text-base montserrat-semibold text-center">Samuel K Mensah</div>
                            <div class="text-sm montserrat-regular text-center text-gray-600">Senior Engineer</div>
                        </div>
                    </div>
                </div>
                <div class="border mx-2 rounded-md p-2 text-sm montserrat-regular">
                    <div class="grid gap-2">
                        <div class="flex gap-2">
                            <div>
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-hash text-gray-600 relative top-[2px]"><line x1="4" x2="20" y1="9" y2="9"/><line x1="4" x2="20" y1="15" y2="15"/><line x1="10" x2="8" y1="3" y2="21"/><line x1="16" x2="14" y1="3" y2="21"/></svg>
                            </div>
                            <div class="text-sm">
                                <div>EMP4440</div>
                            </div>
                        </div>
                        <div class="grid grid-cols-2 gap-4">
                            <div class="flex gap-2 overflow-hidden">
                                <div>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-folder-cog text-gray-600 relative top-[2px]"><circle cx="18" cy="18" r="3"/><path d="M10.3 20H4a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h3.9a2 2 0 0 1 1.69.9l.81 1.2a2 2 0 0 0 1.67.9H20a2 2 0 0 1 2 2v3.3"/><path d="m21.7 19.4-.9-.3"/><path d="m15.2 16.9-.9-.3"/><path d="m16.6 21.7.3-.9"/><path d="m19.1 15.2.3-.9"/><path d="m19.6 21.7-.4-1"/><path d="m16.8 15.3-.4-1"/><path d="m14.3 19.6 1-.4"/><path d="m20.7 16.8 1-.4"/></svg>
                                </div>
                                <div class="text-sm truncate">
                                    MIS
                                </div>
                            </div>
                            <div class="flex gap-2 ">
                                <div>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-circle-gauge text-gray-600 relative top-[2px]"><path d="M15.6 2.7a10 10 0 1 0 5.7 5.7"/><circle cx="12" cy="12" r="2"/><path d="M13.4 10.6 19 5"/></svg>
                                </div>
                                <div class="text-sm truncate">
                                    Full time
                                </div>
                            </div>
                        </div>
                     
                        <div class="flex gap-2">
                            <div>
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-mail relative top-[2px] text-gray-400"><rect width="20" height="16" x="2" y="4" rx="2"/><path d="m22 7-8.97 5.7a1.94 1.94 0 0 1-2.06 0L2 7"/></svg>
                            </div>
                            <div class="text-sm grid grid-cols-1 ">
                                <div class="truncate">kwesisam270@gmail.com</div>
                                <div class="truncate">0541754618</div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="m-2 text-sm montserrat-regular flex justify-between">
                    <div>
                        <span class="text-gray-600">
                            Joined at 
                        </span>
                    </div>
                    <button class="flex items-center gap-1">
                        <div class="underline  montserrat-regular underline-offset-4">View detials</div>
                        <div>
                            <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-chevron-right"><path d="m9 18 6-6-6-6"/></svg>
                        </div>
                    </button>
                </div>
            </div>
        </div>
    </div>
    <div class="border-b hidden" id="managerTeamListContent">
        <div class>
            <div class="grid grid-cols-9 py-2">
                <div class="text-xs montserrat-regular text-gray-600  col-span-3">Name</div>
                <div class="text-xs montserrat-regular text-gray-600  col-span-2">Email address</div>
                <div class="text-xs montserrat-regular text-gray-600  col-span-2 ml-2">Role</div>
                <div class="text-xs montserrat-regular text-gray-600 col-span-2">Department</div>
            </div>
        </div>
        <!-- Details rows -->
        @for ($i = 1; $i <= 15; $i++)
        <div class="grid grid-cols-9 py-2 border-t items-center">
            <div class="text-sm montserrat-regular items-center grid grid-cols-7 gap-4  col-span-3 overflow-hidden">
                <div class="border w-12 h-12 rounded-md col-span-1"></div>
                <div class="col-span-5">
                    <div class="truncate">
                        Employee {{ $i }}
                    </div>
                    <div class="text-sm">0541754673</div>
                </div>
            </div>
            <div class="text-sm truncate montserrat-regular text-gray-600 items-center col-span-2">client{{ $i }}@example.com</div>
            <div class="text-sm truncate montserrat-regular text-gray-600 items-center col-span-2">Senior Engineer</div>
            <div  class="text-sm relative truncate montserrat-regular hs-dropdown inline-flex gap-4 col-span-2 items-center justify-between  text-gray-600">
                <div class="truncate">
                    MSI
                </div>
                <button id="hs-dropdown-default" type="button" class="hs-dropdown-toggle border px-1 rounded-md py-1">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 12a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0ZM12.75 12a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0ZM18.75 12a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0Z" />
                      </svg>      
                </button>    
    
                <div class="hs-dropdown-menu pl-[11vw]  transition-[opacity,margin] duration hs-dropdown-open:opacity-100 opacity-0 hidden   ml-10" role="menu" aria-orientation="vertical" aria-labelledby="hs-dropdown-default">
                    <div class="p-1 space-y-0.5 relative -top-10 montserrat-regular rounded-md text-sm bg-gray-50 border">
                        <div>Hello</div>
                    </div>
                </div>
    
            </div>
        </div>
        @endfor
        <!-- Pagination -->
        <div class="py-4 border-t flex justify-between">
            <div class="flex gap-1">
                <button class="border rounded-md flex items-center gap-1 px-2 py-1 text-sm montserrat-regular">Previous</button>
                <button class="border rounded-md flex items-center gap-1 px-2 py-1 text-sm montserrat-regular">Next</button>
            </div>
            <div class="text-sm montserrat-regular">
                Page 1 of 10
            </div>
        </div>
    </div>
</section>