<?php

namespace App\Models;

use App\Models\UserApk\UserApk;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HistoryDeposit extends Model
{
    use HasFactory;

    protected $table = "tb_history_deposit";

    protected $fillable = [
        'user_id',
        'payment_no',
        'payment_name',
        'trx_id',
        'nominal_deposit',
        'payment_id',
        'expired',
        'status'
    ];

    
    public function user()
    {
        return $this->belongsTo(UserApk::class);
    }

    public function payment()
    {
        return $this->belongsTo(PaymentMethod::class);
    }
}
