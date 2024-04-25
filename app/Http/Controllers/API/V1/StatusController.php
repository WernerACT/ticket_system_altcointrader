<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\Status\StoreStatusRequest;
use App\Http\Resources\StatusResource;
use App\Models\Status;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class StatusController extends Controller
{
    use AuthorizesRequests;

    public function index()
    {
        $this->authorize('viewAny', Status::class);

        return StatusResource::collection(Status::all());
    }

    public function store(StoreStatusRequest $request)
    {
        $this->authorize('create', Status::class);

        return new StatusResource(Status::create($request->validated()));
    }

    public function show(Status $cannedResponse)
    {
        $this->authorize('view', $cannedResponse);

        return new StatusResource($cannedResponse);
    }

    public function update(StoreStatusRequest $request, Status $cannedResponse)
    {
        $this->authorize('update', $cannedResponse);

        $cannedResponse->update($request->validated());

        return new StatusResource($cannedResponse);
    }

    public function destroy(Status $cannedResponse)
    {
        $this->authorize('delete', $cannedResponse);

        $cannedResponse->delete();

        return response()->json();
    }
}
