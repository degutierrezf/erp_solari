<?php

/*
 * Taken from
 * https://github.com/laravel/framework/blob/5.3/src/Illuminate/Auth/Console/stubs/make/controllers/HomeController.stub
 */

namespace App\Http\Controllers;

use App\Clientes;
use App\Comunas;
use App\DTE_E;
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

    public function GuardarNuevoPago()
    {

        $fecha = $_POST['fecha'];
        $num_doc = $_POST['n_doc'];
        $valor_doc = $_POST['max_total'];
        $obs = $_POST['obs'];
        $fecha_cobro = $_POST['fecha_cobro'];
        $banca = $_POST['banco'];
        $dte_emitidos_id_dte_e = $_POST['id_fact'];
        $tipos_docs_pago_id_tipo_docs_p = $_POST['tipo'];

        DB::table('pagos_recibidos')->Insert([
            'fecha' => $fecha,
            'num_doc' => $num_doc,
            'valor_doc' => $valor_doc,
            'obs' => $obs,
            'fecha_cobro' => $fecha_cobro,
            'plaza' => $banca,
            'dte_emitidos_id_dte_e' => $dte_emitidos_id_dte_e,
            'tipos_docs_pago_id_tipo_docs_p' => $tipos_docs_pago_id_tipo_docs_p
        ]);

        return back();
    }

    public function emitir_dte()
    {
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
            'otros' => $otros,
            'total' => $total,
            'tipo_doc' => $tipodoc,
        ]);
    }

    public function revisar_dte()
    {

        $tipo_pag = DB::table('tipos_docs_pago')->get();
        $bancos = DB::table('bancos')->get();

        $dte_e = DTE_E::join('clientes','clientes_id_cliente','=','id_cliente')
            ->get();

        return view('Clientes.revisar_dte', [
            'dte_e' => $dte_e,
            'tipo_pg' => $tipo_pag,
            'bancos' => $bancos
        ]);
    }
}