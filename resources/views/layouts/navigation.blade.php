<div class="flex">
    <aside class=" w-[250px] h-full overflow-y-auto bg-[#12A2BD] md:block flex-shrink-0 border" aria-label="Sidebar">
        <div class="max-h-screen flex flex-col gap-5 p-5 overflow-y-auto rounded-xl">
            <div class="">
                <a href="/dashboard">
                    <img aria-hidden="true" class="w-full h-full"
                        src="{{ asset('images/logo-grid-geo-alert.png') }}"
                        alt=""/>
                </a>
            </div>
            
            <ul class="space-y-2 font-medium">
                <li class="hover:bg-[#15677B] p-2 rounded-xl">
                    <div class="flex gap-1">
                        <div class="self-center">
                            <img aria-hidden="true" class="w-full h-full"
                            src="{{ asset('images/Home.png') }}"
                            alt=""/>
                        </div>
                    
                        <a href="/dashboard" class="w-full flex items-center p-2 text-gray-900 rounded-lg  hover:bg-[#15677B] group">
                            <h1 class="text-[#FFFFFF] text-[20px] font-semibold">Dashboard</h1>
                        </a>
                    </div>
                </li>
    
                <li class="hover:bg-[#15677B] p-2 rounded-xl">
                    <div class="flex gap-1">
                        <div class="self-center">
                            <img aria-hidden="true" class="w-full h-full"
                            src="{{ asset('images/map.png') }}"
                            alt=""/>
                        </div>
                   
                        <a href="#" class="w-full flex items-center p-2 text-gray-900 rounded-lg  hover:bg-[#15677B] group">
                            <h1 class="text-[#FFFFFF] text-[20px] font-semibold">Maps</h1>
                        </a>
                    </div>
                </li>
    
                <li class="hover:bg-[#15677B] p-2 rounded-xl">
                    <div class="flex gap-1">
                        <div class="self-center">
                            <img aria-hidden="true" class="w-full h-full"
                             src="{{ asset('images/file.png') }}"
                             alt=""/>
                        </div>
    
                        <a href="/trafo-data" class="w-full flex items-center p-2 text-gray-900 rounded-lg  hover:bg-[#15677B] group">
                            <h1 class="text-[#FFFFFF] text-[20px] font-semibold">Trafo Data</h1>
                        </a>
                    </div>
                </li>
    
                <li class="hover:bg-[#15677B] p-2 rounded-xl">
                    <div class="flex gap-1">
                        <div class="self-center">
                            <img aria-hidden="true" class="w-full h-full"
                                src="{{ asset('images/setting.png') }}"
                                alt=""/>
                        </div>
    
                        <a href="#" class="w-full flex items-center p-2 text-gray-900 rounded-lg  hover:bg-[#15677B]  group">
                            <h1 class="text-[#FFFFFF] text-[20px] font-semibold">Maintenance</h1>
                        </a>
                    </div>
                </li>
    
                <li class="hover:bg-[#15677B] p-2 rounded-xl">
                    <div class="flex gap-1">
                        <div class="self-center">
                            <img aria-hidden="true" class="w-full h-full"
                                src="{{ asset('images/chart.png') }}"
                                alt=""/>
                        </div>
    
                        <a href="#" class="w-full flex items-center p-2 text-gray-900 rounded-lg  hover:bg-[#15677B] group">
                            <h1 class="text-[#FFFFFF] text-[20px] font-semibold">Statistics</h1>
                        </a>
                    </div>
                </li>
            </ul>

            <div class="">
                <form method="POST" action="{{ route('logout') }}" class="w-full flex bg-gradient-to-r from-cyan-500 to-blue-500 ... items-center px-2 text-gray-900 rounded-full  hover:bg-[#15677B]  group">
                    @csrf
                    <a href="route('logout')" class="w-full flex items-center p-1 text-gray-900 rounded-lg  group"
                            onclick="event.preventDefault();
                                        this.closest('form').submit();">
                        <h1 class="text-[#FFFFFF] text-[15px] font-semibold">
                            Log Out
                        </h1>
                    </a>
                </form>
            </div>

        </div>
    </aside>
</div>