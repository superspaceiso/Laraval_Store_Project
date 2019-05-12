<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Addresses extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('addresses', function (Blueprint $table) {
        $table->increments('id');
        $table->string('address_line1');
        $table->string('address_line2')->nullable();
        $table->string('address_line3')->nullable();
        $table->string('town');
        $table->string('postcode');
        $table->string('county')->nullable();
        $table->string('country');                        
      });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('addresses');
    }
}
