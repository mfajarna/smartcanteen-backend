<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaymentKategoris extends Model
{
    use HasFactory;

    protected $table = "tb_payment_kategoris";

    protected $fillable = [
        'nama'
    ];


    public function payment_method()
    {
        return $this->hasMany(PaymentMethod::class);
    }
}
