<?php

namespace App\Listeners;

use App\Models\User;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Notification;
use App\Notifications\NewTrafoNotification;
use App\Events\TrafoPerformanceStored; // Make sure to import the TrafoPerformanceStored event

class SendTrafoNotification implements ShouldQueue
{
    use InteractsWithQueue;

    public function handle(TrafoPerformanceStored $event)
    {
        // Find users with roles 'tim_teknis' or 'manager'
        $users = User::where('role', 'tim_teknis')
        ->orWhere('role', 'manager')
        ->get();

        // Send notification to the found users
        Notification::send($users, new NewTrafoNotification($event->trafoPerformance));
    }
}