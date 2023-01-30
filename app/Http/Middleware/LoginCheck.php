<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class LoginCheck
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if (!session()->has('loggedInUser') && ($request->path() != '/')) {
            return redirect('/');
        }
        if (session()->has('loggedInUser') && ($request->path() == '/')) {
            return back();
        }

        $response = $next($request);

        $response->headers->set('Cache-Control', 'no-cache,no-store,max -age=0, must-revalidate');
        $response->headers->set('Pragram', 'no-cache');
        $response->headers->set('Expires', 'Sat 01 Jan 1990 00::00::00 GMT');
        $response->headers->set('Access-Control-Allow-Origin', '*');
        $response->headers->set('Access-Control-Allow-Methods', 'POST, GET, OPTIONS, PUT, DELETE');
        $response->headers->set('Access-Control-Allow-Headers', 'Content-Type, Accept, Authorization, X-Requested-With, Application');

        return $response;
    }
}
