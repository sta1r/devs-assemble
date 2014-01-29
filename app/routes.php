<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

/* see public/site/routes.php - http://www.codeforest.net/laravel-4-tutorial-validation-frontend */
Route::get('/', function()
{
	return View::make('launchpad');
});




// http://www.codeforest.net/laravel-4-tutorial-part-2
Route::get('admin/logout', array('as' => 'admin.logout', 'uses' => 'App\Controllers\Admin\AuthController@getLogout'));

Route::get('admin/login', array('as' => 'admin.login', 'uses' => 'App\Controllers\Admin\AuthController@getLogin'));

Route::post('admin/login', array('as' => 'admin.login.post', 'uses' => 'App\Controllers\Admin\AuthController@postLogin'));


Route::group(array('prefix' => 'admin', 'before' => 'auth.admin'), function()
{
    Route::any('/', 'App\Controllers\Admin\PagesController@index');
    Route::resource('articles', 'App\Controllers\Admin\ArticlesController');
    Route::resource('pages', 'App\Controllers\Admin\PagesController');
    Route::resource('users', 'App\Controllers\Admin\AuthController');

});


Route::get('admin/signup', array('as' => 'admin.signup', 'uses' => 'App\Controllers\Admin\AuthController@getSignup'));

Route::post('admin/signup', array('as' => 'admin.signup.post', 'uses' => 'App\Controllers\Admin\AuthController@createUser'));
