<?php

namespace Lfcuser\LaravelRolePermission\Services;

use Lfcuser\LaravelRolePermission\Access;
use Lfcuser\LaravelRolePermission\Dto\PermissionDto;
use Lfcuser\LaravelRolePermission\Models\PermissionRole;
use Illuminate\Support\Collection;

class RolePermissionService
{
    /**
     * @return Collection<int,PermissionDto>
     */
    public function getPermissions(): Collection
    {
        $permissionsArr = Access::getPermissions();
        $permissionsCollection = [];

        foreach ($permissionsArr as $item) {
            $permissionsCollection[] = new PermissionDto(
                permission_code: $item['permission_code'] ?? null,
                description: $item['description'] ?? null,
            );
        }

        return collect($permissionsCollection);
    }

    /**
     * @param string $permission
     *
     * @return ?PermissionRole
     */
    public function getByPermission(string $permission): ?PermissionRole
    {
        return PermissionRole::find($permission);
    }

    /**
     * @return Collection<int,PermissionRole>
     */
    public function getList(): Collection
    {
        return PermissionRole::newQuery()
            ->orderBy('permission', 'asc')
            ->all();
    }

    /**
     * @param string $permission
     * @param string[] $roles
     *
     * @return PermissionRole
     */
    public function createOrUpdate(string $permission, array $roles): PermissionRole
    {
        $permissionRole = PermissionRole::firstOrCreate([
            'permission' => $permission,
        ]);

        $permissionRole->roles = $roles;
        $permissionRole->save();
        return $permissionRole;
    }
}
