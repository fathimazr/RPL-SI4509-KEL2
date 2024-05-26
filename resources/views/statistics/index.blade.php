<x-app-layout>
    <div class="w-full flex flex-col gap-10 p-10 mb-10">
        <div class="flex justify-between mx-10 gap-7">

            <div class="w-full p-10 bg-gradient-to-r from-cyan-500 to-blue-500 items-center rounded-3xl shadow-lg shadow-blue-400 flex justify-between">
                
                <div class="flex flex-col gap-5">
                    <h1 class="text-2xl font-bold tracking-tight text-white">Alerting</h1>
                    <h1 class="text-[50px] font-bold tracking-tight text-white">20</h1>
                </div>
                
                <div class="">
                    <img src="/images/info.png" alt="">
                </div>
                
            </div>

            <div class="w-full p-10 bg-gradient-to-r from-cyan-500 to-blue-500 items-center rounded-3xl shadow-lg shadow-blue-400 flex justify-between">
                
                <div class="flex flex-col gap-5">
                    <h1 class="text-2xl font-bold tracking-tight text-white">Maintenance</h1>
                    <h1 class="text-[50px] font-bold tracking-tight text-white">10</h1>
                </div>
                
                <div class="">
                    <img src="/images/antenna.png" alt="">
                </div>
                
            </div>

            <div class="w-full p-10 bg-gradient-to-r from-cyan-500 to-blue-500 items-center rounded-3xl shadow-lg shadow-blue-400 flex justify-between">
                
                <div class="flex flex-col gap-5">
                    <h1 class="text-2xl font-bold tracking-tight text-white">Maintenance <br> Punctuality</h1>
                    <h1 class="text-[50px] font-bold tracking-tight text-white">80%</h1>
                </div>
                
                <div class="">
                    <img src="images/notes.png" alt="">
                </div>
                
            </div>
        </div>

        <div class="flex items-center justify-center gap-40 mx-10 mt-10">
            <div class="flex flex-col gap-10 w-[400px]">
                <a href="/stats" class="bg-[#12A2BD] hover:bg-[#15677B] focus:bg-[#15677B] shadow-xl text-white font-bold py-2 px-4 rounded-3xl text-center">
                    <button class="text-white text-xl font-bold py-2 px-4 rounded">
                        Alerting
                    </button>
                </a>

                <a href="/m" class="bg-[#12A2BD] hover:bg-[#15677B] focus:bg-[#15677B] shadow-xl text-white font-bold py-2 px-4 rounded-3xl text-center">
                    <button class="text-white text-xl font-bold py-2 px-4 rounded">
                        Maintenance
                    </button>
                </a>

                <a href="/mp" class="bg-[#12A2BD] hover:bg-[#15677B] focus:bg-[#15677B] shadow-xl text-white font-bold py-2 px-4 rounded-3xl text-center">
                    <button class="text-white text-xl font-bold py-2 px-4 rounded">
                        Maintenance Punctuality
                    </button>
                </a>
            </div>

            <div class="w-[700px] rounded-xl">
                
                <div class=" bg-gradient-to-b from-[#39e1ff] to-white rounded-xl shadow-lg shadow-cyan-100 p-10 pb-4">
                    <div class="flex justify-between pb-4 mb-4 items-center">
                        <div class="flex items-center pt-2">
                            <h1 class="leading-none text-2xl font-extrabold">Alerting Growth</h1>
                        </div>
                        <div class="flex gap-3">
                            
                                <button id="monthly-button" class="bg-[#12A2BD] hover:bg-[#15677B] text-white font-bold py-1 px-3 rounded-full text-center">
                                    Monthly
                                </button>
                            

                            
                                <button id="weekly-button" class="bg-white hover:bg-[#15677B] text-black  font-bold py-1 px-3 rounded-full text-center">
                                    Weekly
                                </button>
                            
                        </div>    
                    </div>

                    <div id="column-chart"></div>
                </div>
            </div>
        </div>
    </div>
    
</x-app-layout>