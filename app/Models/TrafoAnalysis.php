<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TrafoAnalysis extends Model
{
    use HasFactory;
    protected $fillable = [
        'load_demand',
        'unbalance_load',
        'unbalance_voltage',
        'current_regulation',
        'temperature_analysis',
        'load_demand_analysis',
        'unbalanced_load_analysis',
        'unbalanced_voltage_analysis',
        'current_regulation_analysis',
        'blackout_status_analysis',
        'trafo_id',
    ];
    public function trafo(){
        return $this->belongsTo(Trafo::class);
    }
}
