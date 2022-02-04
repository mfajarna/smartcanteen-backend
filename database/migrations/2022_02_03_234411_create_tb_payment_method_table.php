<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTbPaymentMethodTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_payment_method', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('fee_nominal')->nullable();
            $table->string('fee_persen')->nullable();
            $table->string('min_deposit')->nullable();
            $table->string('image')->nullable();
            $table->string('keterangan')->nullable();
            $table->string('payment_method')->nullable();
            $table->string('payment_channel')->nullable();

            $table->unsignedBigInteger('payment_kategoris_id');
            $table->foreign('payment_kategoris_id')->references('id')->on('tb_payment_kategoris')
                ->onUpdate('cascade')->onDelete('cascade');

            $table->string('status')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tb_payment_method');
    }
}
