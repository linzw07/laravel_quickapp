<div class="panel panel-default">
    <!-- Default panel contents -->

    <div class="panel-body">
        <form action="" method="post" name="form_profile_content" id="form_profile_content" class=" ">


            <div class="row" >
                <div class="col-md-3">
                    <div class="row">
                        <img src="../img/upload/21d2cf7.jpg" class="img-responsive">
                    </div>
                    <div style="color:#F00;margin:20px 10px">
                        <div class="row"  style="margin:10px auto">
                            <a href="{{URL::route('get_account_infomation')}}" data-toggle="tooltip" data-placement="top" title="account information">Account</a>
                        </div>
                        <div class="row"  style="margin:10px auto" >
                            <a href="{{URL::route('edit_account_infomation')}}" data-toggle="tooltip" data-placement="top" title="edit account information">Edit Account </a>
                        </div>
                        <div class="row"  style="margin:10px auto">

                            <a href="{{URL::route('create_profile')}}" data-toggle="tooltip" data-placement="top" title="create profile">Create Profile</a>
                        </div>
                        <div class="row"  style="margin:10px auto">
                            <a href="{{URL::route('profile')}}" data-toggle="tooltip" data-placement="top" title="profile content"> Profile Content</a>
                        </div>
                        <div class="row"  style="margin:10px auto">

                            <a href="{{URL::route('edit_profile')}}" data-toggle="tooltip" data-placement="top" title="edit profile content">Edit Profile</a>
                        </div>
<!--                        <div class="row"  style="margin:10px auto">
                            <a href="{{URL::route('profile_photos')}}" data-toggle="tooltip" data-placement="top" title="profile photos">Profile Photos</a>
                        </div>
                        <div class="row"  style="margin:10px auto">
                            <a href="{{URL::route('profile_videos')}}" data-toggle="tooltip" data-placement="top" title="profile videos">Profile Videos</a>
                        </div>
                        <div class="row"  style="margin:10px auto">
                            Others Content
                        </div>-->
                    </div>
                </div> <!--end of left side bar-->

                <div class="col-md-9  " style="-webkit-box-shadow: 0 0 3px 0 #D1D7FF;box-shadow: 0 0 3px 0 #D1D7FF;background-color:#E6F7FF">


                    <div class="row" >


                        <div class="col-md-12  " style="-webkit-box-shadow: 0 0 3px 0 #D1D7FF;box-shadow: 0 0 3px 0 #D1D7FF;background-color:#E6F7FF">
                            <div class="row" style="font-size:22px;font-weight:bold;margin:10px auto"> 
                                <div class="col-md-5 ">
                                    Profile Information:
                                </div>
                                <div class="col-md-3 col-md-offset-4">
                                    <a href="#" class="">
                                        [ <span class="glyphicon glyphicon-pencil">
                                        </span> Edit ]
                                    </a> 
                                </div>
                            </div>

                            <div class="row" >
                                <div class="form-group">
                                    <div class="col-md-3">
                                        <label for="profile_name"  class="profile_content_font"  >Profile Name: </label>
                                    </div>
                                    <div class="col-md-7 col-md-offset-2" id="profile_name" name="profile_name">
                  
                                        @if($has_profile == true)
                                        {{$profile->profile_name}}
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="row" >
                                <div class="form-group">
                                    <div class="col-md-3">
                                        <label for="city"  class="profile_content_font"  >City: </label>
                                    </div>
                                    <div class="col-md-7 col-md-offset-2" id="city" name="city">
                                        @if($has_profile == true)
                                        {{$profile->city}}
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group">
                                    <div class="col-md-3">
                                        <label for="country"  class="profile_content_font"  >Country : </label>
                                    </div>
                                    <div class="col-md-7 col-md-offset-2" id="country" name="country">
                                        @if($has_profile == true)
                                        {{$profile->country}}
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group">
                                    <div class="col-md-3">
                                        <label for="upload_photo"  class="profile_content_font"  >Upload Profile Photo: </label>
                                    </div>
                                    <div class="col-md-7 col-md-offset-2" name="upload_photo">
                                        @if($has_profile == true)
                                        {{$profile->profile_photo_url}}
                                        @endif
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="form-group">
                                    <div class="col-md-3">
                                        <label for="about_me"  class="profile_content_font"  >About Me: </label>
                                    </div>
                                    <div class="col-md-7 col-md-offset-2" name="about_me">
                                        @if($has_profile == true)
                                        {{$profile->about_me}}
                                        @endif
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div><!--end of profile information-->

                    <div class="row" style="margin:10px auto">
                        <div class="row" style="font-size:22px;font-weight:bold;margin:10px auto"> 
                            <div class="col-md-12 ">
                                Link to Your Social Media Profiles:
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group">
                                <div class="col-md-3">
                                    <label for="facebook_url"  class="profile_content_font"  >Facebook Url: </label>
                                </div>
                                <div class="col-md-8" id="facebook_url" name="facebook_url">
                                    @if($has_profile == true) 
                                    @if($profile->facebook_url!="")    
                                    <a href=" {{$profile->facebook_url}}">  <i class="fa fa-facebook"> </i></a>
                                    @endif   
                                    @endif       
                                </div>
                            </div>
                        </div>
                        <div class="row" >
                            <div class="form-group">
                                <div class="col-md-3">
                                    <label for="twitter_url"  class="profile_content_font"  >Twitter Url: </label>
                                </div>
                                <div class="col-md-8">
                                    @if($has_profile == true)
                                    @if($profile->facebook_url!="")    
                                    <a href=" {{$profile->twitter_url}}">  <i class="fa fa-twitter"></i></a>
                                    @endif

                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group">
                                <div class="col-md-3">
                                    <label for="google_url"  class="profile_content_font"  >Google Url : </label>
                                </div>
                                <div class="col-md-8">
                                    @if($has_profile == true)
                                    @if($profile->facebook_url!="")  
                                  
                                    <a href=" {{$profile->google_url}}">  <i class="fa fa-google-plus"> </i></a>
                                    @endif
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group">
                                <div class="col-md-3">
                                    <label for="linkin_url"  class="profile_content_font"  >Linkin Url : </label>
                                </div>
                                <div class="col-md-8">  
                                    @if($has_profile == true)  

                                    @if($profile->linkin_url!="")    

                                    <a href=" {{$profile->linkin_url}}">  <i class="fa fa-linkedin"> </i></a>
                                    @endif
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group">
                                <div class="col-md-3">
                                    <label for="other_site_url"  class="profile_content_font"  >Other Site Url : </label>
                                </div>
                                <div class="col-md-8">
                                    @if($has_profile == true)
                                    {{$profile->other_site_url}}
                                    @endif
                                </div>
                            </div>
                        </div><!--end of profile information-->
                    </div>

                </div>
            </div>



        </form>
    </div>
</div>
</div>


