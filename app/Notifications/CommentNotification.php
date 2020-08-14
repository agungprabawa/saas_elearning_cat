<?php

namespace App\Notifications;

use App\Models\CommentsModel;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\BroadcastMessage;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class CommentNotification extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public $comment, $title, $ownerType_;
    public function __construct($comment, $title, $ownerType)
    {
        $this->title = $title;
        $this->comment = $comment;
        $this->ownerType_ = $ownerType;

        // $this->comment->put('type','comment');
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
        return 'comment';
    }

    public function notifOwner()
    {
//        return $this->comment->id_post.'c';
        return $this->comment->id_post;
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
            'data'=> $this->comment,
            'read_at'=>null,
        ];
    }

    public function toBroadcast($notifiable){
        return new BroadcastMessage([
            'id'=> $notifiable->id,
            'title' => $this->title,
            'type' => $notifiable->type,
            'data'=> $this->comment,
            'read_at'=>null,
        ]);
    }
}
