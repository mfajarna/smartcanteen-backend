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
            // $request->validate([
            //     'kode_transaksi' => 'required|string|unique:tb_transactions,kode_transaksi',
            //     'id_user' => 'required|integer',
            //     'nama_pelanggan' => 'required|string',
            //     'nim' => 'required|integer',
            //     'id_menu' => 'required|integer',
            //     'id_tenant' => 'required|integer',
            //     'status' => 'required|string',
            //     'method' => 'required|string',
            //     'quantity' => 'required|integer',
            //     'total' => 'required|integer',
            // ]);

            // $menu = Transaction_m::create([
            //     'kode_transaksi' => $request->kode_transaksi,
            //     'id_user' => $request->id_user,
            //     'nama_pelanggan' => $request->nama_pelanggan,
            //     'nim' => $request->nim,
            //     'id_menu' => $request->id_menu,
            //     'id_tenant' => $request->id_tenant,
            //     'status' => $request->status,
            //     'method' => $request->method,
            //     'quantity' => $request->quantity,
            //     'total' => $request->total,
            // ]);

            $menu = $request->all();

            foreach($menu as $item)
            {
                // Transaction_m::create([
                //         'kode_transaksi' => $item->kode_transaksi,
                //         'id_user' => $item->id_user,
                //         'nama_pelanggan' => $item->nama_pelanggan,
                //         'nim' => $item->nim,
                //         'id_menu' => $item->id_menu,
                //         'id_tenant' => $item->id_tenant,
                //         'status' => $item->status,
                //         'method' => $item->method,
                //         'quantity' => $item->quantity,
                //         'total' => $item->total,
                // ]);

                return ResponseFormatter::success($item->kode_transaksi,'Berhasil input data Transaksi');
            }


        }catch(Exception $e){
            return ResponseFormatter::error($e->getMessage(),'Gagal Input Data Transaksi');
        }
    }


}
