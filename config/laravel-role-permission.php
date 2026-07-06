<?php

return [
    'model' => \App\Models\User::class,
    'model_role_property' => 'role',
    'roles' => [
        // Examples:
        // 'manager',
    ],
    'permissions' => [
        // Examples:
        'permission_roles_get_list' => [
            'permission_code' => 'permission_roles_get_list',
            'description' => 'Get all rows permission_roles from database',
        ],
        'permission_roles_change_access' => [
            'permission_code' => 'permission_roles_change_access',
            'description' => 'Change roles access for permission',
        ],
        'permission_roles_get_item' => [
            'permission_code' => 'permission_roles_get_item',
            'description' => 'Get permission_roles row from database by permission_code',
        ],
        'permission_roles_get_roles' => [
            'permission_code' => 'permission_roles_get_roles',
            'description' => 'Get all rolles thesaurus',
        ],
        'permission_roles_get_permissions' => [
            'permission_code' => 'permission_roles_get_permissions',
            'description' => 'Get all permissions thesaurus',
        ],
        /*
        'report_type_code_x' => [
            'permission_code' => 'report_type_code_x',
            'description' => 'The Monthly Report Type One'
        ]
        */
        /*
        'file_type_code_x' => [
            'permission_code' => 'file_type_code_x',
            'description' => 'Passport'
        ]
        */
    ]
];
