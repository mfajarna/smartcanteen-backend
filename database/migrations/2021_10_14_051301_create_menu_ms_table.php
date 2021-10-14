<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMenuMsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_menu', function (Blueprint $table) {
            $table->id();

            $table->integer('id_tenant'); // id_tenant for relationship

            $table->string('name')->nullable();
            $table->string('category')->nullable();
            $table->string('ingredients')->nullable();
            $table->integer('price')->nullable();
            $table->integer('rating')->nullable();
            $table->string('picturePath')->nullable();

            $table->integer('is_active'); // active or not active for food or etc

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
        Schema::dropIfExists('tb_menu');
    }
}
