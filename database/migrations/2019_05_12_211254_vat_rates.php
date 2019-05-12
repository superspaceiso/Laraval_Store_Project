<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class VatRates extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
	    Schema::create('vat_rates', function (Blueprint $table) {
		    $table->increments('id');
		    $table->string('country_name');
		    $table->string('region_name')->nullable();
		    $table->decimal('main_rate', 4,2);
		    $table->decimal('reduced_rate',4,2)->nullable();
		    $table->decimal('super_reduced_rate',4,2)->nullable();
		    $table->decimal('parking_rate',4,2)->nullable();
	    });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
	    Schema::dropIfExists('vat_rates');
    }
}
