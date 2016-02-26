<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRelAdventureQuestTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
	Schema::create('rel_adventure_quest', function(Blueprint $table){
		$table->increments('id');
		$table->integer('adventurer_id')->unsigned();
		$table->integer('quest_id')->unsigned();
		$table->integer('state');
		$table->index(['adventurer_id', 'quest_id']);
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
        //
	Schema::drop('rel_adventure_quest');
    }
}
