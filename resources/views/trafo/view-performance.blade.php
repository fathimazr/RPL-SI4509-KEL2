<x-app-layout>
    <div class="w-full h-full flex flex-col gap-6 p-10 bg-slate-200">

        <div class="flex justify-between p-6 bg-white rounded-xl shadow-xl">
            <h1 class="font-extrabold text-[18px]">VIEW DATA</h1>
            <div class="flex gap-2">
                <h2>Trafo ID :</h2>
                <h2 class="font-semibold">1103</h2>
            </div>
        </div>

        <!-- Specification Data Field -->
        <div class="container h-auto bg-white rounded-xl shadow-lg p-6 flex flex-col gap-8">
            <h1 class="text-[22px] font-extrabold">Specification Data</h1>
            <div class="flex"> 
                <div class="flex w-3/4 gap-8 items-stretch">
                    <div class="flex flex-col gap-4">
                        <h1>Brand</h1>
                        <h1>City</h1>
                        <h1>Phase</h1>
                        <h1>Latitude</h1>
                    </div>
    
                    <div class="flex flex-col gap-4">
                        <h1>Starlite</h1>
                        <h1>Jakarta</h1>
                        <h1>3</h1>
                        <h1>1.043496628353671</h1>
                    </div>
                </div>

                <div class="flex w-3/4 gap-8">
                    <div class="flex flex-col gap-4">
                        <h1>Logitude</h1>
                        <h1>Capacity</h1>
                        <h1>Instalation Date</h1>
                    </div>
    
                    <div class="flex flex-col gap-4">
                        <h1>107.38636884737015</h1>
                        <h1>200 kVA</h1>
                        <h1>03-08-2023</h1>
                    </div>
                </div>
            </div>
        </div>

        <!-- Performance Data Field -->
        <div class="container h-auto bg-white rounded-xl shadow-lg p-6 flex flex-col gap-8">
            <h1 class="text-[22px] font-extrabold">Performance Data</h1>
            <div class="flex"> 
                <div class="flex w-3/4 gap-8 items-stretch">
                    <div class="flex flex-col gap-4">
                        <h1>Voltage</h1>
                        <h1>Current</h1>
                        <h1>Temperature</h1>
                        <h1>Blackout Status</h1>
                    </div>
    
                    <div class="flex flex-col gap-4">
                        <h1>35 KVA</h1>
                        <h1>5 A</h1>
                        <h1>65 Celcius</h1>
                        <h1>Active</h1>
                    </div>
                </div>

                <div class="flex w-3/4 gap-8">
                    <div class="flex flex-col gap-4">
                        <h1>Load Demand</h1>
                        <h1>Unbalance Load</h1>
                        <h1>Unbalance Voltage</h1>
                        <h1>Current Regulation</h1>
                    </div>
    
                    <div class="flex flex-col gap-4">
                        <h1>0.875</h1>
                        <h1>10</h1>
                        <h1>2.5</h1>
                        <h1>-5</h1>
                    </div>
                </div>
            </div>
        </div>

        <!-- Performance Analysis field -->
        <div class="container h-auto bg-white rounded-xl shadow-lg p-6 flex flex-col gap-8">
            <h1 class="text-[22px] font-extrabold">Performance Analysis</h1>
            <div class="flex"> 
                <div class="flex w-3/4 gap-8 items-stretch">
                    <div class="flex flex-col gap-4">
                        <h1>Temperature</h1>
                        <h1>Load Demand</h1>
                        <h1>Unbalanced Load</h1>
                        <h1>Unbalanced Voltage </h1>
                    </div>
    
                    <div class="flex flex-col gap-4">
                        <h1>Normal</h1>
                        <h1>Warning</h1>
                        <h1>Normal</h1>
                        <h1>Normal</h1>
                    </div>
                </div>

                <div class="flex w-3/4 gap-8">
                    <div class="flex flex-col gap-4">
                        <h1>Current Regulation</h1>
                        <h1>Blackout Status</h1>
                    </div>
    
                    <div class="flex flex-col gap-4">
                        <h1>Normal</h1>
                        <h1>Normal</h1>
                    </div>
                </div>
            </div>
        </div>

    </div>
</x-app-layout>