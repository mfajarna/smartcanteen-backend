<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaymentMethod extends Model
{
    use HasFactory;

    protected $table = "tb_payment_method";

    protected $fillable = [
            'name',
            'fee_nominal',
            'fee_persen',
            'min_deposit',
            'image',
            'keterangan',
            'payment_method',
            'payment_channel',
            'payment_kategoris_id',
            'status',
    ];

    public function payment_kategoris()
    {
        return $this->belongsTo(PaymentKategoris::class);
    }

    public function history_deposit()
    {
        return $this->hasMany(HistoryDeposit::class);
    }

}
