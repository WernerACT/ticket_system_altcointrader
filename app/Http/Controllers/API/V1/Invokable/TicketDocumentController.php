<?php

namespace App\Http\Controllers\API\V1\Invokable;

use App\Http\Controllers\Controller;
use App\Http\Resources\DocumentResource;
use App\Models\Document;
use App\Models\DocumentType;
use App\Models\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Storage;


class TicketDocumentController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request, Document $document)
    {
        // Retrieve the encrypted content from storage
        $content = Storage::disk('private')->get($document->path);

        // Decrypt the content
        $decryptedContent = Crypt::decrypt($content);

        // Determine the MIME type (in this case, it's always a PDF)
        $mimeType = 'application/pdf';

        // Encode the content as base64
        $base64 = base64_encode($decryptedContent);

        // Create the data URL format for the PDF
        $pdfSrc = 'data:' . $mimeType . ';base64,' . $base64;

        $documentTypes = DocumentType::all();

        // Return the response as JSON
        return response()->json([
            'success' => true,
            'document' => $pdfSrc,
            'is_valid' => $document->is_valid,
            'document_type' => $document->documentType,
            'document_types' => DocumentResource::collection($documentTypes)
        ]);
    }
}
