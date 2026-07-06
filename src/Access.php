<?php

namespace Lfcuser\LaravelRolePermission;

use Lfcuser\LaravelRolePermission\Models\PermissionRole;
use Lfcuser\LaravelRolePermission\RolesEnum;

class Access
{
    /**
     * @param string $value
     *
     * @return ?string
     */
    public static function getPermission(string $value): ?string
    {
        return self::getPermissions()[$value] ?? null;
    }

    /**
     * @return array<string,string>
     */
    public static function getPermissions(): array
    {
        return config('laravel-role-permission')['permissions'] ?? [];
    }

    /**
     * @return string[]
     */
    public static function getRoles(): array
    {
        return array_merge(RolesEnum::list(), config('laravel-role-permission')['roles'] ?? []);
    }

    /**
     * @param string $role
     * @param ?string $permission
     *
     * @return bool
     */
    public static function can(string $role, ?string $permission = null): bool
    {
        if ($role === RolesEnum::ROLE_ADMIN) {
            return true;
        }

        if (empty($permission)) {
            return false;
        }

        $permissionRole = PermissionRole::find($permission);
        if (is_null($permissionRole)) {
            return false;
        }

        return in_array($role, $permissionRole?->roles);
    }
}
