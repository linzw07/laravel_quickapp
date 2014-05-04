<div class="panel panel-default">
    <!-- Default panel contents -->

    <div class="panel-body">

        {{ Form::open(array('url'=>'/dashboard/create_profile','id'=>'form_edit_profile'))}}

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
<!--                    <div class="row"  style="margin:10px auto">
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
                              <div class="col-md-3 col-md-offset-3">
                        <button  type="submit">[ Create ]</button>
                    </div>
                        </div>
                        <div class="row" style="margin:10px 2px">
                            <div class="form-group">
                                <div class="col-md-3">
                                    <label for="profile_name"  class="profile_content_font"  >Profile Name: </label>
                                </div>
                                <div class="col-md-7 " id="profile_name">
                                    <input type="text" name="profile_name" id="profile_name" class="form-control required " placeholder="profile name" value="">
                                </div>
                            </div>
                        </div>
                        <div class="row" style="margin:10px 2px">
                            <div class="form-group">
                                <div class="col-md-3">
                                    <label for="city"  class="profile_content_font"  >City: </label>
                                </div>
                                <div class="col-md-7 " id="city">
                                    <input type="text" name="city" id="city" class="form-control required " placeholder="city" value="">

                                </div>
                            </div>
                        </div>
                        <div class="row" style="margin:10px 2px">
                            <div class="form-group">
                                <div class="col-md-3">
                                    <label for="country"  class="profile_content_font"  >Country : </label>
                                </div>
                                <div class="col-md-7" id="country">
                                    <select id="country" name="country"  class="form-control required" value="New Zealand">
                                        <option value="">Please Select One</option>
                                        <option value="china"> china</option>
                                        <option value="American"> American</option>
                                        <option value="Canada"> Canada</option>
                                        <option value="Uk"> Uk</option>
                                        <option value="Signapa"> Signapa</option>
                                        <option value="Australia"> Australia</option>
                                        <option value="New Zealand"> New Zealand</option>
                                    </select>
                                </div>
                            </div>
                        </div>


                        <div class="row" style="margin:10px 2px">
                            <div class="form-group">
                                <div class="col-md-3">
                                    <label for="about_me"  class="profile_content_font"  >About Me: </label>
                                </div>
                                <div class="col-md-7 ">
                                    <textarea class="form-control required" rows="5" name="about_me" id="about_me"  value="" autofocus></textarea>

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
                    <div class="row" style="margin:10px 2px">
                        <div class="form-group">
                            <div class="col-md-3">
                                <label for="facebook_url"  class="profile_content_font"  >Facebook Url: </label>
                            </div>
                            <div class="col-md-8">
   
                                    <input type="text" name="facebook_url" id="facebook_url" class="form-control required " placeholder="facebook url" value="">
          
                            </div>
                        </div>
                    </div>
                    <div class="row"  style="margin:10px 2px">
                        <div class="form-group">
                            <div class="col-md-3">
                                <label for="twitter_url"  class="profile_content_font"  >Twitter Url: </label>
                            </div>
                            <div class="col-md-8">
                                <a href="#">         
                                    <input type="text" name="twitter_url" id="twitter_url" class="form-control required " placeholder="twitter url" value="">
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="row" style="margin:10px 2px">
                        <div class="form-group">
                            <div class="col-md-3">
                                <label for="google_url"  class="profile_content_font"  >Google Url : </label>
                            </div>
                            <div class="col-md-8">
                                <a href="#">         
                                    <input type="text" name="google_url" id="google_url" class="form-control required " placeholder="google url" value="">
                                </a>

                            </div>
                        </div>
                    </div>
                    <div class="row" style="margin:10px 2px">
                        <div class="form-group">
                            <div class="col-md-3">
                                <label for="linkin_url"  class="profile_content_font"  >Linkin Url : </label>
                            </div>
                            <div class="col-md-8">
                                <a href="#">         
                                    <input type="text" name="linkin_url" id="linkin_url" class="form-control required " placeholder="linkin url" value="">
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="row" style="margin:10px 2px">
                        <div class="form-group">
                            <div class="col-md-3">
                                <label for="other_site_url"  class="profile_content_font"  >Other Site Url : </label>
                            </div>
                            <div class="col-md-8">
                                <a href="#">         
                                    <input type="text" name="other_site_url" id="other_site_url" class="form-control required " placeholder="other site url" value="">
                                </a>
                            </div>
                        </div>
                    </div><!--end of profile information-->
                </div>

            </div>
        </div>



        {{ Form::close() }}

    </div>
</div>
</div>


