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
Route::get('/', 'DashboardController@index')->name("home");

//auth 
Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');
Auth::routes();

/*
 *  OLD
 */

Route::get('/charts', function()
{
	return view('mcharts');
});

Route::get('/tables', function()
{
	return view('table');
});

Route::get('/forms', function()
{
	return view('form');
});

Route::get('/grid', function()
{
	return view('grid');
});

Route::get('/buttons', function()
{
	return view('buttons');
});


Route::get('/icons', function()
{
	return view('icons');
});

Route::get('/panels', function()
{
	return view('panel');
});

Route::get('/typography', function()
{
	return view('typography');
});

Route::get('/notifications', function()
{
	return view('notifications');
});

Route::get('/blank', function()
{
	return view('blank');
});

Route::get('/documentation', function()
{
	return view('documentation');
});
