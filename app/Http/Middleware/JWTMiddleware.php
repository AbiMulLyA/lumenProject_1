<?php
namespace App\Http\Middleware;
use Closure;
use Exception;
use Firebase\JWT\JWT;
use Illuminate\Http\Request;
use Firebase\JWT\ExpiredException;
use Illuminate\Support\Facades\Log;
class JWTMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        $token = $request->bearerToken('token');
        if(!$token) {
            Log::error("Input Token First!");
            return response()->json([
                'error' => 'Input Token First!'
            ], 401);
            
        }
        Log::info("Token Success");
        return $next($request);
    }
}