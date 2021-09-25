<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class PinResetMail extends Mailable
{
    use Queueable, SerializesModels;

    public $email;
    public $token;
    public $user;
    public $url;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($email, $token, $user, $url)
    {
        $this->email = $email;
        $this->token = $token;
        $this->user = $user;
        $this->url = $url;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('paddipay.app@gmail.com', "Paddipay")->subject("Forgot Transaction Pin")
        ->view('mails.forgot-pin')
        ->with(['email' => $this->email, 'token' => $this->token, 'user' => $this->user, 'url' => $this->url]);
    }
}
