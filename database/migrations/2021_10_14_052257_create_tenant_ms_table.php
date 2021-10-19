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
            
            $table->string('id_tenant')->nullable();
            $table->string('nama_pemilik')->nullable();
            $table->string('nama_tenant')->nullable();
            $table->string('email')->nullable();
            $table->string('no_telp')->nullable();
            $table->string('lokasi_kantin')->nullable();
            $table->string('nama_rekening')->nullable();
            $table->string('no_rekening')->nullable();
            $table->string('profile_photo_path', 2048)->nullable();
            
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            
            $table->string('status');
            $table->string('is_active');


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
