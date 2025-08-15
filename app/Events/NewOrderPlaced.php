<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;
use App\Models\Order;

class NewOrderPlaced implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;
public $order;
    /**
     * Create a new event instance.
     */
    public function __construct($order)
    {
        $this->order=$order;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return array<int, \Illuminate\Broadcasting\Channel>
     */
    public function broadcastOn(): array
    {
        return [
            new Channel('admin-channel'),
        ];
    }
    public function broadcastAs()
    {
        return 'admin-event';
    }
    public function broadcastWith(): array
    {
        
        return [
            'id' => $this->order->id,
            'name' => $this->order->user->name,
            'total_price' => $this->order->total_price,
            'created_at' => $this->order->created_at->diffForHumans()
        ];
        
    }
}
