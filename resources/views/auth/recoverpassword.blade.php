<x-auth>
    <section>
        <div class="  h-full flex justify-center items-center">
            <div class="space-y-4 w-[350px]  mx-auto p-5 rounded shadow-md">
                <div class="text-center text-2xl montserrat-medium text-gray-600">Forgot Password</div>
                <form class="space-y-4" name="forgotpasswordForm" id="forgotpasswordForm">
                    @csrf
                    <div>
                        <label for="username" class="text-sm montserrat-regular text-gray-600">Username</label>
                        <input type="text" name="username" id="username" class="w-full text-sm border p-2 montserrat-regular outline-none rounded" placeholder="Username">
                        <p id="usernameerror" class="text-xs text-red-500 hidden"><p>
                    </div>
                    <div>
                        <label for="email" class="text-sm montserrat-regular text-gray-600">Email</label>
                        <input type="text" name="email" id="email" class="w-full text-sm border p-2 montserrat-regular outline-none rounded" placeholder="Email address">
                        <p id="emailerror" class="text-xs text-red-500 hidden"><p>
                    </div>
                    <div>

                        <button name="continuebtn" class="border w-full rounded-md p-2 text-sm bg-emerald-400 text-white flex justify-center montserrat-regular gap-1">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-loader hidden animate-spin"><path d="M12 2v4"/><path d="m16.2 7.8 2.9-2.9"/><path d="M18 12h4"/><path d="m16.2 16.2 2.9 2.9"/><path d="M12 18v4"/><path d="m4.9 19.1 2.9-2.9"/><path d="M2 12h4"/><path d="m4.9 4.9 2.9 2.9"/></svg>
                            <span>Continue</span>
                        </button>
                        <p id="forgotpasswordFormError" class="text-xs text-red-500 hidden"><p>

                    </div>
                </form>
            </div>
        </div>
    </section>
</x-auth>