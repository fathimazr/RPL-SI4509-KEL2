<?php

namespace App\Listeners;

use App\Models\User;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Log; // Import Log facade
use Illuminate\Support\Facades\Notification;
use App\Notifications\NewTrafoNotification;
use App\Events\TrafoPerformanceStored; 

class SendTrafoNotification implements ShouldQueue
{
    use InteractsWithQueue;

    public function handle(TrafoPerformanceStored $event)
    {
        $trafoPerformance = $event->trafoPerformance;

        // Check if $trafoPerformance is not null and has data
        if ($trafoPerformance->status === 'Warning' || $trafoPerformance->status === 'Error') {
            Log::info('Sending notification for TrafoPerformance: ' . $trafoPerformance->id);

            // Find users with roles 'tim_teknis' or 'manager'
            $users = User::where('role', 'tim_teknis')
                ->orWhere('role', 'manager')
                ->get();

            // Send notification to the found users
            Notification::send($users, new NewTrafoNotification($trafoPerformance));
        } else {
            Log::info('No notification sent for TrafoPerformance: ' . $trafoPerformance->id . ', Status: ' . $trafoPerformance->status);
        }
    }
}
