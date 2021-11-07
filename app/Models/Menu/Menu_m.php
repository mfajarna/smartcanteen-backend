<?php

namespace App\Models\Menu;

use App\Models\Tenant\Tenant_m;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;


class Menu_m extends Model
{
    use HasFactory;

    protected $table = 'tb_menu';

    protected $fillable = [
        'id_tenant',
        'name',
        'category',
        'ingredients',
        'price',
        'rating',
        'picturePath',
        'kode_menu',
        'is_active'
    ];

    public function tenant()
    {
        return $this->hasOne(Tenant_m::class, 'id','id_tenant');
    }


    public function toArray(){
        $toArray = parent::toArray();
        $toArray['picturePath'] = $this->picturePath;

        return $toArray;
    }

    public function getPicturePathAttribute()
    {
        return url('') . Storage::url($this->attributes['picturePath']);
    }

    public function getCreatedAttribute($value)
    {
        return Carbon::parse($value)->timestamp;
    }

     public function getUpdatedAttribute($value)
     {
         return Carbon::parse($value)->timestamp;
     }
}
