<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\DB;

class Role
{
    public function handle($request, Closure $next)
    {
        if (auth()->user() == null) // I included this check because you have it, but it really should be part of your 'auth' middleware, most likely added as part of a route group.
            return redirect('login');

        $role = DB::table('auth')
            ->join('users', function ($join) {
                $join->on('auth.id', '=', 'users.role')
                    ->where('users.id', '=', auth()->user()->id);
            })->first()->role_name;
        if ($role == 'ADMIN')
            return $next($request);
        return redirect()->route('404');
    }
}
