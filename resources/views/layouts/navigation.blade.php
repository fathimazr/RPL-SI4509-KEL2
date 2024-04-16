<!-- custom style for logout popup -->

<style>
    .custom-swal-container {
        backdrop-filter: blur(2px);
        background: rgba(0,0,0,0) !important;
        width: 1fr;
        height: 1fr;
        padding: none;
    }

    .custom-swal-title {
        font-size: 40px;
        font-weight: 700;
        color: #000000;
        margin-top: 2px;
    }

    .custom-swal-text {
        font-size: 33px;
        color: #000000;
        font-weight: 500;
    }

    .custom-swal-discard-button, .custom-swal-cancel-button {
        border-radius: 4px;
        padding: 10px 20px;
        font-size: 33px;
        font-weight: 500;
        cursor: pointer;
        margin: 10px;
    }

    .custom-swal-cancel-button {
        background-color: #000000 !important;
        color: white !important;
        border: 2px solid black !important;
    }

    .custom-swal-discard-button {
        background-color: white !important;
        color: black !important;
        border: 2px solid black !important;
    }

    .swal2-actions {
        display: flex;
        flex-direction: row-reverse; 
    }
</style>

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
                        
                            <a href="/dashboard" class="w-full flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-[#15677B] dark:hover:bg-gray-700 group">
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
                       
                            <a href="#" class="w-full flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-[#15677B] dark:hover:bg-gray-700 group">
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
        
                            <a href="/trafo-data" class="w-full flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-[#15677B] dark:hover:bg-gray-700 group">
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
        
                            <a href="#" class="w-full flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-[#15677B] dark:hover:bg-gray-700 group">
                                <h1 class="text-[#FFFFFF] text-[20px] font-semibold">Statistics</h1>
                            </a>
                        </div>
                    </li>
                </ul>
            </div>
            
            <div class="self-center">
            <form id="logoutForm" method="POST" action="{{ route('logout') }}" class="w-full flex bg-gradient-to-r from-cyan-500 to-blue-500 ... items-center px-5 text-gray-900 rounded-full dark:text-white hover:bg-[#15677B] dark:hover:bg-gray-700 group">
                    @csrf
                    <a href="#" class="w-full flex items-center p-1 text-gray-900 rounded-lg dark:text-white dark:hover:bg-gray-700 group"
                    <button type="button" onclick="confirmLogout()" class="w-full flex items-center p-1 text-gray-900 rounded-lg dark:text-white dark:hover:bg-gray-700 group">
                    <h1 class="text-[#FFFFFF] text-[15px] font-semibold">
                            Log Out
                        </h1>
                        </button>
                    </a>
                </form>
            </div>

        </div>
    </aside>
</div>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    function confirmLogout() {
        Swal.fire({
            title: 'Are you sure you want to log out?',
            showCancelButton: true,
            confirmButtonText: 'Log Out',
            cancelButtonText: 'Cancel',
            customClass: {
                container: 'custom-swal-container',
                title: 'custom-swal-title',
                content: 'custom-swal-text',
                confirmButton: 'custom-swal-discard-button',
                cancelButton: 'custom-swal-cancel-button'
            }
        }).then((result) => {
            if (result.isConfirmed) {
                document.getElementById('logoutForm').submit();
            }
        });
    }
</script>