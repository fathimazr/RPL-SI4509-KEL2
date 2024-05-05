<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Notifications\NewTrafoNotification;
use App\Models\User;

class NotificationController extends Controller
{
    public function index()
    {
        // $notifications = auth()->user()->unreadNotifications;
        $notifications = auth()->user()->notifications;
        return view('notification.view-all', ['notifications' => $notifications],  compact('notifications'));
    }

    public function markAsRead(Request $request)
    {
        $notificationId = $request->input('id');
        $notification = auth()->user()->notifications()->findOrFail($notificationId);
        $notification->markAsRead();

        return response()->noContent();
    }
}