<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class UnsupportedFileTypeDetected
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $email;
    public $fileType;

    public function __construct($email, $fileType)
    {
        $this->email = $email;
        $this->fileType = $fileType;
    }
}
