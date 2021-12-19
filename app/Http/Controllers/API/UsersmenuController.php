<?php

namespace App\Http\Controllers\API;

use App\Helpers\ResponseFormatter;
use App\Http\Controllers\Controller;
use App\Models\Menu\Menu_m;
use App\Models\transaction\Transaction_m;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UsersmenuController extends Controller
{
    public function fetch(Request $request)
    {
        try{
            $category_menu = $request->input('category_menu');
            $query = DB::table('tb_menu')
                    ->join('tb_tenant', 'tb_menu.id_tenant', '=', 'tb_tenant.id')
                    ->orderBy('tb_menu.created_at', 'desc')
                    ->paginate(5);

            if($category_menu)
            {
                $query = DB::table('tb_menu')
                        ->join('tb_tenant', 'tb_menu.id_tenant', '=', 'tb_tenant.id')
                        ->where('category_menu', $category_menu)
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
                            'tb_tenant.id',
                            'tb_tenant.nama_pemilik',
                            'tb_tenant.nama_tenant',
                            'tb_tenant.lokasi_kantin',
                            'tb_tenant.status',
                            'tb_tenant.is_active',
                            'tb_tenant.desc_kantin',
                            'tb_tenant.rating',
                            'tb_menu.id_tenant',
                            'tb_menu.name',
                            'tb_menu.category',
                            'tb_menu.ingredients',
                            'tb_menu.price',
                            'tb_menu.ratingMenu',
                            'tb_menu.picturePath',
                            'tb_menu.is_active',
                            'tb_menu.category_menu',
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

            $model = Transaction_m::with(['menu','tenant'])
                     ->where('nim', $nim)
                     ->where('status', $status)
                     ->get();

            return ResponseFormatter::success($model,'Berhasil Mengambil Pesanan Order');
        }catch(Exception $e)
        {
            return ResponseFormatter::error($e->getMessage(),'Gagal Ambil Data Transaksi Users');
        }
    }

    public function cancelStatusOrder($id)
    {
        try{
            $model = Transaction_m::findOrFail($id);

            $model->status = "CANCEL ORDER";
            $model->save();

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
