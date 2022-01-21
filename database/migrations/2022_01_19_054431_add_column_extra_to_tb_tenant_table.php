<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnExtraToTbTenantTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tb_tenant', function (Blueprint $table) {
            $table->string('jangka_waktu_kontrak')->nullable();
            $table->string('sharing')->nullable();
            $table->string('qris_barcode')->nullable();
            $table->string('file_kontrak')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('tb_tenant', function (Blueprint $table) {
            //
        });
    }
}
