<?php

namespace App\Http\Controllers\API;

use Exception;
use Illuminate\Http\Request;
use App\Helpers\ResponseFormatter;
use App\Http\Controllers\Controller;
use App\Models\transaction\Transaction_m;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class TransactionController extends Controller
{
    public function getKode()
    {
       try{
            $find_code = Transaction_m::max('kode_transaksi');

            if($find_code)
            {
                $value_code = substr($find_code,11);
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
                        'created_at' => $value['created_at'],
                        'total' => $value['total'],
                        'catatan' => $value['catatan'],
                        'is_cash' => $value['is_cash'],
                        'phoneNumber' => $value['phoneNumber'],

                ]);
            }

            Transaction_m::insert($result);
            return ResponseFormatter::success($result,'Berhasil Mengambil Kode Transaksi ');

        }catch(Exception $e){
            return ResponseFormatter::error($e->getMessage(),'Gagal Input Data Transaksi');
        }
    }

    public function checkOrderByTenant(Request $request)
    {
        try{
            $status = $request->input('status');
            $id_tenant = $request->id_tenant;

            if($status == "PENDING")
            {

                $model = DB::table('tb_transactions')
                ->join('tb_menu', 'tb_transactions.id_menu', '=', 'tb_menu.id')
                ->join('tb_user_apk', 'tb_transactions.id_user', '=', 'tb_user_apk.id')
                ->where('tb_transactions.id_tenant', Auth::user()->id)
                ->where('tb_transactions.status', $status)
                ->select(
                    'tb_transactions.kode_transaksi',
                    'tb_transactions.status',
                    'tb_transactions.total',
                    DB::raw('SUM(tb_transactions.quantity) as quantity'),
                    'tb_transactions.created_at',
                    'tb_user_apk.device_token',
                    'tb_user_apk.nama',
                    'tb_transactions.phoneNumber',
                    'tb_transactions.nim',
                    'tb_transactions.nama_pelanggan',
                    'tb_transactions.method',
                    'tb_transactions.is_cash',
                    'tb_transactions.catatan',
                    'tb_menu.category',
                    'tb_transactions.photo_bukti_pembayaran'
                )
                ->groupBy('tb_transactions.kode_transaksi')
                ->get();


                $update = Transaction_m::where('id_tenant', Auth::user()->id)
                                        ->where('status', $status)
                                        ->first();
                                        
                $update->photo_bukti_pembayaran = null;
                $update->save();

                return ResponseFormatter::success($model,'Berhasil Update photo bukti bayar order');

            }else{

                $model = DB::table('tb_transactions')
                ->join('tb_menu', 'tb_transactions.id_menu', '=', 'tb_menu.id')
                ->join('tb_user_apk', 'tb_transactions.id_user', '=', 'tb_user_apk.id')
                ->where('tb_transactions.id_tenant', Auth::user()->id)
                ->where('tb_transactions.status', $status)
                ->select(
                    'tb_transactions.kode_transaksi',
                    'tb_transactions.status',
                    'tb_transactions.total',
                    DB::raw('SUM(tb_transactions.quantity) as quantity'),
                    'tb_transactions.created_at',
                    'tb_user_apk.device_token',
                    'tb_user_apk.nama',
                    'tb_transactions.phoneNumber',
                    'tb_transactions.nim',
                    'tb_transactions.nama_pelanggan',
                    'tb_transactions.method',
                    'tb_transactions.is_cash',
                    'tb_transactions.catatan',
                    'tb_menu.category',
                    'tb_transactions.photo_bukti_pembayaran'
                )
                ->groupBy('tb_transactions.kode_transaksi')
                ->get();


                return ResponseFormatter::success($model,'Berhasil Mengambil Pesanan Order');
            }



        }catch(Exception $e){
             return ResponseFormatter::error($e->getMessage(),'Gagal Ambil Data Orderan');
        }
    }

    public function detailOderByTenant(Request $request)
    {

        try{
            $kode_transaksi = $request->kode_transaksi;

            $model = DB::table('tb_transactions')
                            ->join('tb_user_apk', 'tb_transactions.id_user', '=', 'tb_user_apk.id')
                            ->join('tb_menu', 'tb_transactions.id_menu', '=', 'tb_menu.id')
                            ->where('tb_transactions.id_tenant', Auth::user()->id)
                            ->where('tb_transactions.kode_transaksi', $kode_transaksi)
                            ->select(
                                'tb_transactions.kode_transaksi',
                                'tb_transactions.nama_pelanggan',
                                'tb_transactions.nim',
                                'tb_transactions.status',
                                'tb_transactions.total',
                                'tb_transactions.phoneNumber',
                                'tb_transactions.quantity',
                                'tb_transactions.created_at',
                                'tb_transactions.is_cash',
                                'tb_menu.name',
                                'tb_menu.picturePath',
                                'tb_user_apk.device_token',
                                'tb_transactions.photo_bukti_pembayaran'
                            )
                            ->get();

                return ResponseFormatter::success($model,'Berhasil Mengambil Pesanan Order Detail');
        }catch(Exception $e)
        {
            return ResponseFormatter::error($e->getMessage(),'Gagal Ambil Data Orderan');
        }

    }


    public function changeStatusOrder(Request $request)
    {
        try{

            $kode_transaksi = $request->input('kode_transaksi');

            $status = $request->status;

            $model = Transaction_m::where("kode_transaksi", $kode_transaksi)->update(["status" => $status]);



                if($model)
            {
                return ResponseFormatter::success(
                    $model,
                    'Status berhasil diubah'
                );
            }else{
                return ResponseFormatter::error([
                    null,
                    'Data Tidak Ada',
                    404
                ]);
            }
        }catch(Exception $e)
        {
            return ResponseFormatter::error($e->getMessage(),'Gagal Update Status');
        }
    }




}
