<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Products extends Migration
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
        $table->string('url_slug')->unique();
        //$table->string('manufacturer_code')->nullable();
        //$table->string('store_code');
        $table->text('description');
        $table->integer('quantity');            
        $table->boolean('on_sale');
        $table->decimal('original_price',11,4);
        $table->decimal('new_price',11,4)->nullable();
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
