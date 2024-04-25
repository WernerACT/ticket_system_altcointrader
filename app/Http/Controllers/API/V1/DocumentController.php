<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\Document\StoreDocumentRequest;
use App\Http\Resources\DocumentResource;
use App\Models\Document;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class DocumentController extends Controller
{
    use AuthorizesRequests;

    public function index()
    {
        $this->authorize('viewAny', Document::class);

        return DocumentResource::collection(Document::all());
    }

    public function store(StoreDocumentRequest $request)
    {
        $this->authorize('create', Document::class);

        return new DocumentResource(Document::create($request->validated()));
    }

    public function show(Document $cannedResponse)
    {
        $this->authorize('view', $cannedResponse);

        return new DocumentResource($cannedResponse);
    }

    public function update(StoreDocumentRequest $request, Document $cannedResponse)
    {
        $this->authorize('update', $cannedResponse);

        $cannedResponse->update($request->validated());

        return new DocumentResource($cannedResponse);
    }

    public function destroy(Document $cannedResponse)
    {
        $this->authorize('delete', $cannedResponse);

        $cannedResponse->delete();

        return response()->json();
    }
}
