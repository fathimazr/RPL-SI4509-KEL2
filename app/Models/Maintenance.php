<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Maintenance extends Model
{
    protected $fillable = [
        'employee_id',
        'trafo_id',
        'maintenance_date',
        'maintenance_data',
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
