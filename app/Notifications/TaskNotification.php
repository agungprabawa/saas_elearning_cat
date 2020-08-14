<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Messages\BroadcastMessage;
use Illuminate\Notifications\Notification;

class TaskNotification extends Notification implements ShouldQueue
{
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public $task, $title, $ownerType_;
    public function __construct($task)
    {
        $this->title = $task->title .' dari '.$task->courses->title;
        $this->task = $task;
        // $this->comment->put('type','comment');
    }


    public function notifType(){
        return 'task';
    }

    public function notifOwner()
    {
        return $this->task->id_task;
    }

    // tipe kusus untuk komentar, tipe elearning, assisted test atau announcement
    public function ownerType()
    {
        // return $this->ownerType_;
        return 4;
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
            'data'=> $this->task,
            'read_at'=>null,
        ];
    }

    public function toBroadcast($notifiable){
        return new BroadcastMessage([
            'id'=> $notifiable->id,
            'title' => $this->title,
            'type' => $notifiable->type,
            'data'=> $this->task,
            'read_at'=>null,
        ]);
    }
}
