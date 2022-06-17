<?php

namespace App\Models\UserApk;

use App\Models\HistoryDeposit;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Sanctum\HasApiTokens;

class UserApk extends Authenticatable
{
    use HasFactory;
    use HasApiTokens;
    use HasProfilePhoto;
    use Notifiable;

    protected $table = "tb_user_apk";
    protected $guard = 'userapk';

    protected $fillable = [
        'nama',
        'is_login',
        'nim',
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
