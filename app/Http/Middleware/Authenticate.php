<?php

namespace App\Http\Middleware;

use App\Models\User;
use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Support\Facades\Auth;


class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */
    protected function redirectTo($request)
    {
        if (! $request->expectsJson()) {
            return url('/');
        }

        $superadmin = User::where('username', 'superadmin')->first();

        // redirect to homepage after login
        if($superadmin->hasRole('superadmin'))
        {
            return url('/admin/dashboard');
        }else{
            return url('/');
        }

    }
}
