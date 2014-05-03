<div style="margin-bottom:134px;">
{{ Form::open(array('url'=>'login', 'class'=>'form-signin')) }}
    <h2 class="form-signin-heading" style="font-family:monospace;font-size:25px;">Please Login</h2>
    <img src="img/logo/logo1.png" style="width:100%;height:150px;" class="img-responsive">
    {{ Form::text('email', null, array('class'=>'form-control required', 'placeholder'=>'Email Address')) }}
    {{ Form::password('password', array('class'=>'form-control required',' style'=>'margin-bottom:-5px','placeholder'=>'Password')) }}
    {{ Form::submit('Login', array('class'=>'btn btn-large btn-primary btn-block'))}}
{{ Form::close() }}
</div>