<?php

namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{
    public function run()
    {
        $permissions = [
            [
                'id'    => 1,
                'title' => 'user_management_access',
            ],
            [
                'id'    => 2,
                'title' => 'permission_create',
            ],
            [
                'id'    => 3,
                'title' => 'permission_edit',
            ],
            [
                'id'    => 4,
                'title' => 'permission_show',
            ],
            [
                'id'    => 5,
                'title' => 'permission_delete',
            ],
            [
                'id'    => 6,
                'title' => 'permission_access',
            ],
            [
                'id'    => 7,
                'title' => 'role_create',
            ],
            [
                'id'    => 8,
                'title' => 'role_edit',
            ],
            [
                'id'    => 9,
                'title' => 'role_show',
            ],
            [
                'id'    => 10,
                'title' => 'role_delete',
            ],
            [
                'id'    => 11,
                'title' => 'role_access',
            ],
            [
                'id'    => 12,
                'title' => 'user_create',
            ],
            [
                'id'    => 13,
                'title' => 'user_edit',
            ],
            [
                'id'    => 14,
                'title' => 'user_show',
            ],
            [
                'id'    => 15,
                'title' => 'user_delete',
            ],
            [
                'id'    => 16,
                'title' => 'user_access',
            ],
            [
                'id'    => 17,
                'title' => 'email_access',
            ],
            [
                'id'    => 18,
                'title' => 'server_create',
            ],
            [
                'id'    => 19,
                'title' => 'server_edit',
            ],
            [
                'id'    => 20,
                'title' => 'server_show',
            ],
            [
                'id'    => 21,
                'title' => 'server_delete',
            ],
            [
                'id'    => 22,
                'title' => 'server_access',
            ],
            [
                'id'    => 23,
                'title' => 'email_template_create',
            ],
            [
                'id'    => 24,
                'title' => 'email_template_edit',
            ],
            [
                'id'    => 25,
                'title' => 'email_template_show',
            ],
            [
                'id'    => 26,
                'title' => 'email_template_delete',
            ],
            [
                'id'    => 27,
                'title' => 'email_template_access',
            ],
            [
                'id'    => 28,
                'title' => 'contact_create',
            ],
            [
                'id'    => 29,
                'title' => 'contact_edit',
            ],
            [
                'id'    => 30,
                'title' => 'contact_show',
            ],
            [
                'id'    => 31,
                'title' => 'contact_delete',
            ],
            [
                'id'    => 32,
                'title' => 'contact_access',
            ],
            [
                'id'    => 33,
                'title' => 'contact_group_create',
            ],
            [
                'id'    => 34,
                'title' => 'contact_group_edit',
            ],
            [
                'id'    => 35,
                'title' => 'contact_group_show',
            ],
            [
                'id'    => 36,
                'title' => 'contact_group_delete',
            ],
            [
                'id'    => 37,
                'title' => 'contact_group_access',
            ],
            [
                'id'    => 38,
                'title' => 'email_log_create',
            ],
            [
                'id'    => 39,
                'title' => 'email_log_edit',
            ],
            [
                'id'    => 40,
                'title' => 'email_log_show',
            ],
            [
                'id'    => 41,
                'title' => 'email_log_delete',
            ],
            [
                'id'    => 42,
                'title' => 'email_log_access',
            ],
            [
                'id'    => 43,
                'title' => 'profile_password_edit',
            ],
        ];

        Permission::insert($permissions);
    }
}
