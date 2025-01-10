@props(['navLinks'])

<div id="hs-offcanvas-right" class="hs-overlay hs-overlay-open:translate-x-0 hidden md:block translate-x-full fixed top-0 end-0 transition-all duration-300 transform h-full max-w-xs w-full z-[80] bg-white border-s dark:bg-neutral-800 dark:border-neutral-700" role="dialog" tabindex="-1" aria-labelledby="hs-offcanvas-right-label">
    <div class="flex justify-between items-center py-3 px-4 border-b dark:border-neutral-700">
      <h3 id="hs-offcanvas-right-label" class="font-bold text-gray-800 dark:text-white">
        Offcanvas title
      </h3>
      <button type="button" class="size-8 inline-flex justify-center items-center gap-x-2 rounded-full border border-transparent bg-gray-100 text-gray-800 hover:bg-gray-200 focus:outline-none focus:bg-gray-200 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-700 dark:hover:bg-neutral-600 dark:text-neutral-400 dark:focus:bg-neutral-600" aria-label="Close" data-hs-overlay="#hs-offcanvas-right">
        <span class="sr-only">Close</span>
        <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
          <path d="M18 6 6 18"></path>
          <path d="m6 6 12 12"></path>
        </svg>
      </button>
    </div>
    
    <div class="p-4">
        <div class="">
            <ul id="navlinks" class="flex flex-col py-1  space-y-1"> 
                @foreach($navLinks as $navLink)
                    <li class="group">
                        <a href="{{ $navLink['url'] }}" class="flex items-center p-3 gap-1 hover:bg-gray-200 rounded-md hover:text-black text-tertiary ">
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
               
                <form method="POST" action="{{ route('logout') }}" class="flex p-3 rounded-md gap-1 hover:bg-gray-200 hover:text-black w-full text-tertiary">
                    @csrf
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-log-out "><path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"/><polyline points="16 17 21 12 16 7"/><line x1="21" x2="9" y1="12" y2="12"/></svg>
    
                    <button class="montserrat-medium   text-sm text-left " type="submit">Logout</button>
                </form>
            </div>
        </div>
    </div>
  </div>
