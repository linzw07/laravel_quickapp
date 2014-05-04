<?php

class UsersController extends BaseController {

    protected $layout = "layouts.main";
    protected $menu_items = "";

    public function __construct() {

        $this->beforeFilter('csrf', array('on' => 'post'));
        $fid = "|0|1";         
        /*set menu_items as a global variable. all the views in this controller can visit it*/
        View::share('menu_items', DB::table('categories')->where("fid", "=", $fid)->get()); 

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
          //  $user->save();
            Mail::send('users.email.signup', array('firstname'=>Input::get('firstname')), function($message){
            $message->to(Input::get('email'), Input::get('firstname').' '.Input::get('lastname'))->subject('Welcome to jobsearch website!');
    });
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
        if (Auth::attempt(array('email' => Input::get('email'), 'password' => Input::get('password')))) {
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

    public function getAboutus() {
      
        $this->layout->content = View::make('users.aboutus');
    }

    public function getContactus() {

        $this->layout->content = View::make('users.contactus');
    }

    public function getBrowseCategories() {

//            if($langage="en")
//            {
//                $fid="|0|1";
//            }
        //DB::table('contents')->where("fid","=",$fid);

        $this->layout->content = View::make('users.category')->with("categories", $this->layout->menu_items);
    }
    public function help()
    {
//        $helps= new helpController;
//        $helps->hello();
//          echo $helps->ss;
//          $this->layout->content ="yes";
    }

}

?>