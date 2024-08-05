<?php

namespace App\Notifications;

use App\Models\AdminMessageModel;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class AdminMessageNotification extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     */
    private $messageData;

    public function __construct($messageData)
    {
        $this->messageData = $messageData;
    }

    public function via($notifiable)
    {
        return ['database'];
    }

    public function toDatabase($notifiable)
    {
        return [
            'name' => $this->messageData['name'],
            'email' => $this->messageData['email'],
            'subject' => $this->messageData['subject'],
            'message' => $this->messageData['message'],
        ];
    }
}
