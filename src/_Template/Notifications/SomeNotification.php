<?php

namespace App\Units\%UnitHint%\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

use App\Units\_\Channels\UnitsChannel;

class SomeNotification extends Notification
{
    use Queueable;
    
    public $title;    

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->created = $created;
        $this->title = "Notificación";
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return [UnitsChannel::class, 'mail'];
    }


    public function toUnits($notifiable)
    {
        return [
            "title" => $this->title,
            "desc" => "",
            "link" => null
        ];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)
                    ->subject($this->title)
                    ->view('%UnitHint%::mail.some-notification');
    }
    
}
