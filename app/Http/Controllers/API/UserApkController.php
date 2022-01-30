<?php

namespace App\Http\Controllers\API;

use App\Helpers\ResponseFormatter;
use App\Http\Controllers\Controller;
use App\Models\UserApk\UserApk;
use Exception;
use Illuminate\Http\Request;

class UserApkController extends Controller
{
    public function validation(Request $request)
    {
        try {
            $validation = $request->validate([
                'nama'      => 'required|string',
                'is_login'    => 'required|string'
            ]);

            $nama = $validation['nama'];

            $model = UserApk::where('nama', '=', $nama)->first();

            if($model)
            {
                $model->is_login = "1";
                $model->save();

                return ResponseFormatter::success($model,'Berhasil Update data');
            }else{
                $create = UserApk::create([
                    'nama' => $validation['nama'],
                    'is_login' => $validation['is_login']
                ]);

                return ResponseFormatter::success($create, 'Berhasil Input data');
            }



        }catch(Exception $e)
        {
            return ResponseFormatter::error($e->getMessage(),'Gagal Input Data User');
        }
    }
}
