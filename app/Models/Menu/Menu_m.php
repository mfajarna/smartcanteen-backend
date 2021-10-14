<?php

namespace App\Models\Menu;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu_m extends Model
{
    use HasFactory;

    protected $table = 'tb_menu';

    protected $fillable = [
        'is_null'
    ];
}
