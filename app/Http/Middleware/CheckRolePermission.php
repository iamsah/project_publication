<?php

namespace App\Http\Middleware;

use App\Models\Role;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

class CheckRolePermission
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
        return $next($request);

        $role = Role::find(auth()->user()->role_id);
        $current_route = Route::current()->getName();
        $access = false;

        foreach($role->permissions as $permission){
            if ($current_route == $permission->route){
                $access = true;
                return $next($request);
            }
        }
        if ($access == false){
//            abort(404);
            return response()->view('errors.403');

        }
        return $next($request);
    }
}
