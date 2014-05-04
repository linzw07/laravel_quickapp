
{{ Form:: open(array('url' => 'request', 'class'=>'form-signin')) }} 
    <ul>
        @foreach($errors->all(':message') as $message) 

            <li style="font-family:monospace;color:red">{{ $message }} </li>
        @endforeach
    </ul>

{{ Form:: label ('first_name', 'First Name*' )}}
{{ Form:: text ('first_name', '',array('class'=>'form-control  required') )}}

{{ Form:: label ('last_name', 'Last Name*' )}}
{{ Form:: text ('last_name', '' ,array('class'=>'form-control  required'))}}

{{ Form:: label ('phone_number', 'Phone Number' )}}
{{ Form:: text ('phone_number', '', array('placeholder' => '0211226331','class'=>'form-control  required')) }}

{{ Form:: label ('email', 'E-mail Address*') }}
{{ Form:: email ('email', '', array('placeholder' => 'me@example.com','class'=>'form-control  required')) }}

{{ Form:: label ('subject', 'Subject') }}
{{ Form:: select ('subject', array(
'1' => '1',
'2' => '2',
'3' => '3',
'4' => '4'), '1' ) }}

{{ Form:: label ('message', 'Message*' )}}
{{ Form:: textarea ('message', '',array('class'=>'form-control  required'))}}
<div class="row">
    <div class="col-md-5 pull-left" >
{{ Form::reset('Clear',array('class'=>'form-control  required')) }}
</div>
   <div class="col-md-5 pull-right">
{{ Form::submit('Send', array('class'=>'form-control  required')) }}
</div>
    </div>
{{ Form:: close() }}
