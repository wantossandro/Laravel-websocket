<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class GetBalanceByUsernameEvent implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;
    public $data;
    public $userId;
    
    public function __construct($data, $userId)
    {
        $this->data = $data;
        $this->userId = $userId;
    }

    public function broadcastOn(): array
    {
        return [
            new Channel('channel-balance-' . $this->userId),
        ];
    }

    public function broadcastAs()
    {
        return 'balanceuser';
    }
}
