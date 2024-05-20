<?php

namespace App\Http\Controllers\API\V1\Invokable;

use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\Request;

/**
 * ActivateAgentController class.
 *
 * @package App\Http\Controllers
 */
class ActivateAgentController extends Controller
{
    /**
     * Generate an API token for an existing user..
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\User $user
     * @return \Illuminate\Http\JsonResponse
     */
    public function __invoke(Request $request, User $user)
    {
        $token = $user->createToken('Support');

        return response()->json([
            'success' => true,
            'user' => new UserResource($user),
            'token' => $token->plainTextToken,
        ]);
    }
}
