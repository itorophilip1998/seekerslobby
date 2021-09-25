<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class ContactReplyMail extends Mailable
{
    use Queueable, SerializesModels;

    public $contact_reply;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($contact_reply)
    {
        $this->contact_reply = $contact_reply;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {

        $mail= $this->from($this->contact_reply['subject'])
        ->subject($this->contact_reply['subject'])
        ->with('contact_reply', $this->contact_reply)
        ->view('mails.contact-reply')->with('contact_reply', $this->contact_reply);
        return response()->json(['message'=>'Mail sent successfully!',$mail], 200);
    }
}
