<?php

namespace App\Mail;

use App\Models\Message;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SenderConfirmationMail extends Mailable
{
    use Queueable, SerializesModels;

    public $messageData;

    public function __construct(Message $messageData)
    {
        $this->messageData = $messageData;
    }

    public function build()
    {
        return $this->subject('Thank you for contacting us!')
            ->view('emails.sender_confirmation');
    }
}
