<?php
 
class UsersController extends BaseController {
    protected $layout = "layouts.main";

    public function __construct() {
	    $this->beforeFilter('csrf', array('on'=>'post'));
	}

    public function getSignUp() {
	    $this->layout->content = View::make('users.register');
	}

	public function postSignUp() {
	    $validator = Validator::make(Input::all(), User::$rules);
	 
	    if ($validator->passes()) {
	        // validation has passed, save user in DB
	        $user = new User;
		    $user->firstname = Input::get('firstname');
		    $user->lastname = Input::get('lastname');
		    $user->email = Input::get('email');
		    $user->password = Hash::make(Input::get('password'));
		    $user->save();
		 
		    return Redirect::to('login')->with('message', 'Thanks for registering!');
	    } else {
	        // validation has failed, display error messages
	        return Redirect::to('signup')->with('message', 'The following errors occurred')->withErrors($validator)->withInput();    
	    }
	}

	public function getLogin() {
	    $this->layout->content = View::make('users.login');
	}

	public function postLogin() {
		if (Auth::attempt(array('email'=>Input::get('email'), 'password'=>Input::get('password')))) {
		    return Redirect::to('dashboard')->with('message', 'You are now logged in!');
		} else {
		    return Redirect::to('login')
		        ->with('message', 'Your username/password combination was incorrect')
		        ->withInput();
		}
	}

	public function getLogout() {
    	Auth::logout();
    	return Redirect::to('login')->with('message', 'Your are now logged out!');
	}
}

?>