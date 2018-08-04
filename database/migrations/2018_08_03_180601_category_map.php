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
        $table->unsignedInteger('category_id');
        $table->unsignedInteger('product_id');  
      });
      
      Schema::table('category_map', function (Blueprint $table) {
        $table->foreign('category_id')->references('id')->on('product_categories');
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
        Schema::dropIfExists('category_map');
    }
}
