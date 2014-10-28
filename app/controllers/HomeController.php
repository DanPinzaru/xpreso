<?php

class HomeController extends BaseController {

	/*
	|--------------------------------------------------------------------------
	| Default Home Controller
	|--------------------------------------------------------------------------
	|
	| You may wish to use controllers instead of, or in addition to, Closure
	| based routes. That's great! Here is an example controller method to
	| get you started. To route to this controller, just add the route:
	|
	|	Route::get('/', 'HomeController@showWelcome');
	|
	*/

	public function showIndex()
	{
		return View::make('layouts.frontend');
	}
    
	public function getLogin()
	{
		return View::make('login');
	}
    
	public function postLogin()
	{
        $validation = Validator::make(Input::all(), User::$loginValidationRules);
        
        if ($validation->fails()) {
            return Redirect::to('login')->withErrors($validation);
        }
        
        /*$user = new User();
        */
        
        $creds = [
            'userName'=>$this->sanitize(Input::get('userName')),
            'password'=>$this->sanitize(Input::get('userPasswd')),
        ];
        
        if (!Auth::attempt($creds, Input::has('remember'))) {
            return Redirect::back()->withAlert('Illegal login or password');
        }
        
        return Redirect::to('/');
	}
    
    public function getLogout()
    {
        Auth::logout();
        return Redirect::to('/');
    }
    
    public function getRegister()
	{
		return View::make('register');
	}
    public function postRegister()
	{
        $validationRues = User::$validationRules;
        $validationRues['userPasswdRepeat'] = 'same:userPasswd';
        
        $validation = Validator::make(Input::all(), $validationRues);
        
        if ($validation->fails()) {
            return Redirect::to('register')->withErrors($validation);
        }
        
        $creds = [
            'userName'=>$this->sanitize(Input::get('userName')),
            'password'=>$this->sanitize(Input::get('userPasswd')),
            'passwordRepeat'=>$this->sanitize(Input::get('userPasswdRepeat')),
        ];
        
        $newUser = new User();
        $newUser->userName = $this->sanitize(Input::get('userName'));
        $newUser->userPasswd = $this->sanitize(Input::get('userPasswd'));
        $newUser->group = User::$userGroups['users'];
        
        if (!$newUser->addUser()) {
            return Redirect::back()->withAlert('Error to create new user');
        }
        
        Auth::login($newUser, Input::has('remember'));
        
		return Redirect::to('/');
	}

}
