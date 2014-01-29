@extends('admin._layouts.default')
 
@section('main')

<h2>Edit user</h2>

{{ Notification::showAll() }}

{{ Form::model($user, array('method' => 'put', 'route' => array('admin.users.update', $user->id))) }}

	<p>
		{{ Form::label('geolat', 'Latitude') }}
		{{ Form::text('geolat', $user->geolat, array('class' => 'form-control')) }}
	</p>

	<p>
		{{ Form::label('geolng', 'Longitude') }}
		{{ Form::text('geolng', $user->geolng, array('class' => 'form-control')) }}
	</p>

	<p>
		<input type="submit" name="save" value="Save" class="btn btn-primary btn-save btn-large" />

		<input type="submit" name="save_and_exit" value="Save and exit" class="btn btn-primary btn-save btn-large" />
        <a href="{{ URL::route('admin.users.index') }}" class="btn">Cancel</a>
	</p>

{{ Form::close() }}

@stop