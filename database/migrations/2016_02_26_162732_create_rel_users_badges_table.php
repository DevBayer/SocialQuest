<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRelUsersBadgesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rel_users_badges', function(Blueprint $table){
		$table->increments('id');
		$table->integer('user_id')->unsigned();
		$table->integer('badge_id')->unsigned();
		$table->timestamps();

		$table->foreign('user_id')
		      ->references('id')->on('users')
		      ->onDelete('cascade');

		$table->foreign('badge_id')
		      ->references('id')->on('users')
		      ->onDelete('restrict');


	});
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('rel_users_badges');
    }
}
