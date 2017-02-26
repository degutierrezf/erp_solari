@extends('adminlte::layouts.app')

@section('htmlheader_title')
    Mostrar Accidentes
@endsection

@section('contentheader_title')
    Mostrar Accidentes - Administrador
@endsection

@section('main-content')

    <div class="row">
        <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="info-box">
                <span class="info-box-icon bg-aqua"><i class="fa fa-tasks"></i></span>

                <div class="info-box-content">
                    <span class="info-box-text">N° Accidentes</span>
                    <span class="info-box-number"></span>
                </div>
                <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="info-box">
                <span class="info-box-icon bg-red"><i class="fa fa-close"></i></span>

                <div class="info-box-content">
                    <span class="info-box-text">Accidentes Daño</span>
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
                <span class="info-box-icon bg-green"><i class="fa fa-check"></i></span>

                <div class="info-box-content">
                    <span class="info-box-text">Accidentes SIN Daño</span>
                    <span class="info-box-number"></span>
                </div>
                <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="info-box">
                <span class="info-box-icon bg-yellow"><i class="fa fa-asterisk"></i></span>

                <div class="info-box-content">
                    <span class="info-box-text">Accidentes Abiertos</span>
                    <span class="info-box-number"></span>
                </div>
                <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
        </div>
        <!-- /.col -->
    </div>

    <div class="info-box">
        <div class="box-header">
            <h3 class="box-title">Listado General de Accidentes</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Fecha / Hora</th>
                    <th>Concesión / Ruta</th>
                    <th>PK1 / PK 2</th>
                    <th>Corte de Transito</th>
                    <th>¿By Pass?</th>
                    <th>Acciones</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td>A</td>
                    <td>A</td>
                    <td>A</td>
                    <td>A</td>
                    <td>A</td>
                    <td>A</td>
                    <td>A</td>
                </tr>
                <tr>
                    <td>B</td>
                    <td>B</td>
                    <td>B</td>
                    <td>B</td>
                    <td>B</td>
                    <td>B</td>
                    <td>B</td>
                </tr>
                </tbody>
                <tfoot>
                <tr>
                    <th>ID</th>
                    <th>Fecha / Hora</th>
                    <th>Concesión / Ruta</th>
                    <th>PK1 / PK 2</th>
                    <th>Corte de Transito</th>
                    <th>¿By Pass?</th>
                    <th>Acciones</th>
                </tr>
                </tfoot>
            </table>
        </div>
        <!-- /.box-body -->
    </div>

@endsection
