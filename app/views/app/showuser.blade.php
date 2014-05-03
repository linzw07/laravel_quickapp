<div class="row white_box round_border"><br>
    <h1>Dashboard</h1>
 
<p>Welcome to your Dashboard.</p>
    @foreach($users as $user)
     <div class="col-xs-12 col-sm-6 col-md-3">
        <h5><b>User ID:{{$user->id}}</b></h5>

        <div class="list-group">
          <li class="list-group-item">
          <span class="badge capitalize">{{$user->firstname}}</span>
          First Name:
          </li>


          <li class="list-group-item">
          <span class="badge capitalize">{{$user->lastname}}</span>
          LastName:
          </li>
           <li class="list-group-item">
          <span class="badge capitalize">{{$user->email}}</span>
          Email:
          </li>

          <a href="?travel_do=add_a_new_admin" class="list-group-item active remove">[ <span class="glyphicon glyphicon-pencil"></span> Edit ]</a>
        </div>
       
     </div>
     @endforeach
    <?php echo $users->links(); ?>

    <div style="clear:both"></div>
 </div>
