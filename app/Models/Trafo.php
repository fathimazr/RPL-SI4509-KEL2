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
    ];

    protected $casts = [
        'blackout_status' => 'boolean',
    ];
}
