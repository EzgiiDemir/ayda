<?php
namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class PublicApiOnly {
    public function handle(Request $req, Closure $next): Response {
        if ($req->method() !== 'GET') {
            return response()->json(['message'=>'Method Not Allowed'], 405);
        }
        return $next($req);
    }
}


