<?php


use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class ReservationNotification extends Notification
{
    use Queueable;

    protected $article;
    protected $action;

    public function __construct($article, $action)
    {
        $this->article = $article;
        $this->action = $action;
    }

    public function via($notifiable)
    {
        return ['database'];
    }

    public function toArray($notifiable)
    {
        return [
            'message' => "La réservation de l'article {$this->article->libelle} a été {$this->action}.",
            'article_id' => $this->article->id
        ];
    }
}