<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSoldTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sold', function (Blueprint $table) {
            $table->id();
            $table->foreignId('product_id');
            $table->foreignId('sold_products_id');
            $table->foreign('product_id')->references('id')->on('products');
            $table->foreign('sold_products_id')->references('id')->on('sold_products');
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
        Schema::dropIfExists('sold');
    }
}
