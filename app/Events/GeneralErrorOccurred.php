<?php

namespace App\Events;

use Exception;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class GeneralErrorOccurred
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public Exception $exception;

    /**
     * Create a new event instance.
     */
    public function __construct(Exception $exception)
    {
        $this->exception = $exception;
    }
}
