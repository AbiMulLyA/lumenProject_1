<?php
namespace App\Http\Middleware;
use Closure;
use Exception;
use Firebase\JWT\JWT;
use Firebase\JWT\ExpiredException;
use Illuminate\Support\Facades\Log;
class JWTMiddleware
{
    public function handle($request, Closure $next)
    {
        $token = $request->bearerToken('token');
        if(!$token) {
            Log::error("Wrong Token!");
            return response()->json([
                'error' => 'Wrong Token!'
            ], 401);
        }
        Log::info("Token Success");
        return $next($request);
    }
}