<?php

namespace App\Mail;

use App\Models\Deposit;
use App\Models\User;
use App\Models\Account;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class DepositMail extends Mailable
{
    use Queueable, SerializesModels;

    public $deposit;
    public $user;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($deposit, $user)
    {
        $this->deposit = $deposit;
        $this->user = $user;
        $this->user->accounts->balance = $user->accounts->balance;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('paddipay.app@gmail.com', "Paddipay")->subject("Deposit made successfully!")
        ->view('mails.deposit')
        ->with([$this->deposit, $this->user->accounts->balance]);
    }
}
