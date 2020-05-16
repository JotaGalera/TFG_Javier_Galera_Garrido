@extends('admin.layout')


@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Inicio
        <small>Panel de control</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Inicio</a></li>
        <li class="active">Panel de control</li>
    </ol>
</section>
<!-- Main content -->
<section class="content container-fluid">
    <!-- Info boxes -->
    <div class="row">
        <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="info-box">
                <span class="info-box-icon bg-aqua"><i class="ion ion-ios-gear-outline"></i></span>

                <div class="info-box-content">
                    <span class="info-box-text">RESERVAS SOLICITADAS</span>
                    <span class="info-box-number">15</span>
                </div>
                <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="info-box">
                <span class="info-box-icon bg-red"><i class="fa fa-calendar"></i></span>

                <div class="info-box-content">
                    <span class="info-box-text">RESERVAS ACEPTADAS</span>
                    <span class="info-box-number">35</span>
                </div>
                <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
        </div>
        <!-- /.col -->

        <!-- fix for small devices only -->
        <div class="clearfix visible-sm-block"></div>

        
    </div>
    <!-- /.row -->

    <!-- Main row -->
    <div class="row">
        <!-- Left col -->
        <div class="col-md-8">

            <!-- TABLE: LATEST ORDERS -->
            <div class="box box-info">
                <div class="box-header with-border">
                    <h3 class="box-title">Mis reservas</h3>
                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                        </button>
                        <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                    </div>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="table-responsive">
                        
                    <table id="example2" class="table no-margin">
                        <thead>
                            <tr>
                                <th>Código</th>
                                <th>Descripción</th>
                                <th>Fecha</th>
                                <th>Hora</th>
                                <th>Sistema</th>
                                <th>Ubicación</th>
                                <th>Estado</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>ATIS_AVE_001</td>
                                <td>Avería en barrera, sistema bloqueado</td>
                                <td>08/11/2018</td>
                                <td>10:00:50</td>
                                <td>Barrera de Vehículos</td>
                                <td>Fuente Peña</td>
                                <td><span class="label label-warning">Tramitada</span></td>
                            </tr>
                            <tr>
                                <td>ATIS_AVE_002</td>
                                <td>Avería en barrera, perdida de señal en centro de control</td>
                                <td>08/11/2018</td>
                                <td>15:00:15</td>
                                <td>Camara de Seguridad</td>
                                <td>Fuente Peña</td>
                                <td><span class="label label-danger">Pendiente</span></td>
                            </tr>
                            <tr>
                                <td>ATIS_AVE_003</td>
                                <td>Avería en sensores, la central nos indica que hay un fallo en los sensores</td>
                                <td>05/11/2018</td>
                                <td>13:14:50</td>
                                <td>Protección contra incendios</td>
                                <td>Puerta del libro</td>
                                <td><span class="label label-warning">Tramitada</span></td>
                            </tr>
                            <tr>
                                <td>ATIS_AVE_004</td>
                                <td>Avería en sensores, la central nos indica que hay un fallo en los sensores</td>
                                <td>15/11/2018</td>
                                <td>12:26:50</td>
                                <td>Protección contra incendios</td>
                                <td>Puerta del libro</td>
                                <td><span class="label label-warning">Tramitada</span></td>
                            </tr>
                            <tr>
                                <td>ATIS_AVE_005</td>
                                <td>Avería en la barrera, la barrera se ha quedado abierta.</td>
                                <td>16/11/2018</td>
                                <td>16:15:50</td>
                                <td>Barrera de Vehículos</td>
                                <td>Puerta del libro</td>
                                <td><span class="label label-success">Cerrada</span></td>
                            </tr>
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>Código</th>
                                <th>Descripción</th>
                                <th>Fecha</th>
                                <th>Hora</th>
                                <th>Sistema</th>
                                <th>Ubicación</th>
                                <th>Estado</th>
                            </tr>
                        </tfoot>
                    </table>
                    </div>
                    <!-- /.table-responsive -->
                </div>
                <!-- /.box-body -->
                <div class="box-footer clearfix">
                    <a href="javascript:void(0)" class="btn btn-sm btn-info btn-flat pull-left">Nueva Avería</a>
                    <a href="javascript:void(0)" class="btn btn-sm btn-default btn-flat pull-right">Ver todas</a>
                </div>
                <!-- /.box-footer -->
            </div>
            <!-- /.box -->
        </div>
        <!-- /.col -->

        <div class="col-md-4">
            <!-- Info Boxes Style 2 -->
            <div class="info-box bg-yellow">
                <span class="info-box-icon"><i class="ion ion-person"></i></span>

                <div class="info-box-content">
                    <span class="info-box-text">TÉCNICOS</span>
                    <span class="info-box-number">30</span>

                    <div class="progress">
                        <div class="progress-bar" style="width:30%"></div>
                    </div>
                    <span class="progress-description">
                        Incremento del 30% en el último mes
                    </span>
                </div>
                <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
            <div class="info-box bg-red">
                <span class="info-box-icon"><i class="fa fa-warning"></i></span>

                <div class="info-box-content">
                    <span class="info-box-text">AVERIAS</span>
                    <span class="info-box-number">150</span>

                    <div class="progress">
                        <div class="progress-bar" style="width: 80%"></div>
                    </div>
                    <span class="progress-description">
                        Incremento del 80%  en el último mes
                    </span>
                </div>
                <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
            <div class="info-box bg-green">
                <span class="info-box-icon"><i class="fa fa-archive"></i></span>

                <div class="info-box-content">
                    <span class="info-box-text">ELEMENTOS EN INVENTARIO</span>
                    <span class="info-box-number">1.150</span>

                    <div class="progress">
                        <div class="progress-bar" style="width: 5%"></div>
                    </div>
                    <span class="progress-description">
                        Incremento del 5% en el último mes
                    </span>
                </div>
                <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
            <div class="info-box bg-aqua">
                <span class="info-box-icon"><i class="ion-ios-chatbubble-outline"></i></span>

                <div class="info-box-content">
                    <span class="info-box-text">SISTEMAS DE SEGURIDAD</span>
                    <span class="info-box-number">150</span>

                    <div class="progress">
                        <div class="progress-bar" style="width: 10%"></div>
                    </div>
                    <span class="progress-description">
                        Incremento del 10% en el último mes
                    </span>
                </div>
                <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->

        </div>
        <!-- /.col -->
    </div>
    <!-- /.row -->
</section>
<!-- /.content -->
<!-- AdminLTE dashboard -->
@stop

@push('scripts')
<script src="/admin-lte/js/pages/dashboard2.js"></script>
@endpush
