<!doctype html>
<html lang="en">
<head>
        <meta charset="utf-8">
        <title>Devs Assemble</title>
 
        @include('site::_partials.assets')
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
          <a class="navbar-brand" href="{{ URL::route('home') }}">Devs Assemble</a>
        </div>
        <div class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
            	@include('site::_partials.navigation')
            </ul>
          <form class="navbar-form navbar-right" role="form">
            <div class="form-group">
              <input type="text" placeholder="Email" class="form-control">
            </div>
            <div class="form-group">
              <input type="password" placeholder="Password" class="form-control">
            </div>
            <button type="submit" class="btn btn-success">Sign in</button>
          </form>
        </div><!--/.navbar-collapse -->
      </div>
    </div>

    <div class="container">
    	<div class="row">
			<div class="col-md-12">
				
			</div>
		</div>	
	</div>