<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CustomerAddress extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('customer_address', function (Blueprint $table) {
        $table->unsignedInteger('customer_id');
        $table->unsignedInteger('address_id');
      });
      
      Schema::table('customer_address', function (Blueprint $table) {
        $table->foreign('customer_id')->references('id')->on('customer');
        $table->foreign('address_id')->references('id')->on('customer_addresses');
      });
      
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('customer_address');
    }
}
