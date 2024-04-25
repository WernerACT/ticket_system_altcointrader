<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreImageTypeRequest;
use App\Http\Resources\ImageTypeResource;
use App\Models\ImageType;

class ImageTypeController extends Controller
{
    public function index()
    {
        return ImageTypeResource::collection(ImageType::all());
    }

    public function store(StoreImageTypeRequest $request)
    {
        return new ImageTypeResource(ImageType::create($request->validated()));
    }

    public function show(ImageType $imageType)
    {
        return new ImageTypeResource($imageType);
    }

    public function update(StoreImageTypeRequest $request, ImageType $imageType)
    {
        $imageType->update($request->validated());

        return new ImageTypeResource($imageType);
    }

    public function destroy(ImageType $imageType)
    {
        $imageType->delete();

        return response()->json();
    }
}
