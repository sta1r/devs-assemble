@extends('admin._layouts.default')
 
@section('main')
 
    <h2>{{ $user->email }}</h2>

    <p>Created on: {{ $user->created_at }}</p>

    <a href="{{ URL::route('admin.users.edit', $user->id) }}" class="btn btn-success">Edit this user</a>
    
 
@stop