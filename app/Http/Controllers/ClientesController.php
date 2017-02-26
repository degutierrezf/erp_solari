<?php

/*
 * Taken from
 * https://github.com/laravel/framework/blob/5.3/src/Illuminate/Auth/Console/stubs/make/controllers/HomeController.stub
 */

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;


class ClientesController extends Controller
{

    public function index()
    {
        return view('Clientes.index');
    }

    public function listar()
    {
        return view('Clientes.mostrar');
    }
}