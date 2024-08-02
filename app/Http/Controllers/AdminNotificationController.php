<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Notifications\AdminPushNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;

class AdminNotificationController extends Controller
{
    public function showUsers()
    {
        $users = User::all();
        return view('admin.noti.index', compact('users'));
    }

    public function sendNotification(Request $request)
    {
        $request->validate([
            'user_ids' => 'required|array',
            'title' => 'required|string|max:255',
            'message' => 'required|string|max:500',
        ]);

        $users = User::whereIn('id', $request->user_ids)->get();

        Notification::send($users, new AdminPushNotification($request->title, $request->message));

        return redirect()->route('admin.noti.index')->with('success', 'Notifications sent successfully.');
    }
}
