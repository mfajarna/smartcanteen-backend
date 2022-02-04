<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTbHistoryDepositTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_history_deposit', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('tb_user_apk')
                ->onUpdate('cascade')->onDelete('cascade');

            $table->string('nominal_deposit')->default(0);

            $table->unsignedBigInteger('payment_id');
            $table->foreign('payment_id')->references('id')->on('tb_payment_method')
            ->onUpdate('cascade')->onDelete('cascade');

            $table->string('payment_no')->nullable();
            $table->string('payment_name')->nullable();
            $table->string('trx_id')->nullable();

            $table->string('expired')->nullable();
            $table->string('status')->default(0);
            

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
        Schema::dropIfExists('tb_history_deposit');
    }
}
