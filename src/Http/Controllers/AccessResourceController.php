<?php

namespace Lfcuser\LaravelRolePermission\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Routing\Controllers\HasMiddleware;

class AccessResourceController extends Controller implements HasMiddleware
{
    public static function middleware(): array
    {
        return [
            \Lfcuser\LaravelRolePermission\Middleware\RolePermissionMiddleware::class,
        ];
    }
}
