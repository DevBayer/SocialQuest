<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Quest extends Model {

	protected $fillable = array('user_id', 'category_id', 'description', 'location', 'latlng', 'latitude', 'longitude', 'start_time', 'end_time', 'reward');

	public function user() {
		return $this->hasOne('App\User', 'id', 'user_id');
	}

	public function category() {
		return $this->hasOne('App\Category', 'id', 'category_id');
	}

	 public function getLongitudeAttribute(){
            if(!empty($this->latlng)){
                    return explode(",",$this->latlng)[0];
            }else{
                    return '0';
            }
    }


	public function getLatitudeAttribute(){
		if(!empty($this->latlng)){
			return explode(",",$this->latlng)[1];
		}else{
			return '0';
		}
	}
}


