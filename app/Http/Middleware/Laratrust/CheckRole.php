<?php

namespace App\Http\Middleware\Laratrust;

use Closure;
use Laratrust\Middleware\LaratrustRole;

class CheckRole extends LaratrustRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $roles
     * @param  string|null  $team
     * @return mixed
     */
    public function handle($request, Closure $next, $roles)
    {
        if (strlen($roles) > 0) {
            $roles .= '|';
        }
        $roles .= 'administrator';
        return parent::handle($request, $next, $roles);
    }
}
