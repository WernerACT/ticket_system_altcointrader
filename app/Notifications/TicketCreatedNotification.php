<?php

namespace App\Notifications;

use App\Models\Ticket;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Illuminate\Support\Facades\Log;

class TicketCreatedNotification extends Notification
{
    use Queueable;

    protected $ticketId;

    /**
     * Create a new notification instance.
     */
    public function __construct($ticketId)
    {
        $this->ticketId = $ticketId;
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
    public function toMail($notifiable)
    {
        $ticket = Ticket::findOrFail($this->ticketId);
        $actTicketId = $ticket->reference;

        return (new MailMessage)
            ->subject(' Ticket Logged from AltCoinTrader Support. | Reference Number: ' . $actTicketId )
            ->view('emails.ticket_created', ['ticket' => $ticket, 'actTicketId' => $actTicketId]);
    }

    /**
     * Handle a job failure.
     *
     * @param  mixed  $notifiable
     * @param  \Throwable  $exception
     * @return void
     */
    public function failed($notifiable, Throwable $exception)
    {
        // Handle failure (e.g., log it or alert an administrator)
        Log::error("Failed to send notification: " . $exception->getMessage());
    }
}
