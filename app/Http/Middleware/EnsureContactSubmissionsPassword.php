<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class EnsureContactSubmissionsPassword
{
    public function handle(Request $request, Closure $next)
    {
        if ($request->session()->get('contact_submissions_authed') === true) {
            return $next($request);
        }

        return redirect()->route('admin.contatti.login');
    }
}
