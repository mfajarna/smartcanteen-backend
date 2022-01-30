<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnSharingToTbTenant extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tb_tenant', function (Blueprint $table) {
            $table->integer('sharing_telu')->after('sharing')->nullable();
            $table->integer('sharing_tenant')->after('sharing')->nullable();
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
