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
    ];

    public function trafo(){
        return $this->belongsTo(Trafo::class);
    }
}
