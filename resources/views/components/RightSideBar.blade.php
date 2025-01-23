@props(['filesByDepartment'])
@props(['role'])
@props(['fetchDepartments'])
<aside class="shadow-md  hidden lg:flex bg-gray-50 dark:bg-neutral-900 rounded-md" >
    <section class="sticky right-0 top-[60px]">
        <div class="p-2 border-b">
            <div class="flex justify-between">
                <div class="montserrat-regular text-sm header">
                    Project Worked
                    @if(count($filesByDepartment) > 0)
                        @foreach($filesByDepartment as $file)
                            <div class="chartData1 text-tertiary" data-key="{{ $file[0] }}" data-value="{{ $file[1] }}"></div>
                        @endforeach
                    @endif
                </div>
                <div>
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-ellipsis header"><circle cx="12" cy="12" r="1"/><circle cx="19" cy="12" r="1"/><circle cx="5" cy="12" r="1"/></svg>
                </div>
            </div>
            <div class="mt-4 header" id="chart">

            </div>

        </div>
      
        @if($role == 'admin')
            <div class=" p-2">
                <div class="flex justify-between">
                    <div class="montserrat-regular text-sm header">
                            Department
                    </div>
                    <a href="/department">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-ellipsis header"><circle cx="12" cy="12" r="1"/><circle cx="19" cy="12" r="1"/><circle cx="5" cy="12" r="1"/></svg>
                    </a>
                </div>
                <div class="montserrat-regular text-sm">
                
                <!-- Timeline -->
                    <div>
                    
                        <!-- Item -->
                        <div class="flex gap-x-3">
                        <!-- Icon -->
                        <div class="relative last:after:hidden after:absolute after:top-7 after:bottom-0 after:start-3.5 after:w-px after:-translate-x-[0.5px] after:bg-gray-200 dark:after:bg-neutral-700">
                            <div class="relative z-10 size-7 flex justify-center items-center">
                            <div class="size-2 rounded-full bg-gray-400 dark:bg-neutral-600"></div>
                            </div>
                        </div>
                        <!-- End Icon -->
                    
                        <!-- Right Content -->
                        <div class="grow pt-4 pb-8 flex flex-col">
                            @if(count($fetchDepartments) > 0)
                                @for($i = 0; $i < count($fetchDepartments); $i++)
                                  
                                    <div class="mt-1 -ms-1 p-1 inline-flex items-center gap-x-1 text-xs rounded-lg border border-transparent  focus:outline-none  header disabled:pointer-events-none">
                                        {{ $fetchDepartments[$i]['department'] }}
                                    </div>  
                                    @php
                                        if($i == 3){
                                            break;
                                        }
                                    @endphp                         
                                @endfor
                            @endif
                           
                        </div>
                        <!-- End Right Content -->
                        </div>
                        <!-- End Item -->
                    </div>
                    <!-- End Timeline -->
                </div>
                
            </div>
        @endif
    </section>

</aside>