<?php

namespace App\Mail;

use App\Models\Message;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ContactMessageMail extends Mailable
{
    use Queueable, SerializesModels;

    public $messageData;

    // কন্ট্রোলার থেকে পাঠানো মেসেজ অবজেক্টটি এখানে রিসিভ হবে
    public function __construct(Message $messageData)
    {
        $this->messageData = $messageData;
    }

    public function build()
    {
        return $this->subject('New Website Inquiry: ' . $this->messageData->name)
            ->view('emails.contact_message'); // এই ব্লেড ভিউটি নিচে তৈরি করছি
    }
}
