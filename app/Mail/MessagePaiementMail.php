<?php

namespace App\Mail;

use App\Models\Article;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class MessagePaiementMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     */
    public $article;
    public function __construct(Article $article)
    {
        $this->article = $article;
    }

     /**
     * Build the message.
     */
    public function build()
    {
        return $this->markdown('agence.emails.message')
                    ->subject('Article loué')
                    ->with(['article' => $this->article]);
    }
}
