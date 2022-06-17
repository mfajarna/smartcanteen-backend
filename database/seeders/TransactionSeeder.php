<?php

namespace Database\Seeders;

use App\Models\transaction\Transaction_m;
use Illuminate\Database\Seeder;

class TransactionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $transactions = [
            [
                'kode_transaksi' => '40926705180059',
                'id_user'       => NULL,
                'nama_pelanggan' => 'Kojay',
                'nim'           => '6705180059',
                'id_menu'       => 1,
                'id_tenant'     => 1,
                'status'        => 'PENDING',
                'method'        => 'Dine In',
                'quantity'      => 10,
                'total'         => 10000,
                'created_at'    => date("Y-m-d H:i:s"),
                'updated_at'    => date("Y-m-d H:i:s"),
                'catatan'       => 'Tidak ada',
                'phoneNumber'   => '08123123213'
            


            ]
        ];

        Transaction_m::insert($transactions);
    }
}
