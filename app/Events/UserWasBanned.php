<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use App\User;

/**
 * Event that is triggered when a user is banned
 * 
 * @author Sean Loughrey <s.a.loughrey@gmail.com>
 */
class UserWasBanned
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    /**
     * The authenticated user to be banned
     *
     * @var User
     */
    public $user;

    /**
     * Create a new event instance.
     * 
     * @return void
     */
    public function __construct()
    {
        $this->user = auth()->user();
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new PrivateChannel('channel-name');
    }
}
