<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TenantRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
           [
                'kode_tenant_submit' => [
                    'required', 'string', 'unique:tb_tenant,id_tenant'
                ],
                'nama_pemilik_submit'  => [
                    'required', 'string'
                ],
                'nama_tenant_submit'   => [
                    'required', 'string'
                ],
                'email_submit' => [
                    'required', 'email', 'unique:tb_tenant,email'
                ],
                'no_telp_submit'  => [
                    'required', 'regex:/^([0-9\s\-\+\(\)]*)$/', 'max:12'
                ],
                'lokasi_kantin_submit' =>[
                    'required' , 'string'
                ],
                'desc_kantin_submit'   => [
                    'required' ,'string'
                ],
                'nama_rekening_submit' => [
                    'required', 'string'
                ],
                'no_rekening_submit'   => [
                    'required' , 'string'
                ],
                'nama_bank_submit' => [
                    'required', 'string'
                ],
                'jangka_waktu_kontrak_submit'  => [
                    'required' , 'string'
                ],
                'sharing_submit'   => [
                    'required', 'string'
                ],
                'qris_barcode_submit' => [
                    'required', 'file:jpg,jpeg,png', 'max:2048'
                ],
                'file_kontrak_submit'  => [
                    'required', 'mimes:pdf', 'max:2048'
                ]
           ]
        ];
    }
}
