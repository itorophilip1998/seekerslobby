<?php

namespace App\Mail;

use App\Models\Contact;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class ContactMail extends Mailable
{
    use Queueable, SerializesModels;

    public $data;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Contact $data)
    {
        $this->data = $data;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {

        $mail= $this->from('paddipay.app@gmail.com')
        ->subject($this->data['subject'])
        ->with('data', $this->data)
        ->view('mails.contact')->with('data', $this->data);
        return response()->json(['message'=>'Mail sent successfully!',$mail], 200);
    }
}
