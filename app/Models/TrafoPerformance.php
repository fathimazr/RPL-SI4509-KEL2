<?php

namespace App\Models;

use App\Models\Trafo;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class TrafoPerformance extends Model
{
    use HasFactory;

    public function trafo(){
        return $this->hasOne(Trafo::class);
    }
}
