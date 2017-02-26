<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

        <!-- Sidebar user panel (optional) -->
        @if (! Auth::guest())
            <div class="user-panel">
                <div class="pull-left image">
                    <img src="{{ Gravatar::get($user->email) }}" class="img-circle" alt="User Image" />
                </div>
                <div class="pull-left info">
                    <p>{{ Auth::user()->name }}</p>
                    <!-- Status -->
                    <a href="#"><i class="fa fa-circle text-success"></i> {{ trans('adminlte_lang::message.online') }}</a>
                </div>
            </div>
        @endif

        <!-- Sidebar Menu -->
        <ul class="sidebar-menu">
            <li class="header">PRINCIPAL</li>
            <!-- Optionally, you can add icons to the links -->
            <li class="treeview">
                <a href="#"><i class='fa fa-user'></i> <span>Clientes</span> <i class="fa fa-angle-right pull-right"></i></a>
                <ul class="treeview-menu">
                    <li><a href="/Clientes">Nuevo Cliente</a></li>
                    <li><a href="/Clientes/Listar">Listar Clientes</a></li>
                </ul>
            </li>
            <li class="treeview">
                <a href="#"><i class='fa fa-industry'></i> <span>Proveedores</span> <i class="fa fa-angle-right pull-right"></i></a>
                <ul class="treeview-menu">
                    <li><a href="#">Nuevo Proveedor</a></li>
                    <li><a href="#">Listar Proveedores</a></li>
                </ul>
            </li>
            <li class="header">FACTURA / PAGOS</li>
            <li class="treeview">
                <a href="#"><i class='fa fa-dollar'></i> <span>De Clientes</span> <i class="fa fa-angle-right pull-right"></i></a>
                <ul class="treeview-menu">
                    <li><a href="#">Registrar Factura</a></li>
                    <li><a href="#">Registar Pago de Factura</a></li>
                </ul>
            </li>
            <li class="treeview">
                <a href="#"><i class='fa fa-dollar'></i> <span>A Proveedores</span> <i class="fa fa-angle-right pull-right"></i></a>
                <ul class="treeview-menu">
                    <li><a href="#">Registrar Factura</a></li>
                    <li><a href="#">Registar Pago de Factura</a></li>
                </ul>
            </li>
            <li class="header">INFORMES</li>
            <li class="treeview">
                <a href="#"><i class='fa fa-file-pdf-o'></i> <span>Informes</span> <i class="fa fa-angle-right pull-right"></i></a>
                <ul class="treeview-menu">
                    <li><a href="#">Pagos Realizados</a></li>
                    <li><a href="#">Pagos Recibidos</a></li>
                    <li><a href="#">Pagos Pendientes de Hacer</a></li>
                    <li><a href="#">Pagos Pendientes de Recibir</a></li>
                </ul>
            </li>
            <li class="header">SISTEMA</li>
            <li class="treeview">
                <a href="#"><i class='fa fa-gear'></i> <span>Configuración</span> <i class="fa fa-angle-left pull-right"></i></a>
                <ul class="treeview-menu">
                    <li><a href="#">{{ trans('adminlte_lang::message.linklevel2') }}</a></li>
                    <li><a href="#">{{ trans('adminlte_lang::message.linklevel2') }}</a></li>
                </ul>
            </li>
        </ul><!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
</aside>
