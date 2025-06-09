<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RateLimiter
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $key = 'rate_limit:' . $request->ip(); // Atau pakai user ID jika sudah login
        $maxRequests = 100;
        $window = 3600; // 1 jam (dalam detik)
        $now = time();

        $requests = cache()->get($key, []);

        // Bersihkan request yang sudah kadaluwarsa
        $requests = array_filter($requests, fn($timestamp) => $timestamp > $now - $window);

        if (count($requests) >= $maxRequests) {
            return response()->json(['message' => 'Too many requests'], 429);
        }

        // Tambahkan request baru
        $requests[] = $now;
        cache()->put($key, $requests, $window);

        return $next($request);
    }
}
