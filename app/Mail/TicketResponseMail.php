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
        // Get department email and name
        $departmentFrom = $this->getDepartmentFromEmail($this->ticket->department->name);

        // Start building the email message
        $mail = $this->from($departmentFrom['email'], $departmentFrom['name'])
        ->subject("{$this->ticket->reference} Response | AltCoinTrader " . $this->ticket->department->name)
            ->view('emails.ticket_response');

        // If cc is not empty, add cc recipients
        if (!empty($this->ticket->cc)) {
            $ccEmails = is_array($this->ticket->cc) ? $this->ticket->cc : json_decode($this->ticket->cc, true);
            $mail->cc($ccEmails);
        }

        return $mail;
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
