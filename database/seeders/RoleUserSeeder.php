<?php

namespace Database\Seeders;

use App\Models\RoleUser;
use Illuminate\Database\Seeder;

class RoleUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role_user = [
            [
                'role_id' => 1,
                'user_id'   => 1
            ], 
            [
                'role_id'   => 2,
                'user_id'   => 2,
            ],
            [
                'role_id'   => 3,
                'user_id'   => 3
            ]
        ];

        RoleUser::insert($role_user);
    }
}
