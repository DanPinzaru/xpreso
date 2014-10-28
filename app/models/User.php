<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;

class User extends Eloquent implements UserInterface {

	use UserTrait;

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'users';
    
    protected $primaryKey = 'userId';

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = ['userPasswd'];
    
    protected $fillable = [ 'userName', 'userPasswd'];
    
    public static $userGroups = [
        'admins'=>'admin',
        'users'=>'user',
    ];
    
    public static $validationRules = [
        'userName'   => 'required|alpha_num|min:5|max:99|unique:users,userName',
        'userPasswd' => 'required|alpha_num|min:5|max:99',
    ];
    
    public static $loginValidationRules = [
        'userName'   => 'required|alpha_num|min:5|max:99',
        'userPasswd' => 'required|alpha_num|min:5|max:99',
    ];
    
    public function getAuthPassword()
	{
		return $this->userPasswd;
	}
    
    public function addUser()
    {
        $this->userPasswd = Hash::make($this->userPasswd);
        
        return $this->save();
    }
    
    public function isInGroup($groupName)
    {
        if ($this->group != $groupName) {
            return false;
        }
        
        return true;
    }

}
