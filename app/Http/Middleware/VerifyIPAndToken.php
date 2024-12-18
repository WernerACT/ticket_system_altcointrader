<?php

namespace App\Http\Middleware;

use Closure;
use Tymon\JWTAuth\Facades\JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;
use function PHPUnit\Framework\throwException;

class VerifyIPAndToken
{
    protected $allowedIps;

    public function __construct()
    {
        $this->allowedIps = explode(',', config('app.allowed_ips'));
    }

    public function handle($request, Closure $next)
    {
        $clientIP = $request->ip();

        if (!in_array($clientIP, $this->allowedIps)) {
            return response()->json(['error' => 'Forbidden: IP not allowed ' . $clientIP], 403);
        }

        try {
            $user = JWTAuth::parseToken()->authenticate();
        } catch (JWTException $e) {
            return response()->json(['error' => 'Unauthorized: Invalid token'], 401);
        }

        if (!$user) {
            return response()->json(['error' => 'Unauthorized: User not found'], 404);
        }

        return $next($request);
    }
}
