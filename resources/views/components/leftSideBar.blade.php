@props(['navLinks'])
<section class="flex flex-col border-r p-5 sticky h-screen bg-white border-gray-300 left-0 top-0 !space-y-4 !w-[250px] " >
    <div class=""></div>
    <div class="">
        <div class="montserrat-regular text-gray-700 text-sm opacity-80">Main</div>
        <ul id="navlinks" class="flex flex-col p-1  space-y-1   ml-2 "> 

            @foreach($navLinks as $navLink)
                <li>
                    <a href="{{ $navLink['url'] }}" class="flex rounded p-1 gap-1">

                        <div class="text-gray-600">
                            {!! $navLink['icon'] !!}
                        </div>
                        <span class="montserrat-medium  p-[2px] text-sm text-left opacity-70">{{ $navLink['name'] }}</span>
                    </a>
                    <div class="px-1 ml-[15px] py-2  border-l hidden">
                        <ul class="space-y-1">
                            <li class="w-full">
                                <a href="/project" class="text-xs hover:text-emerald-400 p-1 rounded-lg montserrat-regular w-full block hover:bg-emerald-50">All Projects</a>
                            </li>
                            <li ><a href="/project?projectloc=add" class="text-xs hover:text-emerald-400 p-1 rounded-lg montserrat-regular w-full block hover:bg-emerald-50">Add</a></li>
                            <li ><a href="/project?projectloc=closed" class="text-xs hover:text-emerald-400 p-1 rounded-lg montserrat-regular w-full block hover:bg-emerald-50">Closed</a></li>
                            <li ><a href="/project?projectloc=expired" class="text-xs hover:text-emerald-400 p-1 rounded-lg montserrat-regular w-full block hover:bg-emerald-50">Expired</a></li>
                        </ul>
                    </div>
                    <div class="px-1 ml-[15px] py-2  border-l hidden">
                        <ul class="space-y-1">
                            <li class="w-full">
                                <a href="/team" class="text-xs hover:text-emerald-400 p-1 rounded-lg montserrat-regular w-full block hover:bg-emerald-50">Members</a>
                            </li>
                          
                      
                        </ul>
                    </div>
                    <div class="px-1 ml-[15px] py-2  border-l hidden">
                        <ul class="space-y-1">
                            <li class="w-full">
                                <a href="/profile" class="text-xs hover:text-emerald-400 p-1 rounded-lg montserrat-regular w-full block hover:bg-emerald-50">Profile</a>
                            </li>
                            <li ><a href="/profile?profileloc=edit" class="text-xs hover:text-emerald-400 p-1 rounded-lg montserrat-regular w-full block hover:bg-emerald-50">Edit Profile</a></li>
                        </ul>
                    </div>
                </li>
            @endforeach
            
        </ul>
    </div>
    <div class="flex flex-col gap-1 w-full ">
        <div class="montserrat-regular text-gray-700 text-sm opacity-80">Main</div>

        <div class="flex  cursor-pointer ml-2 p-2 items-center gap-1">
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-log-out text-gray-600"><path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"/><polyline points="16 17 21 12 16 7"/><line x1="21" x2="9" y1="12" y2="12"/></svg>

            <span class="montserrat-medium  p-[2px] text-sm text-left opacity-70">Logout</span>
        </div>
    </div>
</section>