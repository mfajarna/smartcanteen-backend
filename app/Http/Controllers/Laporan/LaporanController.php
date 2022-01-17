<?php

namespace App\Http\Controllers\Laporan;

use App\Exports\LaporantransaksiExport;
use App\Http\Controllers\Controller;
use App\Models\LogLaporan\LogLaporan;
use App\Models\transaction\Transaction_m;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;
use Maatwebsite\Excel\Facades\Excel;
use Maatwebsite\Excel\Facades\CSV;

class LaporanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $total_transaction = Transaction_m::with('menu')->where('status', 'SUCCESS')->count();
        $total_penjualan = Transaction_m::select(
                DB::raw('SUM(quantity) as total_penjualan')
        )->get()->toArray();

        $total_pemasukan = Transaction_m::select(
                DB::raw('SUM(total) as total_pemasukan')
        )->whereDate('created_at',  '=', date('Y-m-d'))
        ->get()
        ->toArray();

        $total_transactionday = Transaction_m::select(
            DB::raw("COUNT(CASE status WHEN 'SUCCESS' THEN 1 ELSE NULL END) AS transaksi_perhari"),
        )->whereDate('created_at',  '=', date('Y-m-d'))
        ->get()
        ->toArray();

        if(request()->ajax())
        {
            $total_transaction = Transaction_m::with('menu')->where('status', 'SUCCESS')->get();


            return DataTables::of($total_transaction)
                        ->addColumn('status_order', function($tipe)
                        {
                            if($tipe->status === 'PENDING')
                            {
                                $status = '<span class="badge badge-pill badge-soft-warning font-size-11">' . $tipe->status  . '</span>';

                            }else{
                                $status = '<span class="badge badge-pill badge-soft-success font-size-11">' . $tipe->status  . '</span>';
                            }

                            return $status;
                        })
                    ->rawColumns(['status_order'])
                    ->make(true);
        }

        return view('pages.v2.Dashboard.Laporan.index', compact('total_transaction','total_penjualan', 'total_pemasukan', 'total_transactionday'));
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

    public function Loglaporan(Request $request)
    {

    }

    public function exportexcel($tgl_awal, $tgl_akhir)
    {
        return Excel::download(new LaporantransaksiExport($tgl_awal, $tgl_akhir), 'laporan_transaksi.xlsx');

    }

    public function exportcsv()
    {
        return (new LaporantransaksiExport)->download('laporan_transaksi.csv', \Maatwebsite\Excel\Excel::CSV);
    }

    public function sendlog(Request $request)
    {
        $model = new LogLaporan;

        $model->user_id = Auth::user()->id;
        $model->save();

    }
}
