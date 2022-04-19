<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class RoleBasedRoute
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $action = class_basename($request->route()->getActionname());
        $_action = explode('@', $action);

        $controller = $_action[0];
        $method = end($_action);
        $_controller = explode('\\', $controller);

        $controller_name = end($_controller);
        $prefix = str_replace('Controller', '', $controller_name);
        $permission_name = $prefix . '-' . $method;
        if(auth()->user()->can($permission_name)){
            return $next($request);
        }
        // none authorized request
        return response('Unauthorized Action', 403);
        // return $next($request);
    }
}
