<?php

namespace App;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendEmail extends Mailable
{
    use Queueable, SerializesModels;
	 protected $email;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($email=[])
    {
        $this->email = $email;
		//dd($this->email);
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
		if($this->email['attachment'] != null)
		{
			return $this->view('reply')
                ->subject('Response Back')
                ->line($this->email['msg'])
                ->attach($this->email['attachment']->getRealPath(),
                [
                    'as' => $this->email['attachment']->getClientOriginalName(),
                    'mime' => $this->email['attachment']->getClientMimeType(),
                ]);
		}
        else
		{
			return $this->view('reply')
                ->subject('Response Back')
				->line($this->email['msg']);
		}
    }
}
