<?php

namespace App\Http\Controllers\Dashboard;

use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\Tenant\Tenant_m;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function __construct()
    {

        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $last_activity = DB::table('sessions')->where('user_id', Auth::user()->id)->first();

        $ip = $last_activity->ip_address;

        $jumlah_tenant = Tenant_m::where('is_active', 1)->count();

        $dataGrafik = Tenant_m::select(
            DB::raw("COUNT(CASE lokasi_kantin WHEN 'Fakultas Ilmu Terapan' THEN 1 ELSE NULL END) AS fit"),
            DB::raw("COUNT(CASE lokasi_kantin WHEN 'Fakultas Teknik' THEN 1 ELSE NULL END) AS fk"),
            DB::raw("COUNT(CASE lokasi_kantin WHEN 'Fakultas Ekonomi dan Bisnis' THEN 1 ELSE NULL END) AS fkb"),
            DB::raw("COUNT(CASE lokasi_kantin WHEN 'Asrama Putra' THEN 1 ELSE NULL END) AS asramaputra"),
            DB::raw("COUNT(CASE lokasi_kantin WHEN 'Asrama Putri' THEN 1 ELSE NULL END) AS asramaputri"),
            DB::raw("COUNT(CASE lokasi_kantin WHEN 'Gedung Kuliah Umum' THEN 1 ELSE NULL END) AS gku")
        )
        ->where('is_active', 1)
        ->orderBy('lokasi_kantin', 'asc')
        ->get();


        $dataFinal = [];
        foreach($dataGrafik as $data)
        {
            array_push($dataFinal, $data->fit, $data->fk, $data->fkb, $data->asramaputra, $data->asramaputri, $data->gku);
        }


        return view('pages.v2.Dashboard.index', compact('ip', 'jumlah_tenant', 'dataFinal' ));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        //
    }
}
