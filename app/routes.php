<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', 'UsersController@help');


Route::get('/signup', 'UsersController@getSignUp');
Route::post('/signup', 'UsersController@postSignUp');

Route::get('/login', 'UsersController@getLogin');
Route::post('/login', 'UsersController@postLogin');

Route::get('/logout', 'UsersController@getLogout');
Route::get('/browse',array('as' => 'browse','uses'=>'UsersController@getBrowseCategories')); 
Route::get('/aboutus',array('as' => 'aboutus','uses'=>'UsersController@getAboutus')); 
Route::get('/contactus',array('as' => 'contactus','uses'=>'UsersController@getContactus')); 


//it is to show the users information
Route::get('/dashboard', 'AppController@getDashboard');
Route::get('/dashboard/users', 'AppController@getUsers');

//It is about the add and show (want to do type)
Route::get('/dashboard/users/want/{want_to_do_type}',array('as' => 'want_to_do','uses'=>'AppController@getWantToDo')); 
Route::post('/dashboard/users/want',array('uses'=>'AppController@postWantToDo')); 
Route::get('/dashboard/users/{product_type}',array('as' => 'show_product','uses'=>'AppController@getShowProduct')); ///dashboard/users/{product_type} can not be /dashboard/users/want/{product_type} as all have been used above
//It is to get all product
Route::get('/dashboard/products',array('as' => 'show_all_products','uses'=>'AppController@getAllProducts')); 

//It is to add the process of add an item like trademe
Route::get('/dashboard/users/progress',array('as' => 'progress','uses'=>'AppController@getProgress')); 

//It is to deal with the community
Route::get('/dashboard/users/community',array('as' => 'community','uses'=>'AppController@getCommunity')); 


Route::post('update_data_ajax',function()
{
   $which_step = $_REQUEST["ajax_action"];
   switch($which_step)
   {
       case 'first_step':
		$request = Request::create('/dashboard/users/recruitment', 'GET');
		 echo Route::dispatch($request)->getContent();
             break;
       case 'second_step':
               break;
       case 'third_step':
           
             break;
       case 'fourth_step':
               break;
       case 'fifth_step':
           
             break;
         default : echo "can not find the method";
   }
});

