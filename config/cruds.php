<?php

return [
    'routes'=> [
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
            'parent-menu' => 'کاربران',
            'order' => 1
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
            'title' => 'دسترسی های کاربری',
            'icon' => 'material-icons',
            'li_text'=>'lock',
            'parent-menu' => 'کاربران',
            'order' => 2
        ],
        [
            'name' => 'telegram_channels',
            'controller' => TelegramChannelController::class,
            'datatable_class' =>null,
            'except' => [],
            'permission' => 'manage-telegram-channels',
            'permission_name' => 'مدیریت کانال های تلگرام',
            'form_class' => null,
            'model_class' => null,
            'title' => 'کانال های تلگرام',
            'icon' => 'material-icons',
            'li_text'=>'lock',
            'order' => 3
        ],

    ]
];