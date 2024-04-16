<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class UnsupportedFileTypeNotification extends Notification
{
    public function __construct($fileType)
    {
        $this->fileType = $fileType;
    }

    public function via($notifiable)
    {
        return ['mail'];
    }

    public function toMail($notifiable): MailMessage
    {
        return (new MailMessage)
            ->subject('Email Received by AltCoinTrader with an unsupported attachment')
            ->view(
                'emails.unsupported_file_type',
                ['fileType' => $this->fileType]
            );
    }
}
