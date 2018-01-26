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
	return view('owner.table.gestor');
});

Route::get('/owner/gestor/new', function()
{
	return view('owner.form.gestor');
});

Route::get('/owner/franchise/new', function()
{
	return view('owner.form.franchise');
});

Route::get('/owner/franchise/list', function()
{
	return view('owner.table.franchise');
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