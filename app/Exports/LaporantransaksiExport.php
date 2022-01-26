<?php

namespace App\Exports;

use App\Models\transaction\Transaction_m;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Illuminate\Support\Facades\DB;

class LaporantransaksiExport implements FromCollection,  WithHeadings
{

    protected $tgl_awal, $tgl_akhir, $tgl_daily, $status,$month,$year;

    function __construct($tgl_awal, $tgl_akhir,$tgl_daily,$status,$month,$year)
    {
        $this->tgl_awal = $tgl_awal;
        $this->tgl_akhir = $tgl_akhir;
        $this->tgl_daily = $tgl_daily;
        $this->month = $month;
        $this->year = $year;
        $this->status = $status;
    }

    public function headings():array{
        return[
            'Kode Transaksi',
            'Nama Pelanggan',
            'Nama Pesanan',
            'Tanggal Transaksi',
            'Status'
        ];
    }


    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {

        if($this->status == "range_tanggal")
        {
            return DB::table('tb_transactions')
                    ->join('tb_menu', 'tb_transactions.id_menu', '=', 'tb_menu.id')
                    ->select('tb_transactions.kode_transaksi', 'tb_transactions.nama_pelanggan','tb_menu.name','tb_transactions.created_at','tb_transactions.status')
                    ->whereBetween('tb_transactions.created_at', [$this->tgl_awal,$this->tgl_akhir])
                    ->latest()
                    ->get();
        }

        if($this->status == "daily")
        {
            return DB::table('tb_transactions')
                    ->join('tb_menu', 'tb_transactions.id_menu', '=', 'tb_menu.id')
                    ->select('tb_transactions.kode_transaksi', 'tb_transactions.nama_pelanggan','tb_menu.name','tb_transactions.created_at','tb_transactions.status')
                    ->whereDate('tb_transactions.created_at', $this->tgl_daily)
                    ->latest()
                    ->get();
        }

        if($this->status == "month")
        {
            return DB::table('tb_transactions')
                    ->join('tb_menu', 'tb_transactions.id_menu', '=', 'tb_menu.id')
                    ->select('tb_transactions.kode_transaksi', 'tb_transactions.nama_pelanggan','tb_menu.name','tb_transactions.created_at','tb_transactions.status')
                    ->whereMonth('tb_transactions.created_at', $this->month)
                    ->latest()
                    ->get();
        }

        if($this->status == "year")
        {
            return DB::table('tb_transactions')
                    ->join('tb_menu', 'tb_transactions.id_menu', '=', 'tb_menu.id')
                    ->select('tb_transactions.kode_transaksi', 'tb_transactions.nama_pelanggan','tb_menu.name','tb_transactions.created_at','tb_transactions.status')
                    ->whereYear('tb_transactions.created_at', $this->year)
                    ->latest()
                    ->get();
        }

    }
}
