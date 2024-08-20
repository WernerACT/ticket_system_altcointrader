<?php

namespace App\Http\Controllers\API\V1\Invokable;

use App\Http\Controllers\Controller;
use App\Models\Document;
use Illuminate\Http\Request;

class UpdateDocumentController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Document $document, Request $request)
    {
        // Validate the request data
        $validatedData = $request->validate([
            'document_type_id' => 'required|integer|exists:document_types,id',
            'is_valid' => 'required|boolean',
        ]);

        $document->update($validatedData);

        $document->save();

        return response()->json([
            'success' => true,
        ]);
    }
}
