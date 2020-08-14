<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\BroadcastMessage;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class AnnouncementNotification extends Notification implements ShouldQueue
{
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public $announcement, $title, $ownerType_;
    public function __construct($announcement)
    {
        $this->title = $announcement->title;
        $this->announcement = $announcement;
        // $this->comment->put('type','comment');
    }


    public function notifType(){
        return 'announcement';
    }

    public function notifOwner()
    {
        return $this->announcement->id_ann;
    }

    // tipe kusus untuk komentar, tipe elearning, assisted test atau announcement
    public function ownerType()
    {
        // return $this->ownerType_;
        return 3;
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
            'title' => $this->title,
            'type' => $notifiable->type,
            'data'=> $this->announcement,
            'read_at'=>null,
        ];
    }

    public function toBroadcast($notifiable){
        return new BroadcastMessage([
            'id'=> $notifiable->id,
            'title' => $this->title,
            'type' => $notifiable->type,
            'data'=> $this->announcement,
            'read_at'=>null,
        ]);
    }
}
