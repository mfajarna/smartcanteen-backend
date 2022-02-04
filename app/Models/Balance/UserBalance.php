<?php

namespace App\Models\Balance;


use App\Models\UserApk\UserApk;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserBalance extends Model
{
    use HasFactory;

    protected $table = "tb_balance_account_user";

    protected $fillable = [
        'user_id',
        'balanced'
    ];


    public function user()
    {
        return $this->belongsTo(UserApk::class);
    }
}
