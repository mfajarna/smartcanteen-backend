<?php

namespace App\Http\Controllers\API;

use App\Helpers\ResponseFormatter;
use App\Http\Controllers\Controller;
use App\Models\Menu\Menu_m;
use Exception;
use Illuminate\Http\Request;

class UsersmenuController extends Controller
{
    public function fetch(Request $request)
    {
        try{
            $category_menu = $request->input('category_menu');
            $query = Menu_m::query();

            if($category_menu)
            {
                $query->where('category_menu', 'like', '%' . $category_menu . '%')->orderBy('created_at', 'DESC')->first();
            }

            return ResponseFormatter::success($query, 'Data Menu Berhasil diambil');
        }catch(Exception $e)
        {
            return ResponseFormatter::error($e->getMessage(),'Gagal Ambil Data');
        }
    }
}
