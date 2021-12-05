<?php

namespace App\Http\Controllers\API;

use Exception;
use Illuminate\Http\Request;
use App\Helpers\ResponseFormatter;
use App\Http\Controllers\Controller;
use App\Models\transaction\Transaction_m;

class TransactionController extends Controller
{
    public function getKode()
    {
       try{
            $find_code = Transaction_m::max('kode_transaksi');

            if($find_code)
            {
                $value_code = substr($find_code,13);
                $code = (int) $value_code;
                $code = $code + 1;
                $return_value = "TELU/TRNS/".str_pad($code,4,"0",STR_PAD_LEFT);
            }else{
                $return_value = "TELU/TRNS/0001";
            }
            return ResponseFormatter::success($return_value,'Berhasil Mengambil Kode Transaksi '. $return_value);
        }catch(Exception $e)
        {
            return ResponseFormatter::error($e->getMessage(),'Gagal Mengambil Kode Transaksi');
        }
    }

    public function addTransaction(Request $request)
    {
        try{
            $menu = $request->all();
            $result = [];

            foreach($menu as $key => $value)
            {
                array_push($result, [
                        'kode_transaksi' => $value['kode_transaksi'],
                        'id_user' => $value['id_user'],
                        'nama_pelanggan' => $value['nama_pelanggan'],
                        'nim' => $value['nim'],
                        'id_menu' => $value['id_menu'],
                        'id_tenant' => $value['id_tenant'],
                        'status' => $value['status'],
                        'method' => $value['method'],
                        'quantity' => $value['quantity'],
                        'total' => $value['total'],
                        'catatan' => $value['catatan'],
                        'phoneNumber' => $value['phoneNumber']

                ]);
            }

            Transaction_m::insert($result);
            return ResponseFormatter::success($result,'Berhasil Mengambil Kode Transaksi ');

        }catch(Exception $e){
            return ResponseFormatter::error($e->getMessage(),'Gagal Input Data Transaksi');
        }
    }


}
