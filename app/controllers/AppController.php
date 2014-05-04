<?php

class AppController extends BaseController {

    protected $layout = "layouts.main";
    protected $per_page = 6;
    protected $file_destination_path = "img/upload/";
    protected $menu_items = "";

    public function __construct() {
        $fid = "|0|1";
        View::share('menu_items', DB::table('categories')->where("fid", "=", $fid)->get());
        $this->beforeFilter('csrf', array('on' => 'post'));
        $this->beforeFilter('auth');
    }

    public function test($data) {
        $this->layout->content = View::make('app.test')->with("data", $data);
    }

    public function getDashboard() {

        //$request->segment(2) != Auth::user()->id
        $username = Auth::user()->firstname . " " . Auth::user()->lastname;
        $this->layout->content = View::make('app.dashboard')->with("username", $username);
    }

    /*     * *start of deal with users** */

    public function getUsers() {

        $users = User::where('firstname', '!=', "")->paginate(2);
        $this->layout->content = View::make('app.showuser')->with("users", $users);
    }

    /*     * *end of deal with users** */




    /*     * *start of deal with profile** */

    public function getAccountInfomation() {
        $user = Auth::user();
        $this->layout->content = View::make('app.profile.user_account_information')->with("user", $user);
    }

    public function getEditAccountInfomation() {
        $user = Auth::user();
        $this->layout->content = View::make('app.profile.edit_account_information')->with("user", $user);
    }

    public function postEditAccountInfomation() {
        $firstname = trim(Input::get('first_name'));
        $lastname = trim(Input::get('last_name'));
        $email = trim(Input::get('email'));
        $user = Auth::user();
        $user->firstname = $firstname;
        $user->lastname = $lastname;
        $user->email = $email;
        $user->save();
        $this->layout->content = View::make('app.profile.user_account_information')->with("user", $user);
    }

    public function getCreateProfile() {
        $this->layout->content = View::make('app.profile.create_profile');
    }

    public function postCreateProfile() {
        
        $new_profile = new Profile;
        if( Profile::where('uid', '=', Auth::user()->id)->exists())
        {
             $message = "You already have profile";
             Session::put('message', $message);
             $this->layout->content = View::make('app.profile.edit_profile')->with('profile',Profile::where('uid', '=', Auth::user()->id))->with('has_profile', true)->with("message", $message);
        }
        else
        {
 
            $profile_name = Input::get('profile_name');
            $city = Input::get('city');
            $country = Input::get('country');
         //   $uploaded_file = Input::get('uploaded_file');
            $about_me = Input::get('about_me');
            $facebook_url = Input::get('facebook_url');
            $twitter_url = Input::get('twitter_url');
            $google_url = Input::get('google_url');
            $linkin_url = Input::get('linkin_url');
            $other_site_url = Input::get('other_site_url');


            $new_profile->uid = Auth::user()->id;
            $new_profile->profile_name = $profile_name;
            $new_profile->city = $city;
            $new_profile->country = $country;
            $new_profile->about_me = $about_me;
            $new_profile->facebook_url = $facebook_url;
            $new_profile->twitter_url = $twitter_url;
            $new_profile->google_url = $google_url;
            $new_profile->linkin_url = $linkin_url;
            $new_profile->other_site_url = $other_site_url;
            $new_profile->profile_photo_url = "";
            $message = "";

             $new_profile->save();
             $has_profile = false;
               Session::put('message', $message);
              $this->layout->content = View::make('app.profile.profile_content')->with('profile', $new_profile)->with('has_profile', true)->with("message", $message);
        }
//         if (Input::hasFile('uploaded_file')) {
//                $test = "22";
//            $validator = Validator::make(Input::all(), Want::$rules);
//
//            if ($validator->passes()) {
//                $origin_file_path = Input::file('uploaded_file')->getRealPath();
//                $origin_get_file_name = Input::file('uploaded_file')->getClientOriginalName();
//                $origin_file_extension = Input::file('uploaded_file')->getClientOriginalExtension();
//                $origin_file_size = Input::file('uploaded_file')->getSize();
//                $origin_file_mine = Input::file('uploaded_file')->getMimeType();
//                $message = $this->check_image_type($origin_file_path, $origin_get_file_name, $origin_file_extension, $origin_file_mine, $origin_file_size);
//                $result = explode('|', $message)[1];
//                $result_message = explode('|', $message)[0];
//                $new_profile->profile_photo_url = $this->file_destination_path . $origin_get_file_name;
//
//                if ($result === "1") {
//                    $new_profile->save();
//                }
//            } else {
//                $message = "The image is not valiable";
//            }
//        }
   

       
    }

    public function getProfile() {

        $id = Auth::user()->id;
        $profile = Profile::where('uid', '=', $id);

        if ($profile->first()){
            $has_profile = false;
        } else {
            $has_profile = true;
        }

        //  $this->layout->content = count($profile);
        $this->layout->content = View::make('app.profile.profile_content')->with('profile', $profile)->with('has_profile', $has_profile);
    }

    public function getEditProfile() {
        $user = Auth::user();
        $this->layout->content = View::make('app.profile.edit_profile')->with("user", $user);
    }

    public function postEditProfile() {
        //update profile data
        $user_id = Auth::user()->id;
        $profile = Profile::where('uid', '=', $user_id);
        $profile_name = trim(Input::get('profile_name'));
        $city = trim(Input::get('city'));
        $country = trim(Input::get('country'));
        $upload_photo = trim(Input::get('uploaded_file'));
        $about_me = trim(Input::get('about_me'));
        $facebook_url = trim(Input::get('facebook_url'));
        $twitter_url = trim(Input::get('twitter_url'));
        $google_url = trim(Input::get('google_url'));
        $linkin_url = trim(Input::get('linkin_url'));
        $other_site_url = trim(Input::get('other_site_url'));

        $has_profile = true;
        if (count($profile) == 1) { //create the profile record
        } else {  //update profile record
            $profile->profile_name = $profile_name;
            $profile->city = $city;
            $profile->country = $city;
            $profile->about_me = $about_me;
            $profile->facebook_url = $facebook_url;
            $profile->twitter_url = $twitter_url;
            $profile->google_url = $google_url;
            $profile->linkin_url = $linkin_url;
            $profile->other_site_url = $other_site_url;
            $profile->upload_photo = $upload_photo;
            if (Input::hasFile('upload_photo')) {
                $validator = Validator::make(Input::all(), Want::$rules);

                if ($validator->passes()) {
                    $origin_file_path = Input::file('upload_photo')->getRealPath();
                    $origin_get_file_name = Input::file('upload_photo')->getClientOriginalName();
                    $origin_file_extension = Input::file('upload_photo')->getClientOriginalExtension();
                    $origin_file_size = Input::file('upload_photo')->getSize();
                    $origin_file_mine = Input::file('upload_photo')->getMimeType();
                    $message = $this->check_image_type($origin_file_path, $origin_get_file_name, $origin_file_extension, $origin_file_mine, $origin_file_size);
                    $result = explode('|', $message)[1];
                    $result_message = explode('|', $message)[0];
                    $profile->profile_photo_url = $this->file_destination_path . $origin_get_file_name;
                    if ($result === "1") {
                        $profile->save();
                    }
                } else {
                    $profile->profile_photo_url = "";
                    $result_message = "The image is not valiable";
                }
            }
        }

        $this->layout->content = View::make('app.profile.profile_content')->with('user', $user)->with('profile', $profile)->with('has_profile', $has_profile);
    }

    public function getProfilePhotos() {
        //    $this->layout->content = View::make('app.profile.get_profile');//->with("user", $user);
    }

    public function postProfilePhotos() {
        //    $this->layout->content = View::make('app.profile.get_profile');//->with("user", $user);
    }

    public function getProfileVideos() {
        //    $this->layout->content = View::make('app.profile.get_profile');//->with("user", $user);
    }

    public function postProfileVideos() {
        //    $this->layout->content = View::make('app.profile.get_profile');//->with("user", $user);
    }

    public function getOtherContent() {
        
    }

    /*     * *end of deal with profile** */




    /*     * *start of deal with the ask question** */

    public function getRequest() {
        $this->layout->content = View::make('users.email.contact_form');
    }

    public function postRequest() {
        $data = Input::all();

        //Validation rules
        $rules = array(
            'first_name' => 'required|alpha',
            'last_name' => 'required|alpha',
            'phone_number' => 'numeric|min:8',
            'email' => 'required|email',
            'message' => 'required|min:25'
        );

        //Validate data
        $validator = Validator::make($data, $rules);

        //If everything is correct than run passes.
        if ($validator->passes()) {
            Mail::send('users.email.hello', array('firstname' => Input::get('firstname')), function($message) {
                $message->to(Input::get('email'), Input::get('first_name') . ' ' . Input::get('last_name'))->subject('We have receive your question. We will deal with it as soon as possible. Thanks for your asking question.');
            });
            return View::make('users.email.contact_form');
        } else {
            //return contact form with errors
            return Redirect::to('request')->withErrors($validator);
        }
    }

    /*     * *end of deal with the ask question** */





    /*     * *start of deal with with create and show product** */

    public function getShowProduct($product_type) {

        $product_type = str_replace('-', '&', str_replace('_', ' ', $product_type));
        $product_objects = DB::table('wants')->where("product_type", "=", $product_type)->paginate($this->per_page);

        $this->layout->content = View::make('app.show_product')->with('product_type', $product_type)->with("all", false)->with("product_objects", $product_objects);
    }

    public function getAllProducts() {
        $product_objects = DB::table('wants')->select('*')->paginate($this->per_page);

        $product_type = "All Prodcuts";

        $this->layout->content = View::make('app.show_product')->with('product_type', $product_type)->with("all", true)->with("product_objects", $product_objects);
    }
    public function getProductDetail($product_id)
    {
        $product_objects = Want::where('id','=',$product_id)->get();
        $this->layout->content = View::make('app.product_detail')->with('product_objects', $product_objects);
    }
    
    
    
    
    
    /*     * *show create product  form** */

    public function getWantToDo($want_to_do_type) {
        $want_name = "";
        $want_type = "";
        $want_desc = "";
        switch ($want_to_do_type) {
            case "want_to_sell":
            case "want_to_buy":
                $want_name = "Product Name";
                $want_type = "Product Type";
                $want_desc = "Product Descript";
                break;

            case "want_to_recruit":
                $want_name = "Recruit Title";
                $want_type = "Recruit Type";
                $want_desc = "Recruit Description";
                break;
            case "want_to_job":
                $want_name = "Job Title";
                $want_type = "Job Type";
                $want_desc = "Job Description";
                break;
            case "want_a_partner":
                $want_name = "Title";
                $want_type = "Partner Job Type";
                $want_desc = "Partner Description";
                break;
            case "want_a_team":
                $want_name = "Title";
                $want_type = "Team Type";
                $want_desc = "Team Description";
                break;
            case "want_sb_to_do":
                $want_name = "Thing Title";
                $want_type = "Thing Type";
                $want_desc = "Thing Description";
                break;
            case "want_other":
                $want_name = "Want Name";
                $want_type = "Want Type";
                $want_desc = "Want Description";
                break;
            default:
                break;
        }
        $want_to_do_type = str_replace("_", " ", $want_to_do_type);
        $fid = "|0|1";
        $categories = DB::table('categories')->where("fid", "=", $fid)->get();
        $this->layout->content = View::make('app.want_to_do')->with('title', $want_to_do_type)->with("categories", $categories)->with("want_name", $want_name)->with("want_type", $want_type)->with("want_desc", $want_desc);
    }

    /*     * *create product** */

    public function postWantToDo() {

        $want = new Want;
        $want->name = Input::get('want_name');
        $product_type = Input::get('want_type');
        $product_type_length = strlen($product_type);
        $want->product_type = str_split($product_type, $product_type_length - 1)[0];
        $uploaded_file = Input::file('uploaded_file');
        $want->ask_price = Input::get('ask_price');
        $want->product_descript = Input::get('want_desc');
        $want->uid = Auth::user()->id;
        $want->pic_group_id = 0;
        $want->product_active = "yes";
        $message = "";
        if (Input::hasFile('uploaded_file')) {
            $validator = Validator::make(Input::all(), Want::$rules);

            if ($validator->passes()) {
                $origin_file_path = Input::file('uploaded_file')->getRealPath();
                $origin_get_file_name = Input::file('uploaded_file')->getClientOriginalName();
                $origin_file_extension = Input::file('uploaded_file')->getClientOriginalExtension();
                $origin_file_size = Input::file('uploaded_file')->getSize();
                $origin_file_mine = Input::file('uploaded_file')->getMimeType();
                $message = $this->check_image_type($origin_file_path, $origin_get_file_name, $origin_file_extension, $origin_file_mine, $origin_file_size);
                $result = explode('|', $message)[1];
                $result_message = explode('|', $message)[0];
                $want->pic_url = $this->file_destination_path . $origin_get_file_name;

                if ($result === "1") {
                    $want->save();
                }
            } else {
                $result_message = "The image is not valiable";
            }
        }

     ///   $want->save();
        $this->getShowProduct($want->product_type);
        // return Redirect::to('/dashboard/users/want/'.$want->product_type)->with("message",$result_message);
    }

    /*     * *check image type 'gif", "jpeg", "jpg", "png" and image size** */

    public function check_image_type($path, $name, $extension, $type, $size) {
        $allowedExts = array("gif", "jpeg", "jpg", "png");

        $message = "";
        if ((($type == "image/gif") || ($type == "image/jpeg") || ($type == "image/jpg") || ($type == "image/pjpeg") || ($type == "image/x-png") || ($type == "image/png")) && ($size < 100000) && in_array($extension, $allowedExts)) {
            if ($_FILES["uploaded_file"]["error"] > 0) {
                $message = "Return Code: " . $_FILES["file"]["error"] . "<br>" . "|" . "0";
            } else {
                $message = $this->upload_picture($path, $name);
            }
        } else {
            $message = "Invalid file, Create product fail" . "|" . "0";
        }
        return $message;
    }

    /*     * *check image exist or not, if not upload image to img/upload/ fold** */

    public function upload_picture($path, $name) {
        $message = "";
//$dir = str_random(8);
        if (file_exists($this->file_destination_path . $name)) {

            //it will cover the same file name if exist
            $message = $name . " already exists, Please change the file name if you also want to upload this file. " . "|" . "1";
        } else {
            $current_file_path = $path . '/' . $name;
            Input::file('uploaded_file')->move($this->file_destination_path, $current_file_path);
            $message = "Product has been added successful, you can add another product." . "|" . "1";
        }
        return $message;
    }

    /*     * *end of deal with with create and show product** */
}

?>