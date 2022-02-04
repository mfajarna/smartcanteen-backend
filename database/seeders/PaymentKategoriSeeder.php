<?php

namespace Database\Seeders;

use App\Models\PaymentKategoris;
use Illuminate\Database\Seeder;

class PaymentKategoriSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $pkategoris = [
            [
                'nama' => 'Transfer Bank',
            ],
            [
                'nama' => 'Virtual Account',
            ],
            [
                'nama' => 'Convenience Store',
            ],
            [
                'nama' => 'E-Wallet',
            ],
        ];


        PaymentKategoris::insert($pkategoris);
    }
}
