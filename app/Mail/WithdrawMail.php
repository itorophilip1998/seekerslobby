<?php

namespace App\Mail;

use App\Models\Withdraw;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class WithdrawMail extends Mailable
{
    use Queueable, SerializesModels;

    public $withdraw;
    public $user;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($withdraw, $user)
    {
        $this->withdraw = $withdraw;
        $this->user = $user;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('paddipay.app@gmail.com', "Paddipay")->subject("Withdrawal Notification")
        ->view('mails.withdraw')
        ->with([$this->withdraw, $this->user]);
    }
}
