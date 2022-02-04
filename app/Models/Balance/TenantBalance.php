<?php

namespace App\Models\Balance;

use App\Models\Tenant\Tenant_m;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TenantBalance extends Model
{
    use HasFactory;

    protected $table = "tb_balance_account_tenant";

    protected $fillable = [
        'tenant_id',
        'balanced'
    ];


    public function tenant()
    {
        return $this->belongsTo(Tenant_m::class);
    }
}
