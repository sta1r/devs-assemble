@include('site::_partials/header')
 
<h2>Users</h2>
 
<table class="table table-striped">
 	<thead>
        <tr>
            <th>#</th>
            <th>Title</th>
            <th>Geo Lat</th>
            <th>Geo Lng</th>
        </tr>
    </thead>
    <tbody>
    @foreach ($users as $user)
        <tr>
        	<td>{{ $user->id }}</td>
            <td>{{ $user->email }}</td>
            <td>{{ $user->geolat }}</td>
            <td>{{ $user->geolng }}</td>
        </tr>
    @endforeach
    </tbody>
</table>
 
@include('site::_partials/footer')