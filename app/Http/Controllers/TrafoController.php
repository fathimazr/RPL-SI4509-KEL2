<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Trafo;
use App\Models\Maintenance;
use Illuminate\Http\Request;
use App\Models\TrafoAnalysis;
use App\Models\TrafoPerformance;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
class TrafoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $trafo = Trafo::all();
        return view('trafo-data', compact(['trafo']));
    }

    /**
     * Buat register trafo baru.
     */
    public function create()
    {
        return view('trafo.register-trafo');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        // dd($request->except(['_token', 'submit']));
        $trafo = new Trafo;
        $trafo->trafo_id = $request->trafo_id;
        $trafo->brand = $request->brand;
        $trafo->city = $request->city;
        $trafo->phase = $request->phase;
        $trafo->latitude = $request->latitude;
        $trafo->longitude = $request->longitude;
        $trafo->capacity = $request->capacity;
        $trafo->installation_date = $request->installation_date;
        $trafo->save();
        return redirect('trafo-data');
        // Trafo::create($request->except(['_token', 'submit']));
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $trafo = Trafo::findOrFail($id);
        $trafoPerformance = $trafo->trafo_performance; // Memuat data TrafoPerformance yang terkait dengan Trafo
        $trafoAnalysis = $trafo->trafo_analysis; // Memuat data TrafoAnalysis yang terkait dengan Trafo
        return view('trafo.view-performance', compact(['trafo', 'trafoPerformance', 'trafoAnalysis']));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        if ($id) {
            $trafo = Trafo::find($id);
            return view('trafo.add-performance', compact('trafo'));

        } else {
            return redirect()->route('/')->withErrors(['error' => 'Invalid request']);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
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

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $trafo = Trafo::find($id);
        $trafo->delete();
        return response('', 204); // Empty response with status code 204 (No Content)
    }

    public function pin()
    {
        //
        $trafo = Trafo::all();
        // dd($trafo);
        return view('tracking.maps', compact(['trafo']));
    }

    public function pin_color()
    {
        //
        // $trafo = Trafo::findOrFail($id);
        // // dd($trafo);
        // $trafoPerformance = $trafo->trafo_performance;
        // $data_trafo = array_merge($trafo, $trafoPerformance); // untuk mengirimkan data trafo dan trafo_performance ke maps-status-on.blade.php
        $data_trafo =  Trafo::with('trafo_performance')->get();
        $data_trafo =  Trafo::all();
        // dd($data_trafo)
        return view('tracking.maps-status-on', compact(['data_trafo']));
    }

    public function maintenance(Request $request){
        return view('maintenance.maintenance-log');
    }

    public function get_maintenance(Request $request){
        $id = Auth::user()->id;
        $data = User::find($id);

        return view('maintenance.add-maintenance', compact('data'));
        // dd($data);
    }
    // public function update_maintenance(Request $request){
    //     // $id = Auth::user()->id;
    //     // $data = User::find($id);

    //     // $data->trafo_id = $request->trafo_id;
    //     // $data->employee_id = $request->employee_id;
    //     // $data->maintenance_date = $request->maintenance_date;
    //     // $data->maintenance_data = $request->maintenance_data;
    //     // $data->save();
    //     $request->validate([
    //         'employee_id' => 'required|string',
    //         'trafo_id' => 'required|integer|exists:trafos,id',
    //         'maintenance_date' => 'required|date',
    //         'maintenance_data' => 'required|string',
    //     ]);
    //     $trafoMaintenance = new Maintenance;
    //     $trafoMaintenance->employee_id = $request->employee_id;
    //     $trafoMaintenance->trafo_id = $request->trafo_id;
    //     $trafoMaintenance->maintenance_date = $request->maintenance_date;
    //     $trafoMaintenance->maintenance_data = $request->maintenance_data;
    //     $trafoMaintenance->save();
    //     return redirect()->route('trafo.show', ['id' => $request->trafo_id])->with('success', 'Maintenance data added successfully.');
    // }

    public function update_maintenance(Request $request){
        $validated = $request->validate([
            'employee_id' => 'required|string',
            'trafo_id' => 'required|integer|exists:trafos,id',
            'maintenance_date' => 'required|date',
            'maintenance_data' => 'required|string',
        ]);
    
        Log::info('Request Data: ', $request->all());
    
        $user = User::find($request->employee_id);
        if(!$user){
            return redirect()->back()->withErrors(['employee_id' => 'Employee not found']);
        }
    
    
        $user = User::find($request->employee_id);
        $trafoPerformance = TrafoPerformance::find($request->trafo_performance_id);
        $trafoAnalysis = TrafoAnalysis::find($request->trafo_analysis_id);
    
        $trafoMaintenance = new Maintenance;
        $trafoMaintenance->employee_id = $user->employee_id;
        $trafoMaintenance->trafo_id = $request->trafo_id;
        $trafoMaintenance->maintenance_date = $request->maintenance_date;
        $trafoMaintenance->maintenance_data = $request->maintenance_data;
        $trafoMaintenance->save();
    
        // $trafoPerformance->maintenance_id = $trafoMaintenance->id;
        // $trafoPerformance->save();
    
        // $trafoAnalysis->maintenance_id = $trafoMaintenance->id;
        // $trafoAnalysis->save();
    
        return redirect('maintenance');
    }
}