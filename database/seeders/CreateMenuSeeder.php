<?php

namespace Database\Seeders;

use App\Models\Menu\Menu_m;
use Illuminate\Database\Seeder;

class CreateMenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $menus = [
            [
                'id_tenant' => 1,
                'name' => 'Dummy Makanan',
                'category' => 'Makanan',
                'ingredients' => 'Bahan Mantap',
                'price' => 200000,
                'ratingMenu' => 5,
                'picturePath' => NULL,
                'category_menu' => 'Popular',
                'kode_menu' => 'TELU/MENU/0001',
                'is_active' => 'active'
            ],
            [
                'id_tenant' => 1,
                'name' => 'Dummy Minuman',
                'category' => 'Minuman',
                'ingredients' => 'Bahan Mantap',
                'price' => 20000,
                'ratingMenu' => 5,
                'picturePath' => NULL,
                'category_menu' => 'Popular',
                'kode_menu' => 'TELU/MENU/0002',
                'is_active' => 'active'
            ],
        ];

        Menu_m::insert($menus);
    }
}
