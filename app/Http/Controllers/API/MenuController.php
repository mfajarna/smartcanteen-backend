<?php

namespace App\Http\Controllers\API;

use Exception;
use App\Models\Menu\Menu_m;
use Illuminate\Http\Request;
use App\Models\Tenant\Tenant_m;
use App\Helpers\ResponseFormatter;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class MenuController extends Controller
{

    public function all(Request $request)
    {
        try{
            $category = $request->input('category');
            $status = $request->input('is_active');
            $category_menu = $request->input('category_menu');

            $model = Menu_m::orderBy('created_at', 'DESC')->get();

            if($category)
            {
                $model = Menu_m::query()
                            ->where('category','like', '%' . $category . '%')
                            ->orderBy('created_at', 'DESC')->get();
            }
            if($status)
            {
                 $model = Menu_m::query()
                            ->where('is_active','like', '%' . $status . '%')
                            ->orderBy('created_at', 'DESC')->get();

            }

            if($category_menu)
            {
                $model = Menu_m::query()
                            ->where('is_active','like', '%' . $category_menu . '%')
                            ->orderBy('created_at', 'DESC')->get();
            }

            return ResponseFormatter::success($model, 'Berhasil ambil Data Menu');
        }catch(Exception $e)
        {
            return ResponseFormatter::error($e->getMessage(),'Gagal ambil Data Menu');
        }

    }

    public function fetchByTenant(Request $request)
    {
        try{
            $category = $request->input('category');
            $status = $request->input('is_active');

            $model = Menu_m::with('tenant')->where('id_tenant', Auth::user()->id)->orderBy('created_at', 'DESC')->get();

            if($category)
            {
                $model = Menu_m::where('category', $category)
                                ->where('id_tenant', Auth::user()->id)
                                ->where('category','like', '%' . $category . '%')
                                ->get();
            }
            if($status)
            {
                $model = Menu_m::where('is_active', $status)
                                ->where('id_tenant', Auth::user()->id)
                                ->where('is_active','like', '%' . $status . '%')
                                ->get();
            }

            return ResponseFormatter::success($model, 'Berhasil ambil Data Menu');
        }catch(Exception $e)
        {
            return ResponseFormatter::error($e->getMessage(),'Gagal ambil Data Menu');
        }
    }

    public function addMenu(Request $request)
    {
        try{
            $request->validate([
                'id_tenant' => 'required|integer',
                'name' => 'required|string' ,
                'category' => 'required|string',
                'ingredients' => 'required|string',
                'price' => 'required|integer',
                'category_menu' => 'required|string',
                'is_active' => 'required|string'
            ]);

            $menu = Menu_m::create([
                'id_tenant' => $request->id_tenant,
                'name' => $request->name ,
                'category' => $request->category,
                'ingredients' => $request->ingredients,
                'price' => $request->price,
                'ratingMenu' => 0.0,
                'category_menu' => $request->category_menu,
                'picturePath' => $request->picturePath,
                'kode_menu' => $request->kode_menu,
                'is_active' => $request->is_active
            ]);

            return ResponseFormatter::success($menu, 'Berhasil input data Menu');
        }catch(Exception $e){
            return ResponseFormatter::error($e->getMessage(),'Gagal Input Data Menu');
        }
    }

    public function updatePhoto(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'file' => 'required|image:jpeg,png,jpg|max:2048',
        ]);

        if ($validator->fails()) {
            return ResponseFormatter::error(['error'=>$validator->errors()], 'Update Photo Fails', 401);
        }

        if ($request->file('file')) {

            $file = $request->file->store('assets/user', 'public');

            //store your file into database

            $transaksi = Menu_m::find($id);
            $transaksi->picturePath = $file;
            $transaksi->update();

            return ResponseFormatter::success([$file],'File successfully uploaded');
        }
    }

    Public function updateMenu(Request $request, $id)
    {
        try
        {
            $request->validate([
                'name' => 'required|string' ,
                'category' => 'required|string',
                'ingredients' => 'required|string',
                'price' => 'required|integer',
                'category_menu' => 'required|string',
                'is_active' => 'required|string'
            ]);


            $model = Menu_m::findOrFail($id);

            $model->name = $request->name;
            $model->category = $request->category;
            $model->ingredients = $request->ingredients;
            $model->price = $request->price;
            $model->category_menu = $request->category_menu;
            $model->is_active = $request->is_active;

            $model->save();

            return ResponseFormatter::success($model, 'Berhasil update data');

        }catch(Exception $e)
        {
            return ResponseFormatter::error($e->getMessage(),'Gagal Update Data');
        }
    }

    public function detailMenu(Request $request, $id)
    {
        try{

            $model = Menu_m::find($id);

            if($model == null){
                return ResponseFormatter::error([
                    null,
                    'Data Menu Tidak Ada',
                    404
                ]);
            }else{
                return ResponseFormatter::success($model, 'Berhasil Ambil Data');
            }
        }catch(Exception $e)
        {
            return ResponseFormatter::error($e->getMessage(),'Gagal Menampilkan Data');
        }
    }

    public function deleteMenu(Request $request, $id)
    {
        try{
            $model = Menu_m::find($id);

            $model->delete();

            return ResponseFormatter::success($model, 'Berhasil Delete Data');
        }catch(Exception $e)
        {
            return ResponseFormatter::error($e->getMessage(),'Gagal Delete Data');
        }
    }


    public function updatePrice(Request $request, $id)
    {
        try{
            $model = Menu_m::findOrFail($id);

            $model->price = $request->price;
            $model->save();

            return ResponseFormatter::success($model->price, 'Berhasil Update Data Price '. $model->price);
        }catch(Exception $e)
        {
            return ResponseFormatter::error($e->getMessage(),'Gagal Update Data Price');
        }
    }

    public function updateStatus(Request $request, $id)
    {
        try{
            $model = Menu_m::findOrFail($id);

            $model->is_active = $request->is_active;
            $model->save();

            return ResponseFormatter::success($model->is_active, 'Berhasil Update Data Status Menjadi ' . $model->is_active);
        }catch(Exception $e)
        {
             return ResponseFormatter::error($e->getMessage(),'Gagal Update Data Status');
        }
    }

    public function updatePhotoMenu(Request $request, $id)
    {
        try{
            $validator = Validator::make($request->all(), [
                'file' => 'required|image:jpeg,png,jpg|max:2048',
            ]);

            if ($validator->fails()) {
                return ResponseFormatter::error(['error'=>$validator->errors()], 'Update Photo Fails', 401);
            }

            if ($request->file('file')) {

            $file = $request->file->store('assets/user', 'public');

            //store your file into database

            $model = Menu_m::find($id);
            $model->picturePath = $file;
            $model->update();

            return ResponseFormatter::success([$file],'Berhasil Update Foto Menu Makanan');
        }

        }catch(Exception $e)
        {
            return ResponseFormatter::error($e->getMessage(),'Gagal Update Data Photo Menu');
        }
    }

    public function getKodeMenu()
    {
        try{
            $find_code = Menu_m::max('kode_menu');

            if($find_code)
            {
                $value_code = substr($find_code,13);
                $code = (int) $value_code;
                $code = $code + 1;
                $return_value = "TELU/MENU/".str_pad($code,4,"0",STR_PAD_LEFT);
            }else{
                $return_value = "TELU/MENU/0001";
            }
            return ResponseFormatter::success($return_value,'Berhasil Mengambil Kode Menu '. $return_value);
        }catch(Exception $e)
        {
            return ResponseFormatter::error($e->getMessage(),'Gagal Mengambil Kode Menu');
        }
    }
}
