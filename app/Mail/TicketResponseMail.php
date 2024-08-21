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
     * @return void
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
        return $this->subject("AltCoinTrader Support | {$this->ticket->reference}")
            ->view('emails.ticket_response');
    }
}
