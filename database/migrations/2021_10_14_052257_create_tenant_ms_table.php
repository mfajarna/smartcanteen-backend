<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTenantMsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_tenant', function (Blueprint $table) {
            $table->id();

            $table->string('nama_pemilik')->nullable();
            $table->string('nama_tenant')->nullable();
            $table->string('email')->nullable();
            $table->string('no_telp')->nullable();
            $table->string('lokasi_kantin')->nullable();
            $table->string('nama_rekening')->nullable();
            $table->integer('no_rekening')->nullable();
            $table->string('online')->nullable();

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
        Schema::dropIfExists('tb_tenant');
    }
}
