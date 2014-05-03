
{{ Form::open(array('url'=>'signup', 'class'=>'form-signin'),array('id' => 'form_signup')) }}
    <h2 class="form-signin-heading" style="font-family:monospace;font-size:25px;">Please Register</h2>
 
    <ul>
        @foreach($errors->all() as $error)
            <li style="font-family:monospace;color:red">{{ $error }}</li>
        @endforeach
    </ul>
       <img src="img/logo/logo1.png" style="width:100%;;height:150px;" >
    {{ Form::text('firstname', null, array('class'=>'form-control  required', 'placeholder'=>'First Name')) }}
    {{ Form::text('lastname', null, array('class'=>'form-control required', 'placeholder'=>'Last Name')) }}
    {{ Form::text('email', null, array('class'=>'form-control required', 'placeholder'=>'Email Address')) }}
    {{ Form::password('password', array('class'=>'form-control required', ' style'=>'margin-bottom:-5px','placeholder'=>'Password')) }}
    {{ Form::password('password_confirmation', array('class'=>'form-control required','style'=>'margin-bottom:-5px','placeholder'=>'Confirm Password'))}}
    {{ Form::submit('Register', array('class'=>'btn btn-large btn-primary btn-block'))}}
{{ Form::close() }}
<script type="text/javascript"> 
     $().ready(function() {
	 $("#form_signup").validate();
	 });
</script>