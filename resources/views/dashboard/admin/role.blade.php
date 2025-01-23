<x-layout :navLinks="$navLinks">
    <section class="w-full  shadow-md bg-gray-50 dark:bg-zinc-950 p-2 rounded-md h-[88vh]">
        <div class="grid  grid-cols-4 md:grid-cols-4 py-2">
            <div class="text-sm  montserrat-regular col-span-2 header select-none">Role</div>
            <div class="text-sm hidden md:inline-block montserrat-regular header select-none">Created by</div>
            <div class="text-sm hidden md:inline-block montserrat-regular header select-none">Created at</div>
        </div>
        <x-contextualLayout>
             <div class="h-80">
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
                                                <input type="hidden" name="project_id" value="66">
                                               
                                                <p class="text-xs text-red-500 hidden"></p>
                                            </div>
                                            <div class="flex flex-col-reverse sm:flex-row sm:justify-end sm:space-x-2">
                                                <button @click="modalOpen=false" type="button" class="inline-flex items-center justify-center h-10 px-4 py-2 text-sm font-medium transition-colors border rounded-md focus:outline-none focus:ring-2 focus:ring-neutral-100 focus:ring-offset-2 montserrat-regular">Cancel</button>
                                                <button type="button" id="createProjectDeparmentBtn" class="inline-flex items-center justify-center h-10 px-4 py-2 text-sm font-medium text-white transition-colors border border-transparent rounded-md focus:outline-none  bg-primary hover:opacity-90 montserrat-regular">
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
    </section>
</x-layout>