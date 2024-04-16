<?php

namespace App\Jobs;

use App\Exceptions\ImageProcessingException;
use App\Models\Ticket;
use App\Services\ImageService;
use Exception;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;


class ProcessImage implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $ticket;
    protected $attachment;


    public function __construct(Ticket $ticket, array $attachment)
    {
        $this->ticket = $ticket;
        $this->attachment = $attachment;
    }

    /**
     * Execute the job.
     * @throws ImageProcessingException
     */
    public function handle(ImageService $imageService): void
    {
        try {
            $image = $imageService->processImage($this->ticket, $this->attachment);
            $image?->save();
        } catch (Exception $e) {
            Log::error("Failed to process and save image: " . $e->getMessage());
            throw new ImageProcessingException("An error occurred processing the image. Ticket Reference: " . $this->ticket->reference);
        }
    }
}
