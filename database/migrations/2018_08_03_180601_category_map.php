<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CategoryMap extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('category_map', function (Blueprint $table) {
        $table->integer('category_id')->unsigned();
        $table->integer('product_id')->unsigned();
        $table->foreign('category_id')->references('id')->on('product_categories')->onDelete('cascade')->onUpdate('cascade');
        $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade')->onUpdate('cascade');           
      });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('category_map');
    }
}
