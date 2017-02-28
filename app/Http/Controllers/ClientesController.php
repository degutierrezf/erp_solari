<?php

/*
 * Taken from
 * https://github.com/laravel/framework/blob/5.3/src/Illuminate/Auth/Console/stubs/make/controllers/HomeController.stub
 */

namespace App\Http\Controllers;

use App\Clientes;
use App\Comunas;
use App\Http\Requests;
use Illuminate\Http\Request;
use DB;


class ClientesController extends Controller
{

    public function Index()
    {

        $comunas = Comunas::get();

        return view('Clientes.index', ['comunas' => $comunas]);
    }

    public function Listar()
    {

        $clientes = Clientes::get();
        $activos = Clientes::where('estado', 1)->count();
        $inactivos = Clientes::where('estado', 2)->count();
        $otros = Clientes::where('estado', 3)->count();
        $total = Clientes::count();

        return view('Clientes.mostrar', [
            'clientes' => $clientes,
            'act' => $activos,
            'ina' => $inactivos,
            'otros' =>$otros,
            'total' => $total
        ]);
    }

    public function GuardarNuevo()
    {

        $rut = $_POST['rut'];
        $rs = $_POST['r_soc'];
        $giro = $_POST['giro'];
        $dir = $_POST['direccion'];
        $com = $_POST['comunas'];
        $tel = $_POST['telefono'];
        $mail = $_POST['correo'];
        $obs = $_POST['obs_cli'];
        $est = 1;

        DB::table('clientes')->Insert([
            'rut' => $rut,
            'rsocial' => $rs,
            'giro' => $giro,
            'direccion' => $dir,
            'telefono' => $tel,
            'mail' => $mail,
            'obs_cli' => $obs,
            'estado' => $est,
            'comunas_id_comunas' => $com
        ]);

        return back();
    }

    public function emitir_dte(){

        $tipodoc = DB::table('tipos_documento')->get();

        $clientes = Clientes::get();
        $activos = Clientes::where('estado', 1)->count();
        $inactivos = Clientes::where('estado', 2)->count();
        $otros = Clientes::where('estado', 3)->count();
        $total = Clientes::count();

        return view('Clientes.emitir_dte', [
            'clientes' => $clientes,
            'act' => $activos,
            'ina' => $inactivos,
            'otros' =>$otros,
            'total' => $total,
            'tipo_doc' => $tipodoc
        ]);

    }


}