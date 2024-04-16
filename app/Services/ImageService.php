<?php

namespace App\Services;

use App\Models\Image;
use App\Models\Ticket;
use Carbon\Carbon;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Storage;

class ImageService
{
    public function processImage(Ticket $ticket, array $attachment): ?Image
    {
        $imageData = base64_decode($attachment['content']);
        $encryptedData = Crypt::encrypt($imageData);
        $filename = $this->generateFilename($attachment['name']);
        $dateFolder = Carbon::now()->format('y_m_d');
        $folderPath = 'tickets/' . $ticket->reference . '/images/' . $dateFolder;
        $fullPath = $folderPath . '/' . $filename;

        if (Storage::disk('private')->put($fullPath, $encryptedData)) {
            return new Image([
                'path' => $fullPath,
                'name' => $attachment['name'],
                'imageable_id' => $ticket->id,
                'imageable_type' => Ticket::class,
            ]);
        }

        return null;
    }

    protected function generateFilename($originalName): string
    {
        return uniqid() . '_' . $originalName;  // Ensure filenames are unique
    }
}
