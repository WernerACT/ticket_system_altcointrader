<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class TicketResponseMail extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;

    public $ticket;
    public $response;
    public $links;

    /**
     * Create a new message instance.
     *
     * @param $ticket
     * @param $response
     * @param array $links
     */
    public function __construct($ticket, $response, $links = [])
    {
        $this->ticket = $ticket;
        $this->response = $response;
        $this->links = $links;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        // Determine the from email based on the department name
        $fromEmail = $this->getDepartmentFromEmail($this->ticket->department->name);

        // Start building the email message
        $mail = $this->from($fromEmail)  // Set the dynamic from address
        ->subject("{$this->ticket->reference} Response | AltCoinTrader Support")
            ->view('emails.ticket_response');

        // If cc is not empty, add cc recipients
        if (!empty($this->ticket->cc)) {
            $ccEmails = is_array($this->ticket->cc) ? $this->ticket->cc : json_decode($this->ticket->cc, true);
            $mail->cc($ccEmails);
        }

        return $mail;
    }

    /**
     * Determine the from email based on department name.
     *
     * @param string $departmentName
     * @return string
     */
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
