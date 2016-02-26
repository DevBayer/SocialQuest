<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

public class Adventurer extends Model {

	protected $fillable = array('karma', 'experience', 'level', 'badges');

}
