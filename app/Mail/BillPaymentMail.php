<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class BillPaymentMail extends Mailable
{
    use Queueable, SerializesModels;

    public $billPayment;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($billPayment)
    {
        $this->billPayment = $billPayment;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('paddipay.app@gmail.com', "Paddipay")->subject("Bill payment was successful!")
        ->view('mails.bill-payment')
        ->with([$this->billPayment]);
    }
}
