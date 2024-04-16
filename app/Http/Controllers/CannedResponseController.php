<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCannedResponseRequest;
use App\Http\Resources\CannedResponseResource;
use App\Models\CannedResponse;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class CannedResponseController extends Controller
{
    use AuthorizesRequests;

    public function index()
    {
        $this->authorize('viewAny', CannedResponse::class);

        return CannedResponseResource::collection(CannedResponse::all());
    }

    public function store(StoreCannedResponseRequest $request)
    {
        $this->authorize('create', CannedResponse::class);

        return new CannedResponseResource(CannedResponse::create($request->validated()));
    }

    public function show(CannedResponse $cannedResponse)
    {
        $this->authorize('view', $cannedResponse);

        return new CannedResponseResource($cannedResponse);
    }

    public function update(StoreCannedResponseRequest $request, CannedResponse $cannedResponse)
    {
        $this->authorize('update', $cannedResponse);

        $cannedResponse->update($request->validated());

        return new CannedResponseResource($cannedResponse);
    }

    public function destroy(CannedResponse $cannedResponse)
    {
        $this->authorize('delete', $cannedResponse);

        $cannedResponse->delete();

        return response()->json();
    }
}
