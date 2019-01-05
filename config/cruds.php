<?php

return [
    'routes'=> [
        [
            'name' => 'users',
            'controller' => DashboardController::class,
            'datatable_class' => null,
            'permission' => 'manage-dashboard',
            'except' => [],
            'permission_name' => 'مدیریت داشبورد',
            'form_class' => null,
            'model_class' => null,
            'title' => 'داشبورد',
            'icon' => 'material-icons',
            'li_text'=>'people', // from: https://material.io/icons
            'order' => 1
        ],
        [
            'name' => 'users',
            'controller' => UserController::class,
            'datatable_class' => null,
            'permission' => 'manage-users',
            'except' => [],
            'permission_name' => 'مدیریت کاربران',
            'form_class' => null,
            'model_class' => null,
            'title' => 'کاربران',
            'icon' => 'material-icons',
            'li_text'=>'people', // from: https://material.io/icons
            'index_desc' => 'لیست کاربران',
            'create_desc' => 'درج کاربر جدید',
            'edit_desc' => 'ویرایش یک کاربر',
            'parent-menu' => 'کاربران',
            'order' => 2
        ],
        [
            'name' => 'roles',
            'controller' => RoleController::class,
            'datatable_class' =>null,
            'except' => [],
            'permission' => 'manage-roles',
            'permission_name' => 'مدیریت دسترسی به کاربران',
            'form_class' => null,
            'model_class' => null,
            'title' => 'گروه های کاربری',
            'icon' => 'material-icons',
            'li_text'=>'lock',
            'index_desc' => 'لیست گروهای کاربری و دسترسی ها',
            'create_desc' => 'درج گروه کاربری و دسترسی هایش جدید',
            'edit_desc' => 'ویرایش یک گروه کاربری و دسترسی هایش',
            'parent-menu' => 'کاربران',
            'order' => 3
        ],
    ]
];