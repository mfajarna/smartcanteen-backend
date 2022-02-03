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
                'nama'              => 'required|string',
                'is_login'          => 'required|string',
                'device_token'      => 'required|string'
            ]);

            $nama = $validation['nama'];

            $model = UserApk::where('nama', '=', $nama)->first();

            if($model)
            {
                $model->is_login     = "1";
                $model->device_token = $validation['device_token'];

                $model->save();


                return ResponseFormatter::success($model,'Berhasil Update data');
            }else{
                $create = UserApk::create([
                    'nama'              => $validation['nama'],
                    'device_token'      => $validation['device_token'],
                    'is_login'          => $validation['is_login']
                ]);

                return ResponseFormatter::success($create, 'Berhasil Input data');
            }



        }catch(Exception $e)
        {
            return ResponseFormatter::error($e->getMessage(),'Gagal Input Data User');
        }
    }

    public function getDataUser(Request $request)
    {   
        try{
            $username = $request->input('username');
            $model = UserApk::where('username', $username)->first();
    
            return ResponseFormatter::success($model,'Berhasil Ambil data');
        }catch(Exception $e)
        {
            return ResponseFormatter::error($e->getMessage(),'Gagal Ambil Data User');
        }
    }
}
