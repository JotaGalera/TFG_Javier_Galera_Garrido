<!DOCTYPE html>

<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>ATIS RRHH</title>
        <!-- Tell the browser to be responsive to screen width -->
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <link rel="stylesheet" href="/admin-lte/bootstrap/css/bootstrap.min.css">
        <!-- Font Awesome -->
        <link rel="stylesheet" href="/admin-lte/font-awesome/css/font-awesome.min.css">
        <!-- Ionicons -->
        <link rel="stylesheet" href="/admin-lte/Ionicons/css/ionicons.min.css">
        <!-- jvectormaps -->
        <link rel="stylesheet" href="/admin-lte/plugins/jvectormap/jquery-jvectormap-1.2.2.css">
        <!-- Theme style -->
        <link rel="stylesheet" href="/admin-lte/css/AdminLTE.min.css">
        <link rel="stylesheet" href="/admin-lte/css/skins/skin-red.min.css">
        <!-- DataTables -->
        <link rel="stylesheet" href="/admin-lte/datatables.net-bs/css/dataTables.bootstrap.min.css">
        <link rel="stylesheet" href="/admin-lte/datatables.net/buttons.dataTables.min.css">
        <!-- Lightbox2 -->
        <link href="/admin-lte/lightbox/css/lightbox.css" rel="stylesheet">
        <!-- OpenLayer -->
        <link rel="stylesheet" href="/admin-lte/plugins/openLayers/css/ol.css" type="text/css">
        <!-- Alertify.js -->
        <link rel="stylesheet" href="/admin-lte/alertify.js/css/themes/default.rtl.css" type="text/css">
        <link rel="stylesheet" href="/admin-lte/alertify.js/css/alertify.min.css" type="text/css">
        <!-- Select2.js -->
        <link rel="stylesheet" href="/admin-lte/select2.js/select2.min.css" type="text/css">
        <!-- bootstrap.datepicker -->
        <link rel="stylesheet" href="/admin-lte/bootstrap-datepicker/bootstrap-datepicker.min.css" type="text/css">
        <!-- iCheck -->
        <link rel="stylesheet" href="/admin-lte/plugins/iCheck/square/blue.css">
        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
        <!-- Google Font -->
        <link rel="stylesheet"
              href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
        
        <!-- LeafLet -->
        <link rel="stylesheet" href="/admin-lte/plugins/leaflet/leaflet.css" />
        <link rel="stylesheet" href="/admin-lte/plugins/leaflet/Control.Coordinates.css" />
    </head>

    <body class="hold-transition skin-red sidebar-mini">
        <div class="wrapper">
            <!-- Main Header -->
            <header class="main-header">
                <!-- Logo -->
                <a href="/" class="logo">
                    <!-- mini logo for sidebar mini 50x50 pixels -->
                    <span class="logo-mini"><img src="/admin-lte/img/custom/atis_mini.png" alt="Logo ATIS"></span>
                    <!-- logo for regular state and mobile devices -->
                    <span class="logo-lg"><img src="/admin-lte/img/custom/atis_white.png" alt="Logo ATIS"></span>
                </a>
                <!-- Header Navbar -->
                <nav class="navbar navbar-static-top" role="navigation">
                    <!-- Sidebar toggle button-->
                    <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
                        <span class="sr-only">Toggle navigation</span>
                    </a>
                    <!-- Navbar Right Menu -->
                    <div class="navbar-custom-menu">
                        <ul class="nav navbar-nav">
                            <!-- User Account Menu -->
                            <li class="dropdown user user-menu">
                                <!-- Menu Toggle Button -->
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    <!-- The user image in the navbar-->
                                    <img src="/admin-lte/img/user2-160x160.jpg" class="user-image" alt="User Image">
                                    <!-- hidden-xs hides the username on small devices so only the image appears. -->
                                    <span class="hidden-xs">{{ session()->get('user_name') }}</span>
                                </a>
                                <ul class="dropdown-menu">
                                    <!-- The user image in the menu -->
                                    <li class="user-header">
                                        <img src="/admin-lte/img/user2-160x160.jpg" class="img-circle" alt="User Image">

                                        <p>
                                            {{ session()->get('user_name') }} - Invitado
                                            <small>Miembro desde Nov. 2018</small>
                                        </p>
                                    </li>
                                    <!-- Menu Body -->
                                    <li class="user-body">
                                        <div class="row">
                                            <div class="col-xs-6 text-center">
                                                <a href="#">Mensajes</a>
                                            </div>
                                            <div class="col-xs-6 text-center">
                                                <a href="#">Incidencias</a>
                                            </div>
                                        </div>
                                        <!-- /.row -->
                                    </li>
                                    <!-- Menu Footer-->
                                    <li class="user-footer">
                                        <div class="pull-left">
                                            <a href="#" class="btn btn-default btn-flat">Mi Perfil</a>
                                        </div>
                                        <div class="pull-right">
                                            <a href="{{ route('logout') }}" class="btn btn-default btn-flat">Desconectar</a>
                                        </div>
                                    </li>
                                </ul>
                            </li>
                            <!-- Control Sidebar Toggle Button -->
                            <!--
                            <li>
                                <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
                            </li>-->
                        </ul>
                    </div>
                </nav>
            </header>
            <!-- Left side column. contains the logo and sidebar -->
            <aside class="main-sidebar">
                <!-- sidebar: style can be found in sidebar.less -->
                <section class="sidebar">
                    <!-- Sidebar user panel (optional) -->
                    <div class="user-panel">
                        <div class="pull-left image">
                            <img src="/admin-lte/img/user2-160x160.jpg" class="img-circle" alt="User Image">
                        </div>
                        <div class="pull-left info">
                            <p>{{ session()->get('user_name') }}</p>
                            <!-- Status -->
                            <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
                        </div>
                    </div>
                    <!-- /.search form -->
                    <!-- Sidebar Menu -->
                    <ul class="sidebar-menu" data-widget="tree">
                        <li class="header">MAPA</li>
                        <li <?php if(Route::currentRouteName() == "gis"){ ?>class="active" <?php } ?>><a href="/gis"><i class="fa fa-map"></i> <span>GIS</span></a></li>
                        <li class="header">ADMINISTRACIÓN</li>
                        <li <?php if(Route::currentRouteName() == "alquiler"){ ?>class="active" <?php } ?>><a href="/alquiler"><i class="fa fa-map"></i> <span>Alquiler</span></a></li>
                        
                    </ul>
                    <!-- /.sidebar-menu -->
                </section>
                <!-- /.sidebar -->
            </aside>
            <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper">
                @yield('content')
            </div>
            <!-- /.content-wrapper -->
            <!-- Main Footer -->
            <footer class="main-footer">
                <!-- To the right -->
                <div class="pull-right hidden-xs">

                </div>
                <!-- Default to the left -->
                <strong><a href="http://www.atisoluciones.com" target="_blank">ATIS Soluciones</a>.</strong> Todos los derechos reservados.
            </footer>
            <!-- Control Sidebar -->
            <aside class="control-sidebar control-sidebar-dark">
                <!-- Create the tabs -->
                <ul class="nav nav-tabs nav-justified control-sidebar-tabs">
                    <li class="active"><a href="#control-sidebar-home-tab" data-toggle="tab"><i class="fa fa-home"></i></a></li>
                    <li><a href="#control-sidebar-settings-tab" data-toggle="tab"><i class="fa fa-gears"></i></a></li>
                </ul>
                <!-- Tab panes -->
                <div class="tab-content">
                    <!-- Home tab content -->
                    <div class="tab-pane active" id="control-sidebar-home-tab">
                        <h3 class="control-sidebar-heading">Actividad Reciente</h3>
                        <ul class="control-sidebar-menu">
                            <li>
                                <a href="javascript:;">
                                    <i class="menu-icon fa fa-envelope bg-red"></i>
                                    <div class="menu-info">
                                        <h4 class="control-sidebar-subheading">Has recibido 4 mensajes privados</h4>
                                        <p>02/12/2018</p>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="javascript:;">
                                    <i class="menu-icon fa fa-bell bg-red"></i>
                                    <div class="menu-info">
                                        <h4 class="control-sidebar-subheading">Has recibido 3 notificaciones</h4>
                                        <p>02/12/2018</p>
                                    </div>
                                </a>
                            </li>
                        </ul>
                        <!-- /.control-sidebar-menu -->
                    </div>
                    <!-- /.tab-pane -->
                    <!-- Stats tab content -->
                    <div class="tab-pane" id="control-sidebar-stats-tab">Stats Tab Content</div>
                    <!-- /.tab-pane -->
                    <!-- Settings tab content -->
                    <div class="tab-pane" id="control-sidebar-settings-tab">
                        <form method="post">
                            <h3 class="control-sidebar-heading">Configuración General</h3>

                            <div class="form-group">
                                <label class="control-sidebar-subheading">
                                    Notificaciones via email
                                    <input type="checkbox" class="pull-right" checked>
                                </label>
                                <p>Habilita esta opción si quieres recibir notificaciones por email</p>
                                <label class="control-sidebar-subheading">
                                    Notificaciones via SMS
                                    <input type="checkbox" class="pull-right" checked>
                                </label>
                                <p>Habilita esta opción si quieres recibir notificaciones por Telegram</p>
                                <label class="control-sidebar-subheading">
                                    Notificaciones via Telegram
                                    <input type="checkbox" class="pull-right" checked>
                                </label>
                                <p>Habilita esta opción si quieres recibir notificaciones por telegram</p>
                                <label class="control-sidebar-subheading">
                                    Notificaciones via WhatsApp
                                    <input type="checkbox" class="pull-right" checked>
                                </label>
                                <p>Habilita esta opción si quieres recibir notificaciones por WhatsApp</p>
                            </div>
                            <!-- /.form-group -->
                        </form>
                    </div>
                    <!-- /.tab-pane -->
                </div>
            </aside>
            <div class="control-sidebar-bg"></div>
        </div>
        <!-- ./wrapper -->
    </body>
</html>
<!-- REQUIRED JS SCRIPTS -->
<!-- jQuery 3 -->
<script src="/admin-lte/jquery/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="/admin-lte/bootstrap/js/bootstrap.min.js"></script>
<!-- DataTables -->
<script src="/admin-lte/datatables.net/jquery.dataTables.js"></script>
<script src="/admin-lte/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<!-- FastClick -->
<script src="/admin-lte/plugins/fastclick/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="/admin-lte/js/adminlte.min.js"></script>
<!-- Sparkline -->
<script src="/admin-lte/plugins/sparkline/jquery.sparkline.min.js"></script>
<!-- jvectormap  -->
<script src="/admin-lte/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="/admin-lte/plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<!-- SlimScroll -->
<script src="/admin-lte/plugins/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- ChartJS -->
<script src="/admin-lte/plugins/chart.js/Chart.js"></script>
<!-- OpenLayers -->
<script src="/admin-lte/plugins/openLayers/build/ol.js"></script>
<!-- Lightbox -->
<script src="/admin-lte/lightbox/js/lightbox.js"></script>
<!-- Alertify -->
<script src="/admin-lte/alertify.js/alertify.min.js"></script>
<!-- Select2 -->
<script src="/admin-lte/select2.js/select2.full.min.js"></script>
<!-- Bootstrap Datepicker -->
<script src="/admin-lte/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>
<!-- iCheck -->
<script src="/admin-lte/plugins/iCheck/icheck.min.js"></script>
<script type="text/javascript" src="/admin-lte/moment.min.js"></script>
<script type="text/javascript" src="/admin-lte/datetime-moment.js"></script>
<!-- LeafLet -->

<script src="/admin-lte/plugins/leaflet/leaflet-src.js"></script>
<script src="/admin-lte/plugins/leaflet/leaflet-indoor.js"></script>

<!-- LeafLet Coordenadas Mouse -->
<script src="/admin-lte/plugins/leaflet/Control.Coordinates.js"></script>
 <!-- Mapbox -->
 <script src='https://api.mapbox.com/mapbox-gl-js/v0.54.0/mapbox-gl.js'></script>

@stack('scripts')
