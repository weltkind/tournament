<?php

namespace App\Http\Middleware;

use App\Kingdom\Annal\AnnalHttp;
use App\Kingdom\Storyteller;
use Closure;
use Illuminate\Http\Request;

class HttpMiddleware
{
    public function __construct(AnnalHttp $annalHttp)
    {
        app()->bind(Storyteller::class, function () use ($annalHttp) {
            return new Storyteller($annalHttp);
        });
    }

    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        return $next($request);
    }
}
