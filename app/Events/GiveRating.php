<?php

namespace App\Events;

use App\Models\OtherData\RatingsModel;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class GiveRating implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public $to;
    public $rating;
    public $isUpdate;
    public function __construct(RatingsModel $rating, $to, $isUpdate = 0)
    {
        $this->to = $to;
        $this->rating = $rating;
        $this->isUpdate = $isUpdate;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new PresenceChannel('channel-'.$this->to);
    }

    public function broadcastAs(){
        return 'giverating';
    }
}
