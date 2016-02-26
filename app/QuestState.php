<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

public class AdventurerQuest extends Model {

	public static $states = array(	
					0 => "open",
					1 => "applied",
					2 => "inprogress",
					3 => "completed"
				);

	protected $fillable = array('adventurerid', 'questid', 'state');

	public function getState() {
		return $states[$this->state];
	}

}

