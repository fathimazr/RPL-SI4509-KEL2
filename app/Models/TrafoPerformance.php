<?php

namespace App\Models;

use App\Models\Trafo;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class TrafoPerformance extends Model
{
    use HasFactory;
    protected $fillable = [
        'trafo_id', // Assuming you have a column named trafo_id in the trafo_performances table
        'voltage',
        'current',
        'temperature',
        'blackout_status',
        'status',
        'installation_date',
        'active_power',
        'reactive_power',
        'apparent_power',
        'voltage_thd',
        'current_thd',
        'total_power_losses',
        'power_factor',
        'frequency',
        'pressure',
        'k_factor',
        'individual_harmonics',
        'tripplen_harmonics',
        'power_losses',
        'oil_pressure',
        'oil_temperature',
    ];

    public function trafo(){
        return $this->belongsTo(Trafo::class);
    }
}
