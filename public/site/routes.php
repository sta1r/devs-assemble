<?php

// Home page
Route::get('/', array('as' => 'home', function()
{
	return View::make('site::index')->with('users', Sentry::findAllUsers());
}));

// Article list
Route::get('blog', array('as' => 'article.list', function()
{
	return View::make('site::articles')->with('entries', Article::orderBy('created_at', 'desc')->get());
}));

// Users list
Route::get('users', array('as' => 'user.list', function()
{
	return View::make('site::users')->with('users', Sentry::findAllUsers());
}));

// Single user
Route::get('user/{id}', array('as' => 'user', function($id)
{
	$user = Sentry::findUserById($id);

	if ( ! $user) App::abort(404, 'User not found');

	return View::make('site::user')->with('user', $user);
}));

// Single article
Route::get('blog/{slug}', array('as' => 'article', function($slug)
{
	$article = Article::where('slug', $slug)->first();

	if ( ! $article) App::abort(404, 'Article not found');

	return View::make('site::article')->with('entry', $article);
}));

// Single page
Route::get('{slug}', array('as' => 'page', function($slug)
{
	$page = Page::where('slug', $slug)->first();

	if ( ! $page) App::abort(404, 'Page not found');

	return View::make('site::page')->with('entry', $page);

}))->where('slug', '^((?!admin).)*$');

// 404 Page
App::missing(function($exception)
{
	return Response::view('site::404', array(), 404);
});

