
<x-layout :navLinks="$navLinks">
    <section class="w-full shadow-md bg-gray-50 dark:bg-zinc-950 p-2 rounded-md h-[88vh]">
        <div class="sticky top-0 left-0 right-0">
            <div class="py-4 flex justify-between">
               <div>
                  <div>
                    <ol class="flex items-center text-lg md:text-2xl  whitespace-nowrap">
                      <li class="inline-flex items-center">
                        <a class="flex items-center montserrat-regular subheader focus:outline-none " href="/project">
                          Projects
                        </a>
                        <svg class="shrink-0 mx-2 size-4 text-gray-400 dark:text-neutral-600" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                          <path d="m9 18 6-6-6-6"></path>
                        </svg>
                      </li>
                    
                      <li class="inline-flex items-center montserrat-semibold header focus:outline-none" aria-current="page">
                        {{ $currentProject->name }}
                      </li>
                    </ol>
                  </div>
               </div>
               <div class="flex gap-2">
                   <button id="projectListBtn" class="rounded-md flex items-center gap-1 px-1 text-sm montserrat-regular shadow hover:shadow-rose-100">
                       <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-list header"><path d="M3 12h.01"/><path d="M3 18h.01"/><path d="M3 6h.01"/><path d="M8 12h13"/><path d="M8 18h13"/><path d="M8 6h13"/></svg>
                   </button>
                   <button id="projectGridBtn" class=" rounded-md flex items-center gap-1 px-1 text-sm montserrat-regular shadow hover:shadow-rose-100">
                       <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-grid-2x2 header"><path d="M12 3v18"/><path d="M3 12h18"/><rect x="3" y="3" width="18" height="18" rx="2"/></svg>
                   </button>
                  
                 
               </div>
           </div>
           <div class="py-4 border-b hidden" id="manipulationresult"></div>
           <div id="selectContent" class=" hidden gap-1 rounded-md justify-end py-1 px-2 bg-gray-200 dark:bg-zinc-800">
               <div class="header hover:bg-gray-100 hover:dark:bg-zinc-700 p-2 rounded-full cursor-pointer">
                   <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-folder-open-dot "><path d="m6 14 1.45-2.9A2 2 0 0 1 9.24 10H20a2 2 0 0 1 1.94 2.5l-1.55 6a2 2 0 0 1-1.94 1.5H4a2 2 0 0 1-2-2V5c0-1.1.9-2 2-2h3.93a2 2 0 0 1 1.66.9l.82 1.2a2 2 0 0 0 1.66.9H18a2 2 0 0 1 2 2v2"/><circle cx="14" cy="15" r="1"/></svg>
               </div>
       
               <div class="header hover:bg-gray-100 hover:dark:bg-zinc-700 p-2 rounded-full cursor-pointer">
                   <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-info header"><circle cx="12" cy="12" r="10"/><path d="M12 16v-4"/><path d="M12 8h.01"/></svg>
               </div>
       
               <div class="header hover:bg-gray-100 hover:dark:bg-zinc-700 p-2 rounded-full cursor-pointer">
               <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-trash-2 header"><path d="M3 6h18"/><path d="M19 6v14c0 1-1 2-2 2H7c-1 0-2-1-2-2V6"/><path d="M8 6V4c0-1 1-2 2-2h4c1 0 2 1 2 2v2"/><line x1="10" x2="10" y1="11" y2="17"/><line x1="14" x2="14" y1="11" y2="17"/></svg>
               </div>
           </div>
       </div>
       <div  class="h-[70vh] overflow-y-scroll">
            <x-contextualLayout>
                <div id="projectList" class="hidden">
                    <div class="grid grid-cols-4 md:grid-cols-7 py-2">
                        <div class="text-sm col-span-4 montserrat-regular header select-none">Project name</div>
                        <div class="text-sm hidden md:inline-block montserrat-regular header  select-none">Created by</div>
                        <div class="text-sm hidden md:block montserrat-regular header select-none">Last modified</div>
                        <div class="text-sm hidden md:block montserrat-regular header  select-none">File size</div>
                    </div>
        
                    <div class="h-[90vh]">
                        <!-- Details rows -->
                        @for ($i = 0; $i < count($currentDepartment); $i++)
                            <div class="projectsb grid grid-cols-4 md:grid-cols-7 py-2 px-2 border-t cursor-pointer" data-type="projectsdepartment" data-project-id="{{ $id }}" data-folder-name="{{ $currentDepartment[$i]->department }}">
                                <div class="text-sm  col-span-3 md:col-span-4 truncate montserrat-regular items-center flex gap-2">
                                            <div>
                                                <svg xmlns="http://www.w3.org/2000/svg" width="28" height="30" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-folder-closed header  w-full h-full">
                                                    <path d="M20 20a2 2 0 0 0 2-2V8a2 2 0 0 0-2-2h-7.9a2 2 0 0 1-1.69-.9L9.6 3.9A2 2 0 0 0 7.93 3H4a2 2 0 0 0-2 2v13a2 2 0 0 0 2 2Z" />
                                                    <path d="M2 10h20" />
                                                </svg>
                                            </div>
                                            <div class="w-[70%] truncate header select-none opacity-90">
                                                {{ $currentDepartment[$i]->department }}
                                            </div>
                                        </div>
                                        <div class="text-sm montserrat-regular header select-none opacity-90 hidden md:block">
                                            @if($details && count($details) > 0)
                                                {{ $details[0][1] }}
                                            @endif
                                        </div>
                                        <div class="text-sm montserrat-regular header select-none opacity-90 hidden md:inline-block">
                                            @if($details && count($details) > 0)
                                                {{ $details[0][2] }}
                                            @endif
                                        </div>
                                        <div class="text-sm relative truncate montserrat-regular hs-dropdown inline-flex items-center justify-end md:justify-between header ">
                                            <div class="opacity-90 select-none hidden md:inline-block">
                                                _fffff
                                            </div>
                                            <div class="hs-tooltip [--trigger:click] [--placement:left] inline-block">
                                                <button type="button" class="hs-tooltip-toggle flex justify-center items-center size-9 text-sm font-semibold rounded-lg  disabled:opacity-50 disabled:pointer-events-none">
                                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-5">
                                                        <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 12a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0ZM12.75 12a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0ZM18.75 12a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0Z" />
                                                    </svg>
                                                    <div class="hs-tooltip-content hs-tooltip-shown:opacity-100 hs-tooltip-shown:visible opacity-0 transition-opacity inline-block absolute invisible z-50 py-2 w-56 bg-background  text-md rounded-lg montserrat-regular shadow-md " role="tooltip">
                                                            <div class="flex flex-col gap-2">
                                                                <div data-file-id="{{ $id }}" data-type="projectsdepartment"  data-folder-name="{{ $currentDepartment[$i]->department }}" class="open flex gap-2 cursor-pointer header hover:!bg-rose-500 py-1 px-3 ">
                                                                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-folder-open-dot"><path d="m6 14 1.45-2.9A2 2 0 0 1 9.24 10H20a2 2 0 0 1 1.94 2.5l-1.55 6a2 2 0 0 1-1.94 1.5H4a2 2 0 0 1-2-2V5c0-1.1.9-2 2-2h3.93a2 2 0 0 1 1.66.9l.82 1.2a2 2 0 0 0 1.66.9H18a2 2 0 0 1 2 2v2"/><circle cx="14" cy="15" r="1"/></svg>
                                                                    <span class="select-none">Open folder</span>
                                                                </div>
                                                               
                                                                <div class="flex gap-2 cursor-pointer header hover:!bg-rose-500 py-1 px-3 ">
                                                                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-info"><circle cx="12" cy="12" r="10"/><path d="M12 16v-4"/><path d="M12 8h.01"/></svg>
                                                                    <span class="select-none">File information</span>
                                                                </div>
                                                    
                                                                <div data-file-id="{{ $id }}" data-type="projectsdepartment"  data-folder-name="{{ $currentDepartment[$i]->department }}" class="remove flex gap-2 cursor-pointer header hover:!bg-rose-500 py-1 px-3">
                                                                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-trash-2"><path d="M3 6h18"/><path d="M19 6v14c0 1-1 2-2 2H7c-1 0-2-1-2-2V6"/><path d="M8 6V4c0-1 1-2 2-2h4c1 0 2 1 2 2v2"/><line x1="10" x2="10" y1="11" y2="17"/><line x1="14" x2="14" y1="11" y2="17"/></svg>
                                                                        <span class="select-none">Remove file </span>
                                                                </div>
                                                            </div>
                                                    </div>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                        @endfor
                    </div>
                </div>
    
                <div  id="projectGrid" class="hidden">
                    <div class="h-[90vh]">
                        <div class="grid grid-cols-1 md:grid-cols-4 gap-4 py-3">
                                @for ($i = 0; $i < count($currentDepartment); $i++)
                                   
                                            <div class="projects border shadow dark:shadow-rose-100 p-2 rounded-md flex justify-between cursor-pointer" data-type="projectsdepartment" data-project-id="{{ $id }}" data-folder-name="{{ $currentDepartment[$i]->department }}">
                                                <div  class="flex items-center w-[80%] gap-2">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-folder-closed header"><path d="M20 20a2 2 0 0 0 2-2V8a2 2 0 0 0-2-2h-7.9a2 2 0 0 1-1.69-.9L9.6 3.9A2 2 0 0 0 7.93 3H4a2 2 0 0 0-2 2v13a2 2 0 0 0 2 2Z"/><path d="M2 10h20"/></svg>
                                                    <span class="w-[80%] select-none truncate header montserrat-regular s">
                                                        {{ $currentDepartment[$i]->department }}
                                                    </span>
                                                </div>
                                                <div class="hs-tooltip [--trigger:click] [--placement:left] inline-block">
                                                    <button type="button" class="hs-tooltip-toggle flex justify-center items-center size-9 text-sm font-semibold rounded-lg  text-gray-800  shadow hover:shadow-rose-100 disabled:opacity-50 disabled:pointer-events-none 0">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-ellipsis-vertical header"><circle cx="12" cy="12" r="1"/><circle cx="12" cy="5" r="1"/><circle cx="12" cy="19" r="1"/></svg>
                                                        <div class="hs-tooltip-content hs-tooltip-shown:opacity-100 hs-tooltip-shown:visible opacity-0 transition-opacity inline-block absolute invisible z-10 py-2 w-56 bg-background  text-md rounded-lg montserrat-regular shadow-md " role="tooltip">
                                                                <div class="flex flex-col gap-2">
                                                                    
                                                                    <div data-file-id="{{ $id }}" data-type="projectsdepartment"  data-folder-name="{{ $currentDepartment[$i]->department }}" class="open flex gap-2 cursor-pointer header hover:!bg-rose-500 py-1 px-3 ">
                                                                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-folder-open-dot"><path d="m6 14 1.45-2.9A2 2 0 0 1 9.24 10H20a2 2 0 0 1 1.94 2.5l-1.55 6a2 2 0 0 1-1.94 1.5H4a2 2 0 0 1-2-2V5c0-1.1.9-2 2-2h3.93a2 2 0 0 1 1.66.9l.82 1.2a2 2 0 0 0 1.66.9H18a2 2 0 0 1 2 2v2"/><circle cx="14" cy="15" r="1"/></svg>
                                                                        <span  class="select-none">Open folder</span>
                                                                    </div>
                                                                   
                                                                    <div class="flex gap-2 cursor-pointer header hover:!bg-rose-500 py-1 px-3 ">
                                                                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-info"><circle cx="12" cy="12" r="10"/><path d="M12 16v-4"/><path d="M12 8h.01"/></svg>
                                                                        <span class="select-none">File information</span>
                                                                    </div>
                                                        
                                                                    <div  data-file-id="{{ $id }}" data-type="projectsdepartment"  data-folder-name="{{ $currentDepartment[$i]->department }}" class="remove flex gap-2 cursor-pointer header hover:!bg-rose-500 py-1 px-3">
                                                                            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-trash-2"><path d="M3 6h18"/><path d="M19 6v14c0 1-1 2-2 2H7c-1 0-2-1-2-2V6"/><path d="M8 6V4c0-1 1-2 2-2h4c1 0 2 1 2 2v2"/><line x1="10" x2="10" y1="11" y2="17"/><line x1="14" x2="14" y1="11" y2="17"/></svg>
                                                                            <span class="select-none">Remove folder </span>
                                                                    </div>
                                                                </div>
                                                        </div>
                                                    </button>
                                                </div>
                                            </div>
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
                                    <span class="select-none">Department</span>
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
                                                <h3 class="text-lg font-semibold">Add Department</h3>
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
                                                    <button type="button" id="createProjectDeparmentBtn" class="inline-flex items-center justify-center h-10 px-4 py-2 text-sm font-medium text-white transition-colors border border-transparent rounded-md focus:outline-none  bg-primary hover:opacity-90">
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