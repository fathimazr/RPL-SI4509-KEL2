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
                        <h1>Longitude</h1>
                        <h1>Capacity</h1>
                        <h1>Installation Date</h1>
                    </div>
                    
                    <div class="flex flex-col gap-4">
                        <h1>{{$trafo->longitude}}</h1>
                        <h1>{{$trafo->capacity}}</h1>
                        <h1>{{$trafo->installation_date}}</h1>
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
                        <h1>{{ $trafoPerformance->voltage ?? 'N/A' }} KVA</h1>
                        <h1>{{ $trafoPerformance->current ?? 'N/A' }} A</h1>
                        <h1>{{ $trafoPerformance->temperature ?? 'N/A' }} Celsius</h1>
                        <h1>{{ $trafoPerformance->blackout_status ?? 'N/A' }}</h1>
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
                        <h1>{{ $trafoAnalysis->load_demand ?? 'N/A' }}</h1>
                        <h1>{{ $trafoAnalysis->unbalanced_load ?? 'N/A' }}</h1>
                        <h1>{{ $trafoAnalysis->unbalanced_voltage ?? 'N/A' }}</h1>
                        <h1>{{ $trafoAnalysis->current_regulation ?? 'N/A' }}</h1>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Performance Analysis Field -->
        <div class="container h-auto bg-white rounded-xl shadow-lg p-6 flex flex-col gap-8">
            <h1 class="text-[22px] font-extrabold">Performance Analysis</h1>
            <div class="flex"> 
                <div class="flex w-3/4 gap-8 items-stretch">
                    <div class="flex flex-col gap-4">
                        <h1>Temperature</h1>
                        <h1>Load Demand</h1>
                        <h1>Unbalanced Load</h1>
                        <h1>Unbalanced Voltage</h1>
                    </div>
                    
                    <div class="flex flex-col gap-4">
                        <h1>{{ $trafoAnalysis->temperature_analysis ?? 'N/A' }}</h1>
                        <h1>{{ $trafoAnalysis->load_demand_analysis ?? 'N/A' }}</h1>
                        <h1>{{ $trafoAnalysis->unbalanced_load_analysis ?? 'N/A' }}</h1>
                        <h1>{{ $trafoAnalysis->unbalanced_voltage_analysis ?? 'N/A' }}</h1>
                    </div>
                </div>

                <div class="flex w-3/4 gap-8">
                    <div class="flex flex-col gap-4">
                        <h1>Current Regulation</h1>
                        <h1>Blackout Status</h1>
                    </div>
                    
                    <div class="flex flex-col gap-4">
                        <h1>{{ $trafoAnalysis->current_regulation_analysis ?? 'N/A' }}</h1>
                        <h1>{{ $trafoAnalysis->blackout_status_analysis ?? 'N/A' }}</h1>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Additional Datas Field -->
        <div class="container h-auto bg-white rounded-xl shadow-lg p-6 flex flex-col gap-8">
            <h1 class="text-[22px] font-extrabold">Additional Datas</h1>
            <div class="flex">
                <div class="flex w-3/4 gap-8 items-stretch">
                    <div class="flex flex-col gap-4">
                        <h1>Active Power</h1>
                        <h1>Reactive Power</h1>
                        <h1>Apparent Power</h1>
                        <h1>Voltage THD</h1>
                        <h1>Current THD</h1>
                        <h1>Total Power Losses</h1>
                        <h1>Power Factor</h1>
                        <h1>Frequency</h1>
                    </div>
                    
                    <div class="flex flex-col gap-4">
                        <h1>{{ $trafoPerformance->active_power ?? 'N/A' }} W</h1>
                        <h1>{{ $trafoPerformance->reactive_power ?? 'N/A' }} VAR</h1>
                        <h1>{{ $trafoPerformance->apparent_power ?? 'N/A' }} VA</h1>
                        <h1>{{ $trafoPerformance->voltage_thd ?? 'N/A' }} %</h1>
                        <h1>{{ $trafoPerformance->current_thd ?? 'N/A' }} %</h1>
                        <h1>{{ $trafoPerformance->total_power_losses ?? 'N/A' }} W</h1>
                        <h1>{{ $trafoPerformance->power_factor ?? 'N/A' }}</h1>
                        <h1>{{ $trafoPerformance->frequency ?? 'N/A' }} Hz</h1>
                    </div>
                </div>
                
                <div class="flex w-3/4 gap-8">
                    <div class="flex flex-col gap-4">
                        <h1>Pressure</h1>
                        <h1>K Factor</h1>
                        <h1>Individual Harmonics</h1>
                        <h1>Tripplen Harmonics</h1>
                        <h1>Power Losses</h1>
                        <h1>Oil Pressure</h1>
                        <h1>Oil Temperature</h1>
                    </div>
                    
                    <div class="flex flex-col gap-4">
                        <h1>{{ $trafoPerformance->pressure ?? 'N/A' }} Pa</h1>
                        <h1>{{ $trafoPerformance->k_factor ?? 'N/A' }}</h1>
                        <h1>{{ $trafoPerformance->individual_harmonics ?? 'N/A' }} %</h1>
                        <h1>{{ $trafoPerformance->tripplen_harmonics ?? 'N/A' }} %</h1>
                        <h1>{{ $trafoPerformance->power_losses ?? 'N/A' }} W</h1>
                        <h1>{{ $trafoPerformance->oil_pressure ?? 'N/A' }} Pa</h1>
                        <h1>{{ $trafoPerformance->oil_temperature ?? 'N/A' }} °C</h1>
                    </div>
                </div>
            </div>
        </div>
        
    </div>
</x-app-layout>
