@extends('adminlte::layouts.app')

@section('htmlheader_title')
    Listar Proveedores
@endsection

@section('contentheader_title')
    ERP - SISTEMA DE CONTROL - PROVEEDORES -
@endsection

@section('main-content')

    <div class="row">
        <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="info-box">
                <span class="info-box-icon bg-aqua"><i class="fa fa-industry"></i></span>

                <div class="info-box-content">
                    <span class="info-box-text">N° Proveedores</span>
                    <span class="info-box-number">{{ $total }}</span>
                </div>
                <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="info-box">
                <span class="info-box-icon bg-red"><i class="fa fa-industry"></i></span>

                <div class="info-box-content">
                    <span class="info-box-text">N° Proveedores Activos</span>
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
                <span class="info-box-icon bg-green"><i class="fa fa-industry"></i></span>

                <div class="info-box-content">
                    <span class="info-box-text">N° Proveedores Inactivos</span>
                    <span class="info-box-number">{{ $ina }}</span>
                </div>
                <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="info-box">
                <span class="info-box-icon bg-yellow"><i class="fa fa-industry"></i></span>

                <div class="info-box-content">
                    <span class="info-box-text">N° Proveedores OBS</span>
                    <span class="info-box-number">{{ $otros }}</span>
                </div>
                <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
        </div>
        <!-- /.col -->
    </div>


    <a href="/Proveedores">
        <button type="button" class="btn btn-primary btn-xs" data-toggle="tooltip"
                title="Registrar un nuevo proveedor en ERP">
            <i class="fa fa-industry"></i> Registrar Nuevo Proveedor
        </button>
    </a>

    <br><br>
    <div class="info-box">
        <div class="box-header">
            <h3 class="box-title">Listado General de Proveedores</h3>
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
                @foreach($proveedores as $pro)
                    <tr>
                        <td>{{  $pro -> rut }}</td>
                        <td>{{  $pro -> rsocial}}</td>
                        <td>{{  $pro -> giro}}</td>
                        <td>{{  $pro -> telefono}}</td>
                        <td>{{  $pro -> mail}}</td>
                        <td>
                            <center>
                                @if( $pro -> estado == 1)
                                    <button type="button" class="btn btn-success btn-xs" data-toggle="tooltip"
                                            title="Activo">
                                        <i class="fa fa-check"></i> Activo
                                    </button>
                                @elseif($pro->estado ==2)
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
