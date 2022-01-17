<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [
            [
                'name'              => 'Superadmin Kojay',
                'email'             => 'superadmin@gmail.com',
                'password'          => Hash::make('Admin@123'),
                'role'              => 'superadmin', // Superadmin
                'remember_token'    => NULL,
                'created_at'        => date('Y-m-d h:i:s'),
                'updated_at'        => date('Y-m-d h:i:s')
            ],
            [
                'name'              => 'Admin 1',
                'email'             => 'admin1@gmail.com',
                'password'          => Hash::make('Admin@123'),
                'role'              => 'admin1', // Admin 1
                'remember_token'    => NULL,
                'created_at'        => date('Y-m-d h:i:s'),
                'updated_at'        => date('Y-m-d h:i:s')
            ],
            [
                'name'              => 'Admin 2',
                'email'             => 'admin2@gmail.com',
                'password'          => Hash::make('Admin@123'),
                'role'              => 'admin2', // Admin 2
                'remember_token'    => NULL,
                'created_at'        => date('Y-m-d h:i:s'),
                'updated_at'        => date('Y-m-d h:i:s')
            ],
        ];

        User::insert($users);
    }
}
