<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdventurerTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //

	Schema::create('adventurers', function (Blueprint $table){
		$table->integer('user_id')->unsigned();
		$table->integer('karma')->default(0);
		$table->bigInteger('experience')->default(0);
		$table->integer('level')->default(1);
		$table->timestamps();
		$table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
	});

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
	Schema::drop('adventurers');
    }
}
