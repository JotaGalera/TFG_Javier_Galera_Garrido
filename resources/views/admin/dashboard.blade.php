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
                <span class="info-box-icon bg-aqua"><i class="ion-ios-albums-outline"></i></span>

                <div class="info-box-content">
                    <span class="info-box-text">ALQUILERES TOTALES</span>
                    <span class="info-box-number" id="alquilerTotal"></span>
                </div>
                <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="info-box">
                <span class="info-box-icon bg-red"><i class="fa fa-usd"></i></span>

                <div class="info-box-content">
                    <span class="info-box-text">ALQUILERES PAGADOS</span>
                    <span class="info-box-number" id="alquilerPagado"></span>
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
                <span class="info-box-icon bg-green"><i class="fa fa-building-o"></i></span>

                <div class="info-box-content">
                    <span class="info-box-text">ESPACIOS EN EL SISTEMA</span>
                    <span class="info-box-number" id="numEspacio"></span>
                </div>
                <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="info-box">
                <span class="info-box-icon bg-yellow"><i class="fa fa-archive"></i></span>

                <div class="info-box-content">
                    <span class="info-box-text">ARTICULOS EN EL SISTEMA</span>
                    <span class="info-box-number" id="numArticulo"></span>
                </div>
                <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
        </div>
        <!-- /.col -->
    </div>
    <!-- /.row -->

    <!-- Main row -->
    <div class="row">
        <!-- Left col -->
        <div class="col-md-12">

            <!-- TABLE: LATEST ORDERS -->
            <div class="box box-info">
                <div class="box-header with-border">
                    <h3 class="box-title">Alquileres activos</h3>
                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                        </button>
                        <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                    </div>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="table-responsive">

                    <table id="tablaAlquileresActivos" class="table no-margin">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Fecha de alquiler</th>
                                <th>Usuario</th>
                                <th>Espacio</th>
                                <th>Pagado</th>
                            </tr>
                        </thead>
                    </table>
                    </div>
                    <!-- /.table-responsive -->
                </div>
                
            </div>
            <!-- /.box -->
        </div>
        <!-- /.col -->

        
        <!-- /.col -->
    </div>
    <!-- /.row -->
</section>
<!-- /.content -->
<!-- AdminLTE dashboard -->
@stop

@push('scripts')
<script>
    
    $( document ).ready(function() {
        $(function () {
            $('#tablaAlquileresActivos').DataTable({
                "paging": true,
                "lengthChange": false,
                "searching": true,
                "ordering": true,
                "info": true,
                "autoWidth": false,
                "processing" : true,
                "serverSide": true,
                "scrollX": true,
                "ajax": "alquiler/getdatatablepagados",
                "columns":[
                    {data:'id'},
                    {data:'fecha_alquiler'},
                    {data:'name_user'},
                    {data:'name_space'},
                    {data:'pagado'},
                ],

                dom: 'Bfrtip',
                buttons: [
                    'csv', 'excel', 'pdf'
                ]
            });

            
        });

        $(function(){
            $.ajax({
                url : 'alquiler/numalquilertotal',
                type : 'get',
                dataType: 'json',
                success:function(data)
                {
                    $('#alquilerTotal').text(data);
                }
            })
        });

        $(function(){
            $.ajax({
                url : 'alquiler/numalquilerpagado',
                type : 'get',
                dataType: 'json',
                success:function(data)
                {
                    $('#alquilerPagado').text(data);
                }
            })
        });

        $(function(){
            $.ajax({
                url : 'espacio/numespacio',
                type : 'get',
                dataType: 'json',
                success:function(data)
                {
                    $('#numEspacio').text(data);
                }
            })
        });

        $(function(){
            $.ajax({
                url : 'articulo/numarticulo',
                type : 'get',
                dataType: 'json',
                success:function(data)
                {
                    $('#numArticulo').text(data);
                }
            })
        });
        
    });
</script>
@endpush
