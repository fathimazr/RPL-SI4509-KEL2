<x-app-layout>
    <div class="w-full flex flex-col gap-10 p-10 mb-10">
        <div class="flex justify-between mx-10 gap-7">

            <div class="w-full p-10 bg-blue-500 items-center shadow-lg shadow-blue-400 flex justify-between">
                
                <div class="flex flex-col gap-5">
                    <h1 class="text-2xl font tracking-tight text-white">Alerting</h1>
                    <h1 class="text-[50px] font tracking-tight text-white">20</h1>
                </div>
                
                <div class="">
                    <img src="/images/info.png" alt="">
                </div>
                
            </div>

            <div class="w-full p-10 bg-blue-500 items-center shadow-lg shadow-blue-400 flex justify-between">
                
                <div class="flex flex-col gap-5">
                    <h1 class="text-2xl font tracking-tight text-white">Maintenance</h1>
                    <h1 class="text-[50px] font tracking-tight text-white">10</h1>
                </div>
                
                <div class="">
                    <img src="/images/antenna.png" alt="">
                </div>
                
            </div>

            <div class="w-full p-10 bg-blue-500 items-center shadow-lg shadow-blue-400 flex justify-between">
                
                <div class="flex flex-col gap-5">
                    <h1 class="text-2xl font tracking-tight text-white">Maintenance <br> Punctuality</h1>
                    <h1 class="text-[50px] font tracking-tight text-white">80%</h1>
                </div>
                
                <div class="">
                    <img src="images/notes.png" alt="">
                </div>
                
            </div>
        </div>

        <div class="flex items-center justify-center gap-40 mx-10 mt-10">
            <div class="flex flex-col gap-10 w-[400px]">
                <a href="/stats" class="bg-blue-500 shadow-xl text-white font py-2 px-4 text-center">
                    <button class="text-white text-xl font py-2 px-4 rounded">
                        Alerting
                    </button>
                </a>

                <a href="/m" class="bg-blue-500 shadow-xl text-white font py-2 px-4 text-center">
                    <button class="text-white text-xl font py-2 px-4 rounded">
                        Maintenance
                    </button>
                </a>

                <a href="/mp" class="bg-blue-500 shadow-xl text-white font py-2 px-4 text-center">
                    <button class="text-white text-xl font py-2 px-4 rounded">
                        Maintenance Punctuality
                    </button>
                </a>
            </div>

            <div class="w-[700px] rounded-xl">
                
                <div class="bg-white shadow-lg p-10 pb-4">

                    <div class="flex justify-between pb-4 mb-4 items-center">
                        <div class="flex items-center pt-2">
                            <h1 class="leading-none text-2xl font">Alerting Growth</h1>
                        </div>
                        <div class="flex gap-3">
                            
                                <button id="monthly-button" class="bg-blue-500 hover:bg-[#15677B] text-white font py-1 px-3 rounded-full text-center">
                                    Monthly
                                </button>
                            

                            
                                <button id="weekly-button" class="bg-white hover:bg-[#15677B] text-black  font py-1 px-3 rounded-full text-center">
                                    Weekly
                                </button>
                            
                        </div>    
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>

    </script>
</x-app-layout>