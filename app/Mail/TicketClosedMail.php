<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class TicketClosedMail extends Mailable
{
    use Queueable, SerializesModels;

    public $ticket;

    /**
     * Create a new message instance.
     */
    public function __construct($ticket)
    {
        $this->ticket = $ticket;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        // Get department email and name
        $departmentFrom = $this->getDepartmentFromEmail($this->ticket->department->name);

        // Build the email with dynamic from name and email
        return $this->from($departmentFrom['email'], $departmentFrom['name'])  // Set both email and name dynamically
        ->subject("{$this->ticket->reference} Closed | AltCoinTrader Support")
            ->view('emails.ticket_closed');
    }

    /**
     * Determine the from email and name based on department name.
     *
     * @param string $departmentName
     * @return array
     */
    protected function getDepartmentFromEmail(string $departmentName): array
    {
        // Map department names to email addresses and display names
        $fromEmails = [
            'Fraud' => ['email' => 'fraud@altcointrader.co.za', 'name' => 'AltCoinTrader Fraud'],
            'Support' => ['email' => 'support@altcointrader.co.za', 'name' => 'AltCoinTrader Support'],
            'Audit' => ['email' => 'audits@altcointrader.co.za', 'name' => 'AltCoinTrader Audits'],
            'Metals' => ['email' => 'metals@altcointrader.co.za', 'name' => 'AltCoinTrader Metals'],
        ];

        // Return the matched email and name or default to 'AltCoinTrader Support'
        return $fromEmails[$departmentName] ?? ['email' => 'support@altcointrader.co.za', 'name' => 'AltCoinTrader Support'];
    }
}
