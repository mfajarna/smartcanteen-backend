<?php

namespace App\Models\Tenant;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tenant_m extends Model
{
    use HasFactory;

    protected $table = "tb_tenant";

    protected $fillable = [
        'is_null'
    ];
}
