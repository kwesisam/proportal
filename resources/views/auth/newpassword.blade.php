<x-auth>
    <section>
        <div class="  h-full flex justify-center items-center">
            <div class="space-y-4 w-[350px]  mx-auto p-5 rounded shadow-md">
                <div class="text-center text-2xl montserrat-medium text-gray-600">New Password</div>
                <form class="space-y-4" name="newpasswordForm" id="newpasswordForm">
                    @csrf
                    <div>
                        <label for="password" class="text-sm montserrat-regular text-gray-600">New Password</label>
                          <div class="">
                            <div class="flex">
                              <div class="relative flex-1">
                                <input name="npassword" type="password" id="hs-strong-password-with-indicator-and-hint-in-popover" class="p-2 block rounded-md outline-none montserrat-regular text-sm w-full border " placeholder="Enter new password">
                                <div id="hs-strong-password-popover" class="hidden absolute z-10 w-full bg-white">
                                  <div id="hs-strong-password-in-popover" data-hs-strong-password='{
                                      "target": "#hs-strong-password-with-indicator-and-hint-in-popover",
                                      "hints": "#hs-strong-password-popover",
                                      "stripClasses": "hs-strong-password:opacity-100 hs-strong-password-accepted:bg-teal-500 h-2 flex-auto rounded-full bg-blue-500 opacity-50 mx-1",
                                      "mode": "popover"
                                    }' class="flex mt-2 -mx-1">
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
                            </div>
                          </div>
                          <p id="npassworderror" class="text-xs text-red-500 hidden"><p>   
                    
                    </div>
                    <div>
                        <label for="password" class="text-sm montserrat-regular text-gray-600">Confirm Password</label>
                          <div class="">
                            <div class="flex">
                              <div class="relative flex-1">
                                <input name="cpassword" type="password" id="hs-strong-password-with-indicator-and-hint-in-popover" class="p-2 block rounded-md outline-none montserrat-regular text-sm w-full border " placeholder="Confirm new password">
                                <div id="hs-strong-password-popover" class="hidden absolute z-10 w-full bg-white">
                                  <div id="hs-strong-password-in-popover" data-hs-strong-password='{
                                      "target": "#hs-strong-password-with-indicator-and-hint-in-popover",
                                      "hints": "#hs-strong-password-popover",
                                      "stripClasses": "hs-strong-password:opacity-100 hs-strong-password-accepted:bg-teal-500 h-2 flex-auto rounded-full bg-blue-500 opacity-50 mx-1",
                                      "mode": "popover"
                                    }' class="flex mt-2 -mx-1">
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
                            </div>
                          </div>
                          <p id="cpassworderror" class="text-xs text-red-500 hidden"><p>   
                    
                    </div>
                    <div>

                        <button name="changebtn" class="border w-full rounded-md p-2 text-sm bg-emerald-400 text-white flex justify-center montserrat-regular gap-1">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-loader hidden animate-spin"><path d="M12 2v4"/><path d="m16.2 7.8 2.9-2.9"/><path d="M18 12h4"/><path d="m16.2 16.2 2.9 2.9"/><path d="M12 18v4"/><path d="m4.9 19.1 2.9-2.9"/><path d="M2 12h4"/><path d="m4.9 4.9 2.9 2.9"/></svg>
                            <span>Continue</span>
                        </button>
                        <p id="newpasswordFormError" class="text-xs text-red-500 hidden"><p>

                    </div>
                </form>
            </div>
        </div>
    </section>
</x-auth>