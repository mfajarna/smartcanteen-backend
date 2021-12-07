<?php

namespace App\Http\Controllers\API;

use App\Helpers\ResponseFormatter;
use App\Http\Controllers\Controller;
use App\Models\Menu\Menu_m;
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

            $query = DB::table('tb_menu')
                    ->join('tb_tenant', 'tb_menu.id_tenant', '=', 'tb_tenant.id')
                    ->where('tb_menu.id_tenant', $idTenant)
                    ->where('category', $category)
                    ->orderBy('tb_menu.created_at', 'desc')
                    ->paginate(5);

            return ResponseFormatter::success(
                    $query,
                    'Data  Berhasil Di Ambil!'
        );



        }catch(Exception $e){
            return ResponseFormatter::error($e->getMessage(),'Gagal Ambil Data OverallMenu');
        }
    }
}
