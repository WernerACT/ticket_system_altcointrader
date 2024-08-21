<?php

namespace App\Console\Commands;

use App\Mail\TicketClosedMail;
use App\Models\Ticket;
use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;

class CloseStaleTickets extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:close-stale-tickets';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Automatically close tickets that have been in the 24 Hour Pre Closed status for over 24 hours';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        // Define the status IDs and the time limit
        $preClosedStatusId = 5;
        $closedStatusId = 6;
        $timeLimit = Carbon::now()->subHours(24);

        // Find tickets that are in the pre-closed status and haven't been updated in 24 hours
        $tickets = Ticket::where('status_id', $preClosedStatusId)
            ->where('updated_at', '<', $timeLimit)
            ->get();

        // Update the status of these tickets to 'Closed'
        foreach ($tickets as $ticket) {
            $ticket->status_id = $closedStatusId;
            $ticket->save();
        }

        $this->info('Stale tickets have been successfully closed.');
    }
}
