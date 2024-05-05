<?php

namespace App\Events;

use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;
use App\Models\TrafoPerformance;

class TrafoPerformanceStored
{
    use Dispatchable, SerializesModels;

    public $trafoPerformance;

    /**
     * Create a new event instance.
     *
     * @param  \App\Models\TrafoPerformance  $trafoPerformance
     * @return void
     */
    public function __construct(TrafoPerformance $trafoPerformance)
    {
        $this->trafoPerformance = $trafoPerformance;
    }
}