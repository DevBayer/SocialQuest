<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

public class Badge extends Model {

	protected $fillable = array('name', 'requirements');
}

