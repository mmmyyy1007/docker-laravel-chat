<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Queue\SerializesModels;

class MessageSent implements ShouldBroadcast
{
    use InteractsWithSockets, SerializesModels;

    public $username;
    public $message;

    /**
     * Create a new event instance.
     */
    public function __construct($username, $message)
    {
        $this->username = $username;
        $this->message = $message;
    }

    /**
     * Get the channels the event should broadcast on.
     */
    public function broadcastOn(): array
    {
        // return ['chat'];
        return [new Channel('chat')];
    }

    /**
     * The data to broadcast.
     */
    public function broadcastWith(): array
    {
        return [
            'username' => $this->username,
            'message' => $this->message,
        ];
    }
}
