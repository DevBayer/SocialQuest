<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Foundation\Auth\Access\Authorizable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;

class User extends Model implements AuthenticatableContract,
                                    AuthorizableContract,
                                    CanResetPasswordContract
{
    use Authenticatable, Authorizable, CanResetPassword;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'surname1', 'surname2', 'avatar', 'biography', 'location', 'latlng', 'email', 'password'];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = ['password', 'remember_token'];


	public function setAvatarAttribute($file){
		if(!empty($file) && is_object($file)){
		    $filename = value(function() use ($file){
		        $filename = str_random(40);
		        return strtolower($filename).'.'.$file->getClientOriginalExtension();
		    });
		    \Storage::disk('local')->put($filename,  \File::get($file));
                    $this->attributes['avatar']=$filename;
		}else{
			if(!empty($file)){
				return $file;
			}
		}
	}

	public function isProfileCompleted(){
		return false;
	}


    public function getAvatarContentAttribute(){
	if(!empty($this->avatar)){
		if(\Storage::exists($this->avatar)){
			$img = \Image::make(\File::get(storage_path() . '/app/' . $this->avatar));
			$img->encode('png');
			return 'data:image/png;base64,' . base64_encode($img);
		}
	}else{
		return 'http://ideanto.com/wp-content/uploads/2013/07/foto-perfil.jpg';
	}

    }


	public function getSurnamesAttribute(){
		return $this->surname1.(!empty($this->surname2) ? ' '.$this->surname2 : '');
	}

	public function getDateCreatedFormatedAttribute(){;
		return $this->created_at->format('j l \\d\\e F Y');
	}


        public function getLongitudAttribute(){
                if(!empty($this->latlng)){
                        return explode(",",$this->latlng)[0];
                }else{
                        return '41.4045963';
                }
        }


	public function getLatitudeAttribute(){
		if(!empty($this->latlng)){
			return explode(",",$this->latlng)[1];
		}else{
			return '2.1790418';
		}
	}

}
