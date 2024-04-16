<?php

namespace App\Services;

use App\Models\Document;
use App\Models\Ticket;
use Carbon\Carbon;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Storage;

class DocumentService
{
    public function processDocument(Ticket $ticket, $attachment): ?Document
    {
        $fileData = base64_decode($attachment['content']);
        $encryptedData = Crypt::encrypt($fileData);
        $filename = $this->generateFilename($attachment['name']);
        $dateFolder = Carbon::now()->format('y_m_d');
        $folderPath = 'tickets/' . $ticket->reference . '/documents/' . $dateFolder;
        $fullPath = $folderPath . '/' . $filename;

        if (Storage::disk('private')->put($fullPath, $encryptedData)) {
            return new Document([
                'path' => $fullPath,
                'name' => $attachment['name'],
                'documentable_id' => $ticket->id,
                'documentable_type' => Ticket::class,
            ]);
        }

        return null;
    }

    protected function generateFilename($originalName): string
    {
        return uniqid() . '_' . $originalName;
    }
}
