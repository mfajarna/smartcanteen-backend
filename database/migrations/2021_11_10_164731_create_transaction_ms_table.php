<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransactionMsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_transactions', function (Blueprint $table) {
            $table->id();
            $table->integer('id_user');
            $table->integer('id_menu');
            $table->integer('id_tenant');
            $table->string('status');
            $table->string('method');

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
        Schema::dropIfExists('tb_transactions');
    }
}
