@extends('admin._layouts.default')
 
@section('main')
 
    <h2>{{ $page->title }}</h2>

    <p>{{ $page->body }}</p>

    <p>Created on: {{ $page->created_at }}</p>

    <a href="{{ URL::route('admin.pages.edit', $page->id) }}" class="btn btn-success">Edit this page</a>
    
 
@stop