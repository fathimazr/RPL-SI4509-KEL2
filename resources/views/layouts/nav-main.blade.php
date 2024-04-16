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

    <a href="/profile">
        <img aria-hidden="true" class="w-[40px] h-[40px] self-center"
            src="{{ asset('images/icon.png') }}"
            alt=""/>
    </a>
</div>