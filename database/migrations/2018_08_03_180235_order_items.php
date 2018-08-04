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
        $table->integer('order_id')->unsigned();
        $table->integer('customer_id')->unsigned();
        $table->foreign('order_id')->references('id')->on('customer_orders')->onDelete('cascade')->onUpdate('cascade');
        $table->foreign('customer_id')->references('id')->on('customer')->onDelete('cascade')->onUpdate('cascade');            
        $table->integer('item_quantity');
        $table->decimal('order_total',11,4);  
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
