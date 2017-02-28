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

Route::get('/', function () {
    return view('welcome');
});

Route::get('Clientes', 'ClientesController@Index');
Route::get('Clientes/Listar', 'ClientesController@Listar');
Route::get('Clientes/DTE', 'ClientesController@emitir_dte');
Route::post('Clientes/GuardarNuevo', 'ClientesController@GuardarNuevo');

Route::get('Proveedores', 'ProveedoresController@Index');
Route::get('Proveedores/Listar', 'ProveedoresController@Listar');
Route::post('Proveedores/GuardarNuevo', 'ProveedoresController@GuardarNuevo');


Route::post('Clientes/EmitirDTE', 'dteController@GuardarEmitido');


Route::group(['middleware' => 'auth'], function () {
    //    Route::get('/link1', function ()    {
//        // Uses Auth Middleware
//    });

    //Please do not remove this if you want adminlte:route and adminlte:link commands to works correctly.
    #adminlte_routes
});
