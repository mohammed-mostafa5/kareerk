<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class Notifications implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $data;
    public $sendTo;
    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($data)
    {
        $this->data = $data['data'];
        $this->sendTo = $data['send_to'];
    }


    public function broadcastOn()
    {
        return new Channel('notifications-admin');

    }

    public function broadcastAs()
    {
        switch ($this->sendTo) {
            case '0': return 'companies'; break;
            case '1': return 'pharmacies'; break;
            case '2': return 'members'; break;
            case '3': return 'syndicate'; break;
            default: return 'noWorking';
        }
    }
}
