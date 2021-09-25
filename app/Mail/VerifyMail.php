<?php

namespace App\Mail;

use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class VerifyMail extends Mailable
{
    use Queueable, SerializesModels;

    public $user;
    public $email;
    public $verification_code;
    public $url;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(User $user, $verification_code, $url, $email)
    {
        $this->user = $user;
        $this->user->verification_code = $verification_code;
        $this->user->email = $email;
        $this->url = $url;

    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('paddipay.app@gmail.com', "Paddipay")->subject("Welcome to Paddipay, Verify your email")
        ->view('mails.verification')
        ->with([$this->user, $this->url]);
        // ->view('mails.verification')->with(["user"=>$this->user,"query"=>parse_url($this->url)['query']]);
    }
}
