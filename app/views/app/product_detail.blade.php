

@foreach($product_objects as $product_object)

<!---This section for panel component-->


<!--This section for media-->
<div style="margin-bottom:134px;"> 

    <div class="col-xs-12 col-sm-12 col-md-12" >

        <div class="list-group" >

            <li class="list-group-item" style="background-color:#E7E7E1">
                <div  class="row" >
                    <div class="col-md-12">
                        <h4  style="font-weight:bold; color:#000;text-align:center">{{$product_object->name}}</h4>
                    </div>
                </div>
            </li>

            <li class="list-group-item" style="background-color:#E7E7E7">
                <div  class="row" >
                    <div class="col-md-1">
                        <i class="fa fa-user"></i>
                    </div>
                    <div class="col-md-11" >
                        Created Time:  {{$product_object->created_at}}   
                    </div>
                </div>
            </li>

            <li class="list-group-item" > 
                <div class="row">
                    <div class="col-md-7" >

                        <div  class="row profile_content_font" style="border:1px solid; height:400px; overflow-y: scroll;overflow-x:hidden;margin-left:5px;padding:8px;5px; word-wrap:break-word; ">
                            {{$product_object->product_descript}}
                        </div>

                    </div>
                    <div class="col-md-4 col-md-offset-1" >
                        <div class="row" style="border:1px solid ">
                            <img src="../../../{{$product_object->pic_url}}" style="width:100%;height:200px;">
                        </div>

                        <div class="row" style="color:#000; margin-top:30px">
                           <div style="font-size:16px;"> Picture Descript: </div>
                            <div class="col-md-12" style="height:150px; overflow-y: scroll;overflow-x:hidden;  word-wrap:break-word;margin:auto 2px;" >
                            <p>    {{trim($product_object->pic_desc)}}  </p>
                            </div>
                        </div>
                    </div>
                </div>
            </li>
            <li class="list-group-item" style="font-size:20px;color:#000;text-align: center;font-family: sans-serif;">

                <div class="row" style=" color:#000;font-size:20px;">
                    Ask Price: {{$product_object->ask_price}}
                </div> 

            </li>


        </div>

    </div>



    <div style="clear:both"></div>
</div>





@endforeach


