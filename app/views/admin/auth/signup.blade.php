@extends('admin._layouts.default')
 
@section('main')
 
    <div id="signup" class="signup">
        {{ Form::open() }}

            @if ($errors->has('login'))
                    <div class="alert alert-error">{{ $errors->first('login', ':message') }}</div>
            @endif

            <div class="form-group">
                {{ Form::label('login', 'Your login email address') }}   
                {{ Form::text('login', '', array('class' => 'form-control')) }}
            </div>

            <div class="form-group">
                {{ Form::label('password', 'Pick a password') }}
                {{ Form::password('password', array('class' => 'form-control')) }}
            </div>

            <div class="form-actions">
                <p>
                    {{ Form::submit('Sign Up', array('class' => 'btn btn-default')) }}
                </p>
            </div>

        {{ Form::close() }}
    </div>
 
@stop