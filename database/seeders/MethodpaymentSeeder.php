<?php

namespace Database\Seeders;

use App\Models\PaymentMethod;
use Illuminate\Database\Seeder;

class MethodpaymentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $payment = [
            [
                'name' => 'Qris',
                'fee_nominal' => '0',
                'fee_persen' => '0',
                'min_deposit' => '0',
                'image' => 'dana.png',
                'keterangan' => 'CARA BAYAR NYA',
                'payment_method' => 'qris',
                'payment_channel' => 'linkaja',
                'payment_kategoris_id' => '4',
                'status' => '1',
            ],
            [
                'name' => 'BCA Virtual Account',
                'fee_nominal' => '0',
                'fee_persen' => '0',
                'min_deposit' => '0',
                'image' => 'maybank.png',
                'keterangan' => 'CARA BAYAR NYA',
                'payment_method' => 'va',
                'payment_channel' => 'bca',
                'payment_kategoris_id' => '2',
                'status' => '1',
            ],
            [
                'name' => 'BNI Virtual Account',
                'fee_nominal' => '0',
                'fee_persen' => '0',
                'min_deposit' => '0',
                'image' => 'permata.png',
                'keterangan' => 'CARA BAYAR NYA',
                'payment_method' => 'va',
                'payment_channel' => 'bni',
                'payment_kategoris_id' => '2',
                'status' => '1',
            ],
            [
                'name' => 'Mandiri Virtual Account',
                'fee_nominal' => '0',
                'fee_persen' => '0',
                'min_deposit' => '0',
                'image' => 'briva.png',
                'keterangan' => 'CARA BAYAR NYA',
                'payment_method' => 'va',
                'payment_channel' => 'mandiri',
                'payment_kategoris_id' => '2',
                'status' => '1',
            ],
            [
                'name' => 'BRI Virtual Account',
                'fee_nominal' => '0',
                'fee_persen' => '0',
                'min_deposit' => '0',
                'image' => 'bniva.png',
                'keterangan' => 'CARA BAYAR NYA',
                'payment_method' => 'va',
                'payment_channel' => 'bri',
                'payment_kategoris_id' => '2',
                'status' => '1',
            ],
            [
                'name' => 'AlFAMART',
                'fee_nominal' => '0',
                'fee_persen' => '0',
                'min_deposit' => '0',
                'image' => 'alfamart.png',
                'keterangan' => 'CARA BAYAR NYA',
                'payment_method' => 'cstore',
                'payment_channel' => 'alfamart',
                'payment_kategoris_id' => '3',
                'status' => '1',
            ],
            [
                'name' => 'INDOMARET',
                'fee_nominal' => '0',
                'fee_persen' => '0',
                'min_deposit' => '0',
                'image' => 'indomaret.png',
                'keterangan' => 'CARA BAYAR NYA',
                'payment_method' => 'cstore',
                'payment_channel' => 'indomaret',
                'payment_kategoris_id' => '3',
                'status' => '1',
            ],
            [
                'name' => 'Bank BCA',
                'fee_nominal' => '0',
                'fee_persen' => '0',
                'min_deposit' => '0',
                'image' => 'bca.png',
                'keterangan' => 'CARA BAYAR NYA',
                'payment_method' => 'banktransfer',
                'payment_channel' => 'bca',
                'payment_kategoris_id' => '1',
                'status' => '1',
            ],
            [
                'name' => 'Bank BRI',
                'fee_nominal' => '0',
                'fee_persen' => '0',
                'min_deposit' => '0',
                'image' => 'bri.png',
                'keterangan' => 'CARA BAYAR NYA',
                'payment_method' => 'banktransfer',
                'payment_channel' => 'bri',
                'payment_kategoris_id' => '1',
                'status' => '1',
            ],
            [
                'name' => 'Bank Mandiri',
                'fee_nominal' => '0',
                'fee_persen' => '0',
                'min_deposit' => '0',
                'image' => 'mandiri.png',
                'keterangan' => 'CARA BAYAR NYA',
                'payment_method' => 'banktransfer',
                'payment_channel' => 'mandiri',
                'payment_kategoris_id' => '1',
                'status' => '1',
            ],
            [
                'name' => 'Bank BNI',
                'fee_nominal' => '0',
                'fee_persen' => '0',
                'min_deposit' => '0',
                'image' => 'bni.png',
                'keterangan' => 'CARA BAYAR NYA',
                'payment_method' => 'banktransfer',
                'payment_channel' => 'bni',
                'payment_kategoris_id' => '1',
                'status' => '1',
            ],
            
        ];

        PaymentMethod::insert($payment);
    }
}
