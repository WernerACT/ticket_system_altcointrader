<?php

namespace App\Services;

use App\Models\Document;
use App\Models\Image;
use App\Models\Ticket;

class AttachedImageService
{
    public function save(Ticket $ticket, $attachments)
    {
        foreach ($attachments as $attachment) {
            if ($this->isImage($attachment->getExtension())) {
                Image::create([
                    'path' => $attachment->saveAttachmentToDisk(),
                    'imageable_id' => $ticket->id,
                    'imageable_type' => Ticket::class,
                ]);
            }
        }
    }

    private function isImage($extension): bool
    {
        return in_array(strtolower($extension), ['jpg', 'jpeg', 'png']);
    }
}
