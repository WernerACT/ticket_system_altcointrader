<?php

namespace App\Http\Controllers\API\V1\Invokable;

use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\Request;
use Laravel\Sanctum\NewAccessToken;

/**
 * AgentAccessToken class.
 *
 * @package App\Http\Controllers
 */
class AgentAccessToken extends Controller
{
    /**
     * Retrieve the existing API token for an existing user.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function __invoke(Request $request)
    {
        $email = $request->email;

        $user = User::where('email', $email)->first();

        if (!$user) {
            return response()->json(['error' => 'Access Denied'], 403);
        }

        $token = $user->createToken('Support');

        if (!$token) {
            return response()->json(['error' => 'Token not found'], 404);
        }

        return response()->json([
            'success' => true,
            'user' => new UserResource($user),
            'token' => $token->plainTextToken,
        ]);
    }
}
