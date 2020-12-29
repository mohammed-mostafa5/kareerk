<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ChargeYourBalanceMail extends Mailable
{
    use Queueable, SerializesModels;

    public $product;
    public $owner;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($product, $owner)
    {
        $this->product = $product;
        $this->owner = $owner;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('emails.charge_balance');
    }
}
