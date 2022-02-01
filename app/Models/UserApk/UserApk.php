<?php

namespace App\Models\UserApk;

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
}
