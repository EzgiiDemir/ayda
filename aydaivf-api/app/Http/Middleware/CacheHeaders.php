<?php
namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CacheHeaders {
    public function handle(Request $req, Closure $next) {
        $res = $next($req);
        $seconds = 60; // .env’den de alabilirsin
        $etag = sha1($res->getContent());
        $res->headers->set('ETag', $etag);
        $res->headers->set('Cache-Control', "public, max-age={$seconds}");
        // Koşullu GET
        if ($req->headers->get('If-None-Match') === $etag) {
            return response('', 304)->withHeaders($res->headers->all());
        }
        return $res;
    }
}
