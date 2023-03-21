<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTallablesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tallables', function (Blueprint $table) {
            $table->id();
            $table->foreignId('product_id');
            $table->foreignId('talla_id');
            $table->foreign('product_id')->references('id')->on('products');
            $table->foreign('talla_id')->references('id')->on('tallas');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tallables');
    }
}
