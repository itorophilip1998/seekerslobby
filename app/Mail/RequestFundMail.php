<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class RequestFundMail extends Mailable
{
    use Queueable, SerializesModels;

    public $requestfund;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($requestfund)
    {
        $this->requestfund = $requestfund;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('paddipay.app@gmail.com', "Paddipay")->subject("Fund Request")
        ->view('mails.request-fund')
        ->with([$this->requestfund]);
    }
}
