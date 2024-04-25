<?php

namespace App\Http\Controllers;

use App\Http\Requests\Response\StoreResponseRequest;
use App\Http\Resources\ResponseResource;
use App\Models\Response;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class ResponseController extends Controller
{
    use AuthorizesRequests;

    public function index()
    {
        $this->authorize('viewAny', Response::class);

        return ResponseResource::collection(Response::all());
    }

    public function store(StoreResponseRequest $request)
    {
        $this->authorize('create', Response::class);

        return new ResponseResource(Response::create($request->validated()));
    }

    public function show(Response $response)
    {
        $this->authorize('view', $response);

        return new ResponseResource($response);
    }

    public function update(StoreResponseRequest $request, Response $response)
    {
        $this->authorize('update', $response);

        $response->update($request->validated());

        return new ResponseResource($response);
    }

    public function destroy(Response $response)
    {
        $this->authorize('delete', $response);

        $response->delete();

        return response()->json();
    }
}
