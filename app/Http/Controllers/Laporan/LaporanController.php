<?php

namespace App\Http\Controllers\Laporan;

use App\Exports\LaporantransaksiCsv;
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
        return abort(404);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return abort(404);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return abort(404);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return abort(404);
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
        return abort(404);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return abort(404);
    }

    public function exportexcel($tgl_awal, $tgl_akhir)
    {

        $status = "range_tanggal";

        return Excel::download(new LaporantransaksiExport($tgl_awal, $tgl_akhir,NULL,$status,NULL,NUll), 'laporan_transaksi.xlsx');

    }

    public function export_daily($tgl_daily)
    {
        $status = "daily";
        $tanggal = date('Y-m-d', strtotime($tgl_daily));

        return Excel::download(new LaporantransaksiExport(NULL, NULL, $tanggal,$status,NULL,NULL), 'laporan_transaksi_daily.xlsx');
    }

    public function export_month($month)
    {
        $status = "month";
        $month_date = date('m', strtotime($month));

        return Excel::download(new LaporantransaksiExport(NULL, NULL, NULL,$status,$month_date,NULL), 'laporan_transaksi_month.xlsx');
    }

    public function export_year($year)
    {
        $status = "year";
        $year_date = date('Y', strtotime($year));

        return Excel::download(new LaporantransaksiExport(NULL, NULL, NULL,$status,NULL,$year_date), 'laporan_transaksi_year.xlsx');
    }

    public function exportcsv($tgl_awal, $tgl_akhir)
    {

        return Excel::download(new LaporantransaksiCsv($tgl_awal, $tgl_akhir), 'laporan_transaksi.csv');

    }


    public function sendlog(Request $request)
    {
        $model = new LogLaporan;

        $model->user_id = Auth::user()->id;
        $model->save();
    }

}
