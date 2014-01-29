@extends('admin._layouts.default')
 
@section('main')

    <h2>Users</h2>

    {{ Notification::showAll() }}
 
    <table class="table table-striped">
        <thead>
            <tr>
                <th>#</th>
                <th>Title</th>
                <th>Geo Lat</th>
                <th>Geo Lng</th>
                <th><i class="icon-cog"></i></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
                <tr>
                    <td>{{ $user->id }}</td>
                    <td><a href="{{ URL::route('admin.users.show', $user->id) }}">{{ $user->email }}</a></td>
                    <td>{{ $user->geolat }}</td>
                    <td>{{ $user->geolng }}</td>
                    <td>
                        <a href="{{ URL::route('admin.users.edit', $user->id) }}" class="btn btn-success btn-mini pull-left">Edit</a>

                        <a href="{{ URL::route('user', $user->id) }}" class="btn btn-primary btn-mini pull-left">View</a>

                        {{ Form::open(array('route' => array('admin.users.destroy', $user->id), 'method' => 'delete', 'data-confirm' => 'Are you sure?')) }}
                            <button type="submit" href="{{ URL::route('admin.users.destroy', $user->id) }}" class="btn btn-danger btn-mini">Delete</butfon>
                        {{ Form::close() }}
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
 
@stop