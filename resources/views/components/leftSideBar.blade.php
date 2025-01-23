@props(['navLinks'])
<section class=" hidden lg:flex flex-col p-5 sticky h-screen bg-gray-50 dark:bg-neutral-900 left-0 top-0 !space-y-4 !w-[250px]" >
    <div class=""></div>
    <div class="">
        <div class="montserrat-regular text-tertiary text-sm p-1">Main</div>
        <ul id="navlinks" class="flex flex-col py-1  space-y-1"> 
            @foreach($navLinks as $navLink)
                <li class="group">
                    <a href="{{ $navLink['url'] }}" class="flex items-center p-1 gap-1 hover:bg-gray-200 rounded-md hover:text-black text-tertiary ">
                        <div class="group-hover:text-black">
                            {!! $navLink['icon'] !!}
                        </div>
                        <span class="montserrat-medium  text-tertiary group-hover:text-black group-hover:bg-gray-200   text-sm text-left">{{ $navLink['name'] }}</span>
                    </a>
                   
                </li>
            @endforeach
            
        </ul>
    </div>
    <div class="flex flex-col gap-1 w-full border-t pt-2">
        <div class="flex cursor-pointer   items-center gap-1">
           
            <form method="POST" action="{{ route('logout') }}" class="flex p-1  rounded-md gap-1 hover:bg-gray-200 hover:text-black w-full text-tertiary">
                @csrf
               
                <button class="montserrat-medium   text-sm text-left  select-none w-full flex gap-1" type="submit">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-log-out "><path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"/><polyline points="16 17 21 12 16 7"/><line x1="21" x2="9" y1="12" y2="12"/></svg>

                    Logout
                </button>
            </form>
        </div>
    </div>
</section>