<?php

namespace App\Mail;

use App\Models\Investment;
use App\Models\Package;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class StartInvestmentMail extends Mailable
{
    use Queueable, SerializesModels;

    public $investment;
    public $package;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Investment $investment, Package $package)
    {
        $this->investment = $investment;
        $this->package = $package;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('paddipay.app@gmail.com', "Paddipay")->subject("Investment Subscription")
        ->view('mails.start-investment')
        ->with([$this->investment, $this->package]);
    }
}
