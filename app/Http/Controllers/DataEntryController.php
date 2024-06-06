<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DataEntry;
use Illuminate\Support\Facades\Log;

class DataEntryController extends Controller
{
    public function createTrafo()
    {
        return view('data-entry');
    }

    public function createTrafoCity()
    {
        return view('data-entry.trafo-city');
    }

    public function createBranchOffice()
    {
        return view('data-entry.employee-branch-office');
    }

    public function storeTrafo(Request $request)
    {
        $request->validate([
            'brand' => 'nullable|string|max:255',
            'category' => 'nullable|string|max:255',
        ]);

        if ($request->filled('brand')) {
            DataEntry::create(['type' => 'brand', 'value' => $request->brand]);
        }

        if ($request->filled('category')) {
            DataEntry::create(['type' => 'category', 'value' => $request->category]);
        }

        return redirect()->back()->with('success', 'Trafo data has been saved successfully!');
    }

    public function storeTrafoCity(Request $request)
    {
        $request->validate([
            'city' => 'required|string|max:255',
        ]);

        DataEntry::create(['type' => 'city', 'value' => $request->city]);

        return redirect()->back()->with('success', 'Trafo city data has been saved successfully!');
    }

    public function storeBranchOffice(Request $request)
    {
        $request->validate([
            'branch_office' => 'required|string|max:255',
        ]);

        DataEntry::create(['type' => 'branch_office', 'value' => $request->branch_office]);

        return redirect()->back()->with('success', 'Branch office data has been saved successfully!');
    }
}