<?php

use App\Enums\Role;

return [
    Role::class => [
        Role::SUBSCRIBER => '購読者',
        Role::CONTRIBUTOR => '寄稿者',
        Role::AUTHOR => '投稿者',
        Role::EDITOR => '編集者',
        Role::ADMINISTRATOR => '管理者',
    ],
];
