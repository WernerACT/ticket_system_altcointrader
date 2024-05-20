<?php

namespace App\Http\Controllers\API\V1\Invokable;

use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\Request;

class DeactivateAgentController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request, User $user)
    {
        $user->tokens()->delete();

        return response()->json([
            'success' => true,
            'user' => new UserResource($user)
        ]);
    }
}
