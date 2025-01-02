<x-layout :navLinks="$navLinks">
    <section class="space-y-8 flex-grow">
        <!--- Project Name --->
        <div class="">
            <h1 class="text-3xl montserrat-bold">Welcome to Laravel 8</hjson>
        </div>
    
    
        <!--- Project Info --->
        <div>
            <div class="flex  justify-between">
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
                <div class="montserrat-medium">7 Found</div>
            </div>
            <!--- Members --->
           <div class="flex flex-col space-y-5 py-5">
            <x-contextualLayout>
                <div class="grid grid-cols-7 py-2">
                    <div class="text-xs col-span-4 montserrat-regular text-gray-600">File name</div>
                    <div class="text-xs montserrat-regular text-gray-600">Created by</div>
                    <div class="text-xs montserrat-regular text-gray-600">Last modified</div>
                    <div class="text-xs montserrat-regular text-gray-600">File size</div>
                </div>
                <!-- Details rows -->
                @for ($i = 1; $i <= 15; $i++)
                <div class="grid grid-cols-7 py-3 border-t">
                    <div class="text-sm col-span-4 truncate montserrat-regular items-center flex gap-2">
                        <div class="">
                            <svg xmlns="http://www.w3.org/2000/svg" width="28" height="30" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-folder-closed text-gray-600 w-full h-full"><path d="M20 20a2 2 0 0 0 2-2V8a2 2 0 0 0-2-2h-7.9a2 2 0 0 1-1.69-.9L9.6 3.9A2 2 0 0 0 7.93 3H4a2 2 0 0 0-2 2v13a2 2 0 0 0 2 2Z"/><path d="M2 10h20"/></svg>
                        </div>
                        <div class="w-[70%] truncate">
                            Client {{ $i }} Lorem ipsum dolor sit amet consectetur adipisicing elit. Commodi reiciendis magni repellendus sunt dolores, obcaecati ipsam sapiente nam dolorum fugiat, esse ad ducimus aspernatur architecto dolore dolorem velit porro exercitationem.
                        </div>
                    </div>
                    <div class="text-sm truncate montserrat-regular relative top-2">
                        <div class="w-[80%] bg-gray-200 rounded-full h-1.5">
                         <div class="bg-blue-600 h-1.5 rounded-full" style="width: {{ rand(0, 100) }}%;"></div>
                        </div>
                    </div>
                    <div>
                        2024-11-30
                    </div>
                    <div  class="text-sm relative truncate montserrat-regular hs-dropdown inline-flex  items-center justify-between  text-gray-600">
                        <div>
                            _
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
                
                <template x-teleport="body">
                 <div x-show="contextMenuOpen" @click.away="contextMenuOpen=false" x-ref="contextmenu" class="z-50 min-w-[8rem] text-neutral-800 rounded-md border border-neutral-200/70 bg-white text-sm fixed p-1 shadow-md w-64" x-cloak>
                    
                <div @click="contextMenuOpen=false" class="relative select-none group items-center rounded px-2 py-1.5 cursor-pointer outline-none pl-2  data-[disabled]:opacity-50 ">
                        <x-model>
                            <div @click="modalOpen=true" class="inline-flex items-center gap-2 montserrat-regular justify-center transition-colors focus:outline-none  focus:ring-offset-2 disabled:opacity-50 disabled:pointer-events-none">
                                <span>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-file-plus-2 text-gray-600"><path d="M4 22h14a2 2 0 0 0 2-2V7l-5-5H6a2 2 0 0 0-2 2v4"/><path d="M14 2v4a2 2 0 0 0 2 2h4"/><path d="M3 15h6"/><path d="M6 12v6"/></svg>
                                </span>
                                <span>File Upload</span>
                            </div>
                            <template x-teleport="body">

                                    <div id="hs-scroll-inside-body-modal" x-show="modalOpen" class="fixed top-0 left-0 z-[99] flex items-center justify-center w-screen h-screen" x-cloak>
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
                                            class="relative w-full py-6 h-[50%] overflow-y-scroll border shadow-lg px-7 border-neutral-200 sm:max-w-md sm:rounded-lg custom-scrollbar" >
                                            <div id="hs-file-upload-to-destroy" data-hs-file-upload='{
                                                "url": "/upload",
                                                "extensions": {
                                                  "default": {
                                                    "class": "shrink-0 size-5"
                                                  },
                                                  "xls": {
                                                    "class": "shrink-0 size-5"
                                                  },
                                                  "xlsx": {
                                                    "class": "shrink-0 size-5"
                                                  },
                                                  "csv": {
                                                    "icon": "<svg xmlns=\"http://www.w3.org/2000/svg\" width=\"24\" height=\"24\" viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"currentColor\" stroke-width=\"2\" stroke-linecap=\"round\" stroke-linejoin=\"round\"><path d=\"M4 22h14a2 2 0 0 0 2-2V7l-5-5H6a2 2 0 0 0-2 2v4\"/><path d=\"M14 2v4a2 2 0 0 0 2 2h4\"/><path d=\"m5 12-3 3 3 3\"/><path d=\"m9 18 3-3-3-3\"/></svg>",
                                                    "class": "shrink-0 size-5"
                                                  },
                                                  "doc": {
                                                    "icon": "<svg xmlns=\"http://www.w3.org/2000/svg\" width=\"24\" height=\"24\" viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"currentColor\" stroke-width=\"2\" stroke-linecap=\"round\" stroke-linejoin=\"round\"><path d=\"M4 22h16a2 2 0 0 0 2-2V7l-5-5H6a2 2 0 0 0-2 2v16z\"/><path d=\"M14 2v4a2 2 0 0 0 2 2h4\"/><path d=\"M8 16v-4\"/><path d=\"M6 14h4\"/></svg>",
                                                    "class": "shrink-0 size-5"
                                                  },
                                                  "docx": {
                                                    "icon": "<svg xmlns=\"http://www.w3.org/2000/svg\" width=\"24\" height=\"24\" viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"currentColor\" stroke-width=\"2\" stroke-linecap=\"round\" stroke-linejoin=\"round\"><path d=\"M4 22h16a2 2 0 0 0 2-2V7l-5-5H6a2 2 0 0 0-2 2v16z\"/><path d=\"M14 2v4a2 2 0 0 0 2 2h4\"/><path d=\"M9 16v-4\"/><path d=\"M7 14h4\"/><path d=\"M7 16h4\"/></svg>",
                                                    "class": "shrink-0 size-5"
                                                  },
                                                  "ppt": {
                                                    "icon": "<svg xmlns=\"http://www.w3.org/2000/svg\" width=\"24\" height=\"24\" viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"currentColor\" stroke-width=\"2\" stroke-linecap=\"round\" stroke-linejoin=\"round\"><path d=\"M4 22h16a2 2 0 0 0 2-2V7l-5-5H6a2 2 0 0 0-2 2v16z\"/><path d=\"M14 2v4a2 2 0 0 0 2 2h4\"/><path d=\"M6 15h6v4H6z\"/></svg>",
                                                    "class": "shrink-0 size-5"
                                                  },
                                                  "pptx": {
                                                    "icon": "<svg xmlns=\"http://www.w3.org/2000/svg\" width=\"24\" height=\"24\" viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"currentColor\" stroke-width=\"2\" stroke-linecap=\"round\" stroke-linejoin=\"round\"><path d=\"M4 22h16a2 2 0 0 0 2-2V7l-5-5H6a2 2 0 0 0-2 2v16z\"/><path d=\"M14 2v4a2 2 0 0 0 2 2h4\"/><path d=\"M6 15h6v4H6z\"/></svg>",
                                                    "class": "shrink-0 size-5"
                                                  },
                                                  "zip": {
                                                    "class": "shrink-0 size-5"
                                                  },
                                                  "mp4": {
                                                    "icon": "<svg xmlns=\"http://www.w3.org/2000/svg\" width=\"24\" height=\"24\" viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"currentColor\" stroke-width=\"2\" stroke-linecap=\"round\" stroke-linejoin=\"round\"><path d=\"M23 7v10c0 1.1-.9 2-2 2H3c-1.1 0-2-.9-2-2V7c0-1.1.9-2 2-2h18c1.1 0 2 .9 2 2z\"/><polygon points=\"10 15 15 12 10 9 10 15\"/></svg>",
                                                    "class": "shrink-0 size-5"
                                                  }
                                                }
                                              }'
                                              >
                                                <template data-hs-file-upload-preview="">
                                                  <div class="p-3 bg-white border border-solid border-gray-300 rounded-xl dark:bg-neutral-800 dark:border-neutral-600">
                                                    <div class="mb-1 flex justify-between items-center">
                                                      <div class="flex items-center gap-x-3">
                                                        <span class="size-10 flex justify-center items-center border border-gray-200 text-gray-500 rounded-lg dark:border-neutral-700 dark:text-neutral-500" data-hs-file-upload-file-icon="">
                                                          <img class="rounded-lg hidden" data-dz-thumbnail="">
                                                        </span>
                                                        <div>
                                                          <p class="text-sm font-medium text-gray-800 dark:text-white">
                                                            <span class="truncate inline-block max-w-[300px] align-bottom" data-hs-file-upload-file-name=""></span>.<span data-hs-file-upload-file-ext=""></span>
                                                          </p>
                                                          <p class="text-xs text-gray-500 dark:text-neutral-500" data-hs-file-upload-file-size=""></p>
                                                        </div>
                                                      </div>
                                                      <div class="flex items-center gap-x-2">
                                                        <button type="button" class="text-gray-500 hover:text-gray-800 focus:outline-none focus:text-gray-800 dark:text-neutral-500 dark:hover:text-neutral-200 dark:focus:text-neutral-200" data-hs-file-upload-remove="">
                                                          <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                                            <path d="M3 6h18"></path>
                                                            <path d="M19 6v14c0 1-1 2-2 2H7c-1 0-2-1-2-2V6"></path>
                                                            <path d="M8 6V4c0-1 1-2 2-2h4c1 0 2 1 2 2v2"></path>
                                                            <line x1="10" x2="10" y1="11" y2="17"></line>
                                                            <line x1="14" x2="14" y1="11" y2="17"></line>
                                                          </svg>
                                                        </button>
                                                      </div>
                                                    </div>
                                              
                                                    <div class="flex items-center gap-x-3 whitespace-nowrap">
                                                      <div class="flex w-full h-2 bg-gray-200 rounded-full overflow-hidden dark:bg-neutral-700" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" data-hs-file-upload-progress-bar="">
                                                        <div class="flex flex-col justify-center rounded-full overflow-hidden bg-blue-600 text-xs text-white text-center whitespace-nowrap transition-all duration-500 hs-file-upload-complete:bg-green-500" style="width: 0" data-hs-file-upload-progress-bar-pane=""></div>
                                                      </div>
                                                      <div class="w-10 text-end">
                                                        <span class="text-sm text-gray-800 dark:text-white">
                                                          <span data-hs-file-upload-progress-bar-value="">0</span>%
                                                        </span>
                                                      </div>
                                                    </div>
                                                  </div>
                                                </template>
                                              
                                                <div class="cursor-pointer p-12 flex justify-center bg-white border border-dashed border-gray-300 rounded-xl dark:bg-neutral-800 dark:border-neutral-600" data-hs-file-upload-trigger="">
                                                    <div class="text-center">
                                                        <span class="inline-flex justify-center items-center size-16 bg-gray-100 text-gray-800 rounded-full dark:bg-neutral-700 dark:text-neutral-200">
                                                        <svg class="shrink-0 size-6" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                                            <path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"></path>
                                                            <polyline points="17 8 12 3 7 8"></polyline>
                                                            <line x1="12" x2="12" y1="3" y2="15"></line>
                                                        </svg>
                                                        </span>
                                              
                                                        <div class="mt-4 flex flex-wrap justify-center text-sm leading-6 text-gray-600">
                                                        <span class="pe-1 font-medium text-gray-800 dark:text-neutral-200">
                                                            Drop your file here or
                                                        </span>
                                                        <span class="bg-white font-semibold text-blue-600 hover:text-blue-700 rounded-lg decoration-2 hover:underline focus-within:outline-none focus-within:ring-2 focus-within:ring-blue-600 focus-within:ring-offset-2 dark:bg-neutral-800 dark:text-blue-500 dark:hover:text-blue-600">browse</span>
                                                        </div>
                                              
                                                        <p class="mt-1 text-xs text-gray-400 dark:text-neutral-400">
                                                        Pick a file up to 2MB.
                                                        </p>
                                                    </div>
                                                </div>
                                              
                                                <div class="mt-4 space-y-2 empty:mt-0" data-hs-file-upload-previews=""></div>
                                              </div>
                                        </div>
                                    </div>
                            </template>
                       </x-model>
                      
                    </div>
                 
                </template>
             </x-contextualLayout>
           </div>
        </div>
    </section>
</x-layout>