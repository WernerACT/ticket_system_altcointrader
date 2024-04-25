<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\Image\StoreImageRequest;
use App\Http\Resources\ImageResource;
use App\Models\Image;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class ImageController extends Controller
{
    use AuthorizesRequests;

    public function index()
    {
        $this->authorize('viewAny', Image::class);

        return ImageResource::collection(Image::all());
    }

    public function store(StoreImageRequest $request)
    {
        $this->authorize('create', Image::class);

        return new ImageResource(Image::create($request->validated()));
    }

    public function show(Image $cannedResponse)
    {
        $this->authorize('view', $cannedResponse);

        return new ImageResource($cannedResponse);
    }

    public function update(StoreImageRequest $request, Image $cannedResponse)
    {
        $this->authorize('update', $cannedResponse);

        $cannedResponse->update($request->validated());

        return new ImageResource($cannedResponse);
    }

    public function destroy(Image $cannedResponse)
    {
        $this->authorize('delete', $cannedResponse);

        $cannedResponse->delete();

        return response()->json();
    }
}
