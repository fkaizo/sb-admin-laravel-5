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


Route::resource('/ownerManager', 'OwnerManagerController');
Route::resource('/ownerFranchise', 'OwnerFranchiseController');

Route::get('/', 'DashboardController@index')->name("home");

//auth 
Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');
Auth::routes();

/*
old
*/
Route::get('/owner/franchise/new', function()
{
	return view('owner.form.franchise');
});

Route::get('/franchise/cliente/new', function()
{
	return view('franchise.form.cliente');
});

Route::get('/franchise/cliente/list', function()
{
	return view('franchise.table.cliente');
});
Route::get('/franchise/gestor/new', function()
{
	return view('franchise.form.gestor');
});

Route::get('/franchise/gestor/list', function()
{
	return view('franchise.table.gestor');
});

Route::get('/franchise/veiculo/new', function()
{
	return view('franchise.form.veiculo');
});

Route::get('/franchise/veiculo/list', function()
{
	return view('franchise.table.veiculo');
});
