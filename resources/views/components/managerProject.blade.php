<section>
    <div class="border-y py-4 flex justify-between">
        <div>
            <p class="text-3xl montserrat-semibold text-gray-700">All Project</p>
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
    <div class="py-4 border-b hidden" id="manipulationresult"></div>
    <div class="border-b">
        <div class="grid grid-cols-7 py-2">
            <div class="text-xs montserrat-regular text-gray-600">Client Name</div>
            <div class="text-xs montserrat-regular text-gray-600">Country</div>
            <div class="text-xs montserrat-regular text-gray-600">Email</div>
            <div class="text-xs montserrat-regular text-gray-600">Project Name</div>
            <div class="text-xs montserrat-regular text-gray-600">Task Progress</div>
            <div class="text-xs montserrat-regular text-gray-600">Status</div>
            <div class="text-xs flex justify-between relative montserrat-regular text-gray-600">
                <span>Date</span>
            </div>
        </div>
        <!-- Details rows -->
        @for ($i = 1; $i <= 15; $i++)
        <div class="grid grid-cols-7 py-4 border-t">
            <div class="text-sm truncate montserrat-regular items-center">Client {{ $i }}</div>
            <div class="text-sm truncate montserrat-regular items-center">Country {{ $i }}</div>
            <div class="text-sm truncate montserrat-regular text-gray-600 items-center">client{{ $i }}@example.com</div>
            <div class="text-sm truncate montserrat-regular items-center">Project {{ $i }}</div>
            <div class="text-sm truncate montserrat-regular relative top-2">
                <div class="w-[80%] bg-gray-200 rounded-full h-1.5">
                 <div class="bg-blue-600 h-1.5 rounded-full" style="width: {{ rand(0, 100) }}%;"></div>
                </div>
            </div>
            <div class="text-sm truncate montserrat-regular items-center ">
                <p class="border inline-flex relative    items-center px-1 text-xs rounded">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-dot relative -left-2"><circle cx="12.1" cy="12.1" r="1"/></svg>
                    <span class="relative right-2">
                        {{ $i % 2 == 0 ? 'Active' : 'Pending' }}
                    </span>
                </p>
            </div>
            <div  class="text-sm relative truncate montserrat-regular hs-dropdown inline-flex  items-center justify-between  text-gray-600">
                <div>
                    2024-11-30
                </div>
                <button id="hs-dropdown-default" type="button" class="hs-dropdown-toggle border px-1 rounded-md py-1">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 12a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0ZM12.75 12a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0ZM18.75 12a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0Z" />
                      </svg>      
                </button>    

                <div class="hs-dropdown-menu  transition-[opacity,margin] duration hs-dropdown-open:opacity-100 opacity-0 hidden   ml-10" role="menu" aria-orientation="vertical" aria-labelledby="hs-dropdown-default">
                    <div class="p-1 space-y-0.5 relative -top-10 -right-[68px] montserrat-regular rounded-md text-sm bg-gray-50 border">
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