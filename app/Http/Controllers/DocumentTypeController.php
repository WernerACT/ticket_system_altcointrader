<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreDocumentTypeRequest;
use App\Http\Resources\DocumentTypeResource;
use App\Models\DocumentType;

class DocumentTypeController extends Controller
{
    public function index()
    {
        return DocumentTypeResource::collection(DocumentType::all());
    }

    public function store(StoreDocumentTypeRequest $request)
    {
        return new DocumentTypeResource(DocumentType::create($request->validated()));
    }

    public function show(DocumentType $documentType)
    {
        return new DocumentTypeResource($documentType);
    }

    public function update(StoreDocumentTypeRequest $request, DocumentType $documentType)
    {
        $documentType->update($request->validated());

        return new DocumentTypeResource($documentType);
    }

    public function destroy(DocumentType $documentType)
    {
        $documentType->delete();

        return response()->json();
    }
}
