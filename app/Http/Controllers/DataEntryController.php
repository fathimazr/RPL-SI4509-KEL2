<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DataEntry;
use Illuminate\Support\Facades\Log;


class DataEntryController extends Controller
{

    public function create()
    {
        return view('/data-entry');
    }

    public function store(Request $request)
    {
        Log::info('Store method reached.'); // Log that the store method is reached
        Log::info('Request data: ' . json_encode($request->all())); // Log the data received from the request
        
        $request->validate([
            'brand' => 'required|string|max:255',
            'city' => 'required|string|max:255',
            'category' => 'required|string|max:255',
            'branch_office' => 'required|string|max:255',
        ]);
    
        $dataEntries = [
            new DataEntry(['type' => 'brand', 'value' => $request->brand]),
            new DataEntry(['type' => 'city', 'value' => $request->city]),
            new DataEntry(['type' => 'category', 'value' => $request->category]),
            new DataEntry(['type' => 'branch_office', 'value' => $request->branch_office]),
        ];
    
        // Dump the data for inspection
        // dd($dataEntries);
    
        // Save each DataEntry instance
        foreach ($dataEntries as $dataEntry) {
            $dataEntry->save();
        }

        return redirect('data-entry');
    }
}
