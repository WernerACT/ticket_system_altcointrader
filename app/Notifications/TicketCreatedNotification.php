<?php

namespace App\Notifications;

use App\Models\Ticket;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Illuminate\Support\Facades\Log;
use Throwable;

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

        // Determine the from email based on the department name
        $departmentFromEmail = $this->getDepartmentFromEmail($ticket->department->name);

        // Start building the email message
        $mailMessage = (new MailMessage)
            ->from($departmentFromEmail)
            ->subject($actTicketId . ' Created | AltCoinTrader Support Ticket')
            ->view('emails.ticket_created', ['ticket' => $ticket, 'actTicketId' => $actTicketId]);

        // If cc is not null, add cc recipients
        if (!empty($ticket->cc)) {
            $ccEmails = is_array($ticket->cc) ? $ticket->cc : json_decode($ticket->cc, true);  // Assuming it's stored as a JSON array
            $mailMessage->cc($ccEmails);
        }

        return $mailMessage;
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

    protected function getDepartmentFromEmail(string $departmentName): string
    {
        // Map department names to email addresses
        $fromEmails = [
            'Fraud' => 'fraud@altcointrader.co.za',
            'Support' => 'support@altcointrader.co.za',
            'Audit' => 'audits@altcointrader.co.za',
            'Metals' => 'metals@altcointrader.co.za',
        ];

        // Return the matched email or default to 'support@altcointrader.co.za'
        return $fromEmails[$departmentName] ?? 'support@altcointrader.co.za';
    }
}
