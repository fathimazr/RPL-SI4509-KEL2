<x-app-layout>
    <div class="w-full h-full flex flex-col gap-6 p-10 bg-slate-200">
        
        
        <div class="flex justify-between p-6 bg-white rounded-xl shadow-xl">
            <h1 class="font-extrabold text-[18px]">VIEW DATA</h1>
            <div class="flex gap-2">
                <h2>Trafo ID :</h2>
                <h2 class="font-semibold">{{ $trafo->trafo_id }}</h2>
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
                        <h1>{{$trafo->brand}}</h1>
                        <h1>{{$trafo->city}}</h1>
                        <h1>{{$trafo->phase}}</h1>
                        <h1>{{$trafo->latitude}}</h1>
                    </div>
                </div>
                
                <div class="flex w-3/4 gap-8">
                    <div class="flex flex-col gap-4">
                        <h1>Logitude</h1>
                        <h1>Capacity</h1>
                        <h1>Instalation Date</h1>
                    </div>
                    
                    <div class="flex flex-col gap-4">
                        <h1>{{$trafo->longitude}}</h1>
                        <h1>{{$trafo->capacity}}</h1>
                        <h1>{{$trafo->installation_date}}</h1>
                    </div>
                </div>
            </div>
        </div>
        {{-- @endforeach --}}
        
        <!-- Performance Data Field -->
        
        <div class="container h-auto bg-white rounded-xl shadow-lg p-6 flex flex-col gap-8">
            <h1 class="text-[22px] font-extrabold">Performance Data</h1>
            <div class="flex"> 
                {{-- @foreach ($traforafoPerformance as $trafop) --}}
                <div class="flex w-3/4 gap-8 items-stretch">
                    <div class="flex flex-col gap-4">
                        <h1>Voltage</h1>
                        <h1>Current</h1>
                        <h1>Temperature</h1>
                        <h1>Blackout Status</h1>
                    </div>
                    
                    <div class="flex flex-col gap-4">
                        {{-- <h1>200 KVA</h1>
                        <h1>20 A</h1>
                        <h1>10 Celcius</h1>
                        <h1>Active</h1>                       --}}
                        <h1>{{$trafoPerformance->voltage}} KVA</h1>
                        <h1>{{$trafoPerformance->current}} A</h1>
                        <h1>{{$trafoPerformance->temperature}} Celcius</h1>
                        <h1>{{$trafoPerformance->blackout_status}}</h1>                      
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
                        {{-- <h1>Normal</h1>
                        <h1>Normal</h1>
                        <h1>Normal</h1>
                        <h1>Normal</h1> --}}
                        <h1>{{$trafoAnalysis->load_demand}}</h1>
                        <h1>{{$trafoAnalysis->unbalanced_load}}</h1>
                        <h1>{{$trafoAnalysis->unbalanced_voltage}}</h1>
                        <h1>{{$trafoAnalysis->current_regulation}}</h1>
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
                        {{-- <h1>20</h1>
                        <h1>20</h1>
                        <h1>20</h1>
                        <h1>20</h1> --}}
                        <h1>{{$trafoAnalysis->temperature_analysis}}</h1>
                        <h1>{{$trafoAnalysis->load_demand_analysis}}</h1>
                        <h1>{{$trafoAnalysis->unbalanced_load_analysis}}</h1>
                        <h1>{{$trafoAnalysis->unbalanced_voltage_analysis}}</h1>
                    </div>
                </div>

                <div class="flex w-3/4 gap-8">
                    <div class="flex flex-col gap-4">
                        <h1>Current Regulation</h1>
                        <h1>Blackout Status</h1>
                    </div>
                    
                    <div class="flex flex-col gap-4">
                        {{-- <h1>Normal</h1>
                        <h1>Normal</h1> --}}
                        <h1>{{$trafoAnalysis->current_regulation_analysis}}</h1>
                        <h1>{{$trafoAnalysis->blackout_status_analysis}}</h1>
                    </div>
                </div>
            </div>
        </div>
        
    </div>
</x-app-layout>