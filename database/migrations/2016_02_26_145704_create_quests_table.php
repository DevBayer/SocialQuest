<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQuestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
       Schema::create('quests', function (Blueprint $table) {
            $table->increments('id');
	    $table->integer('user_id')->unsigned();
	    $table->integer('category_id')->unsigned();
            $table->text('description');
	    $table->string('location');
            $table->dateTime('start_time');
	    $table->dateTime('end_time');
            $table->timestamps();

		$table->foreign('user_id')
		      ->references('id')->on('users')
		      ->onDelete('restrict');

		$table->foreign('category_id')
		      ->references('id')->on('categories')
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
	Schema::drop('quests');

    }
}
