<?php


namespace App\Exports;

use App\Models\transaction\Transaction_m;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithCustomCsvSettings;

class LaporantransaksiCsv implements FromCollection, WithCustomCsvSettings,  WithHeadings
{

    protected $tgl_awal, $tgl_akhir;

    function __construct($tgl_awal, $tgl_akhir)
    {
        $this->tgl_awal = $tgl_awal;
        $this->tgl_akhir = $tgl_akhir;
    }


    public function getCsvSettings(): array
    {
        return [
            'delimiter' => ';'
        ];
    }



    public function headings():array{
        return [
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
        return Transaction_m::whereBetween('created_at', [$this->tgl_awal,$this->tgl_akhir])->latest()->get();
    }
}

?>
