<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Illuminate\Contracts\Session\Session;

class dteController extends Controller
{

    public function GuardarEmitido()
    {

        try {
            $fecha = $_POST['fecha_em'];
            $num_doc = $_POST['n_doc'];
            $netodoc = $_POST['neto'];
            $iva = $_POST['iva'];
            $total = $_POST['total'];
            $obs = $_POST['obs'];
            $estado = 1;
            $tipo_doc = $_POST['tipo'];
            $fec_ven = $_POST['fecha_ven'];;
            $cli = $_POST['id_cliente'];;

            DB::table('dte_emitidos')->Insert([
                'fecha' => $fecha,
                'num_doc' => $num_doc,
                'neto_doc' => $netodoc,
                'iva' => $iva,
                'total' => $total,
                'obs' => $obs,
                'pagado' => 0,
                'estado' => $estado,
                'tipos_documento_id_t_doc' => $tipo_doc,
                'fec_vencimiento' => $fec_ven,
                'clientes_id_cliente' => $cli
            ]);

            return redirect('Clientes/DTE')->with('status', 'DTE Asignada al Cliente!');
        } catch (\Illuminate\Database\QueryException $ex) {
            return redirect('Clientes/DTE')->with('error', 'ERROR, No se asigno la DTE al Cliente!');
        }

    }

    public function GuardarRecibido()
    {

        try {
            $fecha = $_POST['fecha_em'];
            $num_doc = $_POST['n_doc'];
            $netodoc = $_POST['neto'];
            $iva = $_POST['iva'];
            $total = $_POST['total'];
            $obs = $_POST['obs'];
            $estado = 1;
            $tipo_doc = $_POST['tipo'];
            $fec_ven = $_POST['fecha_ven'];;
            $pro = $_POST['id_proveedor'];;

            DB::table('dte_recibidos')->Insert([
                'fecha' => $fecha,
                'num_doc' => $num_doc,
                'neto_doc' => $netodoc,
                'iva' => $iva,
                'total' => $total,
                'obs' => $obs,
                'pagado' => 0,
                'estado' => $estado,
                'tipos_documento_id_t_doc' => $tipo_doc,
                'fec_vencimiento' => $fec_ven,
                'proveedores_id_proveedor' => $pro
            ]);

            return redirect('Proveedores/DTE')->with('status', 'DTE Asignada al Proveedor!');
        } catch (\Illuminate\Database\QueryException $ex) {
            return redirect('Proveedores/DTE')->with('error', 'ERROR, No se asigno la DTE al Proveedor!');
        }

    }

}
