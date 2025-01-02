@php
function formatFileSize($bytes) {
    if ($bytes >= 1073741824) {
        return number_format($bytes / 1073741824) . ' GB';
    } elseif ($bytes >= 1048576) {
        return number_format($bytes / 1048576) . ' MB';
    } elseif ($bytes >= 1024) {
        return number_format($bytes / 1024) . ' KB';
    } else {
        return $bytes . ' bytes';
    }
}
@endphp

<x-layout :navLinks="$navLinks">
    <section class="w-full">
        <div class="border-y py-4 flex justify-between">
            <div>
                <p class="text-3xl montserrat-semibold text-gray-700">All Project</p>
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
                            @if ($files && count($files) > 0)
                            <div class="h-[90vh]">
                                        @foreach ($files as $file)
                                        <!-- Details rows -->
                                        <div class="grid grid-cols-7 py-3 border-t cursor-pointer">
                                            <!-- File Details -->
                                            <div class="text-sm col-span-4 truncate montserrat-regular items-center flex gap-2">
                                                <div>
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-file-image text-amber-500"><path d="M15 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V7Z"/><path d="M14 2v4a2 2 0 0 0 2 2h4"/><circle cx="10" cy="12" r="2"/><path d="m20 17-1.296-1.296a2.41 2.41 0 0 0-3.408 0L9 22"/></svg>
                                                </div>
                                                <div class="w-[70%] truncate">
                                                    {{ $file['file_name'] }}
                                                </div>
                                            </div>
                                            <!-- Additional Info -->
                                            <div class="text-sm truncate montserrat-regular relative top-2">
                                                {{ $file['created_by'] }}
                                               
                                            </div>
                                            <div class="text-sm montserrat-regular text-gray-600">
                                                {{ $file['file_extension'] }}
                                            </div>
                                            <div class="text-sm relative truncate montserrat-regular hs-dropdown inline-flex items-center justify-between text-gray-600">
                                                <div>
                                                    {{ formatFileSize($file['file_size']) }}
                                                </div>
                                                
                                                <div class="hs-tooltip [--trigger:click] [--placement:left] inline-block">
                                                    <button type="button" class="hs-tooltip-toggle flex justify-center items-center size-9 text-sm font-semibold rounded-lg border border-gray-200 bg-white text-gray-800 shadow-sm hover:bg-gray-50 focus:outline-none focus:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none 0">
                                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-5">
                                                            <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 12a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0ZM12.75 12a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0ZM18.75 12a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0Z" />
                                                        </svg>
                                                        <div class="hs-tooltip-content hs-tooltip-shown:opacity-100 hs-tooltip-shown:visible opacity-0 transition-opacity inline-block absolute invisible z-10 py-2 w-56  bg-white border text-md rounded-lg montserrat-regular shadow-md " role="tooltip">
                                                            <div class="flex flex-col gap-2">
                                                                <div class="flex gap-2 cursor-pointer hover:bg-gray-200 py-1 px-3 ">
                                                                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-download"><path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"/><polyline points="7 10 12 15 17 10"/><line x1="12" x2="12" y1="15" y2="3"/></svg>
                                                                    <span>Download</span>
                                                                </div>
                                                                <div data-file-name="{{ $file['file_name'] }}" data-file-id="{{ $file['id'] }}"  class=" grid-remove-file flex gap-2 cursor-pointer hover:bg-gray-200 py-1 px-3">
                                                                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-file-pen-line"><path d="m18 5-2.414-2.414A2 2 0 0 0 14.172 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2"/><path d="M21.378 12.626a1 1 0 0 0-3.004-3.004l-4.01 4.012a2 2 0 0 0-.506.854l-.837 2.87a.5.5 0 0 0 .62.62l2.87-.837a2 2 0 0 0 .854-.506z"/><path d="M8 18h1"/></svg>
                                                                    <span>Rename</span>
                                                                </div>
                                                                <div class="flex gap-2 cursor-pointer hover:bg-gray-200 py-1 px-3 ">
                                                                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-info"><circle cx="12" cy="12" r="10"/><path d="M12 16v-4"/><path d="M12 8h.01"/></svg>
                                                                    <span>File information</span>
                                                                </div>
                                                    
                                                                <div class="flex gap-2 cursor-pointer hover:bg-gray-200 py-1 px-3">
                                                                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-trash-2"><path d="M3 6h18"/><path d="M19 6v14c0 1-1 2-2 2H7c-1 0-2-1-2-2V6"/><path d="M8 6V4c0-1 1-2 2-2h4c1 0 2 1 2 2v2"/><line x1="10" x2="10" y1="11" y2="17"/><line x1="14" x2="14" y1="11" y2="17"/></svg>
                                                                        <span>Remove file</span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                        @endforeach
                                    </div>
                            @else
                                <div>No files found.</div>
                            @endif
                        
                        </div>
    
                <div  id="projectGrid" class="">
                    <div class="h-[90vh]">
                        @if ($files && count($files) > 0)     
                            <div class="grid grid-cols-4 gap-4 py-3">
                                @foreach ($files as $file)
                                <div class="border p-2 rounded-md flex-col">
                                    <div class="flex justify-between">
                                        <div  class="flex items-center w-[80%] gap-2">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-file-image text-amber-500"><path d="M15 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V7Z"/><path d="M14 2v4a2 2 0 0 0 2 2h4"/><circle cx="10" cy="12" r="2"/><path d="m20 17-1.296-1.296a2.41 2.41 0 0 0-3.408 0L9 22"/></svg>
                                            <span class="w-[80%] truncate">
                                                {{ $file['file_name'] }}
                                            </span>
                                        </div>

                                        <div class="hs-tooltip [--trigger:click] [--placement:left] inline-block">
                                            <button type="button" class="hs-tooltip-toggle flex justify-center items-center size-9 text-sm font-semibold rounded-lg  text-gray-800  hover:bg-gray-50 focus:outline-none focus:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none 0">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-ellipsis-vertical text-gray-600"><circle cx="12" cy="12" r="1"/><circle cx="12" cy="5" r="1"/><circle cx="12" cy="19" r="1"/></svg>
                                                <div class="hs-tooltip-content hs-tooltip-shown:opacity-100 hs-tooltip-shown:visible opacity-0 transition-opacity inline-block absolute invisible z-10 py-2 w-56 bg-white border text-md rounded-lg montserrat-regular shadow-md " role="tooltip">
                                                        <div class="flex flex-col gap-2">
                                                            
                                                            <div class="flex gap-2 cursor-pointer hover:bg-gray-200 py-1 px-3 ">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-download"><path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"/><polyline points="7 10 12 15 17 10"/><line x1="12" x2="12" y1="15" y2="3"/></svg>
                                                                <span>Download</span>
                                                            </div>
                                                            <div data-file-name="{{ $file['file_name'] }}" data-file-id="{{ $file['id'] }}"  class=" grid-remove-file flex gap-2 cursor-pointer hover:bg-gray-200 py-1 px-3">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-file-pen-line"><path d="m18 5-2.414-2.414A2 2 0 0 0 14.172 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2"/><path d="M21.378 12.626a1 1 0 0 0-3.004-3.004l-4.01 4.012a2 2 0 0 0-.506.854l-.837 2.87a.5.5 0 0 0 .62.62l2.87-.837a2 2 0 0 0 .854-.506z"/><path d="M8 18h1"/></svg>
                                                                <span>Rename</span>
                                                            </div>
                                                            <div class="flex gap-2 cursor-pointer hover:bg-gray-200 py-1 px-3 ">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-info"><circle cx="12" cy="12" r="10"/><path d="M12 16v-4"/><path d="M12 8h.01"/></svg>
                                                                <span>File information</span>
                                                            </div>
                                                
                                                            <div class="flex gap-2 cursor-pointer hover:bg-gray-200 py-1 px-3">
                                                                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-trash-2"><path d="M3 6h18"/><path d="M19 6v14c0 1-1 2-2 2H7c-1 0-2-1-2-2V6"/><path d="M8 6V4c0-1 1-2 2-2h4c1 0 2 1 2 2v2"/><line x1="10" x2="10" y1="11" y2="17"/><line x1="14" x2="14" y1="11" y2="17"/></svg>
                                                                    <span>Remove file</span>
                                                            </div>
                                                        </div>
                                                </div>
                                            </button>
                                        </div>
                                    </div>
                                    <div class="h-52 p-2 ">
                                       <img src="{{ $file['actual_path'] }}" alt="{{ $file['file_name'] }}" class="w-full h-full rounded-md object-cover">
                                    </div>
                                        
                                </div>
                                @endforeach
                            </div>
                        @else
                            <div>No files found.</div>
                         @endif
                    </div>
                </div>
    
        
                <template x-teleport="body">
                    <div x-show="contextMenuOpen" @click.away="contextMenuOpen=false" x-ref="contextmenu" class="z-50 min-w-[8rem] text-neutral-800 rounded-md border border-neutral-200/70 bg-white text-sm fixed p-1 shadow-md w-64" x-cloak>
                        <div @click="contextMenuOpen=false" class="relative select-none group items-center rounded px-2 py-1.5 cursor-pointer outline-none pl-2 data-[disabled]:opacity-50">
                            <x-model>
                                <div @click="modalOpen=true" class="inline-flex items-center gap-2 montserrat-regular justify-center transition-colors focus:outline-none focus:ring-offset-2 disabled:opacity-50 disabled:pointer-events-none">
                                    <span>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-file-plus-2"><path d="M4 22h14a2 2 0 0 0 2-2V7l-5-5H6a2 2 0 0 0-2 2v4"/><path d="M14 2v4a2 2 0 0 0 2 2h4"/><path d="M3 15h6"/><path d="M6 12v6"/></svg>
                                    </span>
                                    <span>File Upload</span>
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
                                            class="relative w-full py-6 bg-white border  h-[50%] overflow-y-scroll  shadow-lg px-7 border-neutral-200 sm:max-w-sm sm:rounded-lg">
                                            <x-fileuploader :project_id="$id" :folder="$folder"/>
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