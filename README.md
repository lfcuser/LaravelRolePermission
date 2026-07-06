# LaravelRolePermission

Simple Roles-Permissions Managment package for Laravel ^11 and php ^8.2

## Setup
Install composer require lfcuser/laravel-role-permission

Update laravel-role-permission.php for your project

Add \Lfcuser\LaravelRolePermission\Middleware\RolePermissionMiddleware on your middleware chain
OR extend your BaseController from \Lfcuser\LaravelRolePermission\Middleware\AccessResourceController


Add API if you need:
```
Route::group([
    'prefix' => 'permission_roles',
    'controller' => \Lfcuser\LaravelRolePermission\Http\Controllers\RolePermissionController::class,
], function () {
    Route::get('/list', 'index')->name('permission_roles_get_list');
    Route::post('/change_access', 'changeAccess')->name('permission_roles_change_access');
    Route::get('/item', 'show')->name('permission_roles_get_item');
    Route::get('/thesaurus/roles', 'roles')->name('permission_roles_get_roles');
    Route::get('/thesaurus/permissions', 'permissions')->name('permission_roles_get_permissions');
});
```

## UI Example
https://github.com/lfcuser/LaravelRolePermissionPage

## Explanation
There are exactly two places in the project where roles are needed—in the table for associating roles with user entities and in the code for verifying roles.
On top of that, roles are rarely added or changed. Therefore, it’s sufficient to store roles in the configuration.

Permissions are resources to which access rights are granted for roles. These resources are defined in the program code: API routes, file types, report types, and so on. There’s no point in moving them to the database either. This is because you can’t create a resource without modifying the code anyway, and making a query to retrieve something the developer already has in the code is redundant.

It makes sense to store the mapping between permissions and roles in the database. In this library, the structure of the single table is denormalized. The `permission_roles` table stores the resource as the primary key and an array of roles that have access to that resource.
As a result, under the hood, API access checking looks something like this:
```
Access::can($request->user()->$roleProperty, Access::getPermission($request->route()->getName()))
...
in_array($role, $permissionRole?->roles)
```
We take the entity associated with the role, retrieve the resource, and check whether the user’s role is among the roles defined for that resource
