@extends('admin._layouts.default')
 
@section('main')

<h2>Create page</h2>

{{ Form::open(array('route' => 'admin.pages.store')) }}

	<p>
		{{ Form::label('title', 'Page Title') }}
		{{ Form::text('title', '', array('class' => 'form-control')) }}
	</p>

	<p>
		{{ Form::label('body', 'Body') }}
		{{ Form::textarea('body', '', array('class' => 'form-control')) }}
	</p>

	<p>
		{{ Form::submit('Save', array('class' => 'btn btn-primary')) }}
		<a href="{{ URL::route('admin.pages.index') }}" class="btn btn-large">Cancel</a>
	</p>

{{ Form::close() }}

@stop