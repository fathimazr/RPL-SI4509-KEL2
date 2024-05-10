<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Notifications\DatabaseNotification;
use Illuminate\Http\JsonResponse;

class NotificationController extends Controller
{
    public function index()
    {
        // $notifications = auth()->user()->unreadNotifications;
        $notifications = auth()->user()->notifications;
        return view('notification.view-all', ['notifications' => $notifications],  compact('notifications'));
    }

    public function unreadNotifications()
    {
        // $notifications = auth()->user()->unreadNotifications;
        $notifications = auth()->user()->unreadnotifications;
        return view('layouts.nav-main')->with('unreadNotifications', $notifications);
    }

    public function markAsRead(Request $request)
    {
        // $notificationId = $request->input('id');
        // dd($notificationId);

        // auth()->user()
        // ->unreadNotifications
        // ->when($request->input('id'), function ($query) use ($request) {
        //     return $query->where('id', $request->input('id'));
        // })
        // ->update(['read_at' => Carbon::now()]); // Use Carbon to get the current timestamp

        $notificationId = $request->input('id');
        
        $notification = DatabaseNotification::findOrFail($notificationId);
        $notification->markAsRead();

        return redirect()->route('notification.view-all');
    }
}
