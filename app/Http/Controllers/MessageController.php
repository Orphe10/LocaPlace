<?php

namespace App\Http\Controllers;

use App\Models\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\MessageRequest;
use App\Notifications\MessageNotification;
use Illuminate\Support\Facades\Notification;

class MessageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    public function getNotifications()
    {
        $user = Auth::user();
        $notifications = $user->notifications;

        return view('agence.notification', compact('notifications'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(MessageRequest $request)
    {
        // Enregistrer le message dans la base de données (si nécessaire)
        Message::create($request->only(['nom', 'email', 'message']));

        // Envoyer la notification à l'utilisateur
        $user = Auth::user();
        $messageData = [
            'nom' => $request->input('nom'),
            'message' => $request->input('message'),
        ];
        Notification::send($user, new MessageNotification($messageData));

        return redirect()->back()->with('success', 'Message envoyé avec succès.');
    }

    public function markAllAsRead()
    {
        $user = Auth::user();
        $user->unreadNotifications->markAsRead();

        return redirect()->back();
    }
    /**
     * Display the specified resource.
     */
    public function show(Message $message)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Message $message)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Message $message)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Message $message)
    {
        //
    }
}
