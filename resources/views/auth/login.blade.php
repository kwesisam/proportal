<x-auth>
    <main class="bg-tertiary-foreground">
      <section class=" flex flex-col justify-center items-center w-full h-full space-y-4 ">
          <div class="md:grid grid-cols-2 gap-0 w-[90%] md:w-[80%] lg:w-[55%] md:h-[70%] rounded-xl md:shadow-md md:bg-background">
              <div class="col-span-1 flex justify-center items-center">
                <div class="w-full p-3 md:p-0 md:w-5/6 mx-auto space-y-1 py-8">
                    <div class="text-center text-2xl md:text-3xl montserrat-semibold header">Welcome back</div>
                    <p class="text-center md:text-lg opacity-80 montserrat-regular text-tertiary">Login to your account</p>
  
                    <form action="{{ route('login.submit') }}" method="POST" class="space-y-4" name="loginform" id="loginform">
                      @csrf
                        <div class="flex flex-col gap-1">
                            <label for="username" class="text-md montserrat-medium text-tertiary">Username</label>
                            <input type="text" name="username" id="username" class="input" placeholder="Username">
                            <p id="usernameerror" class="text-xs text-red-500 hidden"><p>
                        </div>
                        <div class="flex flex-col gap-1">
                            <div class="flex justify-between items-center">
                              <label for="password"class="text-md montserrat-medium text-tertiary">Password</label>
                              <a href="/recoverpassword" class="text-sm montserrat-regular text-tertiary hover:underline hover:underline-offset-2 ">Recover password</a>
                            </div>
                
                              <div class="">
                                <div class="flex">
                                  <div class="relative flex-1">
                                    <input name="password" type="password" id="hs-strong-password-with-indicator-and-hint-in-popover" class="input" placeholder="Enter password">
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
                                </div>
                              </div>
                              <p id="passworderror" class="text-xs text-red-500 hidden"><p>   
                        
                        </div>
                       
                        <div>
  
                            <button  name="loginbtn" class="w-full rounded-md p-2 text-sm bg-primary text-primary-foreground hover:opacity-90 flex justify-center montserrat-regular gap-1">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-loader hidden animate-spin"><path d="M12 2v4"/><path d="m16.2 7.8 2.9-2.9"/><path d="M18 12h4"/><path d="m16.2 16.2 2.9 2.9"/><path d="M12 18v4"/><path d="m4.9 19.1 2.9-2.9"/><path d="M2 12h4"/><path d="m4.9 4.9 2.9 2.9"/></svg>
                                <span>Login</span>
                            </button>
                            @if($errors->any())
                              <p id="loginFormError" class="text-xs text-red-500">
                                    {{ $errors->first() }}
                              <p>
                            @endif
                          
  
                        </div>
                    </form>
                </div>
              </div>

              <div class="hidden md:block col-span-1 w-full h-full">
                
              </div>
             
          </div>
          <p class="text-center text-xs montserrat-regular text-tertiary">
            By clicking continue, you agree to our <a href="#" class="underline underline-offset-2"> <br class="block md:hidden">Terms of Service </a> and <a href="#" class="underline underline-offset-2">Privacy Policy.</a>
          </p>
      </section>
    </main>

</x-auth>