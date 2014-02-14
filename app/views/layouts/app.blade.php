<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
 
    <title>My App</title>
    {{ HTML::style('stylesheets/bootstrap.min.css')}}
    {{ HTML::style('stylesheets/main.css')}}
  </head>
 
  <body>
    <div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">My App</a>
        </div>
        <div class="collapse navbar-collapse pull-right">
          <ul class="nav navbar-nav">
            <li>{{ HTML::link('#section1', 'Section 1') }}</li>   
            <li>{{ HTML::link('#section2', 'Section 2') }}</li>
            <li>{{ HTML::link('logout', 'Logout') }}</li> 
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </div>
    <div class="container">
        @if(Session::has('message'))
            <p class="alert">{{ Session::get('message') }}</p>
        @endif

        {{ $content }}
    </div>
  </body>
</html>