<?php

namespace App\Http\Controllers\Laporan;

use App\Http\Controllers\Controller;
use App\Models\LogLaporan\LogLaporan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LogLaporanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $model = LogLaporan::with('user')->select(
        //     DB::raw("DATE_FORMAT(created_at, '%d-%m-%Y') as tanggal"),

        // )->get();

        $model = DB::table('tb_loglaporan')
                    ->join('users', 'tb_loglaporan.user_id', '=', 'users.id')
                    ->select(
                        'users.name',
                        DB::raw("DATE_FORMAT(tb_loglaporan.created_at, '%d-%m-%Y %H:%i:%s') as tanggal")
                    )
                    ->orderBy('tb_loglaporan.created_at', 'DESC')
                    ->get();

        return view('pages.v2.Dashboard.Laporan.LogLaporan.index', compact('model'));
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
