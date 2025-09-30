<?php
namespace App\Http\Middleware;
use Closure;
class SecurityHeaders {
    public function handle($req, \Closure $next) {
        $res = $next($req);
        $res->headers->set('X-Content-Type-Options','nosniff');
        $res->headers->set('X-Frame-Options','SAMEORIGIN');
        $res->headers->set('Referrer-Policy','strict-origin-when-cross-origin');
        return $res;
    }
}



