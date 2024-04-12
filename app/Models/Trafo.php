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
}
