<?php

namespace App\Http\Controllers\API\V1\Invokable;

use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\Request;

class ListUserController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $users = User::with('department')->with('role')->get();

        return [
            'success' => true,
            'data' => UserResource::collection($users)
        ];
    }
}
