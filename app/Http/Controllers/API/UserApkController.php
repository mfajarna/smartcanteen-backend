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

                $tokenResult = $model->createToken('authToken')->plainTextToken;
                $model->is_login     = "1";
                $model->device_token = $validation['device_token'];

                $model->save();


                return ResponseFormatter::success([
                    'access_token' => $tokenResult,
                    'token_type' => 'Bearer',
                    'user' => $model
                ], 'Authentication');
            }else{
                
                $create = UserApk::create([
                    'nama'              => $validation['nama'],
                    'device_token'      => $validation['device_token'],
                    'is_login'          => $validation['is_login']
                ]);

                $tokenResult = $create->createToken('authToken')->plainTextToken;

                return ResponseFormatter::success([
                    'access_token' => $tokenResult,
                    'token_type' => 'Bearer',
                    'user' => $create
                ], 'Authentication');
            }



        }catch(Exception $e)
        {
            return ResponseFormatter::error($e->getMessage(),'Gagal Input Data User');
        }
    }

    public function getDataUser(Request $request)
    {   
        try{
            $nama = $request->input('nama');
            $model = UserApk::where('nama', '=', $nama)->first();
    
            return ResponseFormatter::success($model,'Berhasil Ambil data');
        }catch(Exception $e)
        {
            return ResponseFormatter::error($e->getMessage(),'Gagal Ambil Data User');
        }
    }
}
