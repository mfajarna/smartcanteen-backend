<?php

namespace App\Models;

use App\Models\Menu\Menu_m;
use App\Models\Tenant\Tenant_m;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Overallmenu_m extends Model
{
    use HasFactory;

    protected $table = 'tb_overallmenu';
    protected $fillable = [
        'id_tenant',
        'id_menu',
        'tanggal_periode',
        'total_order'
    ];

    public function Menu(){
        return $this->hasOne(Menu_m::class, 'id', 'id_menu');
    }

    public function Tenant()
    {
        return $this->hasOne(Tenant_m::class, 'id', 'id_tenant');
    }
}
