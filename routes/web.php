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

// CLIENTES
Route::get('Clientes', 'ClientesController@Index');
Route::get('Clientes/Listar', 'ClientesController@Listar');
Route::get('Clientes/DTE', 'ClientesController@emitir_dte');
Route::get('Clientes/DTEs', 'ClientesController@revisar_dte');
Route::post('Clientes/GuardarNuevo', 'ClientesController@GuardarNuevo');
// DTE - PAGOS
Route::post('Clientes/EmitirDTE', 'dteController@GuardarEmitido');
Route::post('Clientes/EmitirPago', 'ClientesController@GuardarNuevoPago');


// PROVEEDORES
Route::get('Proveedores', 'ProveedoresController@Index');
Route::get('Proveedores/Listar', 'ProveedoresController@Listar');
Route::get('Proveedores/DTE', 'ProveedoresController@emitir_dte');
Route::get('Proveedores/DTEs', 'ProveedoresController@revisar_dte');
Route::post('Proveedores/GuardarNuevo', 'ProveedoresController@GuardarNuevo');
// DTE - PAGOS
Route::post('Proveedores/EmitirDTE', 'dteController@GuardarRecibido');
Route::post('Proveedores/EmitirPago', 'ProveedoresController@GuardarNuevoPago');


// INFORMES
Route::get('Informes/PagosRealizados', 'InformesController@pagos_r');
Route::get('Informes/PagosRecibidos', 'InformesController@pagos_e');
Route::get('Informes/Pagos_Realizar_Pendientes', 'InformesController@pagos_r_pend');
Route::get('Informes/Pagos_Recibir_Pendientes', 'InformesController@pagos_e_pend');


Route::group(['middleware' => 'auth'], function () {
    //    Route::get('/link1', function ()    {
//        // Uses Auth Middleware
//    });

    //Please do not remove this if you want adminlte:route and adminlte:link commands to works correctly.
    #adminlte_routes
});
