<?php

namespace App\Events;

use Iluminate\Broadcasting\Channel;
use Iluminate\Broadcasting\InteractsWithSockets;
use Iluminate\Broadcasting\PresenceChannel;
use Iluminate\Broadcasting\PrivateChannel;
use Iluminate\Contracts\Broadcasting\ShouldBroadcast;
use Iluminate\Foundation\Events\Dispatchable;
use Iliminate\Queue\SerializesModels;
use App\Models\ChatMessage; 

class NewChatMessage implements ShouldBroadcast
{

    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $chatMessage; 

    public function __construct( ChatMessage $chatMessage)
    {
        $this->chatMessage = $chatMessage;
    } 

    public function broadcastOn()
    {
        return new PrivateChannel('chat.'. $this->chatMessage->chat_room_id );
    }


}