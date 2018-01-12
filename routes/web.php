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

Route::get('/', function()
{
	return view('home');
});

Route::get('/owner/gestor/list', function()
{
	return view('table-owner-gestor');
});

Route::get('/owner/gestor/new', function()
{
	return view('form-owner-gestor');
});

Route::get('/owner/franchise/new', function()
{
	return view('form-owner-franchise');
});

Route::get('/owner/franchise/list', function()
{
	return view('table-owner-franchise');
});

Route::get('/franchise/cliente/new', function()
{
	return view('form-franchise-cliente');
});

Route::get('/franchise/cliente/list', function()
{
	return view('table-franchise-cliente');
});
Route::get('/franchise/gestor/new', function()
{
	return view('form-franchise-gestor');
});

Route::get('/franchise/gestor/list', function()
{
	return view('table-franchise-gestor');
});

Route::get('/franchise/veiculo/new', function()
{
	return view('form-franchise-veiculo');
});

Route::get('/franchise/veiculo/list', function()
{
	return view('table-franchise-veiculo');
});
// Route::get('/charts', function()
// {
// 	return view('mcharts');
// });

// Route::get('/tables', function()
// {
// 	return view('table');
// });

// Route::get('/forms', function()
// {
// 	return view('form');
// });

// Route::get('/grid', function()
// {
// 	return view('grid');
// });

// Route::get('/buttons', function()
// {
// 	return view('buttons');
// });


// Route::get('/icons', function()
// {
// 	return view('icons');
// });

// Route::get('/panels', function()
// {
// 	return view('panel');
// });

// Route::get('/typography', function()
// {
// 	return view('typography');
// });

// Route::get('/notifications', function()
// {
// 	return view('notifications');
// });

// Route::get('/blank', function()
// {
// 	return view('blank');
// });

// Route::get('/login', function()
// {
// 	return view('login');
// });

// Route::get('/documentation', function()
// {
// 	return view('documentation');
// });
