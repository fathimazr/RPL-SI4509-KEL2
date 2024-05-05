<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Notification;
use Illuminate\Notifications\Messages\DatabaseMessage;

class NewTrafoNotification extends Notification implements ShouldQueue
{
    use Queueable;

    protected $trafoPerformance;

    public function __construct($trafoPerformance)
    {
        $this->trafoPerformance = $trafoPerformance;
    }

    public function via($notifiable)
    {
        return ['database'];
    }

    public function toDatabase($notifiable)
    {
        $trafo = $this->trafoPerformance->trafo; // Assuming you have defined the relationship in the TrafoPerformance model
    
        return [
            'trafo_id' => $this->trafoPerformance->trafo_id,
            'trafo_number' => $trafo->trafo_id, // Assuming trafo_number is the field in the Trafo model
            'status' => $this->trafoPerformance->status,
            'message' => $this->generateMessage(),
        ];
    }

    protected function generateMessage()
    {
        $trafo = $this->trafoPerformance->trafo; 
        $status = $this->trafoPerformance->status;
        $trafoId = $this->trafoPerformance->trafo_id;
        $trafo_number = $trafo->trafo_id;

        if ($status === 'Warning' || $status === 'Error') {
            return "There is an $status on transformer with ID  $trafo_number";
        }

        return null;
    }
}