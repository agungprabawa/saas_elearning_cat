<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\BroadcastMessage;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class RatingNotification extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public $rating_val;
    public $ownerType_;
    public $title;
    public function __construct($rating, $title, $ownerType)
    {
        $this->rating_val = $rating;
        $this->ownerType_ = $ownerType;
        $this->title = $title;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['database','broadcast'];
    }


    public function notifType(){
        return 'rating';
    }

    public function notifOwner()
    {
        return $this->rating_val->id_post;
    }

    public function ownerType()
    {
        return $this->ownerType_;
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
            'id'=> $notifiable->id,
            'type' => $notifiable->type,
            'data'=> '',
            'read_at'=>null,
        ];
    }

    public function toBroadcast($notifiable){
        return new BroadcastMessage([
            'id'=> $notifiable->id,
            'title' => $this->title,
            'type' => $notifiable->type,
            'data'=> $this->rating_val,
            'read_at'=>null,
        ]);
    }
}
