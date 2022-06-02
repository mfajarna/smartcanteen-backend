<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles = [
            [
                "name"  => "superadmin",
                "display_name" => 'superadmin',
            ],
            [
                "name"  => 'admin1',
                "display_name"  => 'admin1'
            ],
            [
                "name"  => "admin2",
                "display_name"  => "admin2"
            ]
        ];

        Role::insert($roles);
    }
}
