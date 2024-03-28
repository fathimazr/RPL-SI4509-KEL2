<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Trafo; // Replace with your Trafo model

class TrafoUpdateController extends Controller
{
    public function update(Request $request)
    {
        $data = $request->validate([
            'voltage' => 'required|numeric',
            'current' => 'required|numeric',
            'temperature' => 'required|numeric',
            'blackout_status' => 'required|boolean',
        ]);

        // Find the trafo to update (replace with your logic)
        $trafo = Trafo::find($request->id); // Assuming you have an id field

        if ($trafo) {
            $trafo->update($data);
            return redirect()->route('trafo.index')->with('success', 'Trafo performance data updated successfully!');
        }

        return back()->withErrors(['error' => 'Trafo not found!']);
    }

    // ... Within TrafoController ...

    public function edit($id) 
    {
        $trafo = Trafo::findOrFail($id);  // Find the trafo or fail with a 404 error
        return view('update-trafo', compact('trafo')); // Pass the $trafo to the view
    }


    // ... other methods for Trafo management (optional)
}
