@extends('admin._layouts.default')
 
@section('main')

<h2>Edit page</h2>

{{ Notification::showAll() }}

{{ Form::model($page, array('method' => 'put', 'route' => array('admin.pages.update', $page->id))) }}

	<p>
		{{ Form::label('title', 'Page Title') }}
		{{ Form::text('title', $page->title, array('class' => 'form-control')) }}
	</p>

	<p>
		{{ Form::label('body', 'Body') }}
		{{ Form::textarea('body', $page->body, array('class' => 'form-control')) }}
	</p>

	<p>
		<input type="submit" name="save" value="Save" class="btn btn-primary btn-save btn-large" />

		<input type="submit" name="save_and_exit" value="Save and exit" class="btn btn-primary btn-save btn-large" />
        <a href="{{ URL::route('admin.pages.index') }}" class="btn">Cancel</a>
	</p>

{{ Form::close() }}

@stop