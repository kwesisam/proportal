<x-layout :navLinks="$navLinks">
    <section class="space-y-8 w-[75%] py-4 px-2">
        <div>
            <p class="montserrat-medium text-lg"><span class="text-gray-600">Today, </span>Monday, August 12 2024</p>

            <div class="grid grid-cols-3 gap-4">
                <div class="border rounded-md flex p-4 gap-2 shadow cursor-pointer">
                    <div class="rounded-full p-3 border bg-gray-100" >
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-folder w-full h-full text-gray-600"><path d="M20 20a2 2 0 0 0 2-2V8a2 2 0 0 0-2-2h-7.9a2 2 0 0 1-1.69-.9L9.6 3.9A2 2 0 0 0 7.93 3H4a2 2 0 0 0-2 2v13a2 2 0 0 0 2 2Z"/></svg>
                    </div>
                    <div class="flex flex-col">
                        <div class="montserrat-bold text-lg">124</div>
                        <p class="text-sm montserrat-regular text-gray-600">Active Project</p>
                    </div>
                </div>
                <div class="border rounded-md flex p-4 gap-2 shadow cursor-pointer">
                    <div class="rounded-full p-3 border bg-gray-100" >
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-circle-gauge w-full h-full text-gray-600"><path d="M15.6 2.7a10 10 0 1 0 5.7 5.7"/><circle cx="12" cy="12" r="2"/><path d="M13.4 10.6 19 5"/></svg>
                    </div>
                    <div class="flex flex-col">
                        <div class="montserrat-bold text-lg">124</div>
                        <p class="text-sm montserrat-regular text-gray-600">Ongoing tasks</p>
                    </div>
                </div>
                <div class="border rounded-md flex p-4 gap-2 shadow cursor-pointer">
                    <div class="rounded-full p-3 border bg-gray-100" >
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-folder-check text-gray-600 w-full h-full"><path d="M20 20a2 2 0 0 0 2-2V8a2 2 0 0 0-2-2h-7.9a2 2 0 0 1-1.69-.9L9.6 3.9A2 2 0 0 0 7.93 3H4a2 2 0 0 0-2 2v13a2 2 0 0 0 2 2Z"/><path d="m9 13 2 2 4-4"/></svg>
                    </div>
                    <div class="flex flex-col">
                        <div class="montserrat-bold text-lg">124</div>
                        <p class="text-sm montserrat-regular text-gray-600">Completed Task</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="rounded-med">
            <div class="grid"></div>
        </div>
    </section>
</x-layout>
