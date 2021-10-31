<?php

namespace App\Http\Controllers\API;

use Exception;
use App\Models\Menu\Menu_m;
use Illuminate\Http\Request;
use App\Helpers\ResponseFormatter;
use App\Http\Controllers\Controller;

class MenuController extends Controller
{
    public function addMenu(Request $request)
    {
        try{
            $request->validate([
                'id_tenant' => 'required|integer',
                'name' => 'required|string' ,
                'category' => 'required|string',
                'ingredients' => 'required|string',
                'price' => 'required|integer',
                'is_active' => 'required|integer'
            ]);

            $menu = Menu_m::create([
                'id_tenant' => $request->id_tenant,
                'name' => $request->name ,
                'category' => $request->category,
                'ingredients' => $request->ingredients,
                'price' => $request->price,
                'rating' => 0,
                'picturePath' => $request->picturePath,
                'is_active' => $request->is_active
            ]);

            return ResponseFormatter::success($menu, 'Berhasil input data Menu');
        }catch(Exception $e){
            return ResponseFormatter::error($e->getMessage(),'Gagal Input Data Menu');
        }
    }
}
