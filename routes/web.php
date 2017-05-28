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
	Route::get('/vertienda/{id}', [
		'uses' => 'TiendaController@vertienda',
		'as' => 'vertienda'
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
    Route::get('/principaltienda/{estado}', [
		'uses' => 'TiendaController@cargardatospedidos',
		'as' => 'cargardatospedidos'
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
	Route::get('/mispedidos', [
       		'uses' => 'ClienteController@mispedidos',
       		'as' => 'mispedidos'
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
    Route::get('/entregado/{id}', [
    	'uses' => 'RepartidorController@entregado',
    	'as' => 'entregado'
    ]);
    //Compra
    Route::post('/carrito', [
    	'uses' => 'PedidoController@carrito',
    	'as' => 'carrito'
    ]);
    Route::post('/pago', [
    	'uses' => 'PedidoController@pago',
    	'as' => 'pago'
    ]);
    Route::post('/pagar', [
    	'uses' => 'PedidoController@pagar',
    	'as' => 'pagar'
    ]);
    //pedido
    Route::post('/updaterepartidorpedido', [
        'uses' => 'PedidoController@updaterepartidorpedido',
        'as' => 'updaterepartidorpedido'
    ]);
    Route::get('/nextestado/{id}', [
        'uses' => 'PedidoController@nextestado',
        'as' => 'nextestado'
    ]);
    Route::get('/anular/{id}', [
        'uses' => 'PedidoController@anular',
        'as' => 'anular'
    ]);
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
    Route::post('/updatetiendadireccion', [
        'uses' => 'TiendaController@updatetiendadireccion',
        'as' => 'updatetiendadireccion'
    ]);
	//Rutas Cliente
    Route::post('/updateclientedireccion', [
        'uses' => 'ClienteController@updateclientedireccion',
        'as' => 'updateclientedireccion'
    ]);
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
    Route::get('/valoracionpag/{id}', [
        'uses' => 'ValoracionController@valoracionpag',
        'as' => 'valoracionpag'
    ]);
    Route::post('/valoracionnota', [
        'uses' => 'ValoracionController@valoracionnota',
        'as' => 'valoracionnota'
    ]);
    Route::get('/valoracionpagpedido/{id}', [
        'uses' => 'ValoracionController@valoracionpagpedido',
        'as' => 'valoracionpagpedido'
    ]);
    Route::post('/valoracionnotapedido', [
        'uses' => 'ValoracionController@valoracionnotapedido',
        'as' => 'valoracionnotapedido'
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
    Route::post('/seleccionartienda/{id}', [
        'uses' => 'UserController@seleccionartienda',
        'as' => 'seleccionartienda'
    ]);
    Route::post('/valoracionenviar', [
        'uses' => 'ValoracionController@valoracionenviar',
        'as' => 'valoracionenviar'
    ]);
    Route::post('/valoracion', [
        'uses' => 'UserController@valoracion',
        'as' => 'valoracion'
    ]);
});