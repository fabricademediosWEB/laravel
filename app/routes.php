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
	return View::make('hello');
});

Route::get('hola', array('before' => 'validar' , function(){
	return 'hola mundo';
}));
Route::get('salir', function(){
	return 'salir del sistema';
});
Route::get('usuario/{id}', function($id){
	return 'Mostrar el usuario con el id: ' .$id;
})
	->where('id','[0-9]+');

Route::get('registrar', 'UsuariosController@registrar');