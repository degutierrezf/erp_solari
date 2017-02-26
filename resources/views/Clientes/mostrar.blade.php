@extends('adminlte::layouts.app')

@section('htmlheader_title')
    Listar Clientes
@endsection

@section('contentheader_title')
    ERP - SISTEMA DE CONTROL - CLIENTES -
@endsection

@section('main-content')

    <div class="row">
        <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="info-box">
                <span class="info-box-icon bg-aqua"><i class="fa fa-users"></i></span>

                <div class="info-box-content">
                    <span class="info-box-text">N° Clientes</span>
                    <span class="info-box-number">{{ $total }}</span>
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
                    <span class="info-box-number">{{ $act  }}</span>
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
                    <span class="info-box-number">{{ $ina }}</span>
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
                    <span class="info-box-number">{{ $otros }}</span>
                </div>
                <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
        </div>
        <!-- /.col -->
    </div>


    <a href="/Clientes">
        <button type="button" class="btn btn-success btn-xs" data-toggle="tooltip"
                title="Registrar un nuevo cliente en ERP">
            <i class="fa fa-user"></i> Registrar Nuevo Cliente
        </button>
    </a>

    <br><br>
    <div class="info-box">
        <div class="box-header">
            <h3 class="box-title">Listado General de Clientes</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                    <th>RUT</th>
                    <th>NOMBRE / RAZÓN SOCIAL</th>
                    <th>GIRO</th>
                    <th>TELÉFONO</th>
                    <th>CORREO ELECTRÓNICO</th>
                    <th>ESTADO</th>
                    <th>ACCIONES</th>
                </tr>
                </thead>
                <tbody>
                @foreach($clientes as $cli)
                    <tr>
                        <td>{{  $cli -> rut }}</td>
                        <td>{{  $cli -> rsocial}}</td>
                        <td>{{  $cli -> giro}}</td>
                        <td>{{  $cli -> telefono}}</td>
                        <td>{{  $cli -> mail}}</td>
                        <td>
                            <center>
                                @if( $cli -> estado == 1)
                                    <button type="button" class="btn btn-success btn-xs" data-toggle="tooltip"
                                            title="Activo">
                                        <i class="fa fa-check"></i> Activo
                                    </button>
                                @elseif($cli->estado ==2)
                                    <button type="button" class="btn btn-danger btn-xs" data-toggle="tooltip"
                                            title="Inactivo">
                                        <i class="fa fa-times"></i> Inactivo
                                    </button>
                                @else
                                    <button type="button" class="btn btn-warning btn-xs" data-toggle="tooltip"
                                            title="Con Observaciones">
                                        <i class="fa fa-info"></i> Con Observaciones
                                    </button>
                                @endif
                            </center>
                        <td>
                            <center>
                                <button type="button" class="btn btn-warning btn-xs" data-toggle="tooltip"
                                        title="Editar">
                                    <i class="fa fa-pencil"></i>
                                </button>
                                &nbsp &nbsp &nbsp
                                <button type="button" class="btn btn-danger btn-xs" data-toggle="tooltip"
                                        title="Eliminar">
                                    <i class="fa fa-close"></i>
                                </button>
                            </center>
                        </td>
                    </tr>
                @endforeach
                </tbody>
                <tfoot>
                <tr>
                    <th>RUT</th>
                    <th>NOMBRE / RAZÓN SOCIAL</th>
                    <th>GIRO</th>
                    <th>TELÉFONO</th>
                    <th>CORREO ELECTRÓNICO</th>
                    <th>ESTADO</th>
                    <th>ACCIONES</th>
                </tr>
                </tfoot>
            </table>
        </div>
        <!-- /.box-body -->
    </div>

@endsection
