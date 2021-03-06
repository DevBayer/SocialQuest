<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
    	    $table->string('surname1');
            $table->string('surname2');
            $table->string('email')->unique();
            $table->string('password', 60);
    	    $table->string('avatar', 150);
    	    $table->text('biography');
    	    $table->string('location');
    	    $table->string('latlng', 200);
            $table->string('latitude', 100);
            $table->string('longitude', 100);
            $table->rememberToken();
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
        Schema::drop('users');
    }
}
