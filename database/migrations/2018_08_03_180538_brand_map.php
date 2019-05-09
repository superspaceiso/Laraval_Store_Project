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
      Schema::create('brand_junction', function (Blueprint $table) {
        $table->unsignedInteger('brand_id');
        $table->unsignedInteger('product_id');     
      });
      
      Schema::table('brand_junction', function (Blueprint $table) {
        $table->foreign('brand_id')->references('id')->on('product_brands');
        $table->foreign('product_id')->references('id')->on('products');        
      });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('brand_junction');
    }
}
