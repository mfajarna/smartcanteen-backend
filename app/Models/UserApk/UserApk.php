<?php

namespace App\Models\UserApk;

use App\Models\HistoryDeposit;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserApk extends Model
{
    use HasFactory;

    protected $table = "tb_user_apk";

    protected $fillable = [
        'nama',
        'is_login',
        'device_token'
    ];

    public function balance_user()
    {
        return $this->hasMany(UserBalance::class);
    }

    public function history_deposit()
    {
        return $this->hasMany(HistoryDeposit::class);
    }
}
