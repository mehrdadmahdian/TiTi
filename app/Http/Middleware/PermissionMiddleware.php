<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class PermissionMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure $next
     * @param $role
     * @param $permission
     * @return mixed
     */
    public function handle($request, Closure $next, $permission=null, $role=null)
    {
        if (Auth::guest()) {
            return abort(403, 'شما مجاز به دسترسی به این بخش نیستید');
            //return redirect(route('login'));
        }
        /*$permission = is_array($permission)
            ? $permission
            : explode('|', $permission);*/

       //dd($request->user(),$permission);
        if ($permission) {
            if (!$request->user()->hasAnyPermission($permission)) {
                abort(403, 'شما مجاز به دسترسی به این بخش نیستید');
            }
        }

        if ($role && ! $request->user()->can($role)) {
            abort(403, 'شما مجاز به دسترسی به بخش ادمین نیستید');
        }

        if (!$request->user()->active) {
            abort(403, 'کاربری شما غیرفعال می باشد');
        }

        return $next($request);
    }
}
