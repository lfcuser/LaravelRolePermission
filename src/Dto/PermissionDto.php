<?php

namespace Lfcuser\LaravelRolePermission\Dto;

readonly class PermissionDto
{
    public function __construct(
        public ?string $permission_code = null,
        public ?string $description = null,
    ) {
    }
}
