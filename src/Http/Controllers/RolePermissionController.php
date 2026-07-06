<?php

namespace Lfcuser\LaravelRolePermission\Http\Controllers;

use Lfcuser\LaravelRolePermission\Access;
use Lfcuser\LaravelRolePermission\Http\Controllers\AccessResourceController;
use Lfcuser\LaravelRolePermission\Http\Requests\RolePermissionItemRequest;
use Lfcuser\LaravelRolePermission\Http\Requests\RolePermissionChangeAccessRequest;
use Lfcuser\LaravelRolePermission\Services\RolePermissionService;
use Illuminate\Http\JsonResponse;

class RolePermissionController extends AccessResourceController
{
    public function __construct(private RolePermissionService $service)
    {
    }

    /**
     * @param RolePermissionItemRequest $request
     *
     * @return JsonResponse
     */
    public function show(RolePermissionItemRequest $request): JsonResponse
    {
        $data = $this->service->getByPermission($request->input('permission'));
        return response()->json($data);
    }

    /**
     * @return JsonResponse
     */
    public function index(): JsonResponse
    {
        $data = $this->service->getList();
        return response()->json($data);
    }

    /**
     * @param RolePermissionChangeAccessRequest $request
     *
     * @return JsonResponse
     */
    public function changeAccess(RolePermissionChangeAccessRequest $request): JsonResponse
    {
        $data = $this->service->createOrUpdate($request->input('permission'), $request->input('roles', []));
        return response()->json($data);
    }

    /**
     * @return JsonResponse
     */
    public function roles(): JsonResponse
    {
        $data = Access::getRoles();
        return response()->json(['items' => $data,]);
    }

    /**
     * @return JsonResponse
     */
    public function permissions(): JsonResponse
    {
        $data = $this->service->getPermissions();
        return response()->json(['items' => $data,]);
    }
}
