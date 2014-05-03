<div class="row white_box round_border"><br>
   <div class="row" >
   <div class="col-xs-12 col-sm-6 col-md-4 " style="margin:10px 15px; font-family:Times New Roman,Times, serif;font-size:18px;">Product: {{$product_type}}</div>
 </div>

    @foreach($product_objects as $product_object)
     <div class="col-xs-12 col-sm-6 col-md-4" >
           
        <div class="list-group">
            <li class="list-group-item">
            <div style="font-size:20px;color:#000; text-align: center">{{$product_object->name}}</div>
            </li>

          <li class="list-group-item">
              @if($all==true)
                   <img src="../{{$product_object->pic_url}}" style="width:100%;height:200px;">
              @else
                    <img src="../../{{$product_object->pic_url}}" style="width:100%;height:200px;">
            @endif
          </li>
           <li class="list-group-item" style="font-size:20px;color:#000;text-align: center;font-family: sans-serif;">
                <div class="row" style="font-size:20px;">
                    {{$product_object->product_type}}
                </div>
                <div class="row" style=" color:#000;font-size:18px;">
                    Ask Price: {{$product_object->ask_price}}
                </div> 

               <div class="row" style="font-size:10px;color:#000; ">
                   {{$product_object->product_descript}}
               </div>
          </li>


        </div>
       
     </div>
     @endforeach

     <?php echo $product_objects->links(); ?>
    <div style="clear:both"></div>
 </div>
