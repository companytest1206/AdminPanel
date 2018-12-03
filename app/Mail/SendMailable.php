<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendMailable extends Mailable
{
    use Queueable, SerializesModels;
	protected $id;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($id)
    {
        $this->args = $id;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
		$inv = $this->args;
        return $this->view('email')->subject('Invoice Mailed')->attach(storage_path().'\app\pdfs'.'\invoice'.$inv.'.pdf');
    }
}
