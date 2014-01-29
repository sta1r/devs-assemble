<!doctype html>
<html lang="en">
<head>
        <meta charset="utf-8">
        <title>Devs Assemble</title>
 
        @include('site::_partials.assets')
</head>
<body onload="initialize()">

    <div class="container">
    	<div class="row">
			<div class="col-md-12 aligncenter">
				<h1>Devs Assemble</h1>
				<ol>
					<li>Find devs near you</li>
					<li>Code</li>
				</ol>
			</div>
		</div>	

		<div class="row">
			<div class="col-md-12 map">
				<div id="map_canvas" style="width:100%; height:100%"></div>
			</div>
		</div>
	</div>

<script>
// Define the list of markers.
// This could be generated server-side with a script creating the array.
var devMarkers = [

	@foreach ($users as $user)

		{ lat: {{ $user->geolat }}, lng: {{ $user->geolng }}, name: "{{ $user->email }}", content: "<a href='{{ URL::route('user', $user->id) }}'>View profile</a>" },
			        
	@endforeach

];
</script>

<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script src="http://maps.google.com/maps/api/js?sensor=true"></script>

<script type="text/javascript" src="{{ URL::asset('site/assets/js/map-init.js') }}"></script>

</body>
</html>