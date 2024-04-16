<?php

namespace App\Notifications;

use Exception;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class ReportErrorNotification extends Notification
{
    use Queueable;

    public $error;
    public $context;

    /**
     * Create a new notification instance.
     */
    public function __construct($error, $context = [])
    {
        $this->error = $error;
        $this->context = $context;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {
        $errorMessage = $this->error instanceof Exception ? $this->error->getMessage() : $this->error;
        $errorFile = $this->error instanceof Exception ? ' in ' . $this->error->getFile() : '';
        $errorLine = $this->error instanceof Exception ? ' on line ' . $this->error->getLine() : '';

        return (new MailMessage)
            ->subject('Error Report from Your Application')
            ->line('An error has occurred in your application:')
            ->line($errorMessage . $errorFile . $errorLine)
            ->line('Error Context: ' . json_encode($this->context))
            ->action('Go to Dashboard', url('/'))
            ->line('Thank you for your attention.');
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            'error' => $this->error,
            'context' => $this->context,
        ];
    }
}
