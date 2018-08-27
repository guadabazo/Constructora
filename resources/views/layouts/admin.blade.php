<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Constructora Apolo</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.5 -->
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/bootstrap-select.min.css')}}">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{asset('css/font-awesome.css')}}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{asset('css/AdminLTE.min.css')}}">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="{{asset('css/_all-skins.min.css')}}">
    <link rel="apple-touch-icon" href="{{asset('img/apple-touch-icon.png')}}">
    <link rel="shortcut icon" href="{{asset('img/favicon.ico')}}">

</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

    <header class="main-header">

        <!-- Logo -->
        <a href="index2.html" class="logo">
            <!-- mini logo for sidebar mini 50x50 pixels -->
            <span class="logo-mini"><b>AD</b>V</span>
            <!-- logo for regular state and mobile devices -->
            <span class="logo-lg"><b>Constructora</b></span>
        </a>

        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top" role="navigation">
            <!-- Sidebar toggle button-->
            <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
                <span class="sr-only">Navegación</span>
            </a>
            <!-- Navbar Right Menu -->
            <div class="navbar-custom-menu">
                <ul class="nav navbar-nav">
                    <!-- Messages: style can be found in dropdown.less-->

                    <!-- User Account: style can be found in dropdown.less -->
                    <li class="dropdown user user-menu">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <small class="bg-red">ONLINE</small>
                            <span class="hidden-xs">leonardo ayala</span>
                        </a>
                        <ul class="dropdown-menu">
                            <!-- User image -->
                            <li class="user-header">
                                <p>
                                    EMPRESA CONSTRUCTORA APOLO
                                    <small></small>
                                </p>
                            </li>

                            <!-- Menu Footer-->
                            <li class="user-footer">

                                <div class="pull-right">
                                    <a href="/" class="btn btn-default btn-flat">Cerrar</a>
                                </div>
                            </li>
                        </ul>
                    </li>

                </ul>
            </div>

        </nav>
    </header>
    <!-- Left side column. contains the logo and sidebar -->
    <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
            <!-- Sidebar user panel -->

            <!-- sidebar menu: : style can be found in sidebar.less -->

            <ul class="sidebar-menu">
                <li class="header"></li>

                <li class="treeview">
                    <a href="#">
                        <li><a href="{{url('admin')}}"><i class="fa fa-circle-o"><span> Inicio</span></i></a></li>
                        <i class="fa fa-angle-left pull-right"></i>
                    </a>
                </li>
                <?php
                error_reporting(E_ALL and E_NOTICE);
                session_start();
                ob_start();
                $var= $_SESSION['valor'];

                ;?>

                @foreach($var as $B)

                @if($B->Codigo_G == 1)
                <li class="treeview">
                    <a href="#">
                        <i class="fa fa-laptop"></i>
                        <span>Gestionar</span>
                        <i class="fa fa-angle-left pull-right"></i>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="{{url('Gestionar/GestionarPersona')}}"><i class="fa fa-circle-o"></i> Gestionar persona</a></li>
                        <li><a href="{{url('Gestionar/GestionarRol')}}"><i class="fa fa-circle-o"></i> Gestionar Rol</a></li>
                        <li><a href="{{url('Gestionar/GestionarProveedor')}}"><i class="fa fa-circle-o"></i> Gestionar Proveedor</a></li>
                        <li><a href="{{url('Gestionar/GestionarEncargado')}}"><i class="fa fa-circle-o"></i> Gestionar Encargado</a></li>
                        <li><a href="{{url('Gestionar/GestionarTrabajador')}}"><i class="fa fa-circle-o"></i> Gestionar Trabajador</a></li>
                        <li><a href="{{url('Gestionar/GestionarChofer')}}"><i class="fa fa-circle-o"></i> Gestionar Chofer</a></li>
                    </ul>
                </li>
                <li class="treeview">
                    <a href="#">
                        <i class="fa fa-laptop"></i>
                        <span>Administrar Usuarios</span>
                        <i class="fa fa-angle-left pull-right"></i>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="{{url('AdmUsuario/AdministrarUsuario')}}"><i class="fa fa-circle-o"></i> Gestionar Usuario</a></li>
                        <li><a href="{{url('AdmUsuario/AdministrarGrupo')}}"><i class="fa fa-circle-o"></i> Gestionar Grupo</a></li>
                        <li><a href="{{url('AdmUsuario/AdministrarBitacora')}}"><i class="fa fa-circle-o"></i> Administrar Bitacora</a></li>
                    </ul>
                </li>

                @endif
                @endforeach


                <li class="treeview">
                    <a href="#">
                        <i class="fa fa-laptop"></i>
                        <span>Registrar Ingresos</span>
                        <i class="fa fa-angle-left pull-right"></i>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="{{url('Registrar/IngresoMaterial')}}"><i class="fa fa-circle-o"></i>usuario usuario</a></li>
                        <li><a href="{{url('Registrar/IngresoHerramienta')}}"><i class="fa fa-circle-o"></i> Ingreso de Herramienta</a></li>
                        <li><a href="{{url('Registrar/IngresoDotacion')}}"><i class="fa fa-circle-o"></i> Ingreso de Dotacion</a></li>
                        <li><a href="{{url('Registrar/NotaDevolucion')}}"><i class="fa fa-circle-o"></i> Registrar Devolucion</a></li>
                        <li><a href="{{url('Registrar/RealizaProduccion')}}"><i class="fa fa-circle-o"></i> Registrar Produccion</a></li>
                    </ul>
                </li>

                <li class="treeview">
                    <a href="#">
                        <i class="fa fa-laptop"></i>
                        <span>Registrar Egresos</span>
                        <i class="fa fa-angle-left pull-right"></i>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="{{url('RegistrarEgreso/NotaSalidaCombustible')}}"><i class="fa fa-circle-o"></i> Salida de Combustible</a></li>
                        <li><a href="{{url('RegistrarEgreso/EntregaProduccion')}}"><i class="fa fa-circle-o"></i> Entrega de Produccion</a></li>
                        <li><a href="{{url('RegistrarEgreso/NotaEntregaMaterial')}}"><i class="fa fa-circle-o"></i> Entrega de Material</a></li>
                        <li><a href="{{url('RegistrarEgreso/EntregaDotacion')}}"><i class="fa fa-circle-o"></i> Entrega de Dotacion</a></li>
                        <li><a href="{{url('RegistrarEgreso/PrestamoHerramienta')}}"><i class="fa fa-circle-o"></i> Nota de Prestamo</a></li>
                    </ul>
                </li>

                <li class="treeview">
                    <a href="#">
                        <i class="fa fa-folder"></i> <span>Administrar</span>
                        <i class="fa fa-angle-left pull-right"></i>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="{{url('administrar/administrar_inventario')}}"><i class="fa fa-circle-o"></i> Administrar Inventario</a></li>
                        <li><a href="{{url('administrar/administrar_material')}}"><i class="fa fa-circle-o"></i> Administrar Material</a></li>
                        <li><a href="{{url('administrar/administrar_herramienta')}}"><i class="fa fa-circle-o"></i> Administrar Herramienta</a></li>
                        <li><a href="{{url('administrar/administrar_dotacion')}}"><i class="fa fa-circle-o"></i> Administrar Dotacion</a></li>
                        <li><a href="{{url('administrar/administrar_produccion')}}"><i class="fa fa-circle-o"></i> Administrar Produccion</a></li>
                        <li><a href="{{url('administrar/registrar_deposito')}}"><i class="fa fa-circle-o"></i> Registrar Deposito</a></li>
                        <li><a href="{{url('administrar/gestionar_proyecto')}}"><i class="fa fa-circle-o"></i> Gestionar Proyecto</a></li>

                    </ul>
                </li>

                <li class="treeview">
                    <a href="#">
                        <i class="fa fa-laptop"></i>
                        <span>Consultas</span>
                        <i class="fa fa-angle-left pull-right"></i>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="{{url('administrar/administrar_herramienta')}}"><i class="fa fa-circle-o"></i> Consulta 1</a></li>
                        <li><a href="{{url('Gestionar/GestionarPersona')}}"><i class="fa fa-circle-o"></i> Consulta 2</a></li>
                    </ul>
                </li>
            </ul>
        </section>
        <!-- /.sidebar -->
    </aside>





    <!--Contenido-->
    <!-- Content Wrapper. Contains page content -->

    <div class="content-wrapper">

        <!-- Main content -->
        <section class="content">

            <div class="row">
                <div class="col-md-12">
                    <div class="box">
                        <div class="box-header with-border">
                            <h3 class="box-title"><?php
                                session_start();
                                echo $_SESSION['username'] ;

                                ?></h3>
                            <div class="box-tools pull-right">
                                <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                                <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                            </div>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <!--Contenido-->

                                @yield('contenido')
                                <!--Fin Contenido-->
                                </div>
                            </div>

                        </div>
                    </div><!-- /.row -->
                </div><!-- /.box-body -->
            </div><!-- /.box -->
        </section>
    </div><!-- /.col -->
</div><!-- /.row -->

</section><!-- /.content -->
</div><!-- /.content-wrapper -->
<!--Fin-Contenido-->
<footer class="main-footer">
    <div class="pull-right hidden-xs">
        <b>Version</b> 2.3.0
    </div>
    <strong>Copyright<a href="www.constructoraapolo.com.bo"> Constructora Apolo </a>.</strong> All rights reserved.
</footer>


<!-- jQuery 2.1.4 -->
<script src="{{asset('js/jQuery-2.1.4.min.js')}}"></script>
@stack('scripts')
<!-- Bootstrap 3.3.5 -->
<script src="{{asset('js/bootstrap.min.js')}}"></script>
<script src="{{asset('js/bootstrap-select.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{asset('js/app.min.js')}}"></script>

</body>
</html>
