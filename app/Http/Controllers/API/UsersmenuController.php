<?php

namespace App\Http\Controllers\API;

use App\Helpers\ResponseFormatter;
use App\Http\Controllers\Controller;
use App\Models\Menu\Menu_m;
use App\Models\transaction\Transaction_m;
use Database\Seeders\TransactionSeeder;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class UsersmenuController extends Controller
{
    public function fetch(Request $request)
    {
        try{
            $category_menu = $request->input('category_menu');
            $query = DB::table('tb_menu')
                    ->join('tb_tenant', 'tb_menu.id_tenant', '=', 'tb_tenant.id')
                    ->select([
                            'tb_menu.id',
                            'tb_menu.id_tenant',
                            'tb_tenant.nama_pemilik',
                            'tb_tenant.nama_tenant',
                            'tb_tenant.lokasi_kantin',
                            'tb_tenant.qr_string',
                            'tb_tenant.status',
                            'tb_tenant.is_active',
                            'tb_tenant.desc_kantin',
                            'tb_tenant.rating',
                            'tb_menu.name',
                            'tb_menu.category',
                            'tb_menu.ingredients',
                            'tb_menu.price',
                            'tb_menu.ratingMenu',
                            'tb_menu.picturePath',
                            'tb_menu.is_active',
                            'tb_menu.category_menu',
                            'tb_tenant.device_token'
                        ])
                    ->orderBy('tb_menu.created_at', 'desc')
                    ->paginate(5);

            if($category_menu)
            {
                $query = DB::table('tb_menu')
                        ->join('tb_tenant', 'tb_menu.id_tenant', '=', 'tb_tenant.id')
                        ->where('category_menu', $category_menu)
                        ->select([
                            'tb_menu.id',
                            'tb_menu.id_tenant',
                            'tb_tenant.nama_pemilik',
                            'tb_tenant.nama_tenant',
                            'tb_tenant.lokasi_kantin',
                            'tb_tenant.status',
                            'tb_tenant.is_active',
                            'tb_tenant.qr_string',
                            'tb_tenant.desc_kantin',
                            'tb_tenant.rating',
                            'tb_menu.name',
                            'tb_menu.category',
                            'tb_menu.ingredients',
                            'tb_menu.price',
                            'tb_menu.ratingMenu',
                            'tb_menu.picturePath',
                            'tb_menu.is_active',
                            'tb_menu.category_menu',
                            'tb_tenant.device_token'
                        ])
                        ->orderBy('tb_menu.created_at', 'desc')
                        ->paginate(5);
            }

            return ResponseFormatter::success($query, 'Data Menu Berhasil diambil');
        }catch(Exception $e)
        {
            return ResponseFormatter::error($e->getMessage(),'Gagal Ambil Data');
        }
    }

    public function fetchSeveralItems(Request $request)
    {
        try{
            $limit = $request->input('limit', '5');
            $category_menu = $request->input('category_menu');

            $query = DB::table('tb_menu')
                        ->join('tb_tenant', 'tb_menu.id_tenant', '=', 'tb_tenant.id')
                        ->where('category_menu', $category_menu)
                        ->select([
                            'tb_menu.id',
                            'tb_menu.id_tenant',
                            'tb_tenant.nama_pemilik',
                            'tb_tenant.nama_tenant',
                            'tb_tenant.lokasi_kantin',
                            'tb_tenant.status',
                            'tb_tenant.is_active',
                            'tb_tenant.desc_kantin',
                            'tb_tenant.rating',
                            'tb_menu.name',
                            'tb_menu.category',
                            'tb_menu.ingredients',
                            'tb_menu.price',
                            'tb_menu.ratingMenu',
                            'tb_menu.picturePath',
                            'tb_menu.is_active',
                            'tb_menu.category_menu',
                            'tb_tenant.device_token',
                            'tb_tenant.qr_string'
                        ])
                        ->orderBy('tb_menu.created_at', 'desc')
                        ->paginate(5);

            return ResponseFormatter::success(
                    $query,
                    'Data List Berhasil Di Ambil!'
        );
        }catch(Exception $e)
        {
            return ResponseFormatter::error($e->getMessage(),'Gagal Ambil Data');
        }
    }


    public function fetchByTenant(Request $request)
    {
        try{
            $idTenant = $request->input('id_tenant');
            $category = $request->input('category');

            if($idTenant)
            {
                $query = DB::table('tb_menu')
                    ->join('tb_tenant', 'tb_menu.id_tenant', '=', 'tb_tenant.id')
                    ->where('tb_menu.id_tenant', $idTenant)
                    ->orderBy('tb_menu.created_at', 'desc')
                    ->select(
                        [
                            'tb_menu.id',
                            'tb_menu.id_tenant',
                            'tb_menu.name',
                            'tb_menu.category',
                            'tb_menu.ingredients',
                            'tb_menu.price',
                            'tb_menu.ratingMenu',
                            'tb_menu.picturePath',
                            'tb_menu.is_active',
                            'tb_menu.category_menu',
                            'tb_tenant.device_token'
                        ])
                    ->get();
            }

            if($category && $idTenant)
            {
                $query = DB::table('tb_menu')
                    ->join('tb_tenant', 'tb_menu.id_tenant', '=', 'tb_tenant.id')
                    ->where('tb_menu.id_tenant', $idTenant)
                    ->where('category', $category)
                    ->orderBy('tb_menu.created_at', 'desc')
                    ->select(
                        [
                            'tb_menu.id',
                            'tb_menu.id_tenant',
                            'tb_menu.name',
                            'tb_menu.category',
                            'tb_menu.ingredients',
                            'tb_menu.price',
                            'tb_menu.ratingMenu',
                            'tb_menu.picturePath',
                            'tb_menu.is_active',
                            'tb_menu.category_menu',
                            'tb_tenant.device_token'
                        ])
                    ->get();
            }


            return ResponseFormatter::success(
                    $query,
                    'Data  Berhasil Di Ambil!'
        );



        }catch(Exception $e){
            return ResponseFormatter::error($e->getMessage(),'Gagal Ambil Data OverallMenu');
        }
    }

    public function checkTransactionUsers(Request $request)
    {
        try{
            $status = $request->input('status');
            $nim = $request->input('nim');

            $dataAllTransactions = DB::table('tb_transactions')
                        ->join('tb_tenant', 'tb_transactions.id_tenant', '=', 'tb_tenant.id')
                        ->join('tb_menu', 'tb_transactions.id_menu', '=', 'tb_menu.id')
                        ->where('tb_transactions.nim', $nim)
                        ->where('tb_transactions.status', $status)
                        ->select(
                            'tb_transactions.kode_transaksi',
                            'tb_transactions.id',
                            'tb_transactions.status',
                            'tb_transactions.total',
                            DB::raw('SUM(tb_transactions.quantity) as quantity'),
                            'tb_transactions.created_at',
                            'tb_tenant.qr_string',
                            'tb_tenant.nama_tenant',
                            'tb_tenant.lokasi_kantin',
                            'tb_transactions.id_tenant',
                            'tb_tenant.profile_photo_path',
                            'tb_tenant.device_token',
                            
                        )
                        ->orderBy('tb_transactions.created_at')
                        ->groupBy('tb_transactions.kode_transaksi')
                        ->get();

            return ResponseFormatter::success($dataAllTransactions,'Berhasil Mengambil Pesanan Order');
        }catch(Exception $e)
        {
            return ResponseFormatter::error($e->getMessage(),'Gagal Ambil Data Transaksi Users');
        }
    }

    public function detailTransaction(Request $request)
    {

        try{
            $kode_transaksi = $request->input('kode_transaksi');
            $status = $request->input('status');
            $nim = $request->input('nim');


            $model = DB::table('tb_transactions')
                            ->join('tb_tenant', 'tb_transactions.id_tenant', '=', 'tb_tenant.id')
                            ->join('tb_menu', 'tb_transactions.id_menu', '=', 'tb_menu.id')
                            ->where('tb_transactions.kode_transaksi', $kode_transaksi)
                            ->where('tb_transactions.nim', $nim)
                            ->where('tb_transactions.status', $status)
                            ->select(
                                'tb_transactions.kode_transaksi',
                                'tb_transactions.nama_pelanggan',
                                'tb_transactions.nim',
                                'tb_transactions.status',
                                'tb_transactions.is_cash',
                                'tb_transactions.method',
                                'tb_transactions.total',
                                'tb_transactions.phoneNumber',
                                'tb_transactions.quantity',
                                'tb_transactions.created_at',
                                'tb_transactions.photo_bukti_pembayaran',
                                'tb_tenant.qr_string',
                                'tb_tenant.profile_photo_path',
                                'tb_menu.name',
                                'tb_menu.picturePath',
                            )
                            ->get();
    
            if($model)
            {
                return ResponseFormatter::success(
                    $model,
                    'Berhasil Ambil Data Transaksi'
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
            return ResponseFormatter::error($e->getMessage(),'Something went wrong');
        }


    }


    public function cancelStatusOrder(Request $request)
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

    public function uploadBuktiBayar(Request $request)
    {

        try{

            $kode_transaksi = $request->kode_transaksi;
            $file = $request->file;

            $model = Transaction_m::where('kode_transaksi', $kode_transaksi)->first();
            $model->photo_bukti_pembayaran = $file;

            $model->update();

            return ResponseFormatter::success([$file],'File successfully uploaded');
        

        }catch(Exception $e)
        {
            return ResponseFormatter::error($e->getMessage(),'Something went wrong');
        }


    }

    public function checkBuktiBayar(Request $request, $id)
    {
        try{

            $model = Transaction_m::where('id', $id)->first();
            if($model)
            {
            
            return ResponseFormatter::success($model->photo_bukti_pembayaran,'Berhasil mengambil data upload bukti pembayaran');
            }else{
                return ResponseFormatter::error('Data tidak ada');
            }
            

        }catch(Exception $e){
            return ResponseFormatter::error($e->getMessage(),'Something went wrong');
        }
    }
}
