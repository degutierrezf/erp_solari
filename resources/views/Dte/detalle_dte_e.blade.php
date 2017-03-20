@extends('adminlte::layouts.app')

@section('htmlheader_title')
    Listar Pagos por DTE
@endsection

@section('contentheader_title')
    ERP - SISTEMA DE CONTROL - DETALLE DTE -
@endsection

@section('main-content')

    <div class="row">
        <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="info-box">
                <span class="info-box-icon bg-aqua"><i class="fa fa-users"></i></span>

                <div class="info-box-content">
                    <span class="info-box-text">N° Clientes</span>
                    <span class="info-box-number"></span>
                </div>
                <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="info-box">
                <span class="info-box-icon bg-red"><i class="fa fa-user-plus"></i></span>

                <div class="info-box-content">
                    <span class="info-box-text">N° Cientes Activos</span>
                    <span class="info-box-number"></span>
                </div>
                <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
        </div>
        <!-- /.col -->

        <!-- fix for small devices only -->
        <div class="clearfix visible-sm-block"></div>

        <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="info-box">
                <span class="info-box-icon bg-green"><i class="fa fa-user-times"></i></span>

                <div class="info-box-content">
                    <span class="info-box-text">N° Clientes Inactivos</span>
                    <span class="info-box-number"></span>
                </div>
                <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="info-box">
                <span class="info-box-icon bg-yellow"><i class="fa fa-user-secret"></i></span>

                <div class="info-box-content">
                    <span class="info-box-text">N° Clientes OBS</span>
                    <span class="info-box-number"></span>
                </div>
                <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
        </div>
        <!-- /.col -->
    </div>

    <br><br>
    <div class="info-box">
        <div class="box-header">
            <h3 class="box-title"></h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                    <th>Nº FACTURA</th>
                    <th>$ PAGO</th>
                    <th>$ TOTAL</th>
                    <th>FECHA COBRO</th>
                    <th>FORMA DE PAGO</th>
                    <th>PLAZA</th>
                    <th>ESTADO</th>
                    <th>ACCIONES</th>
                </tr>
                </thead>
                <tbody>


                </tbody>
                <tfoot>
                <tr>
                    <th>Nº FACTURA</th>
                    <th>$ PAGO</th>
                    <th>$ TOTAL</th>
                    <th>FECHA COBRO</th>
                    <th>FORMA DE PAGO</th>
                    <th>PLAZA</th>
                    <th>ESTADO</th>
                    <th>ACCIONES</th>
                </tr>
                </tfoot>
            </table>
        </div>
        <!-- /.box-body -->
    </div>

@endsection
