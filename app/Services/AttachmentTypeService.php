<?php

namespace App\Services;

class AttachmentTypeService
{
    protected $imageExtensions;
    protected $documentExtensions;

    public function __construct()
    {
        $this->imageExtensions = config('attachments.images');
        $this->documentExtensions = config('attachments.documents');
    }

    public function getType($extension)
    {
        $extension = strtolower($extension);
        if (in_array($extension, $this->imageExtensions)) {
            return 'image';
        } elseif (in_array($extension, $this->documentExtensions)) {
            return 'document';
        }
        return 'unsupported';
    }

}
