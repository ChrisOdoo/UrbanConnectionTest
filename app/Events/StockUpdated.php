<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\ShouldBroadcast;
use Illuminate\Contracts\Broadcasting\ShouldBroadcastNow;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class StockUpdated implements ShouldBroadcastNow
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $productId;
    public $newStock;

    /**
     * Create a new event instance.
     */
    public function __construct($productId, $newStock)
    {
        $this->productId = $productId;
        $this->newStock = $newStock;
    }

    
    public function broadcastOn()
    {
        info("🚀 Evento enviado: Producto ID {$this->productId}, Nuevo stock: {$this->newStock}");
        return new Channel('stock-channel');
    }

   
    public function broadcastAs()
    {
        return 'StockUpdated';
    }
}

