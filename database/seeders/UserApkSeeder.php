<?php

namespace Database\Seeders;

use App\Models\UserApk\UserApk;
use Illuminate\Database\Seeder;

class UserApkSeeder extends Seeder
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
                'nama' => 'Admin',
                'is_login'  => 1,
                'device_token' => 'random'
            ]
        ];

        UserApk::insert($users);
    }
}
