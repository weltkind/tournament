<?php

namespace App\Http\Middleware;

use App\Kingdom\Majordomo;
use Closure;
use Illuminate\Http\Request;

class ValidateMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $majordomo = new Majordomo((int)$request->get('amount'));
        if (!$majordomo->isAllowed()) {
            return redirect()->route('intro', ['error' => $majordomo->whyNot()]);
        }

        return $next($request);
    }
}
