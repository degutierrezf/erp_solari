<?php

namespace App\Http\Controllers;

use App\Comunas;
use App\Proveedores;
use Illuminate\Http\Request;
use DB;

class ProveedoresController extends Controller
{
    public function Index()
    {
        $comunas = Comunas::get();

        return view('Proveedores.index', ['comunas' => $comunas]);
    }

    public function Listar()
    {

        $proveedores = Proveedores::get();
        $activos = Proveedores::where('estado', 1)->count();
        $inactivos = Proveedores::where('estado', 2)->count();
        $otros = Proveedores::where('estado', 3)->count();
        $total = Proveedores::count();

        return view('Proveedores.mostrar', [
            'proveedores' => $proveedores,
            'act' => $activos,
            'ina' => $inactivos,
            'otros' => $otros,
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

        DB::table('proveedores')->Insert([
            'rut' => $rut,
            'rsocial' => $rs,
            'giro' => $giro,
            'direccion' => $dir,
            'telefono' => $tel,
            'mail' => $mail,
            'obs_pro' => $obs,
            'estado' => $est,
            'comunas_id_comunas' => $com
        ]);

        return back();
    }
}
