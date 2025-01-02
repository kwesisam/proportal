
<x-layout :navLinks="$navLinks">
    <section class="w-full">
        <div class="border-y py-4 flex justify-between">
            <div>
                <p class="text-3xl montserrat-semibold text-gray-700">{{ $id }} 1</p>
            </div>
            <div class="flex gap-2">
                <button id="projectListBtn" class="border rounded-md flex items-center gap-1 px-1 text-sm montserrat-regular">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-list text-gray-600"><path d="M3 12h.01"/><path d="M3 18h.01"/><path d="M3 6h.01"/><path d="M8 12h13"/><path d="M8 18h13"/><path d="M8 6h13"/></svg>
                </button>
                <button id="projectGridBtn" class="border rounded-md flex items-center gap-1 px-1 text-sm montserrat-regular ">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-grid-2x2 text-gray-600"><path d="M12 3v18"/><path d="M3 12h18"/><rect x="3" y="3" width="18" height="18" rx="2"/></svg>
                </button>
               
                <button class="border rounded-md px-2" >
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 12a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0ZM12.75 12a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0ZM18.75 12a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0Z" />
                      </svg>                  
                </button>
            </div>
        </div>
        <div class="py-4 border-b hidden" id="manipulationresult"></div>
        <div >
            <x-contextualLayout>
                <div id="projectList" class="hidden">
                    <div class="grid grid-cols-7 py-2">
                        <div class="text-xs col-span-4 montserrat-regular text-gray-600">Project name</div>
                        <div class="text-xs montserrat-regular text-gray-600">Created by</div>
                        <div class="text-xs montserrat-regular text-gray-600">Last modified</div>
                        <div class="text-xs montserrat-regular text-gray-600">File size</div>
                    </div>
        
                    <div class="h-[90vh]">
                        <!-- Details rows -->
                        @for ($i = 0; $i < count($currentDepartment); $i++)
                                <a  href="{{ route('project.info.folder', ['id' => $id, 'folder' => $currentDepartment[$i]->department]) }}">
                                    <div class="grid grid-cols-7 py-3 border-t cursor-pointer">
                                        <div class="text-sm col-span-4 truncate montserrat-regular items-center flex gap-2">
                                            <div>
                                                <svg xmlns="http://www.w3.org/2000/svg" width="28" height="30" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-folder-closed text-gray-600 w-full h-full">
                                                    <path d="M20 20a2 2 0 0 0 2-2V8a2 2 0 0 0-2-2h-7.9a2 2 0 0 1-1.69-.9L9.6 3.9A2 2 0 0 0 7.93 3H4a2 2 0 0 0-2 2v13a2 2 0 0 0 2 2Z" />
                                                    <path d="M2 10h20" />
                                                </svg>
                                            </div>
                                            <div class="w-[70%] truncate">
                                                {{ $currentDepartment[$i]->department }}

                                            </div>
                                        </div>
                                        <div class="text-sm truncate montserrat-regular relative top-2">
                                            @if($details && count($details) > 0)
                                                {{ $details[0][1] }}
                                            @endif
                                        </div>
                                        <div class="text-sm montserrat-regular text-gray-600">
                                            @if($details && count($details) > 0)
                                                {{ $details[0][2] }}
                                            @endif
                                        </div>
                                        <div class="text-sm relative truncate montserrat-regular hs-dropdown inline-flex items-center justify-between text-gray-600">
                                            <div>
                                                _
                                            </div>
                                            <button id="hs-dropdown-default" type="button" class="hs-dropdown-toggle border px-1 rounded-md py-1">
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-5">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 12a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0ZM12.75 12a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0ZM18.75 12a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0Z" />
                                                </svg>
                                            </button>
                                            <div class="hs-dropdown-menu transition-[opacity,margin] duration hs-dropdown-open:opacity-100 opacity-0 hidden ml-10" role="menu" aria-orientation="vertical" aria-labelledby="hs-dropdown-default">
                                                <div class="p-1 space-y-0.5 relative -top-10 -right-[68px] montserrat-regular rounded-md text-sm bg-gray-50 border">
                                                    <div>Hello</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                        @endfor
                    </div>
                </div>
    
                <div  id="projectGrid" class="">
                    <div class="h-[90vh]">
                        <div class="grid grid-cols-4 gap-4 py-3">
                                @for ($i = 0; $i < count($currentDepartment); $i++)
                                    <a  href="{{ route('project.info.folder', ['id' => $id,     'folder' => $currentDepartment[$i]->department]) }}">
                                            <div class="border p-2 rounded-md flex justify-between cursor-pointer">
                                                <div  class="flex items-center w-[80%] gap-2">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-folder-closed text-gray-600"><path d="M20 20a2 2 0 0 0 2-2V8a2 2 0 0 0-2-2h-7.9a2 2 0 0 1-1.69-.9L9.6 3.9A2 2 0 0 0 7.93 3H4a2 2 0 0 0-2 2v13a2 2 0 0 0 2 2Z"/><path d="M2 10h20"/></svg>
                                                    <span class="w-[80%] truncate">
                                                        {{ $currentDepartment[$i]->department }}
                                                    </span>
                                                </div>
                                                <button>
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-ellipsis-vertical text-gray-600"><circle cx="12" cy="12" r="1"/><circle cx="12" cy="5" r="1"/><circle cx="12" cy="19" r="1"/></svg>
                                                </button>
                                            </div>
                                    </a>
                                @endfor
                            </div>
                    </div>
                </div>
    
        
                <template x-teleport="body">
                    <div x-show="contextMenuOpen" @click.away="contextMenuOpen=false" x-ref="contextmenu" class="z-50 min-w-[8rem] text-neutral-800 rounded-md border border-neutral-200/70 bg-white text-sm fixed p-1 shadow-md w-64" x-cloak>
                        <div @click="contextMenuOpen=false" class="relative select-none group items-center rounded px-2 py-1.5 cursor-pointer outline-none pl-2 data-[disabled]:opacity-50">
                            <x-model>
                                <div @click="modalOpen=true" class="inline-flex items-center gap-2 montserrat-regular justify-center transition-colors focus:outline-none focus:ring-offset-2 disabled:opacity-50 disabled:pointer-events-none">
                                    <span>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-folder-plus">
                                            <path d="M12 10v6" />
                                            <path d="M9 13h6" />
                                            <path d="M20 20a2 2 0 0 0 2-2V8a2 2 0 0 0-2-2h-7.9a2 2 0 0 1-1.69-.9L9.6 3.9A2 2 0 0 0 7.93 3H4a2 2 0 0 0-2 2v13a2 2 0 0 0 2 2Z" />
                                        </svg>
                                    </span>
                                    <span>Department</span>
                                </div>
                                <template x-teleport="body">
                                    <div x-show="modalOpen" class="fixed top-0 left-0 z-[99] flex items-center justify-center w-screen h-screen" x-cloak>
                                        <div x-show="modalOpen"
                                            x-transition:enter="ease-out duration-300"
                                            x-transition:enter-start="opacity-0"
                                            x-transition:enter-end="opacity-100"
                                            x-transition:leave="ease-in duration-300"
                                            x-transition:leave-start="opacity-100"
                                            x-transition:leave-end="opacity-0"
                                            @click="modalOpen=false" class="absolute inset-0 w-full h-full bg-white backdrop-blur-sm bg-opacity-70"></div>
                                        <div x-show="modalOpen"
                                            x-transition:enter="ease-out duration-300"
                                            x-transition:enter-start="opacity-0 -translate-y-2 sm:scale-95"
                                            x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100"
                                            x-transition:leave="ease-in duration-200"
                                            x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100"
                                            x-transition:leave-end="opacity-0 -translate-y-2 sm:scale-95"
                                            class="relative w-full py-6 bg-white border shadow-lg px-7 border-neutral-200 sm:max-w-sm sm:rounded-lg">
                                            <div class="flex items-center justify-between pb-3">
                                                <h3 class="text-lg font-semibold">New Project</h3>
                                                <button @click="modalOpen=false" class="absolute top-0 right-0 flex items-center justify-center w-8 h-8 mt-5 mr-5 text-gray-600 rounded-full hover:text-gray-800 hover:bg-gray-50">
                                                    <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                                                    </svg>
                                                </button>
                                            </div>
                                            <form id="addprojectdepartment" name="addprojectdepartment">
                                                <div class="relative w-full pb-8 space-y-2">
                                                    <input type="hidden" name="project_id" value="{{ $id }}">
                                                    <x-select id="department_name" name="department_name" placeholder="Select Department" :options="$departments"/>
                                                    <p class="text-xs text-red-500 hidden"></p>
                                                </div>
                                                <div class="flex flex-col-reverse sm:flex-row sm:justify-end sm:space-x-2">
                                                    <button @click="modalOpen=false" type="button" class="inline-flex items-center justify-center h-10 px-4 py-2 text-sm font-medium transition-colors border rounded-md focus:outline-none focus:ring-2 focus:ring-neutral-100 focus:ring-offset-2">Cancel</button>
                                                    <button type="button" id="createProjectDeparmentBtn" class="inline-flex items-center justify-center h-10 px-4 py-2 text-sm font-medium text-white transition-colors border border-transparent rounded-md focus:outline-none focus:ring-2 focus:ring-emerald-900 focus:ring-offset-2 bg-emerald-950 hover:bg-emerald-900">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-loader animate-spin hidden"><path d="M12 2v4"/><path d="m16.2 7.8 2.9-2.9"/><path d="M18 12h4"/><path d="m16.2 16.2 2.9 2.9"/><path d="M12 18v4"/><path d="m4.9 19.1 2.9-2.9"/><path d="M2 12h4"/><path d="m4.9 4.9 2.9 2.9"/></svg>
                                                        <span>
                                                            Add
                                                        </span>
                                                    </button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </template>
                            </x-model>
                        </div>
                    </div>
                </template>
            </x-contextualLayout>
        </div>
    
    </section>
</x-layout>