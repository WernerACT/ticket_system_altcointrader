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

        // Get department email and name
        $departmentFrom = $this->getDepartmentFromEmail($ticket->department->name);

        // Start building the email message
        $mailMessage = (new MailMessage)
            ->from($departmentFrom['email'], $departmentFrom['name']) // Use both email and name
            ->subject($actTicketId . ' Created | AltCoinTrader ' . $ticket->department->name . 'Ticket')
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
    public function failed($notifiable, Throwable $exception): void
    {
        // Handle failure (e.g., log it or alert an administrator)
        Log::error("Failed to send notification: " . $exception->getMessage());
    }

    /**
     * Get department email and name based on the department name.
     *
     * @param  string  $departmentName
     * @return array
     */
    protected function getDepartmentFromEmail(string $departmentName): array
    {
        // Map department names to email addresses and display names
        $fromEmails = [
            'Fraud' => ['email' => 'fraud@altcointrader.co.za', 'name' => 'AltCoinTrader Fraud'],
            'Support' => ['email' => 'support@altcointrader.co.za', 'name' => 'AltCoinTrader Support'],
            'Audits' => ['email' => 'audits@altcointrader.co.za', 'name' => 'AltCoinTrader Audits'],
            'Metals' => ['email' => 'metals@altcointrader.co.za', 'name' => 'AltCoinTrader Metals'],
        ];

        // Default to 'AltCoinTrader Support' if no department is matched
        return $fromEmails[$departmentName] ?? ['email' => 'support@altcointrader.co.za', 'name' => 'AltCoinTrader Support'];
    }
}
