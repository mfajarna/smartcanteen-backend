<?php

namespace Database\Seeders;

use App\Models\Tenant\Tenant_m;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class CreateTenantSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tenants = [
            [
        'id_tenant'         => 'TENANT/001',
        'nama_pemilik'      => 'Dummy Kojay',
        'nama_tenant'       => 'Tenant Dummy',
        'email'             =>  'dummy@gmail.com',
        'no_telp'           => '0812312321',
        'lokasi_kantin'     => 'Fakultas Ilmu Terapan',
        'desc_kantin'       => 'Kantin Bersih dan Enak',
        'nama_rekening'     => 'Dummy Rekening',
        'no_rekening'       => '312313123',
        'nama_bank'         => 'Mandiri',
        'status'            => 'Tersedia',
        'rating'            => 5,
        'is_active'         => 'Active',
        'password'          => Hash::make('Admin@123'),
        'perhitungan_akhir' => 500,
        'total_jumlah_order' => 200
            ]
        ];

        Tenant_m::insert($tenants);
    }
}
