<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Illuminate\Contracts\Session\Session;

class dteController extends Controller
{

    public function GuardarEmitido()
    {

        try{
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
                'estado' => $estado,
                'tipos_documento_id_t_doc' => $tipo_doc,
                'fec_vencimiento' => $fec_ven,
                'clientes_id_cliente' => $cli
            ]);

            return redirect('Clientes/DTE')->with('status', 'DTE Asignada al Cliente!');
        }
        catch (\Illuminate\Database\QueryException $ex){
            return redirect('Clientes/DTE')->with('error', 'ERROR, No se asigno la DTE al Cliente!');
        }




    }

    public function GuardarRecibido()
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
