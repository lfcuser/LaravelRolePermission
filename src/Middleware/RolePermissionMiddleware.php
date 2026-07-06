<?php

namespace Lfcuser\LaravelRolePermission\Middleware;

use Lfcuser\LaravelRolePermission\Access;
use Lfcuser\LaravelRolePermission\Exceptions\AccessForbiddenException;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RolePermissionMiddleware
{
    public function handle(Request $request, Closure $next): Response
    {
        $roleProperty = config('laravel-role-permission')['model_role_property'] ?? null;
        $result = Access::can($request->user()->$roleProperty, Access::getPermission($request->route()->getName()));

        if ($result) {
            return $next($request);
        }

        throw new AccessForbiddenException();
    }
}
