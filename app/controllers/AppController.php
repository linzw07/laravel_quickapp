<?php

class AppController extends BaseController {

    protected $layout = "layouts.main";
    protected $per_page = 15;
    protected $file_destination_path = "img/upload/";
    protected $menu_items = "";

    public function __construct() {
        $fid = "|0|1";         
        View::share('menu_items', DB::table('categories')->where("fid", "=", $fid)->get());
        $this->beforeFilter('csrf', array('on' => 'post'));
        $this->beforeFilter('auth');
    }

    public function test($data){
             $this->layout->content = View::make('app.test')->with("data", $data);
    }
            
    public function getDashboard() {

        //$request->segment(2) != Auth::user()->id
        $username = Auth::user()->firstname . " " . Auth::user()->lastname;
        $this->layout->content = View::make('app.dashboard')->with("username", $username);
    }

    public function getUsers() {

        $users = User::where('firstname', '!=', "")->paginate(2);
        $this->layout->content = View::make('app.showuser')->with("users", $users);
    }
    public function getProfile()
    {
        
    }
    
    public function getShowProduct($product_type)
    {

        $product_type =  str_replace('-','&',str_replace('_', ' ', $product_type));
        $product_objects=  DB::table('wants')->where("product_type", "=", $product_type)->get();

        $this->layout->content = View::make('app.show_product')->with('product_type',$product_type)->with("all",false)->with("product_objects", $product_objects)->paginate($this->per_page);;
    }
    public function getAllProducts()
    {
        $product_objects = Want::all();
        $this->test($product_objects);
       $product_type ="All Prodcuts";
        
      $this->layout->content = View::make('app.show_product')->with('product_type',$product_type)->with("all",true)->with("product_objects", $product_objects)->paginate($this->per_page);
    }
    
   /***show create product  form***/
    public function getWantToDo($want_to_do_type)
    {
        $want_name = "";
        $want_type = "";
        $want_desc = "";
        switch($want_to_do_type)
        {
            case "want_to_sell":
            case "want_to_buy":
                    $want_name = "Product Name";
                    $want_type= "Product Type";
                    $want_desc = "Product Descript";
                break;

            case "want_to_recruit":
                    $want_name = "Recruit Title";
                    $want_type= "Recruit Type";
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
        $want_to_do_type = str_replace("_"," ",$want_to_do_type);
        $fid = "|0|1";      
        $categories =DB::table('categories')->where("fid", "=", $fid)->get();
        $this->layout->content = View::make('app.want_to_do')->with('title',$want_to_do_type)->with("categories", $categories)->with("want_name",$want_name)->with("want_type",$want_type)->with("want_desc",$want_desc);

    }
    
    /***create product***/
    public function postWantToDo()
    {
      
        $want = new Want;
        $want->name= Input::get('want_name');
        $product_type = Input::get('want_type');
        $product_type_length = strlen($product_type);
        $want->product_type = str_split($product_type,$product_type_length-1)[0];
        $uploaded_file = Input::file('uploaded_file');
        $want->ask_price = Input::get('ask_price');
        $want->product_descript = Input::get('want_desc');
        $want->uid = Auth::user()->id;
        $want->pic_group_id= 0;
        $want->product_active = "yes";
        $message = "";
        if (Input::hasFile('uploaded_file'))
        {
             $validator = Validator::make(Input::all(),  Want::$rules);

            if ($validator->passes()) 
            {
                $origin_file_path = Input::file('uploaded_file')->getRealPath();
                $origin_get_file_name = Input::file('uploaded_file')->getClientOriginalName();
                $origin_file_extension = Input::file('uploaded_file')->getClientOriginalExtension();
                $origin_file_size = Input::file('uploaded_file')->getSize();
                $origin_file_mine = Input::file('uploaded_file')->getMimeType();
                $message = $this->check_image_type($origin_file_path,$origin_get_file_name,$origin_file_extension,$origin_file_mine,$origin_file_size);
                $result = explode('|',$message)[1];
                $result_message = explode('|',$message)[0];
                $want->pic_url = $this->file_destination_path.$origin_get_file_name;
                
                if($result==="1")
                {
                    $want->save();
                }
            }
            else
            {
                   $result_message = "The image is not valiable";
            }
        }

        $want->save();
        $this->getShowProduct(  $want->product_type);
        // return Redirect::to('/dashboard/users/want/'.$want->product_type)->with("message",$result_message);
    }
    
    /***check image type 'gif", "jpeg", "jpg", "png" and image size***/
    public function check_image_type($path,$name,$extension,$type,$size)
    {
        $allowedExts = array("gif", "jpeg", "jpg", "png");

        $message = "";
         if ((($type == "image/gif")|| ($type == "image/jpeg")|| ($type == "image/jpg")
        || ($type == "image/pjpeg")|| ($type == "image/x-png") || ($type == "image/png"))
        && ($size < 100000)&& in_array($extension, $allowedExts)) {
           if ($_FILES["uploaded_file"]["error"] > 0) {
             $message = "Return Code: " . $_FILES["file"]["error"] . "<br>"."|"."0";
           } else {
               $message = $this->upload_picture($path,$name);
           }
       }
       else {
         $message = "Invalid file, Create product fail"."|"."0";
       }
        return $message;
    }
      /***check image exist or not, if not upload image to img/upload/ fold***/
    public function upload_picture($path,$name)
    {
        $message = "";

       if(file_exists($this->file_destination_path.$name)) 
       {
           
           //it will cover the same file name if exist
            $message = $name. " already exists, Please change the file name if you also want to upload this file. "."|"."1";
       } 
       else
       {
            $current_file_path = $path.'/'.$name;
            Input::file('uploaded_file')->move($this->file_destination_path, $current_file_path);
            $message = "Product has been added successful, you can add another product."."|"."1";
        }
         return $message;
    }



}

?>