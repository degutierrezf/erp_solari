@extends('adminlte::layouts.app')

@section('htmlheader_title')
    Emisión DTE
@endsection

@section('contentheader_title')
    ERP - SISTEMA DE CONTROL - EMISIÓN DTE -
@endsection

@section('main-content')
    @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
        @elseif(session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif

    <div class="row">
        <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="info-box">
                <span class="info-box-icon bg-aqua"><i class="fa fa-users"></i></span>

                <div class="info-box-content">
                    <span class="info-box-text">Total Emitido Año</span>
                    <span class="info-box-number"></span>
                </div>
                <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="info-box">
                <span class="info-box-icon bg-yellow"><i class="fa fa-dollar"></i></span>

                <div class="info-box-content">
                    <span class="info-box-text">Total Emitido Mes</span>
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
                <span class="info-box-icon bg-green"><i class="fa fa-dollar"></i></span>

                <div class="info-box-content">
                    <span class="info-box-text">Total IVA Mes</span>
                    <span class="info-box-number"></span>
                </div>
                <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="info-box">
                <span class="info-box-icon bg-green"><i class="fa fa-dollar"></i></span>

                <div class="info-box-content">
                    <span class="info-box-text">N° Facturas Mes</span>
                    <span class="info-box-number"></span>
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
                    <th>ID</th>
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
                        <td>{{  $cli -> id_cliente }}</td>
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
                                <button id="btn_add_dte" type="button" class="btn btn-success btn-xs btn_add_dte" data-toggle="tooltip"
                                        title="Agregar DTE">
                                    <i class="fa fa-plus"></i>
                                </button>
                                &nbsp &nbsp &nbsp
                                <button type="button" class="btn btn-primary btn-xs" data-toggle="tooltip"
                                        title="Ver DTE por Cliente">
                                    <i class="fa fa-eye"></i>
                                </button>
                            </center>
                        </td>
                    </tr>
                @endforeach
                </tbody>
                <tfoot>
                <tr>
                    <th>ID</th>
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


    <div class="modal fade" id="add_dte"
         tabindex="-1" role="dialog"
         aria-labelledby="favoritesModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close"
                            data-dismiss="modal"
                            aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title"
                        id="favoritesModalLabel">Agregar DTE Cliente </h4>
                </div>
                <div class="modal-body">
                    <form class="form-horizontal" name="form" action="{{ url('Clientes/EmitirDTE') }}" role="form"
                          method="POST" enctype="multipart/form-data">

                        <div class="box-body">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <input class="form-control pull-right" id="id_cliente" type="hidden" name="id_cliente">
                            <div class="form-group">

                                <label for="exampleInputEmail1" class="col-sm-3 control-label">Cliente</label>
                                <div class="col-sm-9">
                                    <input class="form-control pull-right" id="nom_cliente" type="text" name="nom_cliente"
                                           disabled>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1" class="col-sm-3 control-label">Fecha Emisión</label>
                                <div class="col-sm-4">
                                    <input class="form-control pull-right" type="date" name="fecha_em" required>
                                </div>
                                <label for="exampleInputEmail1" class="col-sm-2 control-label">N° Doc:</label>
                                <div class="col-sm-3">
                                    <input class="form-control pull-right" type="number" min="1" name="n_doc" required>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1" class="col-sm-3 control-label">$ Neto</label>
                                <div class="col-sm-4">
                                    <input class="form-control pull-right" id="neto" type="number"  min="1" name="neto" required>
                                </div>
                                <label for="exampleInputEmail1" class="col-sm-1 control-label">$ IVA</label>
                                <div class="col-sm-4">
                                    <input class="form-control pull-right" id="iva" type="number" min="0" name="iva" required>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1" class="col-sm-3 control-label">$ Total</label>
                                <div class="col-sm-4">
                                    <input class="form-control pull-right" id="total" type="number" min="1" name="total" readonly>
                                </div>
                                <label for="exampleInputEmail1" class="col-sm-1 control-label">Tipo</label>
                                <div class="col-sm-4">
                                    <select class="form-control pull-right" name="tipo">
                                        <?php  foreach ($tipo_doc as $td) { ?>
                                        <option class="form-control pull-right" value="<?php echo $td->id_t_doc ?>"><?php echo $td->tipo_documento ?></option>
                                        <?php }
                                        ?>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1" class="col-sm-3 control-label">Observaciones</label>
                                <div class="col-sm-9">
                                    <textarea class="form-control pull-right" name="obs" id="" cols="10" rows="2"></textarea>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1" class="col-sm-3 control-label">¿Fecha
                                    Vencimiento?</label>
                                <div class="col-sm-9">
                                    <input class="form-control pull-right" type="date" name="fecha_ven" required>
                                </div>
                            </div>

                        </div><!-- /.box-body -->

                        <div class="modal-footer">

                            <button type="button" class="btn btn-danger" data-dismiss="modal" aria-label="Close">
                                <i class="fa fa-remove "></i> Cancelar
                            </button>


                            <button type="submit" class="btn btn-success">
                                <i class="fa fa-check "></i> Agregar DTE a Cliente
                            </button>

                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection