
<h2 style="margin-top:-30px;font-weight: bold">Dashboard</h2>

<h3 style="font-size:16px;font-weight: bold">Category:<h3>
        <h3 style="font-size:12px">Choose a category for your listing.</h3>
        <div class="row white_box round_border"><br>


            <div class="col-xs-2 col-sm-2 col-md-2">
                <a style=""  ><div  class="self_btn_click" id="first_step" onclick="update_data_ajax('recruitment_content', 'ajax_action=first_step', 'no');
                        event.preventDefault();"><h4 style="line-height:60px;color:#fff;">1:Category</h4></div></a>
            </div>
            <div class="col-xs-2 col-sm-2 col-md-2">
                <div class="self_btn" id="second_step"><h4 style="line-height:60px;color:#fff;">2:Detailsh</h4> </div>
            </div>
            <div class="col-xs-2 col-sm-2 col-md-2">
                <div class="self_btn"  id="third_step"><h4 style="line-height:60px;color:#fff;">3:Photos</h4></div>
            </div>
            <div class="col-xs-2 col-sm-2 col-md-2">
                <div class="self_btn"  id="fourth_step"><h4 style="line-height:60px;color:#fff;">4:Extras</h4></div>
            </div>
            <div class="col-xs-2 col-sm-2 col-md-2">
                <div class="self_btn"  id="fifth_step"><h4 style="line-height:60px;color:#fff;">5:Confirm</h4></div>
            </div>



        </div>
        <div class="row white_box round_border"><br>
            <div class="col-xs-12 col-sm-10 col-md-11"style="margin-bottom:5px">


                <div class="row"  style="margin-top:15px">
                    <div style="-webkit-box-shadow: 0 0 2px 0 #171717;
                         box-shadow: 0 0 2px 0 #171717;height:150px;width:400px;overflow-y: scroll;">
                         @foreach($categories as $category)
                         
                         {{$category->name}} > <br>
                         @endforeach
                        
                        
                    </div>
                </div>
                <div class="row"  style="margin-top:15px">
                    <div style="-webkit-box-shadow: 0 0 2px 0 #171717;
                         box-shadow: 0 0 2px 0 #171717;height:150px;width:400px;overflow-y: scroll;">
                    </div>
                </div>
                <div class="row"  style="margin-top:15px">
                    <div style="-webkit-box-shadow: 0 0 2px 0 #171717;
                         box-shadow: 0 0 2px 0 #171717;height:150px;width:400px;overflow-y: scroll;">
                    </div>
                </div>
                <div class="row" style="margin-top:15px">
                    <div style="-webkit-box-shadow: 0 0 2px 0 #171717;
                         box-shadow: 0 0 2px 0 #171717;height:150px;width:400px;overflow-y: scroll;">
                    </div>
                    <div class="clear"></div>
                </div>


            </div>

        </div>