<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class MessageEvent extends Event implements ShouldBroadcast
{
    use InteractsWithSockets;

    public $message;
    public $created_at;

    /**
     * Create a new event instance.
     *
     * @param mixed $message
     * @param mixed $createdAt
     */
    public function __construct($message, $createdAt)
    {
        $this->message = $message;
        $this->created_at = $createdAt;
    }

    /**
     * {@inheritdoc}
     */
    public function broadcastOn()
    {
        return new Channel('stream_message');
    }

    //Custom broadcast message name
    public function broadcastAs()
    {
        return 'stream_message';
    }
}
