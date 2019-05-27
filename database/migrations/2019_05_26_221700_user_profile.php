<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UserProfile extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
	    Schema::create('user_profile', function (Blueprint $table) {
		    $table->increments('id');
		    $table->unsignedInteger('user_id');
		    $table->string('title')->nullable();
		    $table->string('first_name');
		    $table->string('middle_name')->nullable();
		    $table->string('surname');
		    $table->date('DoB');
		    $table->string('phone_no')->nullable();
		    $table->string('mobile_no')->nullable();
		    $table->timestamps();
	    });

	    Schema::table('user_profile', function (Blueprint $table) {
		    $table->foreign('user_id')->references('id')->on('users');
	    });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
	    Schema::dropIfExists('user_profile');
    }
}
