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
                'nama'      => 'required|string|unique:tb_user_apk,name',
                'status'    => 'required|string'
            ]);

            $create = UserApk::create([
                'nama'      => $validation['name'],
                'status'    => $validation['status'],
            ]);

            return ResponseFormatter::success($create,'Berhasil input data');

        }catch(Exception $e)
        {
            return ResponseFormatter::error($e->getMessage(),'Gagal Input Data User');
        }
    }
}
