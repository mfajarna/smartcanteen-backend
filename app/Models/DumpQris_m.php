<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DumpQris_m extends Model
{
    use HasFactory;
    
    protected $table = 'tb_dump_qris';
    protected $fillable = [
        "type",
        "status",
        "datetime",
        "merchant_id",
        "reference_label",
        "invoice_no",
        "amount",
        "mdr",
        "issue_name",
        "customer_name",
        "store_label",
        "terminal_label"
    ];
}
