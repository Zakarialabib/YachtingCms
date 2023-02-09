<?php

declare(strict_types=1);

namespace App\Http\Middleware;

use App\Models\Generalsetting;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;

class HTTPSConnection
{
    public function handle(Request $request, Closure $next)
    {
        /**
         * Handle an incoming request.
         *
         * @param  \Illuminate\Http\Request  $request
         * @param  Closure  $next
         * @return mixed
         */
        $is_enabled = $request->header('x-forwarded-proto') == 'https';

        // $gs = Generalsetting::find(1);

        //     if($gs->is_secure == 1 && $is_enabled) {
        //         if (!$request->secure()) {
        //             return redirect()->secure($request->getRequestUri());
        //         }  else  {
        //             URL::forceScheme('https');
        //         }
        //     }

        return $next($request);
    }
}
