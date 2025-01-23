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
$currentFiles = $files->toArray();
$filesPerPage = 7; // Number of files per page
$totalFiles = count($files); // Total number of files
$totalPages = ceil($totalFiles / $filesPerPage); // Total pages
$currentPage = isset($_GET['page']) ? (int)$_GET['page'] : 1; // Current page (default to 1)

// Ensure the current page is within valid range
$currentPage = max(1, min($currentPage, $totalPages));

// Calculate the starting index for the current page
$startIndex = ($currentPage - 1) * $filesPerPage;

// Get the files for the current page
$pageFiles = array_slice($currentFiles, $startIndex, $filesPerPage);

@endphp

<x-layout :navLinks="$navLinks">
    <section class="w-full  shadow-md bg-gray-50 dark:bg-neutral-900 p-2 h-[88vh] rounded-md ">
        <div>
            <div class="grid  grid-cols-4 md:grid-cols-7 py-2">
                <div class="text-sm col-span-3 lg:col-span-4 montserrat-regular header select-none">File name</div>
                <div class="text-sm hidden col-span-1 md:col-span-2 lg:col-span-1 md:inline-block montserrat-regular header select-none">Created by</div>
                <div class="text-sm hidden md:inline-block montserrat-regular header select-none">Last modified</div>
                <div class="text-sm hidden md:inline-block montserrat-regular header select-none">File size</div>
            </div>
            <div class="h-[80%]  overflow-hidden">
                @if ($files && count($files) > 0)
                    @foreach ($pageFiles as $file)
                    <!-- Details rows -->
                    <div class="grid  dark:border-gray-500  grid-cols-4 md:grid-cols-7 py-2 lg:py-3  border-t-[0.5px] cursor-pointer">
                        <!-- File Details -->
                        <div class="text-sm  col-span-3 lg:col-span-4 truncate montserrat-regular items-center flex gap-2">
                            <div>
                                <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-file-image text-amber-500"><path d="M15 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V7Z"/><path d="M14 2v4a2 2 0 0 0 2 2h4"/><circle cx="10" cy="12" r="2"/><path d="m20 17-1.296-1.296a2.41 2.41 0 0 0-3.408 0L9 22"/></svg>
                            </div>
                            <div class="w-[70%] truncate header select-none opacity-90">
                                {{ $file['file_name'] }}
                            </div>
                        </div>
                        <!-- Additional Info -->
                        <div class="text-sm truncate hidden col-span-1 md:col-span-2 lg:col-span-1 md:inline-block montserrat-regular header select-none relative top-2">
                            {{ $file['created_by'] }}
                            
                        </div>
                        <div class="text-sm montserrat-regular hidden md:inline-block header select-none ">
                            {{ $file['file_extension'] }}
                        </div>
                        <div class="text-sm relative truncate montserrat-regular hs-dropdown inline-flex items-center justify-end md:justify-between header">
                            <div class="opacity-90 select-none hidden md:block ">
                                {{ formatFileSize($file['file_size']) }}
                            </div>
                            
                            <div class="hs-tooltip [--trigger:click] [--placement:left] inline-block">
                                <button type="button" class="hs-tooltip-toggle flex justify-center items-center size-9 text-sm font-semibold rounded-lg  disabled:opacity-50 disabled:pointer-events-none 0">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-5">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 12a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0ZM12.75 12a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0ZM18.75 12a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0Z" />
                                    </svg>
                                    <div class="hs-tooltip-content hs-tooltip-shown:opacity-100 hs-tooltip-shown:visible opacity-0 transition-opacity inline-block absolute invisible z-50 py-2 w-56 bg-background  text-md rounded-lg montserrat-regular shadow-md  " role="tooltip">
                                        <div class="flex flex-col gap-2">
                                            <div data-file-name="{{ $file['file_name'] }}" data-file-id="{{ $file['id'] }}" data-type="files"  class="download flex gap-2 download cursor-pointer header hover:!bg-rose-500 py-1 px-3  ">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-download"><path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"/><polyline points="7 10 12 15 17 10"/><line x1="12" x2="12" y1="15" y2="3"/></svg>
                                                <span>Download</span>
                                            </div>
                                            
                                            <div class="flex gap-2 cursor-pointer  header hover:!bg-rose-500 py-1 px-3 ">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-info"><circle cx="12" cy="12" r="10"/><path d="M12 16v-4"/><path d="M12 8h.01"/></svg>
                                                <span>File information</span>
                                            </div>
                                
                                            <div data-file-id="{{ $file['id'] }}" data-type="files"  class="flex remove gap-2 cursor-pointer header hover:!bg-rose-500 py-1 px-3">
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
                @else
                    <div>No files found.</div>
                @endif
            </div>
            <div class="mt-5">
                <!-- Pagination -->
                <nav class="flex items-center gap-x-1 montserrat-regular" aria-label="Pagination">
                    <!-- Previous Button -->
                    <button 
                        type="button" 
                        class="min-h-[38px] min-w-[38px] py-2 px-2.5 inline-flex justify-center items-center gap-x-1.5 text-sm rounded-lg text-gray-800 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 disabled:opacity-50 disabled:pointer-events-none dark:text-white dark:hover:bg-white/10 dark:focus:bg-white/10" 
                        aria-label="Previous" 
                        @if ($currentPage <= 1) disabled @endif
                        onclick="window.location='?page={{ $currentPage - 1 }}'">
                        <svg class="shrink-0 size-3.5" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="m15 18-6-6 6-6"></path>
                        </svg>
                        <span>Previous</span>
                    </button>
            
                    <!-- Page Buttons -->
                    <div class="flex items-center gap-x-1">
                        @for ($i = 1; $i <= $totalPages; $i++)
                            <button 
                                type="button" 
                                class="min-h-[38px] min-w-[38px] flex justify-center items-center text-gray-800 py-2 px-3 text-sm rounded-lg focus:outline-none focus:bg-gray-300 disabled:opacity-50 disabled:pointer-events-none dark:text-white
                                {{ $i == $currentPage ? 'bg-gray-200 font-bold dark:text-gray-700 dark:focus:bg-neutral-500' : '' }}" 
                                onclick="window.location='?page={{ $i }}'">
                                {{ $i }}
                            </button>
                        @endfor
                    </div>
            
                    <!-- Next Button -->
                    <button type="button" class="min-h-[38px] min-w-[38px] py-2 px-2.5 inline-flex justify-center items-center gap-x-1.5 text-sm rounded-lg text-gray-800 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 disabled:opacity-50 disabled:pointer-events-none dark:text-white dark:hover:bg-white/10 dark:focus:bg-white/10" 
                        aria-label="Next" @if ($currentPage >= $totalPages) disabled @endif  onclick="window.location='?page={{ $currentPage + 1 }}'">
                        <span>Next</span>
                        <svg class="shrink-0 size-3.5" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="m9 18 6-6-6-6"></path>
                        </svg>
                    </button>
                </nav>
                <!-- End Pagination -->
            </div>
            
        
        </div>

    </section>
                
    
        
             
</x-layout>