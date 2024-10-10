<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Services\ImageBackupService;
use App\Models\Image;

class BackupImages extends Command
{
    /**
     * The name and signature of the console command.
     */
    protected $signature = 'images:backup {--limit=10}'; // Option to limit the number of images

    /**
     * The console command description.
     */
    protected $description = 'Backup images by saving them as blobs in the database';

    protected $imageBackupService;

    /**
     * Create a new command instance.
     */
    public function __construct(ImageBackupService $imageBackupService)
    {
        parent::__construct();
        $this->imageBackupService = $imageBackupService;
    }

    /**
     * Execute the console command.
     */
    public function handle(): void
    {
        // Get the limit from the command option (default is 10)
        $limit = (int) $this->option('limit');

        // Get limited number of images that haven't been backed up yet
        $images = Image::where('is_backed_up', false)
            ->limit($limit)
            ->get();

        // Check if there are any images to backup
        if ($images->isEmpty()) {
            $this->info('No images to backup.');
            return;
        }

        // Backup each image
        foreach ($images as $image) {
            try {
                $this->imageBackupService->backupImage($image);
                $this->info('Backed up image ID: ' . $image->id);
            } catch (\Exception $e) {
                $this->error('Failed to backup image ID: ' . $image->id . '. Error: ' . $e->getMessage());
                // Continue with the next image, don't stop the process
            }
        }

        $this->info('Processed ' . count($images) . ' images in this run.');
    }
}
