<?php

namespace App\Http\Controllers\API\V1\Invokable;

use App\Http\Controllers\Controller;
use App\Http\Resources\DocumentResource;
use App\Http\Resources\ImageResource;
use App\Models\Image;
use App\Models\Ticket;
use Illuminate\Http\Request;

class TicketUploadController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request, Ticket $ticket)
    {
        $images = $ticket->images;
        $images->load('imageType');

        $documents = $ticket->documents;
        $documents->load('documentType');

        return response()->json([
            'success' => true,
            'images' => ImageResource::collection($images),
            'documents' => DocumentResource::collection($documents),
        ]);
    }
}
