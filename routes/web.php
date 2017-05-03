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
	//User Controller (sing in/sing up/session/index)
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
	Route::get('/logout', [
		'uses' => 'UserController@logout',
		'as' => 'logout'
	]);
	//Upload fotos
	Route::post('/upload', [
		'uses' => 'UploadController@upload',
		'as' => 'upload'
	]);
	Route::get('/uploadperfil', [
		'uses' => 'UserController@uploadperfil',
		'as' => 'uploadperfil'
	]);
	//Rutas productos
	Route::get('/gestorproductos', [
		'uses' => 'ProductoController@gestorproductos',
		'as' => 'gestorproductos'
	]);
	Route::get('/nuevoproducto', [
		'uses' => 'ProductoController@nuevoproducto',
		'as' => 'nuevoproducto'
	]);
	Route::get('/editarproducto/{id}', [
		'uses' => 'ProductoController@editarproducto',
		'as' => 'editarproducto'
	]);
	Route::post('/insertproducto', [
		'uses' => 'ProductoController@insert',
		'as' => 'insertproducto'
	]);
	Route::post('/uploadproducto', [
		'uses' => 'UploadController@uploadproducto',
		'as' => 'uploadproducto'
	]);
	Route::post('/updateproducto', [
		'uses' => 'ProductoController@update',
		'as' => 'updateproducto'
	]);
	//Rutas Tienda
	Route::post('/tienda', [
		'uses' => 'TiendaController@tienda',
		'as' => 'tienda'
	]);
	Route::get('/perfiltienda', [
    		'uses' => 'TiendaController@perfiltienda',
    		'as' => 'perfiltienda'
    	]);
	Route::get('/editperfiltienda', [
		'uses' => 'TiendaController@editperfiltienda',
		'as' => 'editperfiltienda'
	]);
	Route::post('/updatetienda', [
        'uses' => 'TiendaController@updatetienda',
        'as' => 'updatetienda'
    ]);
	//Rutas Cliente
    Route::post('/updatecliente', [
        'uses' => 'ClienteController@updatecliente',
        'as' => 'updatecliente'
    ]);
    Route::get('/perfilcliente', [
		'uses' => 'ClienteController@perfilcliente',
		'as' => 'perfilcliente'
	]);
	Route::get('/editperfilcliente', [
       		'uses' => 'ClienteController@editperfilcliente',
       		'as' => 'editperfilcliente'
       	]);
    //rutas repartidor
    Route::get('/gestorrepartidores', [
    	'uses' => 'RepartidorController@gestorrepartidores',
    	'as' => 'gestorrepartidores'
    ]);
    Route::get('/nuevorepartidor', [
    	'uses' => 'RepartidorController@nuevorepartidor',
    	'as' => 'nuevorepartidor'
    ]);
    Route::get('/editarrepartidor/{id}', [
    	'uses' => 'RepartidorController@editarrepartidor',
    	'as' => 'editarrepartidor'
    ]);
    Route::post('/updaterepartidor', [
    	'uses' => 'RepartidorController@updaterepartidor',
    	'as' => 'updaterepartidor'
    ]);
    Route::delete('/editarrepartidor/{id}',[
    	'uses' => 'RepartidorController@eliminarrepartidor',
    	'as' => 'eliminarrepartidor'
    ]);
    Route::post('/updatecliente2', [
        'uses' => 'ClienteController@updatecliente2',
        'as' => 'updatecliente2'
    ]);
    Route::post('/updatetienda2', [
        'uses' => 'TiendaController@updatetienda2',
        'as' => 'updatetienda2'
    ]);
});