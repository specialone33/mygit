<?php

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
                'title' => 'itinerary_create',
            ],
            [
                'id'    => 18,
                'title' => 'itinerary_edit',
            ],
            [
                'id'    => 19,
                'title' => 'itinerary_show',
            ],
            [
                'id'    => 20,
                'title' => 'itinerary_delete',
            ],
            [
                'id'    => 21,
                'title' => 'itinerary_access',
            ],
            [
                'id'    => 22,
                'title' => 'vehicle_create',
            ],
            [
                'id'    => 23,
                'title' => 'vehicle_edit',
            ],
            [
                'id'    => 24,
                'title' => 'vehicle_show',
            ],
            [
                'id'    => 25,
                'title' => 'vehicle_delete',
            ],
            [
                'id'    => 26,
                'title' => 'vehicle_access',
            ],
            [
                'id'    => 27,
                'title' => 'useritinerary_create',
            ],
            [
                'id'    => 28,
                'title' => 'useritinerary_edit',
            ],
            [
                'id'    => 29,
                'title' => 'useritinerary_show',
            ],
            [
                'id'    => 30,
                'title' => 'useritinerary_delete',
            ],
            [
                'id'    => 31,
                'title' => 'useritinerary_access',
            ],
            [
                'id'    => 32,
                'title' => 'financial_create',
            ],
            [
                'id'    => 33,
                'title' => 'financial_edit',
            ],
            [
                'id'    => 34,
                'title' => 'financial_show',
            ],
            [
                'id'    => 35,
                'title' => 'financial_delete',
            ],
            [
                'id'    => 36,
                'title' => 'financial_access',
            ],
            [
                'id'    => 37,
                'title' => 'profile_password_edit',
            ],
        ];

        Permission::insert($permissions);
    }
}
