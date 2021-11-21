<?php

namespace App\Models\transaction;

use App\Models\Menu\Menu_m;
use App\Models\Tenant\Tenant_m;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Transaction_m extends Model
{
    use HasFactory;

    protected $table ="tb_transactions";

    protected $fillable = [
            'kode_transaksi',
            'id_user',
            'nama_pelanggan',
            'nim',
            'id_menu',
            'id_tenant',
            'status',
            'method',
            'quantity',
            'total',
    ];

    public function menu()
    {
        return $this->hasOne(Menu_m::class, 'id', 'id_menu');
    }

    public function tenant()
    {
        return $this->hasOne(Tenant_m::class, 'id', 'id_tenant');
    }

    public function getCreatedAttribute($value)
    {
        return Carbon::parse($value)->timestamp;
    }

    public function getUpdatedAttribute($value)
     {
         return Carbon::parse($value)->timestamp;
     }
}
