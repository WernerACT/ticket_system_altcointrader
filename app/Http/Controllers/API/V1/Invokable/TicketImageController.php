<?php

namespace App\Http\Controllers\API\V1\Invokable;

use App\Http\Controllers\Controller;
use App\Models\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Storage;


class TicketImageController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request, Image $image)
    {
        $content = Storage::disk('private')->get($image->path);
        $decryptedContent = Crypt::decrypt($content);
        $fileInfo = new \finfo(FILEINFO_MIME_TYPE);
        $mimeType = $fileInfo->buffer($decryptedContent);
        $base64 = base64_encode($decryptedContent);
        $imageSrc = 'data:' . $mimeType . ';base64,' . $base64;

        return response()->json([
            'success' => true,
            'image' => $imageSrc,
        ]);
    }
}
