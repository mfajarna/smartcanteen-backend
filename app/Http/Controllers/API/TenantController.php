<?php

namespace App\Http\Controllers\API;

use Exception;
use Illuminate\Http\Request;
use App\Models\Tenant\Tenant_m;
use App\Helpers\ResponseFormatter;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use App\Actions\Fortify\PasswordValidationRules;
use Illuminate\Support\Facades\Authtenant;

class TenantController extends Controller
{

    use PasswordValidationRules;

    public function login(Request $request){
     try{
        $request->validate([
            'email' => 'email|required',
            'password' => 'required'
        ],[
            'email.required' => 'Silahkan masukan email yang valid!',
            'password.required' => 'Silahkan masukan password yang benar!'
        ]);

        $credentials = request(['email', 'password']);

        if(!Authtenant::attempt($credentials)){
            return ResponseFormatter::error([
               'message' => 'Unauthorized'
            ], 'Authentication Failed', 500);
        }

        $user = Tenant_m::where('email', $request->email)->first();
        if(!Hash::check($request->password, $user->password)){
            throw new \Exception('Invalid Credentials');
        }

        $tokenResult = $user->createToken('authToken')->plainTextToken;
        return ResponseFormatter::success([
            'access_token' => $tokenResult,
            'token_type' => 'Bearer',
            'user' => $user
        ], 'Authentication');
        }catch(Exception $error){
        return ResponseFormatter::error([
            'message' => 'Something Went Wrong',
            'error' => $error,
        ], 'Authentication Failed', 500);
        }
    }



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
                'is_active' => 'required|string',
                'password' => 'required|string',
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
                'password' => Hash::make($data['password']),
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

    public function fetch(Request $request)
    {
        return ResponseFormatter::success($request->user(), 'Data Profile Berhasil DiAmbil');
    }

    public function updateProfile(Request $request)
    {
        $data = $request->all();

        $user = Auth::user();
        $user->update($data);

        return ResponseFormatter::success($user, 'Data Berhasil Di Update!');
    }

    public function updatePhoto(Request $request)
    {}
}
