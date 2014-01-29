@extends('admin._layouts.login')
 
@section('main')
 
    <div id="signup" class="form-signin">
        <h2 class="form-signin-heading">Please sign in</h2>
        {{ Form::open() }}

            @if ($errors->has('login'))
                    <div class="alert alert-warning">{{ $errors->first('login', ':message') }}</div>
            @endif

    
            {{ Form::text('email', '', array('class' => 'form-control', 'placeholder' => 'Email address')) }}

            {{ Form::password('password', array('class' => 'form-control', 'placeholder' => 'Password')) }}


            <div class="form-actions">
                <p>
                    {{ Form::submit('Sign Up', array('class' => 'btn btn-lg btn-primary btn-block')) }}
                </p>
            </div>

        {{ Form::close() }}
    </div>
 
@stop