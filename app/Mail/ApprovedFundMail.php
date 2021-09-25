<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ApprovedFundMail extends Mailable
{
    use Queueable, SerializesModels;

    public $approve_fund;
    public $user_profit;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($approve_fund, $user_profit)
    {
        $this->approve_fund = $approve_fund;
        $this->user_profit = $user_profit;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('paddipay.app@gmail.com', "Paddipay")->subject("Approved Fund Request")
        ->view('mails.approve-fund')
        ->with([$this->approve_fund, $this->user_profit]);
    }
}
