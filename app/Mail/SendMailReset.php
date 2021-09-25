<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SendMailReset extends Mailable
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
    public function __construct($user, $email, $token, $url)
    {
        $this->user = $user;
        $this->token = $token;
        $this->email = $email;
        $this->url = $url;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('paddipay.app@gmail.com', "Paddipay")->subject("Forgot Password")
        ->view('mails.forgot-password')
        ->with([$this->user, $this->url, $this->token, $this->email,]);
    }
}
