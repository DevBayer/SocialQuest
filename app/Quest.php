<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

public class Quest extends Model {

	protected $fillable = array('userid', 'category', 'description', 'location', 'start_time', 'end_time', 'reward');

}


