<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateColoreablesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('coloreables', function (Blueprint $table) {
            $table->id();
            $table->foreignId('product_id');
            $table->foreignId('colores_id');
            $table->foreign('product_id')->references('id')->on('products');
            $table->foreign('colores_id')->references('id')->on('colores');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('coloreables');
    }
}
