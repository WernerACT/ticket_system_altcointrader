<?php

namespace App\Services;

use App\Events\UnsupportedFileTypeDetected;
use App\Jobs\ProcessDocument;
use App\Jobs\ProcessImage;
use Illuminate\Support\Facades\Log;

class AttachmentService
{
    protected $attachmentTypeService;

    public function __construct(AttachmentTypeService $attachmentTypeService)
    {
        $this->attachmentTypeService = $attachmentTypeService;
    }

    public function handleAttachments($ticket, $attachments)
    {
        foreach ($attachments as $attachment) {
            $fileType = $this->getFileType($attachment['type'], $attachment['name']);

            switch ($fileType) {
                case 'image':
                    ProcessImage::dispatch($ticket, $attachment);
                    break;
                case 'document':
                    ProcessDocument::dispatch($ticket, $attachment);
                    break;
                default:
                    Log::info("Unsupported file type: " . $attachment['type']);
                    event(new UnsupportedFileTypeDetected($ticket->email, $attachment['type']));
                    break;
            }
        }
    }

    public function getFileType($mimeType, $fileName): string
    {
        $extension = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));

        if ($this->isSupportedFileType($mimeType, $extension, $this->imageMimeTypes())) {
            return 'image';
        }

        if ($this->isSupportedFileType($mimeType, $extension, $this->documentMimeTypes())) {
            return 'document';
        }

        return 'unsupported';
    }

    protected function imageMimeTypes(): array
    {
        return [
            'image/jpeg' => ['jpg', 'jpeg'],
            'image/png' => ['png']
        ];
    }

    protected function documentMimeTypes(): array
    {
        return [
            'application/pdf' => ['pdf']
        ];
    }

    protected function isSupportedFileType($mimeType, string $extension, array $supportedTypes): bool
    {
        return isset($supportedTypes[$mimeType]) && in_array($extension, $supportedTypes[$mimeType]);
    }

}


