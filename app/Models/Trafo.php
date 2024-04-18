<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Trafo extends Model
{
    protected $fillable = [
        'voltage',
        'current',
        'temperature',
        'blackout_status',
        'installation_date',
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
}
