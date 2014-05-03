<div class="row white_box round_border"><br>
   <div class="row" >
       test
   <div class="col-xs-12 col-sm-6 col-md-4 " style="margin:10px 15px; font-family:Times New Roman,Times, serif;font-size:18px;">Product: {{$product_type}}</div>
 </div>

    @foreach($data as $data)
       {{$data->name}}
     @endforeach


    <div style="clear:both"></div>
 </div>
