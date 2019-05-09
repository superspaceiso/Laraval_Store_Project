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
      Schema::create('address_junction', function (Blueprint $table) {
        $table->unsignedInteger('user_id');
        $table->unsignedInteger('address_id');
      });
      
      Schema::table('address_junction', function (Blueprint $table) {
        $table->foreign('customer_id')->references('id')->on('user');
        $table->foreign('address_id')->references('id')->on('addresses');
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
