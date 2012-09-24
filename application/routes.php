<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Simply tell Laravel the HTTP verbs and URIs it should respond to. It is a
| breeze to setup your application using Laravel's RESTful routing and it
| is perfectly suited for building large applications and simple APIs.
|
| Let's respond to a simple GET request to http://example.com/hello:
|
|		Route::get('hello', function()
|		{
|			return 'Hello World!';
|		});
|
| You can even respond to more than one URI:
|
|		Route::post(array('hello', 'world'), function()
|		{
|			return 'Hello World!';
|		});
|
| It's easy to allow URI wildcards using (:num) or (:any):
|
|		Route::put('hello/(:any)', function($name)
|		{
|			return "Welcome, $name.";
|		});
|
*/


Route::group(array('before' => 'auth'), function()
{	
    Route::get('posts', array('as' => 'posts.all', 'uses' => 'posts@index'));
    Route::get('posts/new', array('as' => 'posts.new', 'uses' => 'posts@new'));
    Route::get('posts/(:any)', array('as' => 'posts.show', 'uses' => 'posts@show'));
    Route::get('posts/(:any)/edit', array('as' => 'posts.edit', 'uses' => 'posts@edit'));

    Route::post('posts/new', array('as' => 'posts.create', 'uses' => 'posts@create'));
    Route::put('posts/(:any)', array('as' => 'posts.update', 'uses' => 'posts@update'));
    Route::delete('posts/(:num)', array('as' => 'posts.delete', 'uses' => 'posts@delete'));
});

Route::group(array('before' => 'auth'), function()
{	
    Route::get('users', array('as' => 'users.all', 'uses' => 'users@index'));
    Route::get('users/new', array('as' => 'users.new', 'uses' => 'users@new'));
    Route::get('users/(:any)', array('as' => 'users.show', 'uses' => 'users@show'));
    Route::get('users/(:any)/edit', array('as' => 'users.edit', 'uses' => 'users@edit'));

    Route::post('users/new', array('as' => 'users.create', 'uses' => 'users@create'));
    Route::put('users/(:any)', array('as' => 'users.update', 'uses' => 'users@update'));
    Route::delete('users/(:num)', array('as' => 'users.delete', 'uses' => 'users@delete'));

    Route::get('dashboard', array('as' => 'users.dashboard', 'uses' => 'users@dashboard'));

});

Route::get('login', array('as' => 'users.login', 'uses' => 'users@login'));
Route::post('login', array('as' => 'users.check', 'uses' => 'users@check'));
Route::get('logout', array('as' => 'users.logout', 'uses' => 'users@logout'));

//Route::get('test', array('uses' => 'users@test'));






/*
|--------------------------------------------------------------------------
| Application 404 & 500 Error Handlers
|--------------------------------------------------------------------------
|
| To centralize and simplify 404 handling, Laravel uses an awesome event
| system to retrieve the response. Feel free to modify this function to
| your tastes and the needs of your application.
|
| Similarly, we use an event to handle the display of 500 level errors
| within the application. These errors are fired when there is an
| uncaught exception thrown in the application.
|
*/

Event::listen('404', function()
{
	return Response::error('404');
});

Event::listen('500', function()
{
	return Response::error('500');
});

/*
|--------------------------------------------------------------------------
| Route Filters
|--------------------------------------------------------------------------
|
| Filters provide a convenient method for attaching functionality to your
| routes. The built-in before and after filters are called before and
| after every request to your application, and you may even create
| other filters that can be attached to individual routes.
|
| Let's walk through an example...
|
| First, define a filter:
|
|		Route::filter('filter', function()
|		{
|			return 'Filtered!';
|		});
|
| Next, attach the filter to a route:
|
|		Router::register('GET /', array('before' => 'filter', function()
|		{
|			return 'Hello World!';
|		}));
|
*/

Route::filter('before', function()
{
	// Do stuff before every request to your application...
});

Route::filter('after', function($response)
{
	// Do stuff after every request to your application...
});

Route::filter('csrf', function()
{
	if (Request::forged()) return Response::error('500');
});

Route::filter('auth', function()
{
	if (Auth::guest()) return Redirect::to('login');
});