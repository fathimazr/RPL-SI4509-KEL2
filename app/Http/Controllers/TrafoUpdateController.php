<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TrafoPerformance; // Replace with your Trafo model
use App\Models\Trafo; // Replace with your Trafo model

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
        $trafoPerformance = new TrafoPerformance;
        $trafoPerformance->trafo_id = $request->trafo_id;
        $trafoPerformance->voltage = $request->voltage;
        $trafoPerformance->current = $request->current;
        $trafoPerformance->temperature = $request->temperature;
        $trafoPerformance->blackout_status = $request->blackout_status;

        $trafoPerformance->save();
        return redirect('trafo-data');
            
    }
}