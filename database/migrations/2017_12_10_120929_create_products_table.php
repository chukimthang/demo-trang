<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->unique();
            $table->text('description');
            $table->double('unit_price', 15, 2)->unsigned()->default(0);
            $table->integer('discount')->unsigned()->default(0);
            $table->string('image');
            $table->integer('unit')->default(0);
            $table->integer('status')->default(0);
            $table->integer('quantity')->default(0);
            $table->integer('type_product_id')->unsigned();

            $table->foreign('type_product_id')->references('id')->on('type_products')->onDelete('cascade');
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
        Schema::dropIfExists('products');
    }
}
