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

    protected $casts =[
        'employee_id' => 'string'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function trafo(){
        return $this->belongsTo(Trafo::class);
    }
}
