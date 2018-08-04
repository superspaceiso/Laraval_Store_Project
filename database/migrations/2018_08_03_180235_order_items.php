<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class OrderItems extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('order_items', function (Blueprint $table) {
        $table->increments('id');
        $table->unsignedInteger('order_id');
        $table->integer('product_id')->unsigned();
        $table->string('product_name');
        $table->integer('item_quantity');
        $table->decimal('order_total',11,4);  
      });
      
      Schema::table('order_items', function (Blueprint $table) {
        $table->foreign('order_id')->references('id')->on('customer_orders');
      });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('order_items');
    }
}
