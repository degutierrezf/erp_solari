<?php

/*
 * Taken from
 * https://github.com/laravel/framework/blob/5.3/src/Illuminate/Auth/Console/stubs/make/controllers/HomeController.stub
 */

namespace App\Http\Controllers;

use App\DTE_E;
use App\Http\Requests;
use Illuminate\Http\Request;
use DB;

/**
 * Class HomeController
 * @package App\Http\Controllers
 */
class InformesController extends Controller
{
    public function pagos_r()
    {

        $dte_r = DB::table('dte_recibidos')
            ->join('proveedores','id_proveedor','=','proveedores_id_proveedor')
            ->join('tipos_documento','id_t_doc', '=', 'tipos_documento_id_t_doc')
            ->whereColumn('dte_recibidos.pagado', 'dte_recibidos.total')
            ->get();

        return view('Informes.pagos_r', [
            'dte_r'=>$dte_r
        ]);
    }

    public function pagos_e()
    {

        $dte_e = DB::table('dte_emitidos')
            ->join('clientes','id_cliente','=','clientes_id_cliente')
            ->join('tipos_documento','id_t_doc', '=', 'tipos_documento_id_t_doc')
            ->whereColumn('dte_emitidos.pagado', 'dte_emitidos.total')
            ->get();

        return view('Informes.pagos_e', [
            'dte_e'=>$dte_e
        ]);
    }

    public function pagos_r_pend()
    {
        $dte_r = DB::table('dte_recibidos')
            ->join('proveedores','id_proveedor','=','proveedores_id_proveedor')
            ->join('tipos_documento','id_t_doc', '=', 'tipos_documento_id_t_doc')
            ->whereColumn('dte_recibidos.pagado','<>' ,'dte_recibidos.total')
            ->get();

        return view('Informes.pagos_pend_r', [
            'dte_r'=>$dte_r
        ]);
    }

    public function pagos_e_pend()
    {
        $dte_e = DB::table('dte_emitidos')
            ->join('clientes','id_cliente','=','clientes_id_cliente')
            ->join('tipos_documento','id_t_doc', '=', 'tipos_documento_id_t_doc')
            ->whereColumn('dte_emitidos.pagado', '<>', 'dte_emitidos.total')
            ->get();

        return view('Informes.pagos_pend_e', [
            'dte_e'=>$dte_e
        ]);
    }
}