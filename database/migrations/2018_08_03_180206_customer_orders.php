<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CustomerOrders extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('customer_orders', function (Blueprint $table) {
        $table->increments('id');
        $table->unsignedInteger('customer_id');    
        $table->date('order_date');
        $table->decimal('order_total',11,4);
        $table->date('shipped_date')->nullable();
      });
      
      Schema::table('customer_orders', function (Blueprint $table) {
        $table->foreign('customer_id')->references('id')->on('customer');  
      });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('customer_orders');
    }
}
