<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Trafo extends Model
{
    protected $fillable = [
        'trafo_id', // Assuming you have a column named trafo_id in the trafo_performances table
        'voltage',
        'current',
        'temperature',
        'blackout_status',
        'installation_date',
        'voltage',
        'current',
        'temperature',
        'blackout_status',
        'load_demand',
        'unbalanced_load',
        'unbalanced_voltage',
        'current_regulation',
        'temperature_analysis',
        'load_demand_analysis',
        'unbalanced_load_analysis',
        'unbalanced_voltage_analysis',
        'current_regulation_analysis',
        'blackout_status_analysis'
    ];

    protected $casts = [
        'installation_date' => 'date:Y-m-d'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function trafo_performance(){
        return $this->hasOne(TrafoPerformance::class);
    }

    public function trafo_analysis(){
        return $this->hasOne(TrafoAnalysis::class);
    }
}
