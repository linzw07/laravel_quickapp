<h1  style="font-weight:bold" color:#000>{{$title}}</h1>
<div class="well">
    <!---This section for panel component-->
    <div class="panel panel-primary">
    <div class="panel-body">
        <!--This section for media-->
    <div style="margin-bottom:134px;"> 

        {{Form::open(array('url'=> '/dashboard/users/want/', 'class' => 'form-signin required','files' => true, 'method' => 'post','class' => 'form-signin'))}}

        <div class="form-group">
            <label for="want_name" class="self_font">{{$want_name}}:</label>
            <input type="text" name="want_name" id="want_name" class="form-control required " placeholder="product name">
        </div>
        <div class="form-group">
            <label for="want_type" class="self_font">{{$want_type}}:</label>
            <select id="want_type" name="want_type" class="form-control" > 
           
        @foreach($categories as $category)
                     <option>{{$category->name}} ></option>
          @endforeach
            </select>
         </div>
        <div class="form-group">
            <label for="uploaded_file" class="self_font">Upload picture:</label>
            <input type="file" name="uploaded_file" id="uploaded_file" class="form-control required " placeholder="upload picture">
        </div>
         <div class="form-group">
            <div id="show_pic">
            </div>
         </div>
         <div class="form-group">
            <label for="ask_price" class="self_font">Ask Price($):</label>
            <input type="text" name="ask_price" id="group_name" class="form-control required digitals" placeholder="ask price">
        </div>
        <div class="form-group">
            <label for="want_desc" class="self_font">{{$want_desc}}:</label>
            <textarea class="form-control required" rows="4" id = "want_desc" name="want_desc" id="product_desc" autofocus></textarea>
        </div>

                     <a href="javaScript:window.history.go(-1)" style="text-decoration: none;float:left"> 
                         <button type="button" class="btn btn-danger " >Cancel</button>
                     </a>

                     <a style="text-decoration: none;float:right">
                         <button type="submit" class="btn btn-danger" style="background-color:#09ad55;"  value="Submit" value="Submit">Submit</button>
                     </a>

         <div  class ="clear"> </div>

   {{Form::close()}}
      </div>
         
        </div>
    </div>
</div>





