<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use App\User;

class ReplyBackToSender extends Notification
{
    use Queueable;
	public $sender;
	public $email;
    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(User $user, $email)
    {
        $this->sender= $user;
        $this->email= $email;
		//dd($this->email['attachment']);
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        $subject = sprintf('%s: You\'ve got a new message from %s!', config('app.name'), $this->sender->name);
        $greeting = sprintf('Hello %s!', $notifiable->name);
 		
		if($this->email['attachment'] == null)
		{
			return (new MailMessage)
                    ->subject($subject)
                    ->greeting($greeting)
                    ->salutation('Admin ('.$this->sender->name .')')
                    ->line($this->email['msg']);
		}
		else
		{
			return (new MailMessage)
                    ->subject($subject)
                    ->salutation('Admin ('.$this->sender->name .')')
                    ->line($this->email['msg'])
				 	->greeting($greeting)
					->attach($this->email['attachment']->getRealPath(),
                	[
                    	'as' => $this->email['attachment']->getClientOriginalName(),
                    	'mime' => $this->email['attachment']->getClientMimeType(),
					]);
		}
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
