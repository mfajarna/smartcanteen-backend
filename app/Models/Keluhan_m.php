<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Keluhan_m extends Model
{
    use HasFactory;

    protected $table = "tb_keluhan";

    protected $fillable = [
        'user_id',
        'keluhan'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
