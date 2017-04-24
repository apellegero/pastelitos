<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::group(['middleware'=>['web']], function(){
	Route::get('/', function () {
	    return view('index');
	});

	Route::get('/singuppage', [
	    'uses' => 'UserController@getPagSingUp',
		'as' => 'singuppage'
		//'middleware' => 'auth'
	]);

	Route::get('/singuppagetienda', [
	    'uses' => 'UserController@getPagSingUpTienda',
		'as' => 'singuppagetienda'
	]);

	Route::post('/singup', [
		'uses' => 'UserController@singUp',
		'as' => 'singup'
	]);

	Route::post('/singin', [
		'uses' => 'UserController@singIn',
		'as' => 'singin'
	]);

	Route::get('/indexpage', [
	    'uses' => 'UserController@getPagindex',
		'as' => 'indexpage'
		//'middleware' => 'auth'
	]);
	Route::get('/pagprincipal', [
	    'uses' => 'UserController@getPagPrincipal',
		'as' => 'pagprincipal'
		//'middleware' => 'auth'
	]);

	Route::post('/upload', [
		'uses' => 'UploadController@upload',
		'as' => 'upload'
	]);

	Route::get('/logout', [
		'uses' => 'UserController@logout',
		'as' => 'logout'
	]);

	Route::get('/uploadperfil', [
		'uses' => 'UserController@uploadperfil',
		'as' => 'uploadperfil'
	]);
	Route::get('/perfilcliente', [
		'uses' => 'UserController@perfilcliente',
		'as' => 'perfilcliente'
	]);
	Route::get('/editarperfiltienda', [
		'uses' => 'UserController@editarperfiltienda',
		'as' => 'editarperfiltienda'
	]);
	Route::get('/gestorrepartidores', [
		'uses' => 'UserController@gestorrepartidores',
		'as' => 'gestorrepartidores'
	]);
	Route::get('/nuevorepartidor', [
		'uses' => 'UserController@nuevorepartidor',
		'as' => 'nuevorepartidor'
	]);
	Route::post('/editarrepartidor', [
		'uses' => 'UserController@editarrepartidor',
		'as' => 'editarrepartidor'
	]);
	Route::post('/updaterepartidor', [
		'uses' => 'UserController@updaterepartidor',
		'as' => 'updaterepartidor'
	]);
	Route::post('/getid', [
		'uses' => 'UserController@getid',
		'as' => 'getid'
	]);
});