<?php

namespace Lfcuser\LaravelRolePermission\Models;

use Illuminate\Database\Eloquent\Model;

class PermissionRole extends Model
{
    protected $table = 'permission_roles';

    protected $primaryKey = 'permission';

    public $incrementing = false;

    protected $keyType = 'string';

    protected $fillable = [
        'permission',
        'roles',
    ];

    protected $casts = [
        'roles' => 'array',
    ];
}
