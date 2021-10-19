<?php

namespace App\Http\Controllers\API;

use App\Actions\Fortify\PasswordValidationRules;
use App\Helpers\ResponseFormatter;
use App\Http\Controllers\Controller;
use App\Models\Tenant\Tenant_m;
use Exception;
use Illuminate\Http\Request;

class TenantController extends Controller
{

    use PasswordValidationRules;

    public function register(Request $request)
    {
        try{
            $data = $request->validate([
                'id_tenant' => 'required|string|max:255|unique:tb_tenant,id_tenant',
                'nama_pemilik' => 'required|string|max:255',
                'nama_tenant' => 'required|string|max:255',
                'email' => 'required|email|unique:tb_tenant,email',
                'no_telp' => 'required|string',
                'lokasi_kantin' => 'required|string',
                'nama_rekening' => 'required|string',
                'no_rekening' => 'required|string',
                'status' => 'required|string',
                'is_active' => 'required|string'
            ]);

            $tenant = Tenant_m::create([
                'id_tenant' => $data['id_tenant'],
                'nama_pemilik' => $data['nama_pemilik'], 
                'nama_tenant' => $data['nama_tenant'],
                'email' => $data['email'],
                'no_telp' => $data['no_telp'],
                'lokasi_kantin' => $data['lokasi_kantin'],
                'nama_rekening' => $data['nama_rekening'],
                'no_rekening' => $data['no_rekening'],
                'status' => "active",
                'is_active' => "1",
            ]);

            $tokenResult = $tenant->createToken('authToken')->plainTextToken;

            return ResponseFormatter::success([
                'access_token' => $tokenResult,
                'token_type' => 'Bearer',
                'user' => $tenant
            ], 'Succesfully Registered Tenant!');
        }catch(Exception $error){
            return ResponseFormatter::error([
                'message' => 'Something went wrong while register tenant',
                'error' => $error
            ], 'Authentication Failed', 500);
        }
    }
}
