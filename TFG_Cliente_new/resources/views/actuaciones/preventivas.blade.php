@extends('admin.layout')


@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Preventivas
        <small>Actuaciones</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="/"><i class="fa fa-dashboard"></i> Actuaciones</a></li>
        <li class="active">Preventivas</li>
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
                    <h3 class="box-title">Listado de sistemas</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <table id="example2" class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>Identificador</th>
                                <th>Descripción</th>
                                <th>Fecha</th>
                                <th>Hora Inicio</th>
                                <th>Hora Fin</th>
                                <th>Sistema</th>
                                <th>Ubicación</th>
                                <th>Tipo</th>
                                <th>Técnico</th>
                                <th>Estado</th>
                                <th>Opciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>ATIS_ACT_005</td>
                                <td>Revisión Extintores periodica.</td>
                                <td>08/10/2018</td>
                                <td>11:04:50</td>
                                <td>-</td>
                                <td>Protección contra incendios</td>
                                <td>Silla del Moro</td>
                                <td><span class="label label-primary">Preventivo</span></td>
                                <td>Raúl Mendez Garrido	</td>
                                <td><span class="label label-warning">Tramitada</span></td>
                                <td nowrap><button type="button" class="btn btn-xs btn-primary"><i class="fa fa-fw fa-edit"></i></button> <button type="button" class="btn btn-xs btn-danger"><i class="fa fa-fw fa-trash"></i></button> <button type="button" class="btn btn-xs btn-info"><i class="fa fa-fw fa-file-text"></i></button></td>
                            </tr>
                            <tr>
                                <td>ATIS_ACT_006</td>
                                <td>Revisión Grupo de Presión.</td>
                                <td>16/11/2018</td>
                                <td>10:10:50</td>
                                <td>-</td>
                                <td>Protección contra incendios</td>
                                <td>Casas de la mimbre</td>
                                <td><span class="label label-primary">Preventivo</span></td>
                                <td>Raúl Mendez Garrido	</td>
                                <td><span class="label label-warning">Tramitada</span></td>
                                <td nowrap><button type="button" class="btn btn-xs btn-primary"><i class="fa fa-fw fa-edit"></i></button> <button type="button" class="btn btn-xs btn-danger"><i class="fa fa-fw fa-trash"></i></button> <button type="button" class="btn btn-xs btn-info"><i class="fa fa-fw fa-file-text"></i></button></td>
                            </tr>
                            <tr>
                                <td>ATIS_ACT_007</td>
                                <td>Revisión Grupo de Presión.</td>
                                <td>15/11/2018</td>
                                <td>16:00:30</td>
                                <td>-</td>
                                <td>Protección contra incendios.</td>
                                <td>Puerta de las granadas.</td>
                                <td><span class="label label-primary">Preventivo</span></td>
                                <td>Sergio Flores Lopez</td>
                                <td><span class="label label-warning">Tramitada</span></td>
                                <td nowrap><button type="button" class="btn btn-xs btn-primary"><i class="fa fa-fw fa-edit"></i></button> <button type="button" class="btn btn-xs btn-danger"><i class="fa fa-fw fa-trash"></i></button> <button type="button" class="btn btn-xs btn-info"><i class="fa fa-fw fa-file-text"></i></button></td>
                            </tr>
                            <tr>
                                <td>ATIS_ACT_008</td>
                                <td>Revisión Extintores periodica.</td>
                                <td>18/11/2018</td>
                                <td>14:07:50</td>
                                <td>-</td>
                                <td>Protección contra incendios</td>
                                <td>Casas de la mimbre</td>
                                <td><span class="label label-primary">Preventivo</span></td>
                                <td>Raúl Mendez Garrido	</td>
                                <td><span class="label label-warning">Tramitada</span></td>
                                <td nowrap><button type="button" class="btn btn-xs btn-primary"><i class="fa fa-fw fa-edit"></i></button> <button type="button" class="btn btn-xs btn-danger"><i class="fa fa-fw fa-trash"></i></button> <button type="button" class="btn btn-xs btn-info"><i class="fa fa-fw fa-file-text"></i></button></td>
                            </tr>
                            <tr>
                                <td>ATIS_ACT_009</td>
                                <td>Revisión Extintores periodica.</td>
                                <td>20/11/2018</td>
                                <td>14:07:50</td>
                                <td>16:07:50</td>
                                <td>Protección contra incendios</td>
                                <td>Casas de la mimbre</td>
                                <td><span class="label label-primary">Preventivo</span></td>
                                <td>Aitor Muñoz Perez</td>
                                <td><span class="label label-success">Cerrada</span></td>
                                <td nowrap><button type="button" class="btn btn-xs btn-primary"><i class="fa fa-fw fa-edit"></i></button> <button type="button" class="btn btn-xs btn-danger"><i class="fa fa-fw fa-trash"></i></button> <button type="button" class="btn btn-xs btn-info"><i class="fa fa-fw fa-file-text"></i></button></td>
                            </tr>
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>Identificador</th>
                                <th>Descripción</th>
                                <th>Fecha</th>
                                <th>Hora Inicio</th>
                                <th>Hora Fin</th>
                                <th>Sistema</th>
                                <th>Ubicación</th>
                                <th>Tipo</th>
                                <th>Técnico</th>
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
