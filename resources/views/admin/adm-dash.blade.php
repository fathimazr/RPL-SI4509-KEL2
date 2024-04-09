<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased">

        <div
        class="flex h-screen"
        :class="{ 'overflow-hidden': isSideMenuOpen }"
        >
        <!-- Desktop sidebar -->
        <div class="flex">
            <aside class="w-[250px] h-full bg-[#12A2BD] md:block flex-shrink-0 border" aria-label="Sidebar">
                <div class="h-screen flex flex-col gap-5 p-5 overflow-y-auto rounded-xl dark:bg-gray-800 justify-between">
                    <div class="flex flex-col gap-5 items-center">
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
                                
                                    <a href="#" class="w-full flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-[#15677B] dark:hover:bg-gray-700 group">
                                        <h1 class="text-[#FFFFFF] text-[20px] font-semibold">Dashboard</h1>
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
                
                                    <a href="#" class="w-full flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-[#15677B] dark:hover:bg-gray-700 group">
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
                
                                    <a href="#" class="w-full flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-[#15677B] dark:hover:bg-gray-700 group">
                                        <h1 class="text-[#FFFFFF] text-[20px] font-semibold">Register New User</h1>
                                    </a>
                                </div>
                            </li>
                
                            
                        </ul>
                    </div>
                    
                    <div class="self-center">
                        <form method="POST" action="{{ route('logout') }}" class="w-full flex bg-gradient-to-r from-cyan-500 to-blue-500 ... items-center px-5 text-gray-900 rounded-full dark:text-white hover:bg-[#15677B] dark:hover:bg-gray-700 group">
                            @csrf
                            <a href="route('logout')" class="w-full flex items-center p-1 text-gray-900 rounded-lg dark:text-white dark:hover:bg-gray-700 group"
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
           
            <div class="flex flex-col  w-full bg-gray-200">
                <div class="w-full h-[110px] flex items-center border-b-2 border-b-gray-200 justify-between px-6 pr-10 bg-white">
                    <div class="flex gap-6 h-full items-center px-2">
                        <div class="self-center w-[30px] h-[30px]">
                            <img aria-hidden="true" class="w-full h-full"
                            src="{{ asset('images/notification.png') }}"
                            alt=""/>
                        </div>
                
                        <form class="w-[678px] rounded-full">   
                            <div class="relative ">
                                <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                                    <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
                                    </svg>
                                </div>
                                <input type="search" id="default-search" class=" rounded-full block w-full p-4 ps-10 text-sm text-gray-900 border border-gray-300 bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Search Mockups, Logos..." required />
                            </div>
                        </form>
                    </div>
                
                    <a href="#">
                        <img aria-hidden="true" class="w-[40px] h-[40px] self-center"
                            src="{{ asset('images/icon.png') }}"
                            alt=""/>
                    </a>
                </div>
                <div class="w-full h-full overflow-y-auto">
                    <div class="container px-6 mx-auto">
                        <div class="w-full mt-8 p-10 rounded-full bg-white">
                            <h1 class="text-[20px] font-semibold">Login Success</h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>