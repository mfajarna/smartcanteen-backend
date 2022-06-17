<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDumpQrisMsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_dump_qris', function (Blueprint $table) {
            $table->id();
            $table->string('type')->nullable();
            $table->string('status')->nullable();
            $table->date('datetime')->nullable();
            $table->string('merchant_id');
            $table->string('reference_label')->nullable();
            $table->string('invoice_no');
            $table->string('amount');
            $table->string('mdr');
            $table->string('issue_name')->nullable();
            $table->string('customer_name')->nullable();
            $table->string('store_label')->nullable();
            $table->string('terminal_label')->nullable();
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
        Schema::dropIfExists('tb_dump_qris');
    }
}
