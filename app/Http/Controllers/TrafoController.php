<?php

namespace App\Http\Controllers;

use App\Models\Trafo;
use Illuminate\Http\Request;
use App\Models\TrafoPerformance;

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
     * Show the form for creating a new resource.
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
        //
        $trafo = Trafo::find($id);
        return view('trafo.view-performance', compact(['trafo']));
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
        return view('tracking.maps', compact(['trafo']));
    }
}