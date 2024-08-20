<?php

namespace App\Http\Controllers\API\V1\Invokable;

use App\Http\Controllers\Controller;
use App\Http\Resources\ImageResource;
use App\Models\Image;
use Illuminate\Http\Request;

class UpdateImageController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Image $image, Request $request)
    {
        // Validate the request data
        $validatedData = $request->validate([
            'image_type_id' => 'required|integer|exists:image_types,id',
            'is_valid' => 'required|boolean',
        ]);

        $image->update($validatedData);

        $image->save();

        return response()->json([
            'success' => true,
        ]);
    }
}
