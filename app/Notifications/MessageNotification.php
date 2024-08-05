<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Notification;
use Illuminate\Notifications\Messages\DatabaseMessage;

class MessageNotification extends Notification implements ShouldQueue
{
    use Queueable;

    private $msg;

    public function __construct($message)
    {
        $this->msg = $message;
    }

    public function via($notifiable)
    {
        return ['database'];
    }

    public function toDatabase($notifiable)
    {
        return [
            'nom' => $this->msg['nom'],
            'message' => $this->msg['message'],
        ];
    }
}
