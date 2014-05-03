
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
 
    <title>My App</title>
   @include('layouts.head')
  </head>
 
  <body style="background: #17CFB6">

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
        
    
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </div>
    <div class="container">
        @if(Session::has('message'))
            <p class="alert">{{ Session::get('message') }}</p>
        @endif

    </div>
  </body>
</html>