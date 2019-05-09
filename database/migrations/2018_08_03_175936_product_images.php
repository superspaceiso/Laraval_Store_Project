<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ProductImages extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('product_images', function (Blueprint $table) {
        $table->increments('id');
        $table->unsignedInteger('product_id');
        $table->string('name');
        $table->string('url_slug');
        $table->string('description');
        $table->string('original_image');
        $table->string('image_resize');
        $table->timestamps();
      });
      
      Schema::table('product_images', function (Blueprint $table) {
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
        Schema::dropIfExists('product_images');
    }
}
