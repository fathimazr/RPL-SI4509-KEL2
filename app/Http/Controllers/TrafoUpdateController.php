<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// use App\Event\AnalyzeTrafoPerformance;
// use App\Listeners\AnalyzeTrafoPerformance;
use App\Models\Trafo; // Replace with your Trafo model
use App\Models\TrafoPerformance; // Replace with your Trafo model

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
        // Temukan data performa trafo yang sudah ada berdasarkan trafo_id
        $trafoPerformance = TrafoPerformance::where('trafo_id', $id)->first();

        if ($trafoPerformance) {
            // Jika data performa trafo sudah ada, perbarui data tersebut
            $trafoPerformance->voltage = $request->voltage;
            $trafoPerformance->current = $request->current;
            $trafoPerformance->temperature = $request->temperature;
            $trafoPerformance->blackout_status = $request->blackout_status;
            $trafoPerformance->save();

            // Panggil event untuk menganalisis performa trafo yang telah diperbarui
            event(new AnalyzeTrafoPerformance($trafoPerformance->trafo));
        } else {
            // Jika data performa trafo belum ada, buat data performa trafo baru
            $trafoPerformance = new TrafoPerformance;
            $trafoPerformance->trafo_id = $id; // Gunakan $id dari parameter
            $trafoPerformance->voltage = $request->voltage;
            $trafoPerformance->current = $request->current;
            $trafoPerformance->temperature = $request->temperature;
            $trafoPerformance->blackout_status = $request->blackout_status;
            $trafoPerformance->save();

            // Panggil event untuk menganalisis performa trafo yang baru dibuat
            event(new AnalyzeTrafoPerformance($trafoPerformance->trafo));
        }

        // Kembalikan respons sukses atau arahkan pengguna ke halaman yang sesuai
        return redirect('trafo-data');
            
    }
}