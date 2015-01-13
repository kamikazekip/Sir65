<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class User extends Eloquent implements UserInterface, RemindableInterface {

	use UserTrait, RemindableTrait;

	protected $table = 'users';

        public static $rules = array(
        'username'=>'required|alpha_num|min:2',
        'password'=>'required|alpha_num|between:6,12|confirmed',
        'password_confirmation'=>'required|alpha_num|between:6,12',
        'terms_of_agreement'=>'accepted'
        );
        
        public function scopeSearchProfiles($query, $inquery){
            return $query->where('username', 'LIKE', ('%' . $inquery . '%'))->orderBy("respect", "DESC");
        }
        
        public function scopeGetCommunityStrength($query){
            return $query->count();
        }
        
        public function scopeIsUnique($query, $inquery){
            $user = $query->where('username', '=', $inquery)->get()->first();
            return is_null($user);
        }
        
	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = array('password', 'remember_token');
        
        public function notification()
        {
            return $this->hasMany('Notification');
        }
}
