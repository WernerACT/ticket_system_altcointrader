<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class ProcessUploads extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'uploads:process-uploads';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Complete Processing Uploads';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        exec("chown -R dev.www-data /var/www/ticket_system_altcointrader/storage/app/private/tickets");
        exec("chmod -R 775 /var/www/ticket_system_altcointrader/storage/app/private/tickets");

        $this->info('Permissions fixed for stored files.');
    }
}
