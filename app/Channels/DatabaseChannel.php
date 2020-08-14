<?php

namespace App\Channels;

use Illuminate\Notifications\Channels\DatabaseChannel as IlluminateDatabaseChannel;
use Illuminate\Notifications\Notification;

class DatabaseChannel extends IlluminateDatabaseChannel
{
    /**
     * Send the given notification.
     *
     * @param mixed                                  $notifiable
     * @param \Illuminate\Notifications\Notification $notification
     *
     * @return array
     */
    public function buildPayload($notifiable, Notification $notification)
    {
        return [
            'id' => $notification->id,
            'id_company' => auth()->user()->active_session,
            'type' => get_class($notification),
            'data' => $this->getData($notifiable, $notification),
            'read_at' => null,
            'notif_type' => $notification->notifType(),
            'notif_owner' => $notification->notifOwner(),
            'owner_type' => $notification->ownerType(),
            'created_by' => auth()->id(),
        ];
    }
}
