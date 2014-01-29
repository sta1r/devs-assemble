<!doctype html>
<html lang="en">
<head>
        <meta charset="utf-8">
        <title>Devs Assemble</title>
 
        @include('admin._partials.assets')
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
                <li<?php if (Request::is('*/pages')) { echo ' class="active"'; } ?>><a href="{{ URL::route('admin.pages.index') }}">Pages</a></li>
                <li<?php if (Request::is('*/users')) { echo ' class="active"'; } ?>><a href="{{ URL::route('admin.users.index') }}">Users</a></li>
            </ul>
            <ul class="nav navbar-nav">
                <li><a href="{{ URL::route('admin.logout') }}">Logout</a></li>
            </ul>
        </div><!--/.navbar-collapse -->
      </div>
    </div>


{{-- @include('admin._partials.navigation') --}}

    <!-- Main jumbotron for a primary marketing message or call to action 
    <div class="jumbotron">
        <div class="container">
            <h1>Hello, world!</h1>
            <p>
                This is a template for a simple marketing or informational website. It includes a large callout called a jumbotron and three supporting pieces of content. Use it as a starting point to create something more unique.
            </p>
            <p>
                <a class="btn btn-primary btn-lg" role="button">Learn more &raquo;</a>
            </p>
        </div>
    </div>-->

    <div class="container">
        <!-- Example row of columns -->    
        <div class="row">
            <div class="col-md-12">

                @yield('main')

            </div>
            <!--
            <div class="col-md-4">
                <h2>Heading</h2>
                <p>
                    Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui.
                </p>
                <p>
                    <a class="btn btn-default" href="#" role="button">View details &raquo;</a>
                </p>
            </div>
            <div class="col-md-4">
                <h2>Heading</h2>
                <p>
                    Donec sed odio dui. Cras justo odio, dapibus ac facilisis in, egestas eget quam. Vestibulum id ligula porta felis euismod semper. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus.
                </p>
                <p>
                    <a class="btn btn-default" href="#" role="button">View details &raquo;</a>
                </p>
            </div>
            -->
        </div>
        
        <hr>

        <footer>
            <p>&copy; Company 2013</p>
        </footer>
 
        

    </div>
</body>
</html>