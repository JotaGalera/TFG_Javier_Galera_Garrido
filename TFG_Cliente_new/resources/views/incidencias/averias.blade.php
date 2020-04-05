@extends('admin.layout')


@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Averias
        <small>Incidencias</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="/"><i class="fa fa-dashboard"></i> Averias</a></li>
        <li class="active">Incidencias</li>
    </ol>
</section>
<!-- Main content -->
<section class="content container-fluid">
    <div class="row" style="margin-bottom: 5px;">
        <div class="col-xs-12">
            <a href="#" class="btn btn-success"><b><i class="fa fa-fw fa-plus"></i> Nuevo</b></a>
        </div>
        <div class="clearfix"></div>
    </div>
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Listado de averias</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <table id="example2" class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>Código</th>
                                <th>Descripción</th>
                                <th>Fecha</th>
                                <th>Hora</th>
                                <th>Sistema</th>
                                <th>Ubicación</th>
                                <th>Estado</th>
                                <th>Opciones</th>
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
                                <td nowrap><button type="button" class="btn btn-xs btn-primary"><i class="fa fa-fw fa-edit"></i></button> <button type="button" class="btn btn-xs btn-danger"><i class="fa fa-fw fa-trash"></i></button> <button type="button" class="btn btn-xs btn-info"><i class="fa fa-fw fa-file-text"></i></button></td>
                            </tr>
                            <tr>
                                <td>ATIS_AVE_002</td>
                                <td>Avería en barrera, perdida de señal en centro de control</td>
                                <td>08/11/2018</td>
                                <td>15:00:15</td>
                                <td>Camara de Seguridad</td>
                                <td>Fuente Peña</td>
                                <td><span class="label label-danger">Pendiente</span></td>
                                <td nowrap><button type="button" class="btn btn-xs btn-primary"><i class="fa fa-fw fa-edit"></i></button> <button type="button" class="btn btn-xs btn-danger"><i class="fa fa-fw fa-trash"></i></button> <button type="button" class="btn btn-xs btn-info"><i class="fa fa-fw fa-file-text"></i></button></td>
                            </tr>
                            <tr>
                                <td>ATIS_AVE_003</td>
                                <td>Avería en sensores, la central nos indica que hay un fallo en los sensores</td>
                                <td>05/11/2018</td>
                                <td>13:14:50</td>
                                <td>Protección contra incendios</td>
                                <td>Puerta del libro</td>
                                <td><span class="label label-warning">Tramitada</span></td>
                                <td nowrap><button type="button" class="btn btn-xs btn-primary"><i class="fa fa-fw fa-edit"></i></button> <button type="button" class="btn btn-xs btn-danger"><i class="fa fa-fw fa-trash"></i></button> <button type="button" class="btn btn-xs btn-info"><i class="fa fa-fw fa-file-text"></i></button></td>
                            </tr>
                            <tr>
                                <td>ATIS_AVE_004</td>
                                <td>Avería en sensores, la central nos indica que hay un fallo en los sensores</td>
                                <td>15/11/2018</td>
                                <td>12:26:50</td>
                                <td>Protección contra incendios</td>
                                <td>Puerta del libro</td>
                                <td><span class="label label-warning">Tramitada</span></td>
                                <td nowrap><button type="button" class="btn btn-xs btn-primary"><i class="fa fa-fw fa-edit"></i></button> <button type="button" class="btn btn-xs btn-danger"><i class="fa fa-fw fa-trash"></i></button> <button type="button" class="btn btn-xs btn-info"><i class="fa fa-fw fa-file-text"></i></button></td>
                            </tr>
                            <tr>
                                <td>ATIS_AVE_005</td>
                                <td>Avería en la barrera, la barrera se ha quedado abierta.</td>
                                <td>16/11/2018</td>
                                <td>16:15:50</td>
                                <td>Barrera de Vehículos</td>
                                <td>Puerta del libro</td>
                                <td><span class="label label-success">Cerrada</span></td>
                                <td nowrap><button type="button" class="btn btn-xs btn-primary"><i class="fa fa-fw fa-edit"></i></button> <button type="button" class="btn btn-xs btn-danger"><i class="fa fa-fw fa-trash"></i></button> <button type="button" class="btn btn-xs btn-info"><i class="fa fa-fw fa-file-text"></i></button></td>
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
                                <th>Opciones</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </div>
        <!-- /.col -->
    </div>
    <!-- /.row -->
</section>
<!-- /.content -->
@stop
@push('scripts')
<script>
$(function() {
    $('#example2').DataTable({
        "language": {
            "lengthMenu": "Mostrando _MENU_ registros por página",
            "zeroRecords": "No hay resultados",
            "info": "Mostrando página _PAGE_ de _PAGES_",
            "infoEmpty": "No hay resultados",
            "infoFiltered": "(Filtrando _MAX_ registros totales)",
            "search": "Buscar",
            "paginate": {
                "previous": "Anterior",
                "next": "Siguiente"
            }
        }
    });
});
</script>
@endpush
