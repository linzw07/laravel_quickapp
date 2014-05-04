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

//login and logout and signup page
Route::get('/signup', 'UsersController@getSignUp');
Route::post('/signup', 'UsersController@postSignUp');
Route::get('/login', 'UsersController@getLogin');
Route::post('/login', 'UsersController@postLogin');
Route::get('/logout', 'UsersController@getLogout');



//general page
Route::get('/browse',array('as' => 'browse','uses'=>'UsersController@getBrowseCategories')); 
Route::get('/aboutus',array('as' => 'aboutus','uses'=>'UsersController@getAboutus')); 
Route::get('/contactus',array('as' => 'contactus','uses'=>'UsersController@getContactus')); 
Route::get('request',array('as' => 'request','uses'=>'AppController@getRequest')); 
Route::post('request',array('uses'=>'AppController@postRequest')); 




//it is to show the users information
Route::get('/dashboard', 'AppController@getDashboard');
Route::get('/dashboard/users', 'AppController@getUsers');




//It is about the add and show (want to do type)
Route::get('/dashboard/users/want/{want_to_do_type}',array('as' => 'want_to_do','uses'=>'AppController@getWantToDo')); 
Route::post('/dashboard/users/want',array('uses'=>'AppController@postWantToDo')); 
Route::get('/dashboard/users/{product_type}',array('as' => 'show_product','uses'=>'AppController@getShowProduct')); ///dashboard/users/{product_type} can not be /dashboard/users/want/{product_type} as all have been used above
//It is to get all product
Route::get('/dashboard/products',array('as' => 'show_all_products','uses'=>'AppController@getAllProducts')); 
Route::get('/dashboard/products/{product_id}/product_detail',array('as' => 'product_detail','uses'=>'AppController@getProductDetail'));





//It is to add the process of add an item like trademe
Route::get('/dashboard/users/progress',array('as' => 'progress','uses'=>'AppController@getProgress')); 





//It is to deal with user account information page  
Route::get('/dashboard/get_account_infomation',array('as' => 'get_account_infomation','uses'=>'AppController@getAccountInfomation')); 
Route::get('/dashboard/edit_account_infomation',array('as' => 'edit_account_infomation','uses'=>'AppController@getEditAccountInfomation')); 
Route::post('/dashboard/edit_account_infomation',array('uses'=>'AppController@postEditAccountInfomation')); 





//It is to deal with private profile page   
Route::get('/dashboard/create_profile',array('as' => 'create_profile','uses'=>'AppController@getCreateProfile'));
Route::post('/dashboard/create_profile',array('uses'=>'AppController@postCreateProfile'));
Route::get('/dashboard/profile',array('as' => 'profile','uses'=>'AppController@getProfile')); 
Route::get('/dashboard/edit_profile',array('as' => 'edit_profile','uses'=>'AppController@getEditProfile')); 
Route::post('/dashboard/edit_profile',array('uses'=>'AppController@postEditProfile')); 
Route::get('/dashboard/profile_photos',array('as' => 'profile_photos','uses'=>'AppController@getProfilePhotos')); 
Route::post('/dashboard/profile_photos',array('uses'=>'AppController@postProfilePhotos')); 
Route::get('/dashboard/profile_videos',array('as' => 'profile_videos','uses'=>'AppController@getProfileVideos')); 
Route::post('/dashboard/profile_videos',array('uses'=>'AppController@postProfileVideos')); 
Route::get('/dashboard/other_content',array('as' => 'other_content','uses'=>'AppController@getOtherContent')); 




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

