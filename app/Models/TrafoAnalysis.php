<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TrafoAnalysis extends Model
{
    use HasFactory;
    public function trafo() {
        return $this->belongsTo(Trafo::class);
    }
}