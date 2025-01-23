@php

$currentAccounts = $accounts->toArray();
$accountsPerPage = 7; // Number of accounts per page
$totalAccounts = count($accounts); // Total accounts of files
$totalPages = ceil($totalAccounts / $accountsPerPage); // Total pages
$currentPage = isset($_GET['page']) ? (int)$_GET['page'] : 1; // Current page (default to 1)

// Ensure the current page is within valid range
$currentPage = max(1, min($currentPage, $totalPages));

// Calculate the starting index for the current page
$startIndex = ($currentPage - 1) * $accountsPerPage;

// Get the files for the current page
$pageAccounts = array_slice($currentAccounts, $startIndex, $accountsPerPage);
@endphp
<x-layout :navLinks="$navLinks">
    <section class="w-full  shadow-md bg-gray-50 dark:bg-neutral-900 p-2 rounded-md h-[88vh]">
        <div class="grid  grid-cols-4 md:grid-cols-3 lg:grid-cols-4 py-2">
            <div class="text-sm pl-2 col-span-3 md:col-auto  montserrat-regular header select-none">Username</div>
            <div class="text-sm hidden pl-1 lg:inline-block montserrat-regular header select-none">Name</div>
            <div class="text-sm hidden md:inline-block montserrat-regular header select-none">Email</div>
            <div class="text-sm hidden md:inline-block montserrat-regular header select-none">Role</div>
        </div>
        <x-contextualLayout>
          <div class="h-[80%]  overflow-hidden">
            @if(count($accounts) > 0)
                @foreach($pageAccounts as $account)
                    <div class="grid  grid-cols-4 md:grid-cols-3 lg:grid-cols-4 py-1 border-t-[0.5px] dark:border-gray-500">
                        <div class="text-sm relative col-span-3 md:col-auto truncate montserrat-regular hs-dropdown inline-flex items-center md:justify-between header">{{ $account['username'] }}</div>
                        <div class="text-sm relative hidden  truncate montserrat-regular hs-dropdown lg:inline-flex items-center justify-end md:justify-between header">{{ $account['full_name'] }}</div>
                        <div class="text-sm truncate hidden md:inline-block montserrat-regular header select-none relative top-2" >{{ $account['email'] }}</div>
                        <div class="text-sm relative truncate montserrat-regular hs-dropdown inline-flex items-center justify-end md:justify-between header ">
                            <div class="opacity-90 select-none hidden md:block ">
                                {{ strtoupper($account['role']) }}
                            </div>
                            <div class="hs-tooltip [--trigger:click] [--placement:left] inline-block">
                                <button type="button" class="hs-tooltip-toggle flex justify-center items-center size-9 text-sm font-semibold rounded-lg  disabled:opacity-50 disabled:pointer-events-none 0">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-5">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 12a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0ZM12.75 12a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0ZM18.75 12a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0Z" />
                                    </svg>
                                    <div class="hs-tooltip-content hs-tooltip-shown:opacity-100 hs-tooltip-shown:visible opacity-0 transition-opacity inline-block absolute invisible z-50 py-2 w-56 bg-background  text-md rounded-lg montserrat-regular shadow-md  " role="tooltip">
                                        <div class="flex flex-col gap-2">
                                          
                                            <div data-account-username="{{ $account['username']}}" data-account-email="{{ $account['email'] }}" data-account-role={{ $account['role'] }} data-account-name="{{ $account['full_name'] }}" data-account-id="{{ $account['id'] }}"   class="update-account flex gap-2 cursor-pointer header hover:!bg-rose-500 py-1 px-3" aria-haspopup="dialog" aria-expanded="false" aria-controls="hs-scroll-inside-body-modal" data-hs-overlay="#hs-scroll-inside-body-modal">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-user-round-pen"><path d="M2 21a8 8 0 0 1 10.821-7.487"/><path d="M21.378 16.626a1 1 0 0 0-3.004-3.004l-4.01 4.012a2 2 0 0 0-.506.854l-.837 2.87a.5.5 0 0 0 .62.62l2.87-.837a2 2 0 0 0 .854-.506z"/><circle cx="10" cy="8" r="5"/></svg>
                                                <span>Update account</span>
                                            </div>
                                            
                                            <div class="flex gap-2 cursor-pointer  header hover:!bg-rose-500 py-1 px-3 ">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-info"><circle cx="12" cy="12" r="10"/><path d="M12 16v-4"/><path d="M12 8h.01"/></svg>
                                                <span>Account information</span>
                                            </div>
                                            @if($user['username'] != $account['username'])
                                            <div data-account-id="{{ $account['id'] }}" data-account-username="{{ $account['username'] }}"  class="flex delete-account gap-2 cursor-pointer header hover:!bg-rose-500 py-1 px-3" aria-haspopup="dialog" aria-expanded="false" aria-controls="hs-slide-up-animation-modal" data-hs-overlay="#hs-slide-up-animation-modal">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-user-round-x"><path d="M2 21a8 8 0 0 1 11.873-7"/><circle cx="10" cy="8" r="5"/><path d="m17 17 5 5"/><path d="m22 17-5 5"/></svg>
                                                    <span>Delete account</span>
                                            </div>
                                            @endif
                                        </div>
                                    </div>
                                </button>
                            </div>
                        </div>
                        
                    </div>
                @endforeach
            @else
                    <div>No account found.</div>
            @endif
          </div>
          <template x-teleport="body">
            <div x-show="contextMenuOpen" @click.away="contextMenuOpen=false" x-ref="contextmenu" class="z-50 min-w-[8rem] text-neutral-800 rounded-md border border-neutral-200/70 bg-white text-sm fixed p-1 shadow-md w-64" x-cloak>
                <div @click="contextMenuOpen=false" class="relative select-none group items-center rounded px-2 py-1.5 cursor-pointer outline-none pl-2 data-[disabled]:opacity-50">
                    
                        <div @click="modalOpen=true" class="inline-flex items-center gap-2 montserrat-regular justify-center transition-colors focus:outline-none focus:ring-offset-2 disabled:opacity-50 disabled:pointer-events-none add-account" aria-haspopup="dialog" aria-expanded="false" aria-controls="hs-vertically-centered-modal" data-hs-overlay="#hs-vertically-centered-modal">
                            <span>
                              <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-user-round-plus"><path d="M2 21a8 8 0 0 1 13.292-6"/><circle cx="10" cy="8" r="5"/><path d="M19 16v6"/><path d="M22 19h-6"/></svg>
                            </span>
                            <span class="select-none">Add Account</span>
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
        <!-- update modal -->
        <div id="hs-scroll-inside-body-modal" class="hs-overlay hidden size-full fixed top-0 start-0 z-[80]           overflow-x-hidden overflow-y-auto pointer-events-none" role="dialog" tabindex="-1" aria-labelledby="hs-scroll-inside-body-modal-label">
            <div class="hs-overlay-open:mt-7 hs-overlay-open:opacity-100 hs-overlay-open:duration-500 mt-0 opacity-0 ease-out transition-all sm:max-w-sm sm:w-full m-3 h-[calc(100%-3.5rem)] sm:mx-auto">
              <div class="max-h-full overflow-hidden flex flex-col bg-white border shadow-sm rounded-xl pointer-events-auto dark:bg-neutral-800 dark:border-neutral-700 dark:shadow-neutral-700/70">
                <div class="flex justify-between items-center py-3 px-4 border-b dark:border-neutral-700">
                  <h3 id="hs-scroll-inside-body-modal-label" class="montserrat-bold header">
                    Update Account
                  </h3>
                  <button type="button" class="size-8 inline-flex justify-center items-center gap-x-2 rounded-full border border-transparent bg-gray-100 text-gray-800 hover:bg-gray-200 focus:outline-none focus:bg-gray-200 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-700 dark:hover:bg-neutral-600 dark:text-neutral-400 dark:focus:bg-neutral-600" aria-label="Close" data-hs-overlay="#hs-scroll-inside-body-modal">
                    <span class="sr-only">Close</span>
                    <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                      <path d="M18 6 6 18"></path>
                      <path d="m6 6 12 12"></path>
                    </svg>
                  </button>
                </div>
                <div class="p-4 overflow-y-auto">
                  <div class="space-y-4">            
                    <form class="space-y-4" name="adminupdateaccount">
                        <div class="flex justify-between gap-4">
                           
                            <div class="flex flex-col w-full">
                                <label for="updatefullname" class="text-md montserrat-medium text-tertiary">Full name</label>
                                <input type="text" name="updatefullname" id="updatefullname" class="input" placeholder="Full name">
                                 <p id="updatefullnameerror" class="text-xs text-red-500 hidden"><p>
                            </div>
                        </div>
                        <div class="flex justify-between gap-4">
                            <div class="flex flex-col w-full">
                                <label for="updateemail" class="text-md montserrat-medium text-tertiary">Email</label>
                                <input type="text" name="updateemail" id="updateemail" class="input" placeholder="Email">
                                 <p id="updateemailerror" class="text-xs text-red-500 hidden"><p>
                            </div>
                        </div>
                        <div class="flex justify-between gap-4">
                            <div class="flex flex-col w-full">
                                <label for="updaterole" class="text-md montserrat-medium text-tertiary">Role</label>
                                <select class="input montserrat-regular" name="updaterole">
                                  <option value="user">User</option>
                                  <option value="admin">Admin</option>
                                </select>
                                <p id="updateroleerror" class="text-xs text-red-500 hidden"><p>
                               </div>
                        </div>
                        
                    </form>
                  </div>
                </div>
                <div class="flex justify-end items-center gap-x-2 py-3 px-4 border-t dark:border-neutral-700">
                  <button type="button" class="inline-flex items-center justify-center h-10 px-4 py-2 text-sm font-medium transition-colors border rounded-md focus:outline-none montserrat-regular bg-white" data-hs-overlay="#hs-scroll-inside-body-modal">
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
        <!-- delete modal -->
        <div id="hs-slide-up-animation-modal" class="hs-overlay hidden size-full fixed top-0 start-0 z-[80] overflow-x-hidden overflow-y-auto pointer-events-none" role="dialog" tabindex="-1" aria-labelledby="hs-slide-up-animation-modal-label">
          <div class="hs-overlay-open:mt-7 hs-overlay-open:opacity-100 hs-overlay-open:duration-500 mt-14 opacity-0 ease-out transition-all sm:max-w-lg sm:w-full m-3 sm:mx-auto">
            <div class="flex flex-col bg-white border shadow-sm rounded-xl pointer-events-auto dark:bg-neutral-800 dark:border-neutral-700 dark:shadow-neutral-700/70">
              <div class="flex justify-between items-center py-3 px-4 border-b dark:border-neutral-700">
                <h3 id="hs-slide-up-animation-modal-label" class="montserrat-bold header">
                  Delete account
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
        <!-- add modal -->
        <div id="hs-vertically-centered-modal" class="hs-overlay hidden size-full fixed top-0 start-0 z-[80] overflow-x-hidden overflow-y-auto pointer-events-none" role="dialog" tabindex="-1" aria-labelledby="hs-vertically-centered-modal-label">
          <div class="hs-overlay-open:mt-7 hs-overlay-open:opacity-100 hs-overlay-open:duration-500 mt-0 opacity-0 ease-out transition-all sm:max-w-sm sm:w-full m-3 sm:mx-auto min-h-[calc(100%-3.5rem)] flex items-center">
            <div class="w-full flex flex-col bg-white border shadow-sm rounded-xl pointer-events-auto dark:bg-neutral-800 dark:border-neutral-700 dark:shadow-neutral-700/70">
              <div class="flex justify-between items-center py-3 px-4 border-b dark:border-neutral-700">
                <h3 id="hs-vertically-centered-modal-label" class="font-bold text-gray-800 dark:text-white">
                  Add account
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
                  <form name="adminaddaccount">
                      <div class="flex flex-col w-full space-y-1">
                          <label for="accountaddusername" class="text-md montserrat-medium text-tertiary">Username</label>
                          <input type="text" name="accountaddusername" id="accountaddusername" class="input montserrat-regular" placeholder="Username">
                           <p id="accountaddusernameerror" class="text-xs text-red-500 hidden"><p>
                      </div>
                      <div class="flex flex-col w-full space-y-1">
                          <label for="accountaddname" class="text-md montserrat-medium text-tertiary">Full name</label>
                          <input type="text" name="accountaddname" id="accountaddname" class="input montserrat-regular" placeholder="Full name">
                          <p id="accountaddnameerror" class="text-xs text-red-500 hidden"><p>
                      </div>
                      <div class="flex flex-col w-full space-y-1">
                        <label for="accountaddemail" class="text-md montserrat-medium text-tertiary">Email</label>
                        <input type="text" name="accountaddemail" id="accountaddemail" class="input montserrat-regular" placeholder="Email">
                         <p id="accountaddemailerror" class="text-xs text-red-500 hidden"><p>
                      </div>
                      <div class="flex flex-col w-full space-y-1">
                        <label for="accountaddrole" class="text-md montserrat-medium text-tertiary">Role</label>
                        <select class="input montserrat-regular" name="accountaddrole">
                          <option selected="" value="">Select role</option>
                          <option value="user" >User</option>
                          <option value="admin">Admin</option>
                        </select>
                         <p id="accountaddroleerror" class="text-xs text-red-500 hidden"><p>
                      </div>
                      <div class="flex flex-col w-full space-y-2">
                        <label for="accountaddpassword" class="text-md montserrat-medium text-tertiary">Password</label>
                        <div class="relative flex-1">
                          <input name="accountaddpassword" type="password" id="hs-strong-password-with-indicator-and-hint-in-popover" class="input" placeholder="Enter password">
                          <div id="hs-strong-password-popover" class="hidden absolute z-10 w-full bg-gray-100 rounded-md p-2">
                            <div id="hs-strong-password-in-popover" data-hs-strong-password='{
                                "target": "#hs-strong-password-with-indicator-and-hint-in-popover",
                                "hints": "#hs-strong-password-popover",
                                "stripClasses": "hs-strong-password:opacity-100 hs-strong-password-accepted:bg-rose-500 h-2 flex-auto rounded-full bg-rose-500 opacity-50 mx-1",
                                "mode": "popover"
                              }' class="flex mt-2 -mx-1 p-2">
                            </div>
                    
                            <h4 class="mt-3 text-sm font-semibold text-gray-800 dark:text-white">
                              Your password must contain:
                            </h4>
                    
                            <ul class="space-y-1 text-sm text-gray-500 dark:text-neutral-500">
                              <li data-hs-strong-password-hints-rule-text="min-length" class="hs-strong-password-active:text-teal-500 flex items-center gap-x-2">
                                <span class="hidden" data-check="">
                                  <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <polyline points="20 6 9 17 4 12"></polyline>
                                  </svg>
                                </span>
                                <span data-uncheck="">
                                  <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M18 6 6 18"></path>
                                    <path d="m6 6 12 12"></path>
                                  </svg>
                                </span>
                                Minimum number of characters is 6.
                              </li>
                              <li data-hs-strong-password-hints-rule-text="lowercase" class="hs-strong-password-active:text-teal-500 flex items-center gap-x-2">
                                <span class="hidden" data-check="">
                                  <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <polyline points="20 6 9 17 4 12"></polyline>
                                  </svg>
                                </span>
                                <span data-uncheck="">
                                  <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M18 6 6 18"></path>
                                    <path d="m6 6 12 12"></path>
                                  </svg>
                                </span>
                                Should contain lowercase.
                              </li>
                              <li data-hs-strong-password-hints-rule-text="uppercase" class="hs-strong-password-active:text-teal-500 flex items-center gap-x-2">
                                <span class="hidden" data-check="">
                                  <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <polyline points="20 6 9 17 4 12"></polyline>
                                  </svg>
                                </span>
                                <span data-uncheck="">
                                  <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M18 6 6 18"></path>
                                    <path d="m6 6 12 12"></path>
                                  </svg>
                                </span>
                                Should contain uppercase.
                              </li>
                              <li data-hs-strong-password-hints-rule-text="numbers" class="hs-strong-password-active:text-teal-500 flex items-center gap-x-2">
                                <span class="hidden" data-check="">
                                  <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <polyline points="20 6 9 17 4 12"></polyline>
                                  </svg>
                                </span>
                                <span data-uncheck="">
                                  <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M18 6 6 18"></path>
                                    <path d="m6 6 12 12"></path>
                                  </svg>
                                </span>
                                Should contain numbers.
                              </li>
                              <li data-hs-strong-password-hints-rule-text="special-characters" class="hs-strong-password-active:text-teal-500 flex items-center gap-x-2">
                                <span class="hidden" data-check="">
                                  <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <polyline points="20 6 9 17 4 12"></polyline>
                                  </svg>
                                </span>
                                <span data-uncheck="">
                                  <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M18 6 6 18"></path>
                                    <path d="m6 6 12 12"></path>
                                  </svg>
                                </span>
                                Should contain special characters.
                              </li>
                            </ul>
                          </div>
                        </div>
                         <p id="accountaddpassworderror" class="text-xs text-red-500 hidden"><p>
                     </div>
                  </form>
              </div>
              <div class="flex justify-end items-center gap-x-2 py-3 px-4 border-t dark:border-neutral-700">
                <div id="accountadderror" class="text-sm text-red-500 montserrate-regular"></div>
                <button type="button" class="inline-flex items-center justify-center h-10 px-4 py-2 text-sm font-medium transition-colors border rounded-md focus:outline-none montserrat-regular bg-white"  data-hs-overlay="#hs-vertically-centered-modal">
                  Close
                </button>
                <button type="button" id="addAccountBtn" class="inline-flex items-center justify-center h-10 px-4 py-2 text-sm font-medium text-white transition-colors border border-transparent rounded-md focus:outline-none  bg-primary hover:opacity-90 montserrat-regular" >
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