<?php

namespace App\Mail;

use App\Models\Investment;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class EndInvestmentMail extends Mailable
{
    use Queueable, SerializesModels;

    public $investment;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Investment $investment)
    {
        $this->investment = $investment;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        
        return $this->from('paddipay.app@gmail.com', "Paddipay")->subject("investment completed!")
        ->view('mails.end-investment')
        ->with([$this->investment]);
    }
}
