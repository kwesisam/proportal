
@php
$currentDepartments = $departments->toArray();
$departmentsPerPage = 7; // Number of Departments per page
$totalDepartments = count($departments); // Total number of Departments
$totalPages = ceil($totalDepartments / $departmentsPerPage); // Total pages
$currentPage = isset($_GET['page']) ? (int)$_GET['page'] : 1; // Current page (default to 1)

// Ensure the current page is within valid range
$currentPage = max(1, min($currentPage, $totalPages));

// Calculate the starting index for the current page
$startIndex = ($currentPage - 1) * $departmentsPerPage;

// Get the files for the current page
$pageDepartments = array_slice($currentDepartments, $startIndex, $departmentsPerPage);
@endphp
<x-layout :navLinks="$navLinks">
    <section class="w-full  shadow-md bg-gray-50 dark:bg-neutral-900 p-2 rounded-md h-[88vh]">
        <div class="grid grid-cols-4 md:grid-cols-3 lg:grid-cols-3 py-2">
            <div class="text-sm pl-2  montserrat-regular col-span-3 md:col-auto header select-none">Department</div>
            <div class="text-sm hidden md:inline-block montserrat-regular header select-none">Created by</div>
            <div class="text-sm hidden md:inline-block montserrat-regular header select-none">Created at</div>
        </div>
        <x-contextualLayout>
          <div class="h-[80%] overflow-hidden">
               @if(count($departments) > 0)
                  @foreach($pageDepartments as $department)
                      <div class="grid   grid-cols-4 md:grid-cols-3 lg:grid-cols-3 py-1 border-t-[0.5px] dark:border-gray-500">
                            <div class="col-span-3 md:col-span-1 text-sm relative truncate montserrat-regular hs-dropdown inline-flex items-center  md:justify-between header">{{ $department['department'] }}</div>
                            <div class="text-sm relative hidden truncate montserrat-regular hs-dropdown md:inline-flex items-center justify-end md:justify-between header">{{ $department['created_by'] }}</div>
                            <div class="text-sm relative truncate montserrat-regular hs-dropdown inline-flex items-center justify-end md:justify-between header">
                                <div class="opacity-90 select-none hidden md:block">
                                    {{ $department['created_at'] }}
                                </div>
                                <div class="hs-tooltip [--trigger:click] [--placement:left] inline-block">
                                    <button type="button" class="hs-tooltip-toggle flex justify-center items-center size-9 text-sm font-semibold rounded-lg  disabled:opacity-50 disabled:pointer-events-none 0">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-5">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 12a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0ZM12.75 12a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0ZM18.75 12a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0Z" />
                                        </svg>
                                        <div class="hs-tooltip-content hs-tooltip-shown:opacity-100 hs-tooltip-shown:visible opacity-0 transition-opacity inline-block absolute invisible z-50 py-2 w-56 bg-background  text-md rounded-lg montserrat-regular shadow-md  " role="tooltip">
                                            <div class="flex flex-col gap-2">
                                              
                                                <div data-department-name="{{ $department['department']}}"  data-department-id="{{ $department['id'] }}"   class="department-update flex gap-2 cursor-pointer header hover:!bg-rose-500 py-1 px-3" aria-haspopup="dialog" aria-expanded="false" aria-haspopup="dialog" aria-expanded="false" aria-controls="hs-scale-animation-modal" data-hs-overlay="#hs-scale-animation-modal">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-user-round-pen"><path d="M2 21a8 8 0 0 1 10.821-7.487"/><path d="M21.378 16.626a1 1 0 0 0-3.004-3.004l-4.01 4.012a2 2 0 0 0-.506.854l-.837 2.87a.5.5 0 0 0 .62.62l2.87-.837a2 2 0 0 0 .854-.506z"/><circle cx="10" cy="8" r="5"/></svg>
                                                    <span>Update account</span>
                                                </div>
                                                
                                                <div class="flex gap-2 cursor-pointer  header hover:!bg-rose-500 py-1 px-3 ">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-info"><circle cx="12" cy="12" r="10"/><path d="M12 16v-4"/><path d="M12 8h.01"/></svg>
                                                    <span>Account information</span>
                                                </div>
                                    
                                                <div data-department-id="{{ $department['id'] }}" data-department-name="{{ $department['department'] }}"   class="flex department-delete gap-2 cursor-pointer header hover:!bg-rose-500 py-1 px-3" aria-haspopup="dialog" aria-expanded="false" aria-controls="hs-slide-up-animation-modal" data-hs-overlay="#hs-slide-up-animation-modal">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-user-round-x"><path d="M2 21a8 8 0 0 1 11.873-7"/><circle cx="10" cy="8" r="5"/><path d="m17 17 5 5"/><path d="m22 17-5 5"/></svg>
                                                        <span>Delete account</span>
                                                </div>
                                            </div>
                                        </div>
                                    </button>
                                </div>
                            </div>
                      </div>
                  @endforeach
                @else
                      <div>No department found.</div>
                @endif
              </div>
            <template x-teleport="body">
                <div x-show="contextMenuOpen" @click.away="contextMenuOpen=false" x-ref="contextmenu" class="z-50 min-w-[8rem] text-neutral-800 rounded-md border border-neutral-200/70 bg-white text-sm fixed p-1 shadow-md w-64" x-cloak>
                    <div @click="contextMenuOpen=false" class="relative select-none group items-center rounded px-2 py-1.5 cursor-pointer outline-none pl-2 data-[disabled]:opacity-50">
                        
                            <div @click="modalOpen=true" class="inline-flex items-center gap-2 montserrat-regular justify-center transition-colors focus:outline-none focus:ring-offset-2 disabled:opacity-50 disabled:pointer-events-none" aria-haspopup="dialog" aria-expanded="false" aria-controls="hs-vertically-centered-modal" data-hs-overlay="#hs-vertically-centered-modal">
                                <span>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-folder-plus">
                                        <path d="M12 10v6" />
                                        <path d="M9 13h6" />
                                        <path d="M20 20a2 2 0 0 0 2-2V8a2 2 0 0 0-2-2h-7.9a2 2 0 0 1-1.69-.9L9.6 3.9A2 2 0 0 0 7.93 3H4a2 2 0 0 0-2 2v13a2 2 0 0 0 2 2Z" />
                                    </svg>
                                </span>
                                <span class="select-none">Add Department</span>
                            </div>
                        
                    </div>
                </div>
            </template>
        </x-contextualLayout>
        <div class="lg:mt-5">
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
        <!-- update department -->
        <div id="hs-scale-animation-modal" class="hs-overlay hidden size-full fixed top-0 start-0 z-[80] overflow-x-hidden overflow-y-auto pointer-events-none" role="dialog" tabindex="-1" aria-labelledby="hs-scale-animation-modal-label">
            <div class="hs-overlay-animation-target hs-overlay-open:scale-100 hs-overlay-open:opacity-100 scale-95 opacity-0 ease-in-out transition-all duration-200 sm:max-w-lg sm:w-full m-3 sm:mx-auto min-h-[calc(100%-3.5rem)] flex items-center">
              <div class="w-full flex flex-col bg-white border shadow-sm rounded-xl pointer-events-auto dark:bg-neutral-800 dark:border-neutral-700 dark:shadow-neutral-700/70">
                <div class="flex justify-between items-center py-3 px-4 border-b dark:border-neutral-700">
                  <h3 id="hs-scale-animation-modal-label" class="montserrat-bold header">
                    Update department
                  </h3>
                  <button type="button" class="size-8 inline-flex justify-center items-center gap-x-2 rounded-full border border-transparent bg-gray-100 text-gray-800 hover:bg-gray-200 focus:outline-none focus:bg-gray-200 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-700 dark:hover:bg-neutral-600 dark:text-neutral-400 dark:focus:bg-neutral-600" aria-label="Close" data-hs-overlay="#hs-scale-animation-modal">
                    <span class="sr-only">Close</span>
                    <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                      <path d="M18 6 6 18"></path>
                      <path d="m6 6 12 12"></path>
                    </svg>
                  </button>
                </div>
                <div class="p-4 overflow-y-auto">
                    <form name="departmentupdate">
                        <div class="flex flex-col w-full space-y-2">
                            <label for="departmentupdatename" class="text-md montserrat-medium text-tertiary">Department name</label>
                            <input type="text" name="departmentupdatename" id="departmentupdatename" class="input montserrat-regular" placeholder="Department name">
                             <p id="departmentupdatenameerror" class="text-xs text-red-500 hidden"><p>
                        </div>
                    </form>
                </div>
                <div class="flex justify-end items-center gap-x-2 py-3 px-4 border-t dark:border-neutral-700">
                  <button type="button" class="inline-flex items-center justify-center h-10 px-4 py-2 text-sm font-medium transition-colors border rounded-md focus:outline-none montserrat-regular bg-white" data-hs-overlay="#hs-scale-animation-modal">
                    Close
                  </button>
                  <button type="button" id="updatePopUpBtn" class="inline-flex items-center justify-center h-10 px-4 py-2 text-sm font-medium text-white transition-colors border border-transparent rounded-md focus:outline-none  bg-primary hover:opacity-90 montserrat-regular" >
                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-loader animate-spin hidden"><path d="M12 2v4"/><path d="m16.2 7.8 2.9-2.9"/><path d="M18 12h4"/><path d="m16.2 16.2 2.9 2.9"/><path d="M12 18v4"/><path d="m4.9 19.1 2.9-2.9"/><path d="M2 12h4"/><path d="m4.9 4.9 2.9 2.9"/></svg>
                    <span>
                        Save changes
                    </span>
                  </button>
                </div>
              </div>
            </div>
        </div>
        <!-- delete department -->
        <div id="hs-slide-up-animation-modal" class="hs-overlay hidden size-full fixed top-0 start-0 z-[80] overflow-x-hidden overflow-y-auto pointer-events-none" role="dialog" tabindex="-1" aria-labelledby="hs-slide-up-animation-modal-label">
            <div class="hs-overlay-open:mt-7 hs-overlay-open:opacity-100 hs-overlay-open:duration-500 mt-14 opacity-0 ease-out transition-all sm:max-w-lg sm:w-full m-3 sm:mx-auto">
              <div class="flex flex-col bg-white border shadow-sm rounded-xl pointer-events-auto dark:bg-neutral-800 dark:border-neutral-700 dark:shadow-neutral-700/70">
                <div class="flex justify-between items-center py-3 px-4 border-b dark:border-neutral-700">
                  <h3 id="hs-slide-up-animation-modal-label" class="montserrat-bold header">
                    Delete department
                  </h3>
                  <button type="button" class="hs-dropup-toggle size-8 inline-flex justify-center items-center gap-x-2 rounded-full border border-transparent bg-gray-100 text-gray-800 hover:bg-gray-200 focus:outline-none focus:bg-gray-200 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-700 dark:hover:bg-neutral-600 dark:text-neutral-400 dark:focus:bg-neutral-600" aria-label="Close" data-hs-overlay="#hs-slide-up-animation-modal">
                    <span class="sr-only">Close</span>
                    <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                      <path d="M18 6 6 18"></path>
                      <path d="m6 6 12 12"></path>
                    </svg>
                  </button>
                </div>
                <div class="p-4 overflow-y-auto">
                  <p class="mt-1 montserrat-regular header" id="deletePopUp">
                    
                  </p>
                </div>
                <div class="flex justify-end items-center gap-x-2 py-3 px-4 border-t dark:border-neutral-700">
                  <button type="button" class="inline-flex items-center justify-center h-10 px-4 py-2 text-sm font-medium transition-colors border rounded-md focus:outline-none montserrat-regular bg-white"  data-hs-overlay="#hs-slide-up-animation-modal">
                    Close
                  </button>
                  <button type="button" id="deletePopUpBtn" class="inline-flex items-center justify-center h-10 px-4 py-2 text-sm font-medium text-white transition-colors border border-transparent rounded-md focus:outline-none  bg-primary hover:opacity-90 montserrat-regular" >
                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-loader animate-spin hidden"><path d="M12 2v4"/><path d="m16.2 7.8 2.9-2.9"/><path d="M18 12h4"/><path d="m16.2 16.2 2.9 2.9"/><path d="M12 18v4"/><path d="m4.9 19.1 2.9-2.9"/><path d="M2 12h4"/><path d="m4.9 4.9 2.9 2.9"/></svg>
                    <span>
                        Delete
                    </span>
                  </button>
                </div>
              </div>
            </div>
        </div>
        <!-- add department -->
        <div id="hs-vertically-centered-modal" class="hs-overlay hidden size-full fixed top-0 start-0 z-[80] overflow-x-hidden overflow-y-auto pointer-events-none" role="dialog" tabindex="-1" aria-labelledby="hs-vertically-centered-modal-label">
            <div class="hs-overlay-open:mt-7 hs-overlay-open:opacity-100 hs-overlay-open:duration-500 mt-0 opacity-0 ease-out transition-all sm:max-w-lg sm:w-full m-3 sm:mx-auto min-h-[calc(100%-3.5rem)] flex items-center">
              <div class="w-full flex flex-col bg-white border shadow-sm rounded-xl pointer-events-auto dark:bg-neutral-800 dark:border-neutral-700 dark:shadow-neutral-700/70">
                <div class="flex justify-between items-center py-3 px-4 border-b dark:border-neutral-700">
                  <h3 id="hs-vertically-centered-modal-label" class="font-bold text-gray-800 dark:text-white">
                    Add department
                  </h3>
                  <button type="button" class="size-8 inline-flex justify-center items-center gap-x-2 rounded-full border border-transparent bg-gray-100 text-gray-800 hover:bg-gray-200 focus:outline-none focus:bg-gray-200 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-700 dark:hover:bg-neutral-600 dark:text-neutral-400 dark:focus:bg-neutral-600" aria-label="Close" data-hs-overlay="#hs-vertically-centered-modal">
                    <span class="sr-only">Close</span>
                    <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                      <path d="M18 6 6 18"></path>
                      <path d="m6 6 12 12"></path>
                    </svg>
                  </button>
                </div>
                <div class="p-4 overflow-y-auto">
                    <form name="departmentadd">
                        <div class="flex flex-col w-full space-y-2">
                            <label for="departmentaddname" class="text-md montserrat-medium text-tertiary">Department name</label>
                            <input type="text" name="departmentaddname" id="departmentaddname" class="input montserrat-regular" placeholder="Department name">
                             <p id="departmentaddnameerror" class="text-xs text-red-500 hidden"><p>
                        </div>
                    </form>
                </div>
                <div class="flex justify-end items-center gap-x-2 py-3 px-4 border-t dark:border-neutral-700">
                  <button type="button" class="inline-flex items-center justify-center h-10 px-4 py-2 text-sm font-medium transition-colors border rounded-md focus:outline-none montserrat-regular bg-white"  data-hs-overlay="#hs-vertically-centered-modal">
                    Close
                  </button>
                  <button type="button" id="addDepartmentBtn" class="inline-flex items-center justify-center h-10 px-4 py-2 text-sm font-medium text-white transition-colors border border-transparent rounded-md focus:outline-none  bg-primary hover:opacity-90 montserrat-regular" >
                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-loader animate-spin hidden"><path d="M12 2v4"/><path d="m16.2 7.8 2.9-2.9"/><path d="M18 12h4"/><path d="m16.2 16.2 2.9 2.9"/><path d="M12 18v4"/><path d="m4.9 19.1 2.9-2.9"/><path d="M2 12h4"/><path d="m4.9 4.9 2.9 2.9"/></svg>
                    <span>
                        Add
                    </span>
                  </button>
                </div>
              </div>
            </div>
        </div>
    </section>
</x-layout>