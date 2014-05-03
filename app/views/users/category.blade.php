
<script>
//    $("#menu_h")append('<ul class="dropdown-menu"><li>View by Unconfirmed Items</li><li>View by Unconfirmed Items</li><li>View by Unconfirmed Items</li></ul>');
             
</script>
<div class="well">
    <!---This section for panel component-->

    <div class="panel panel-primary">
        <div class="panel-heading">
            <h2  style="font-weight:bold; text-align:center" >Category</h2>
        </div>

        <div class="panel-body">
            <div class="row">
            <div class="col-md-5 col-sm-3">
                <table class="table">
                    <caption><h4 style="font-weight:bold">Company contact info:</h4></cation>
 <tr><td> </td></tr>
                    @foreach($categories as $category)
                        <tr><td>{{$category->name}}  </td></tr>
                     @endforeach 
                </table>    
            </div>

        </div>
    </div>
</div>
</div>



