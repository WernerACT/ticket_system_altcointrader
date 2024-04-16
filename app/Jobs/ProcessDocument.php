<?php

namespace App\Jobs;

use App\Exceptions\DocumentProcessingException;
use App\Models\Ticket;
use App\Services\DocumentService;
use Exception;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;

class ProcessDocument implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $ticket;
    protected $attachment;


    /**
     * Create a new job instance.
     */
    public function __construct(Ticket $ticket, array $attachment)
    {
        $this->ticket = $ticket;
        $this->attachment = $attachment;
    }

    /**
     * Execute the job.
     * @throws DocumentProcessingException
     */
    public function handle(DocumentService $documentService): void
    {
        try {
            $document = $documentService->processDocument($this->ticket, $this->attachment);
            if ($document) {
                $document->save();
            }
        } catch (Exception $e) {
            Log::error("Failed to process and save document: " . $e->getMessage());
            throw new DocumentProcessingException("An error occurred processing the image. Ticket Reference: " . $this->ticket->reference);
        }
    }
}
