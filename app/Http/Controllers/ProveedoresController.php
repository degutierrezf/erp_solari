<?php

namespace App\Http\Controllers;

use App\Comunas;
use App\DTE_R;
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

    public function GuardarNuevoPago()
    {

        $fecha = $_POST['fecha'];
        $num_doc = $_POST['n_doc'];
        $valor_doc = $_POST['max_total'];
        $obs = $_POST['obs'];
        $dte_emitidos_id_dte_r = $_POST['id_fact'];
        $tipos_docs_pago_id_tipo_docs_p = $_POST['tipo'];

        DB::table('pagos_emitidos')->Insert([
            'fecha' => $fecha,
            'num_doc' => $num_doc,
            'valor_doc' => $valor_doc,
            'obs' => $obs,
            'dte_recibidos_id_dte_r' => $dte_emitidos_id_dte_r,
            'tipos_docs_pago_id_tipo_docs_p' => $tipos_docs_pago_id_tipo_docs_p
        ]);

        return back();
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

    public function emitir_dte()
    {
        $tipodoc = DB::table('tipos_documento')->get();

        $proveedores = Proveedores::get();
        $activos = Proveedores::where('estado', 1)->count();
        $inactivos = Proveedores::where('estado', 2)->count();
        $otros = Proveedores::where('estado', 3)->count();
        $total = Proveedores::count();

        return view('Proveedores.recibir_dte', [
            'proveedores' => $proveedores,
            'act' => $activos,
            'ina' => $inactivos,
            'otros' => $otros,
            'total' => $total,
            'tipo_doc' => $tipodoc
        ]);
    }

    public function revisar_dte()
    {

        $tipo_pag = DB::table('tipos_docs_pago')->get();
        $bancos = DB::table('bancos')->get();

        $dte_r = DTE_R::join('proveedores', 'proveedores_id_proveedor', '=', 'id_proveedor')
            ->get();

        return view('Proveedores.revisar_dte_r', [
            'dte_r' => $dte_r,
            'tipo_pg' => $tipo_pag,
            'bancos' => $bancos
        ]);
    }
}
