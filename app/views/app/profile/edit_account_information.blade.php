<div class="panel panel-default">
    <!-- Default panel contents -->

    <div class="panel-body">

        {{ Form::open(array('url'=>'/dashboard/edit_account_infomation','id'=>'form_edit_profile'))}}

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

            <div class="col-md-9  " style="-webkit-box-shadow: 0 0 3px 0 #D1D7FF;box-shadow: 0 0 3px 0 #D1D7FF;background-color:#E6F7FF;height:800px">
                <div class="row" style="font-size:22px;font-weight:bold;margin:10px auto"> 
                    <div class="col-md-5 ">
                        Account Information:
                    </div>
                    <div class="col-md-3 col-md-offset-3">
                        <button  type="submit">[ Save ]</button>
                    </div>
                </div>
                <div class="row"  style="margin:15px auto">
                    <div class="form-group">
                        <div class="col-md-3">
                            <label for="first_name"  class="profile_content_font"  >First Name: </label>
                        </div>
                        <div class="col-md-7 ">
                            <input type="text" name="first_name" id="first_name" class="form-control required " placeholder="first name" value="{{$user->firstname}}">
                        </div>
                    </div>
                </div>
                <div class="row"  style="margin:15px auto">
                    <div class="form-group">
                        <div class="col-md-3">
                            <label for="last_name"  class="profile_content_font"  >Last Name: </label>
                        </div>
                        <div class="col-md-7 ">
                            <input type="text" name="last_name" id="last_name" class="form-control required " placeholder="last name" value="{{$user->lastname}}">
                        </div>
                    </div>
                </div>
                <div class="row"  style="margin:15px auto">
                    <div class="form-group">
                        <div class="col-md-3" >
                            <label for="email"  class="profile_content_font"  >Email : </label>
                        </div>
                        <div class="col-md-7" >
                            <input type="email" name="email" id="email" class="form-control required " placeholder="email" value="{{$user->email}}">
                        </div>
                    </div>
                </div>
                <div class="row" style="margin:15px auto">
                    <div class="form-group">
                        <div class="col-md-3">
                            <label for="created_time"  class="profile_content_font"  >Created Time : </label>
                        </div>
                        <div class="col-md-7 ">
                            {{$user->created_at}}
                        </div>
                    </div>
                </div><!--end of profile information-->

        
            </div>
        </div>



        {{ Form::close() }}

    </div>
</div>
</div>


