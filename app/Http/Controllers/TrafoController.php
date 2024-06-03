<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Trafo;
use App\Models\Maintenance;
use Illuminate\Http\Request;

use App\Models\TrafoAnalysis;
use App\Models\DataEntry;
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
        $brands = DataEntry::where('type', 'Brand')->pluck('value', 'id');
        $cities = DataEntry::where('type', 'City')->pluck('value', 'id');
        $categories = DataEntry::where('type', 'Category')->pluck('value', 'id');
        $branchOffices = DataEntry::where('type', 'Branch Office')->pluck('value', 'id');
        return view('trafo.register-trafo', compact('brands', 'cities', 'categories', 'branchOffices'));
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
        $trafo->category = $request->category;
        // Trafo::create($request->all());
        $trafo->save();
        return redirect('trafo-data');
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
            $types = DataEntry::pluck('value', 'id');
            return view('trafo.add-performance', compact('trafo', 'types'));
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
        $data_trafo =  Trafo::with('trafo_performance')->get();
        $data_trafo =  Trafo::all();
        // dd($data_trafo)
        return view('tracking.maps-status-on', compact(['data_trafo']));
    }

    public function maintenance(Request $request){
        $maintenance = Maintenance::with('trafo')->get();
        $maintenance = Maintenance::all();
        return view('maintenance.maintenance-log', compact(['maintenance']));
    }

    public function get_maintenance(Request $request){
        $id = Auth::user()->id;
        $data = User::find($id);
        $trafos = Trafo::all();

        return view('maintenance.add-maintenance', compact('data', 'trafos'));
        // dd($data);
    }

    public function store_maintenance(Request $request){
        $user = User::where('employee_id', $request->employee_id)->first();
    
        if(!$user){
            return redirect()->back()->withErrors(['employee_id' => 'Employee not found']);
        }
    
        $trafoMaintenance = new Maintenance;
        $trafoMaintenance->employee_id = $user->employee_id;
        $trafoMaintenance->trafo_id = $request->trafo_id;
        $trafoMaintenance->maintenance_date = $request->maintenance_date;
        $trafoMaintenance->maintenance_data = $request->maintenance_data;
        $trafoMaintenance->save();
        
        // dd($trafoMaintenance);
        return redirect('trafo')->with('success', 'Maintenance data added successfully.');
    }
    
    
}