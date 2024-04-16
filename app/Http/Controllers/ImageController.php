<?php

namespace App\Http\Controllers;

use App\Models\Image;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Storage;

class ImageController extends Controller
{
    public function index()
    {

    }

    public function show(Image $image)
    {
        $encryptedContent = Storage::disk('private')->get($image->path);

        $decryptedContent = Crypt::decrypt($encryptedContent);

        $fileInfo = new \finfo(FILEINFO_MIME_TYPE);
        $mimeType = $fileInfo->buffer($decryptedContent);

        return Response::make($decryptedContent, 200, [
            'Content-Type' => $mimeType,
            'Content-Disposition' => 'inline; filename="' . $image->name . '"'
        ]);
    }
}
