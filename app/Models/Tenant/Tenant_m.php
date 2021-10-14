<?php

namespace App\Models\Tenant;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tenant_m extends Model
{
    use HasFactory;

    protected $table = "tb_tenant";

    protected $fillable = [
        'id_tenant',
        'nama_pemilik',
        'nama_tenant',
        'email',
        'no_telp',
        'email',
        'no_telp',
        'lokasi_kantin',
        'nama_rekening',
        'no_rekening',
        'status',
        'is_active'
    ];
    

    public function getCreatedAttribute($value)
    {
        return Carbon::parse($value)->timestamp;
    }

     public function getUpdatedAttribute($value)
     {
         return Carbon::parse($value)->timestamp;
     }
}
