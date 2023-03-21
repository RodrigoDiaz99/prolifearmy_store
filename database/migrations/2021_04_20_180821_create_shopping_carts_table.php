<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateShoppingCartsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shopping_carts', function (Blueprint $table) {
            $table->id();
            $table->foreignId("user_id");
            $table->foreignId("product_id");
            $table->integer('quantity');
            $table->string('price')->nullable();
            $table->string('subtotal')->nullable();
            $table->timestamps();

            //Relaciones
            $table->foreign("user_id")->references('id')->on("users");

            $table->foreign("product_id")->references('id')->on("products");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('shopping_carts');
    }
}