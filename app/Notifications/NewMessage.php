<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use App\User;

class NewMessage extends Notification implements ShouldQueue
{
    use Queueable;
	public $fromUser;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(User $user)
    {
        $this->fromUser = $user;
    }

    
    public function via($notifiable)
    {
		return ['mail'];
    }

    
    public function toMail($notifiable)
    {
		$subject = sprintf('%s: You\'ve got a new message from %s!', config('app.name'), $this->fromUser->name);
        $greeting = sprintf('Hello %s!', $notifiable->name);
 
        return (new MailMessage)
                    ->subject($subject)
                    ->greeting($greeting)
                    ->salutation('Yours Faithfully '.$this->fromUser->name .'!')
                    ->line('CV has been sended in email.')
                    ->line('Thank you!');
    }

    
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
