<?php

namespace App\Models\LogLaporan;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LogLaporan extends Model
{
    use HasFactory;

    protected $table = "tb_loglaporan";

    protected $fillable = [
        'user_id',
    ];


    public function user()
    {
        return $this->belongsTo(User::class);
    }



}
