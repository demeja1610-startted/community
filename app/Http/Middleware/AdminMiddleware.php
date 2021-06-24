<?php

namespace App\Http\Middleware;

use App\Enum\PermissionsEnum;
use Closure;
use Illuminate\Http\Request;

class AdminMiddleware
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
        if (!$request->user() || !$request->user()->can(PermissionsEnum::view_admin_pages)) {
            return redirect()->route('page.login');
        }

        return $next($request);
    }
}
