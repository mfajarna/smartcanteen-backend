<?php

namespace App\Http\Controllers\API;

use App\Helpers\ResponseFormatter;
use App\Http\Controllers\Controller;
use App\Models\Overallmenu_m;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OverallmenuController extends Controller
{
    public function add(Request $request)
    {
        try{
            $request->validate([
                'id_tenant' => 'required|integer',
                'id_menu' => 'required|integer',
                'total_order' => 'required|integer',
                'tanggal_periode' => 'required'
            ]);

            $menu = Overallmenu_m::create([
                'id_tenant' => $request->id_tenant,
                'id_menu' => $request->id_menu,
                'total_order' => $request->total_order,
                'tanggal_periode' => $request->tanggal_periode
            ]);

            return ResponseFormatter::success($menu, 'Berhasil input data Overall menu');
        }catch(Exception $e)
        {
            return ResponseFormatter::error($e->getMessage(),'Gagal Input Data Overall Menu');
        }
    }

    public function fetch(Request $request)
    {
        try{
            $idMenu = $request->input('id_menu');
            $idTenant = $request->input('id_tenant');

            $query = Overallmenu_m::with(['menu','tenant'])
                    ->where('id_menu', $idMenu)
                    ->where('id_tenant', $idTenant)
                    ->get();

             return ResponseFormatter::success($query, 'Berhasil get data Overall menu');

        }catch(Exception $e)
        {
             return ResponseFormatter::error($e->getMessage(),'Gagal Ambil Data OverallMenu');
        }
    }


    public function getLastCountOrder(Request $request)
    {
        try{
            $idMenu = $request->input('id_menu');
            $idTenant = $request->input('id_tenant');

            $query = DB::table('tb_overallmenu')
                     ->select('total_order')
                     ->where('id_menu', $idMenu)
                     ->where('id_tenant', $idTenant)
                     ->get();

            return ResponseFormatter::success($query, 'Berhasil Ambil Data Last Count Order');
        }catch(Exception $e)
        {
             return ResponseFormatter::error($e->getMessage(),'Gagal Ambil Data Last Total Order');
        }
    }
}
