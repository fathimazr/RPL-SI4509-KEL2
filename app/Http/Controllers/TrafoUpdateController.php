<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TrafoPerformance; // Replace with your Trafo model
use App\Models\Trafo; // Replace with your Trafo model
use App\Models\TrafoAnalysis; // Replace with your Trafo model

class TrafoUpdateController extends Controller
{

    public function edit($id) 
    {
        if ($id) {
            $trafo = Trafo::findOrFail($id);
            return view('trafo.add-performance', compact('trafo'));

        } else {
            return redirect()->route('dashboard')->withErrors(['error' => 'Invalid request']);
        }
    }
    
    public function store(Request $request, $id)
    {
        // Create or update TrafoPerformance
        $trafoPerformance = new TrafoPerformance;
        $trafoPerformance->trafo_id = $request->trafo_id;
        $trafoPerformance->voltage = $request->voltage;
        $trafoPerformance->current = $request->current;
        $trafoPerformance->temperature = $request->temperature;
        $trafoPerformance->blackout_status = $request->blackout_status;

        $trafoPerformance->save();
        // return redirect('trafo-data');
        
        // Calculate analysis data
        $trafo = Trafo::findOrFail($id);
        $latestPerformance = $trafo->trafo_performance->latest()->first();
        if ($latestPerformance) {
            // Calculate analysis data
            $load_demand = $latestPerformance->voltage * $latestPerformance->current / $trafo->capacity;
            $unbalanced_load = 1 - ($latestPerformance->current * $latestPerformance->voltage / $trafo-> capacity);
            $unbalanced_voltage = ((($trafo->capacity/$latestPerformance->current) - $latestPerformance->voltage) / $latestPerformance->voltage);
            $current_regulation = ($latestPerformance->current - ($trafo->capacity/$latestPerformance->voltage));

            // Determine analysis based on calculated values
            $temperature_analysis = 'Normal'; 
            if ($latestPerformance->temperature <= 65) {
                $temperature_analysis = 'Normal';
            }
            if ($latestPerformance->temperature > 65 AND $latestPerformance->temperature < 85) {
                $temperature_analysis = 'Warning';
            }
            if ($latestPerformance->temperature > 85) {
                $temperature_analysis = 'Error';
            }

            $load_demand_analysis = 'Normal'; 
            if ($load_demand <= 0.8) {
                $load_demand_analysis = 'Normal';
            }
            if ($load_demand > 0.8 AND $load_demand < 0.9) {
                $load_demand_analysis = 'Warning';
            }
            if ($load_demand > 0.9) {
                $load_demand_analysis = 'Error';
            }

            $unbalanced_load_analysis = 'Normal'; 
            if ($unbalanced_load <= 0.1) {
                $unbalanced_load_analysis = 'Normal';
            }
            if ($unbalanced_load > 0.1 AND $unbalanced_load < 0.2) {
                $unbalanced_load_analysis = 'Warning';
            }
            if ($unbalanced_load > 0.2) {
                $unbalanced_load_analysis = 'Error';
            }

            $unbalanced_voltage_analysis = 'Normal'; 
            if ($unbalanced_voltage <= 0.8) {
                $unbalanced_voltage_analysis = 'Normal';
            }
            if ($unbalanced_voltage > 0.8 AND $unbalanced_voltage < 0.9) {
                $unbalanced_voltage_analysis = 'Warning';
            }
            if ($unbalanced_voltage > 0.9) {
                $unbalanced_voltage_analysis = 'Error';
            }

            $current_regulation_analysis = 'Normal'; 
            if ($current_regulation >= -5) {
                $current_regulation_analysis = 'Normal';
            }
            if ($current_regulation < -5 AND $current_regulation > -10) {
                $current_regulation_analysis = 'Warning';
            }
            if ($current_regulation < -10) {
                $current_regulation_analysis = 'Error';
            }

            $blackout_status_analysis = 'Normal';
            if ($latestPerformance->blackout_status == 'Active'){
                $blackout_status_analysis = 'Normal';
            }
            if ($latestPerformance->blackout_status == 'Blackout'){
                $blackout_status_analysis = 'Error';
            }

        } else {
            $load_demand = 0.8;
            $unbalanced_load = 0.1;
            $unbalanced_voltage = 0.8;
            $current_regulation = -5;
            $temperature_analysis = 'Normal'; 
            $load_demand_analysis = 'Normal'; 
            $unbalanced_load_analysis = 'Normal'; 
            $unbalanced_voltage_analysis = 'Normal'; 
            $current_regulation_analysis = 'Normal'; 
            $blackout_status_analysis = 'Normal';
        }

        // Update or create TrafoAnalysis

        $trafoAnalysis = new TrafoAnalysis;
        $trafoAnalysis->trafo_id = $request->trafo_id;
        $trafoAnalysis->load_demand = $load_demand;
        $trafoAnalysis->unbalanced_load = $unbalanced_load;
        $trafoAnalysis->unbalanced_voltage = $unbalanced_voltage;
        $trafoAnalysis->current_regulation = $current_regulation;
        $trafoAnalysis->temperature_analysis = $temperature_analysis;
        $trafoAnalysis->load_demand_analysis = $load_demand_analysis;
        $trafoAnalysis->unbalanced_load_analysis = $unbalanced_load_analysis;
        $trafoAnalysis->unbalanced_voltage_analysis = $unbalanced_voltage_analysis;
        $trafoAnalysis->current_regulation_analysis = $current_regulation_analysis;
        $trafoAnalysis->blackout_status_analysis = $blackout_status_analysis;

        // dd($trafoAnalysis);
        $trafoAnalysis->save();
        return redirect('trafo-data');
    }
}