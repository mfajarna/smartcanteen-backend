<?php

namespace App\Http\Controllers\Tenant;

use Illuminate\Http\Request;
use App\Models\Tenant\Tenant_m;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Validator;
use Zxing\QrReader;

class TenantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(request()->ajax()){
            $model = Tenant_m::all();

            return DataTables::of($model)
                    ->addColumn('action', function($tipe)
                        {
                            $button = "<div class='d-flex gap-3 align-center'>";

                            $button .= "<a href='javascript:void(0);' name='edit' id=' ". $tipe->id ." ' class='button text-success'><i class='mdi mdi-pencil font-size-18'></i></a>";

                            $button .= "<a href='/admin/remove-tenant?id=". $tipe->id ."' name='delete' id='delete' class='button text-danger'><i class='mdi mdi-delete font-size-18'></i></a>";

                            $button .= "</div>";

                            return $button;
                        })
                    ->addColumn('detail', function($tipe)
                    {
                            $button = '<button type="button" class="btn btn-primary btn-sm btn-rounded waves-effect waves-light" id="detail">
                                                        View Details
                                        </button>';
                            return $button;
                    })
                    ->rawColumns(['action', 'detail'])
                    ->make(true);
        }

        return view('pages.v2.Dashboard.Tenant.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $find_code = Tenant_m::max('id_tenant');

        if($find_code)
        {
            $value_code = substr($find_code,13);
            $code = (int) $value_code;
            $code = $code + 1;
            $return_value = "TELU/TENANT/".str_pad($code,4,"0",STR_PAD_LEFT);
        }else{
            $return_value = "TELU/TENANT/0001";
        }

        return view('pages.v2.Dashboard.Tenant.create', compact('return_value'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validate = $request->validate([
                'kode_tenant_submit'            => 'required|string|max:255|unique:tb_tenant,id_tenant',
                'nama_pemilik_submit'           => 'required|string|max:255',
                'nama_tenant_submit'            => 'required|string|max:255',
                'email_submit'                  => 'required|email|unique:tb_tenant,email',
                'no_telp_submit'                => 'required|string|max:12',
                'lokasi_kantin_submit'          => 'required|string',
                'desc_kantin_submit'            => 'required|string|max:10000',
                'nama_rekening_submit'          => 'required|string',
                'no_rekening_submit'            => 'required|string',
                'nama_bank_submit'              => 'required|string',
                'jangka_waktu_kontrak_submit'   => 'required|string|max:255',
                'sharing_telu_submit'           => 'required|integer',
                'sharing_tenant_submit'         => 'required|integer',
                'qris_barcode_submit'           => 'required|file:jpg,jpeg,png|max:2048',
                'file_kontrak_submit'           => 'required|mimes:pdf|max:2048',
        ]);


        $tenant = new Tenant_m();
        $tenant->id_tenant = $validate['kode_tenant_submit'];
        $tenant->nama_pemilik = $validate['nama_pemilik_submit'];
        $tenant->nama_tenant = $validate['nama_tenant_submit'];
        $tenant->email = $validate['email_submit'];
        $tenant->no_telp = $validate['no_telp_submit'];
        $tenant->lokasi_kantin = $validate['lokasi_kantin_submit'];
        $tenant->desc_kantin = $validate['desc_kantin_submit'];
        $tenant->nama_rekening = $validate['nama_rekening_submit'];
        $tenant->no_rekening = $validate['no_rekening_submit'];
        $tenant->nama_bank = $validate['nama_bank_submit'];
        $tenant->jangka_waktu_kontrak = $validate['jangka_waktu_kontrak_submit'];
        $tenant->sharing_telu = $validate['sharing_telu_submit'];
        $tenant->sharing_tenant = $validate['sharing_tenant_submit'];
        $tenant->jangka_waktu_kontrak = $validate['jangka_waktu_kontrak_submit'];


        $tenant->password = Hash::make('Admin123');
        $tenant->rating = 0;
        $tenant->perhitungan_akhir = 0;
        $tenant->total_jumlah_order = 0;
        $tenant->status = "Tersedia";
        $tenant->is_active = 1;

        $path_qris = $request->file('qris_barcode_submit')->store('assets/file/qris', 'public');
        
        $path_kontrak = $request->file('file_kontrak_submit')->store('assets/file/file_kontrak', 'public');

        $tenant->qris_barcode = $path_qris;
        $tenant->file_kontrak = $path_kontrak;


        $qrcode = new QrReader('storage/' .$path_qris);
        $text = $qrcode->text();

        $tenant->qr_string = $text;

        $tenant->save();


        toast()->success('Berhasil Menyimpan Data');
        return redirect()->route('admin.tenant.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $model = Tenant_m::findOrFail($id);

        $model->delete();


        toast()->success('Berhasil Hapus Data Tenant');
        return redirect()->route('admin.tenant.index');
    }

    public function delete(Request $request)
    {
        $id = $request->input('id');

        $model = Tenant_m::findOrFail($id);

        $model->delete();


        toast()->success('Berhasil Hapus Data Tenant');
        return redirect()->route('admin.tenant.index');
    }

    public function view(Request $request)
    {
        $id = $request->input('id');

        $model = Tenant_m::findOrfail($id);

        return response()->json($model);
    }

    public function qrcode(Request $request)
    {

        $name = 'storage/assets/file/qris/qrcode1.jpeg';

        // storage/assets/file/qris/boUniXdzj3517MI8bESbKAgHGE0Axwe8HBJj2qqU.png

        $qrcode = new QrReader($name);
        $text = $qrcode->text();


        return view('pages.v2.Dashboard.Tenant.qrcode', compact('text'));
    }

}
