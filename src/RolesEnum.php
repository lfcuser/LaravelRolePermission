<?php

namespace Lfcuser\LaravelRolePermission;

enum RolesEnum
{
    public const ROLE_ADMIN = 'admin';
    public const ROLE_SYSTEM = 'system';

    /**
     * @return string[]
     */
    public static function list(): array
    {
        return [
            self::ROLE_ADMIN,
            self::ROLE_SYSTEM,
        ];
    }
}
