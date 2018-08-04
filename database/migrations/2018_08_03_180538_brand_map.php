<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class BrandMap extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('brand_map', function (Blueprint $table) {
        $table->integer('brand_id')->unsigned();
        $table->integer('product_id')->unsigned();
        $table->foreign('brand_id')->references('id')->on('product_brands')->onDelete('cascade')->onUpdate('cascade');
        $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade')->onUpdate('cascade');;        
      });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('brand_map');
    }
}
