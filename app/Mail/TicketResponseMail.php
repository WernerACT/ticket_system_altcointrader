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
    public $body;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($ticket, $body)
    {
        $this->ticket = $ticket;
        $this->body = $body;
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
