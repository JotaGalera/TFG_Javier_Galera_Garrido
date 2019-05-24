@extends('admin.layout')

@section('content')

<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Administración
        <small>Configuración</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="/"><i class="fa fa-dashboard"></i> Administración</a></li>
        <li class="active">Familias/Secciones</li>
    </ol>
</section>
<!-- Main content -->
<section class="content container-fluid">
    <div class="row" style="margin-bottom: 5px;">
        <div class="col-xs-12">
            <a href="#" class="btn btn-success" id="new"><b><i class="fa fa-fw fa-plus"></i> Nuevo</b></a>
        </div>
        <div class="clearfix"></div>
    </div>
    <div class="row">
        <div class="col-xs-12">
            <div class="nav-tabs-custom">
                <ul class="nav nav-tabs">
                    <li class="active" id="tab1"><a href="#tab_1" data-toggle="tab" aria-expanded="false" id_tab="0">Familias</a></li>
                    <li id="tab2"><a href="#tab_2" data-toggle="tab" aria-expanded="true" id_tab="1">Secciones</a></li>
                    <li id="tab3"><a href="#tab_3" data-toggle="tab" aria-expanded="true" id_tab="2">Tipo de IVA</a></li>
                    <li id="tab4"><a href="#tab_4" data-toggle="tab" aria-expanded="true" id_tab="3">Tipos de Sistema</a></li>
                    <li id="tab5"><a href="#tab_5" data-toggle="tab" aria-expanded="true" id_tab="4">Metodos Comunicación</a></li>
                    <li id="tab6"><a href="#tab_6" data-toggle="tab" aria-expanded="true" id_tab="5">Prioridades</a></li>
                    <li id="tab7"><a href="#tab_7" data-toggle="tab" aria-expanded="true" id_tab="6">Tipo Incidencia</a></li>
                    <li id="tab8"><a href="#tab_8" data-toggle="tab" aria-expanded="true" id_tab="7">Estado [Act]</a></li>
                    <li id="tab9"><a href="#tab_9" data-toggle="tab" aria-expanded="true" id_tab="8">Estado [Inc]</a></li>
                    <li id="tab10"><a href="#tab_10" data-toggle="tab" aria-expanded="true" id_tab="9">Otras Configuraciones</a></li>
                    <li id="tab11"><a href="#tab_11" data-toggle="tab" aria-expanded="true" id_tab="10">Caracteristicas [Tipos]</a></li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane active" id="tab_1">
                        <div class="box-body">
                            <table id="tableMasterFamilias" class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>Familia</th>
                                        <th>Sección</th>
                                        <th>Acción</th>
                                    </tr>
                                </thead>
                            </table>   
                        </div>       
                    </div>
                    <div class="tab-pane" id="tab_2">
                        <div class="box-body">
                            <table id="tableMasterSecciones" class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>Sección</th>
                                        <th>Acción</th>
                                    </tr>
                                </thead>
                            </table>
                        </div>
                    </div>
                    <div class="tab-pane" id="tab_3">
                        <div class="box-body">
                            <table id="tableMasterIVA" class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>Nombre</th>
                                        <th>Porcentaje %</th>
                                        <th>Acción</th>
                                    </tr>
                                </thead>
                            </table>
                        </div>
                    </div>
                    <div class="tab-pane" id="tab_4">
                        <div class="box-body">
                            <table id="tableMasterSistemaTipo" class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>Nombre</th>
                                        <th>Acción</th>
                                    </tr>
                                </thead>
                            </table>
                        </div>
                    </div>
                    <div class="tab-pane" id="tab_5">
                        <div class="box-body">
                            <table id="tableMasterIncidenciaMetodoComunicacion" class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>Nombre</th>
                                        <th>Acción</th>
                                    </tr>
                                </thead>
                            </table>
                        </div>
                    </div>
                    <div class="tab-pane" id="tab_6">
                        <div class="box-body">
                            <table id="tableMasterIncidenciaPrioridad" class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>Nombre</th>
                                        <th>Acción</th>
                                    </tr>
                                </thead>
                            </table>
                        </div>
                    </div>
                    <div class="tab-pane" id="tab_7">
                        <div class="box-body">
                            <table id="tableMasterIncidenciaTipo" class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>Nombre</th>
                                        <th>Acción</th>
                                    </tr>
                                </thead>
                            </table>
                        </div>
                    </div>
                    <div class="tab-pane" id="tab_8">
                        <div class="box-body">
                            <table id="tableMasterActuacionTipoEstado" class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>Nombre</th>
                                        <th>Cierra Incidencia</th>
                                        <th>Acción</th>
                                    </tr>
                                </thead>
                            </table>
                        </div>
                    </div>
                    <div class="tab-pane" id="tab_9">
                        <div class="box-body">
                            <table id="tableMasterIncidenciaTipoEstado" class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>Nombre</th>
                                        <th>Acción</th>
                                    </tr>
                                </thead>
                            </table>
                        </div>
                    </div>
                    <div class="tab-pane" id="tab_10">
                        <div class="box-body">
                            <table id="tableMasterConfig" class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>Versión Android</th>
                                        <th>Acción</th>
                                    </tr>
                                </thead>
                            </table>
                        </div>
                    </div>
                    <div class="tab-pane" id="tab_11">
                        <div class="box-body">
                            <table id="tableMasterInventarioCaracteristicaTipo" class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>Nombre</th>
                                        <th>Acción</th>
                                    </tr>
                                </thead>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.col -->
    </div>
    <!-- /.row -->
    <!-- /.row -->
    
    <!-- /.modal-dialog -->
    <div class="modal fade" id="modalEdit">
        <form method="PUT" action="" id="formEdit" role="form">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                  <h4 class="modal-title">Familia</h4>
                </div>
                <div class="modal-body">
                    @csrf
                    <div class="modal-body">
                        <div class="box-body">
                            <div class="form-group col-md-8">
                                <label>Nombre</label>
                                <input type="text" class="form-control" placeholder="Nombre" name="nombre" id="nombre_familia">
                            </div>
                            <div class="form-group col-md-4">
                                <label>Sección</label>
                                <select class="form-control select2" id="seccion_id_famlia" name="seccion_id" style="width:100%">
                                </select>
                            </div>                            
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="hidden" name="id" id="familia_id">
                    <button type="button" class="btn btn-primary pull-left" id="btn-new" style="display: none">Añadir y Cerrar</button>
                    <button type="button" class="btn btn-primary pull-left" id="btn-update" style="display: none">Guardar y Cerrar</button>
                    <button type="button" class="btn btn-secondary pull-left" data-dismiss="modal">Cerrar</button>
                </div>
              </div>
            </div>
            <!-- /.modal-content -->
        </form>
    </div>
    <div class="modal fade" id="modalEditSeccion">
        <form method="PUT" action="" id="formEditSeccion" role="form">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                  <h4 class="modal-title">Sección</h4>
                </div>
                <div class="modal-body">
                    @csrf
                    <div class="modal-body">
                        <div class="box-body">
                            <div class="form-group col-md-12">
                                <label>Nombre</label>
                                <input type="text" class="form-control" placeholder="Nombre" name="nombre" id="nombre_seccion">
                            </div>                           
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="hidden" name="id" id="seccion_id">
                    <button type="button" class="btn btn-primary pull-left" id="btn-new-seccion" style="display: none">Añadir y Cerrar</button>
                    <button type="button" class="btn btn-primary pull-left" id="btn-update-seccion" style="display: none">Guardar y Cerrar</button>
                    <button type="button" class="btn btn-secondary pull-left" data-dismiss="modal">Cerrar</button>
                </div>
              </div>
            </div>
            <!-- /.modal-content -->
        </form>
    </div>
    <div class="modal fade" id="modalEditIVA">
        <form method="PUT" action="" id="formEditIVA" role="form">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                  <h4 class="modal-title">Tipo de IVA</h4>
                </div>
                <div class="modal-body">
                    @csrf
                    <div class="modal-body">
                        <div class="box-body">
                            <div class="form-group col-md-8">
                                <label>Nombre</label>
                                <input type="text" class="form-control" placeholder="Nombre" name="nombre" id="nombre_tipo_iva">
                            </div>
                            <div class="form-group col-md-4">
                                <label>Porcentaje %</label>
                                <input type="text" class="form-control" placeholder="Cantidad" name="cantidad" id="cantidad_tipo_iva">
                            </div>                            
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="hidden" name="id" id="tipo_iva_id">
                    <button type="button" class="btn btn-primary pull-left" id="btn-new-tipoIVA" style="display: none">Añadir y Cerrar</button>
                    <button type="button" class="btn btn-primary pull-left" id="btn-update-tipoIVA" style="display: none">Guardar y Cerrar</button>
                    <button type="button" class="btn btn-secondary pull-left" data-dismiss="modal">Cerrar</button>
                </div>
              </div>
            </div>
            <!-- /.modal-content -->
        </form>
    </div>
    <div class="modal fade" id="modalEditSistemaTipo">
        <form method="PUT" action="" id="formEditSistemaTipo" role="form">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                  <h4 class="modal-title">Tipo Sistema</h4>
                </div>
                <div class="modal-body">
                    @csrf
                    <div class="modal-body">
                        <div class="box-body">
                            <div class="form-group col-md-12">
                                <label>Nombre</label>
                                <input type="text" class="form-control" placeholder="Nombre" name="nombre" id="nombre_sistema_tipo">
                            </div>                         
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="hidden" name="id" id="sistema_tipo_id">
                    <button type="button" class="btn btn-primary pull-left" id="btn-new-sistemaTipo" style="display: none">Añadir y Cerrar</button>
                    <button type="button" class="btn btn-primary pull-left" id="btn-update-sistemaTipo" style="display: none">Guardar y Cerrar</button>
                    <button type="button" class="btn btn-secondary pull-left" data-dismiss="modal">Cerrar</button>
                </div>
              </div>
            </div>
            <!-- /.modal-content -->
        </form>
    </div>
    <div class="modal fade" id="modalEditIncidenciaMetodoComunicacion">
        <form method="PUT" action="" id="formEditIncidenciaMetodoComunicacion" role="form">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                  <h4 class="modal-title">Métodos de Comunicación</h4>
                </div>
                <div class="modal-body">
                    @csrf
                    <div class="modal-body">
                        <div class="box-body">
                            <div class="form-group col-md-12">
                                <label>Nombre</label>
                                <input type="text" class="form-control" placeholder="Nombre" name="nombre" id="nombre_incidencia_metodo_comunicacion">
                            </div>                         
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="hidden" name="id" id="incidencia_metodo_comunicacion_id">
                    <button type="button" class="btn btn-primary pull-left" id="btn-new-incidenciaMetodoComunicacion" style="display: none">Añadir y Cerrar</button>
                    <button type="button" class="btn btn-primary pull-left" id="btn-update-incidenciaMetodoComunicacion" style="display: none">Guardar y Cerrar</button>
                    <button type="button" class="btn btn-secondary pull-left" data-dismiss="modal">Cerrar</button>
                </div>
              </div>
            </div>
            <!-- /.modal-content -->
        </form>
    </div>
    <div class="modal fade" id="modalEditIncidenciaPrioridad">
        <form method="PUT" action="" id="formEditIncidenciaPrioridad" role="form">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                  <h4 class="modal-title">Prioridad</h4>
                </div>
                <div class="modal-body">
                    @csrf
                    <div class="modal-body">
                        <div class="box-body">
                            <div class="form-group col-md-12">
                                <label>Nombre</label>
                                <input type="text" class="form-control" placeholder="Nombre" name="nombre" id="nombre_incidencia_prioridad">
                            </div>                         
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="hidden" name="id" id="incidencia_prioridad_id">
                    <button type="button" class="btn btn-primary pull-left" id="btn-new-incidenciaPrioridad" style="display: none">Añadir y Cerrar</button>
                    <button type="button" class="btn btn-primary pull-left" id="btn-update-incidenciaPrioridad" style="display: none">Guardar y Cerrar</button>
                    <button type="button" class="btn btn-secondary pull-left" data-dismiss="modal">Cerrar</button>
                </div>
              </div>
            </div>
            <!-- /.modal-content -->
        </form>
    </div>
    <div class="modal fade" id="modalEditIncidenciaTipo">
        <form method="PUT" action="" id="formEditIncidenciaTipo" role="form">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                  <h4 class="modal-title">Tipos incidencias</h4>
                </div>
                <div class="modal-body">
                    @csrf
                    <div class="modal-body">
                        <div class="box-body">
                            <div class="form-group col-md-12">
                                <label>Nombre</label>
                                <input type="text" class="form-control" placeholder="Nombre" name="nombre" id="nombre_incidencia_tipo">
                            </div>                         
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="hidden" name="id" id="incidencia_tipo_id">
                    <button type="button" class="btn btn-primary pull-left" id="btn-new-incidenciaTipo" style="display: none">Añadir y Cerrar</button>
                    <button type="button" class="btn btn-primary pull-left" id="btn-update-incidenciaTipo" style="display: none">Guardar y Cerrar</button>
                    <button type="button" class="btn btn-secondary pull-left" data-dismiss="modal">Cerrar</button>
                </div>
              </div>
            </div>
            <!-- /.modal-content -->
        </form>
    </div>
    <div class="modal fade" id="modalEditActuacionTipoEstado">
        <form method="PUT" action="" id="formEditActuacionTipoEstado" role="form">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                  <h4 class="modal-title">Estados Actuaciones</h4>
                </div>
                <div class="modal-body">
                    @csrf
                    <div class="modal-body">
                        <div class="box-body">
                            <div class="form-group col-md-10">
                                <label>Nombre</label>
                                <input type="text" class="form-control" placeholder="Nombre" name="nombre" id="nombre_actuacion_tipo_estado">
                            </div>
                            <div class="form-group col-md-2">
                                <label>Cerrada</label>
                                <div class="checkbox icheck">
                                    <label>
                                        <input type="checkbox" name="cierra_incidencia" id="cierra_incidencia_tipo_estado">
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="hidden" name="id" id="actuacion_tipo_estado_id">
                    <button type="button" class="btn btn-primary pull-left" id="btn-new-actuacionTipoEstado" style="display: none">Añadir y Cerrar</button>
                    <button type="button" class="btn btn-primary pull-left" id="btn-update-actuacionTipoEstado" style="display: none">Guardar y Cerrar</button>
                    <button type="button" class="btn btn-secondary pull-left" data-dismiss="modal">Cerrar</button>
                </div>
              </div>
            </div>
            <!-- /.modal-content -->
        </form>
    </div>
    <div class="modal fade" id="modalEditIncidenciaTipoEstado">
        <form method="PUT" action="" id="formEditIncidenciaTipoEstado" role="form">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                  <h4 class="modal-title">Estados Incidencias</h4>
                </div>
                <div class="modal-body">
                    @csrf
                    <div class="modal-body">
                        <div class="box-body">
                            <div class="form-group col-md-10">
                                <label>Nombre</label>
                                <input type="text" class="form-control" placeholder="Nombre" name="nombre" id="nombre_incidencia_tipo_estado">
                            </div>                         
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="hidden" name="id" id="incidencia_tipo_estado_id">
                    <button type="button" class="btn btn-primary pull-left" id="btn-new-incidenciaTipoEstado" style="display: none">Añadir y Cerrar</button>
                    <button type="button" class="btn btn-primary pull-left" id="btn-update-incidenciaTipoEstado" style="display: none">Guardar y Cerrar</button>
                    <button type="button" class="btn btn-secondary pull-left" data-dismiss="modal">Cerrar</button>
                </div>
              </div>
            </div>
            <!-- /.modal-content -->
        </form>
    </div>
    <div class="modal fade" id="modalEditConfig">
        <form method="PUT" action="" id="formEditConfig" role="form">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                  <h4 class="modal-title">Configuración General</h4>
                </div>
                <div class="modal-body">
                    @csrf
                    <div class="modal-body">
                        <div class="box-body">
                            <div class="form-group col-md-12">
                                <label>Versión Android</label>
                                <input type="text" class="form-control" placeholder="Versión Android" name="version_android" id="version_android">
                            </div>                         
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="hidden" name="id" id="config_id">
                    <button type="button" class="btn btn-primary pull-left" id="btn-update-config" style="display: none">Guardar y Cerrar</button>
                    <button type="button" class="btn btn-secondary pull-left" data-dismiss="modal">Cerrar</button>
                </div>
              </div>
            </div>
            <!-- /.modal-content -->
        </form>
    </div>
     <div class="modal fade" id="modalEditInventarioCaracteristicaTipo">
        <form method="PUT" action="" id="formEditInventarioCaracteristicaTipo" role="form">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                  <h4 class="modal-title">Tipos de Caracteristicas</h4>
                </div>
                <div class="modal-body">
                    @csrf
                    <div class="modal-body">
                        <div class="box-body">
                            <div class="form-group col-md-10">
                                <label>Nombre</label>
                                <input type="text" class="form-control" placeholder="Nombre" name="nombre" id="nombre_inventario_caracteristica_tipo">
                            </div>                         
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="hidden" name="id" id="inventario_caracteristica_tipo_id">
                    <button type="button" class="btn btn-primary pull-left" id="btn-new-inventario-caracteristica-tipo" style="display: none">Añadir y Cerrar</button>
                    <button type="button" class="btn btn-primary pull-left" id="btn-update-inventario-caracteristica-tipo" style="display: none">Guardar y Cerrar</button>
                    <button type="button" class="btn btn-secondary pull-left" data-dismiss="modal">Cerrar</button>
                </div>
              </div>
            </div>
            <!-- /.modal-content -->
        </form>
    </div>
</section> 
@stop

@push('scripts')
<script>
var currentTab = 0; //Almacena la tab actual de forma global.

$('#cierra_incidencia_tipo_estado').iCheck({
    checkboxClass: 'icheckbox_square-blue',
    radioClass: 'iradio_square-blue',
    increaseArea: '20%' /* optional */
});

$('#seccion_id_famlia').select2({
    allowClear: true,
    ajax: {
        url: 'seccion',
        processResults: function (data) {
            return {
                results: $.map(data, function(obj) {
                    return { id: obj.id, text: obj.nombre };
                })
            };
        }
    }
});

//FUNCIONES Y EVENTOS FAMILIAS
$(function () {
    $('#tableMasterFamilias').DataTable({
        "paging": true,
        "lengthChange": false,
        "searching": true,
        "ordering": true,
        "info": true,
        "autoWidth": false,
        "processing" : true,
        "serverSide": true,
        "scrollX": true,
        "ajax": "/familia/getdatatable",
        "columns":[
            {data:'nombre'},
            {data:'seccion_id'},
            {data:'action', orderable:false, searchable: false},
        ],
        dom: 'Bfrtip',
        buttons: [
            'csv', 'excel', 'pdf'
        ]
    });
});
$(document).on('click', '.edit', function(){
    var arrayID = [];
    var id = $(this).attr("id");
    $("#familia_id").val(id);
    $.ajax({
        url : 'familia/'+id,
        type : 'get',
        dataType: 'json',
        success:function(data)
        {
            $('#nombre_familia').val(data.nombre);
            if(data.seccion_id != null){
                $.ajax({ // make the request for the selected data object
                    type: 'GET',
                    url: 'seccion/' + data.seccion_id,
                    dataType: 'json'
                }).then(function (data) {
                    var data = {
                        id: data.id,
                        text: data.nombre
                    };
                    var newOption = new Option(data.text, data.id, false, false);
                    $('#seccion_id_famlia').append(newOption).trigger('change');
                });
            }
            $('#seccion_id_famlia').val(data.seccion_id).trigger('change');
            $('#modalEdit').modal('show');
            $('#btn-update').css('display','inline');
            $('#btn-new').css('display','none');
            $('#action').val('Editar');
            $('.modal-title').text('Editar usuario');
        },
        error: function (data) {
            $("#capaError").css('display','block');
            $("#labelError").html('');
            var errors = $.parseJSON(data.responseText);
            $.each(errors.errors, function (key, value) {
                $("#labelError").append( value + '<br />' );
            });
            btnThis.removeAttr("disabled");
            alertify.error('Ha ocurrido un error, revise los campos del formulario');
        }
    })
});
$(document).on('click', '.delete', function(){
    var id = $(this).attr("id");
    alertify.confirm('¿Desea eliminar a esta familia?', 'Esta acción no puede deshacerse', 
        function(){ 
            $.ajax({
                url : 'familia/'+id,
                type : 'DELETE',
                data: $("#formEdit").serialize(),
                success:function(data)
                {
                    if(data.ok == 0) alertify.error(data.message);
                    else alertify.success(data.message);    
                    $('#tableMasterFamilias').DataTable().ajax.reload( null, false );
                }
            })
        }, 
        function(){ 
            alertify.error('Acción cancelada')
        }
    );
});
$("#btn-new").click(function(){
    var id = $(this).attr("id");
    $.ajax({
        url : 'familia',
        type : 'POST',
        data: $("#formEdit").serialize(),
        success:function(data)
        {
            alertify.success('Familia insertada con éxito');
            $('#tableMasterFamilias').DataTable().ajax.reload(null, false);
            $('#modalEdit').modal('hide');
        },
        error: function (data) {
            console.log(data);
        }
    })
});
$("#btn-update").click(function(){
    var id = $("#familia_id").val();
    $.ajax({
        url : 'familia/'+id,
        type : 'PUT',
        data: $("#formEdit").serialize(),
        success:function(data)
        {
            alertify.success('Familia modificado con éxito');
            $('#tableMasterFamilias').DataTable().ajax.reload(null, false);
            $('#modalEdit').modal('hide');
        },
        error: function (data) {
            console.log(data);
        }
    })
});
//FUNCIONES Y EVENTOS SECCIONES
$(function () {
    $('#tableMasterSecciones').DataTable({
        "paging": true,
        "lengthChange": false,
        "searching": true,
        "ordering": true,
        "info": true,
        "autoWidth": false,
        "processing" : true,
        "serverSide": true,
        "scrollX": true,
        "ajax": "/seccion/getdatatable",
        "columns":[
            {data:'nombre'},
            {data:'action', orderable:false, searchable: false},
        ],
        dom: 'Bfrtip',
        buttons: [
            'csv', 'excel', 'pdf'
        ]
    });
});
$(document).on('click', '.edit-seccion', function(){
    var arrayID = [];
    var id = $(this).attr("id");
    $("#seccion_id").val(id);
    $.ajax({
        url : 'seccion/'+id,
        type : 'get',
        dataType: 'json',
        success:function(data)
        {
            $('#nombre_seccion').val(data.nombre);
            $('#modalEditSeccion').modal('show');
            $('#btn-update-seccion').css('display','inline');
            $('#btn-new-seccion').css('display','none');
            $('#action').val('Editar');
            $('.modal-title').text('Editar Seccion');
        },
        error: function (data) {
            $("#capaError").css('display','block');
            $("#labelError").html('');
            var errors = $.parseJSON(data.responseText);
            $.each(errors.errors, function (key, value) {
                $("#labelError").append( value + '<br />' );
            });
            btnThis.removeAttr("disabled");
            alertify.error('Ha ocurrido un error, revise los campos del formulario');
        }
    })
});
$(document).on('click', '.delete-seccion', function(){
    var id = $(this).attr("id");
    alertify.confirm('¿Desea eliminar a esta seccion?', 'Esta acción no puede deshacerse', 
        function(){ 
            $.ajax({
                url : 'seccion/'+id,
                type : 'DELETE',
                data: $("#formEditSeccion").serialize(),
                success:function(data)
                {
                    if(data.ok == 0) alertify.error(data.message);
                    else alertify.success(data.message);    
                    $('#tableMasterSecciones').DataTable().ajax.reload( null, false );
                }
            })
        }, 
        function(){ 
            alertify.error('Acción cancelada')
        }
    );
});
$("#btn-new-seccion").click(function(){
    var id = $(this).attr("id");
    $.ajax({
        url : 'seccion',
        type : 'POST',
        data: $("#formEditSeccion").serialize(),
        success:function(data)
        {
            alertify.success('Sección insertada con éxito');
            $('#tableMasterSecciones').DataTable().ajax.reload(null, false);
            $('#modalEditSeccion').modal('hide');
        },
        error: function (data) {
            console.log(data);
        }
    })
});
$("#btn-update-seccion").click(function(){
    var id = $("#seccion_id").val();
    $.ajax({
        url : 'seccion/'+id,
        type : 'PUT',
        data: $("#formEditSeccion").serialize(),
        success:function(data)
        {
            alertify.success('Sección modificado con éxito');
            $('#tableMasterSecciones').DataTable().ajax.reload(null, false);
            $('#modalEditSeccion').modal('hide');
        },
        error: function (data) {
            console.log(data);
        }
    })
});
//FUNCIONES TIPO DE IVA.
$(function () {
    $('#tableMasterIVA').DataTable({
        "paging": true,
        "lengthChange": false,
        "searching": true,
        "ordering": true,
        "info": true,
        "autoWidth": false,
        "processing" : true,
        "serverSide": true,
        "scrollX": true,
        "ajax": "/tipo_iva/getdatatable",
        "columns":[
            {data:'nombre'},
            {data:'cantidad'},
            {data:'action', orderable:false, searchable: false},
        ],
        dom: 'Bfrtip',
        buttons: [
            'csv', 'excel', 'pdf'
        ]
    });
});
$(document).on('click', '.edit-tipoIVA', function(){
    var arrayID = [];
    var id = $(this).attr("id");
    $("#tipo_iva_id").val(id);
    $.ajax({
        url : 'tipo_iva/'+id,
        type : 'get',
        dataType: 'json',
        success:function(data)
        {
            $('#nombre_tipo_iva').val(data.nombre);
            $('#cantidad_tipo_iva').val(data.cantidad);
            $('#modalEditIVA').modal('show');
            $('#btn-update-tipoIVA').css('display','inline');
            $('#btn-new-tipoIVA').css('display','none');
            $('#action').val('Editar');
            $('.modal-title-tipoIVA').text('Editar tipo IVA');
        },
        error: function (data) {
            $("#capaError").css('display','block');
            $("#labelError").html('');
            var errors = $.parseJSON(data.responseText);
            $.each(errors.errors, function (key, value) {
                $("#labelError").append( value + '<br />' );
            });
            btnThis.removeAttr("disabled");
            alertify.error('Ha ocurrido un error, revise los campos del formulario');
        }
    })
});
$(document).on('click', '.delete-tipoIVA', function(){
    var id = $(this).attr("id");
    alertify.confirm('¿Desea eliminar el tipo de IVA?', 'Esta acción no puede deshacerse', 
        function(){ 
            $.ajax({
                url : 'tipo_iva/'+id,
                type : 'DELETE',
                data: $("#formEditIVA").serialize(),
                success:function(data)
                {
                    $('#tableMasterIVA').DataTable().ajax.reload( null, false );
                    alertify.success('Usuario eliminado correctamente');
                }
            })
        }, 
        function(){ 
            alertify.error('Acción cancelada')
        }
    );
});
$("#btn-new-tipoIVA").click(function(){
    var id = $(this).attr("id");
    $.ajax({
        url : 'tipo_iva',
        type : 'POST',
        data: $("#formEditIVA").serialize(),
        success:function(data)
        {
            alertify.success('Tipo IVA insertada con éxito');
            $('#tableMasterIVA').DataTable().ajax.reload(null, false);
            $('#modalEditIVA').modal('hide');
        },
        error: function (data) {
            console.log(data);
        }
    })
});
$("#btn-update-tipoIVA").click(function(){
    var id = $("#tipo_iva_id").val();
    $.ajax({
        url : 'tipo_iva/'+id,
        type : 'PUT',
        data: $("#formEditIVA").serialize(),
        success:function(data)
        {
            alertify.success('Tipo IVA modificado con éxito');
            $('#tableMasterIVA').DataTable().ajax.reload(null, false);
            $('#modalEditIVA').modal('hide');
        },
        error: function (data) {
            console.log(data);
        }
    })
});
//FUNCIONES TIPO DE SISTEMA.
$(function () {
    $('#tableMasterSistemaTipo').DataTable({
        "paging": true,
        "lengthChange": false,
        "searching": true,
        "ordering": true,
        "info": true,
        "autoWidth": false,
        "processing" : true,
        "serverSide": true,
        "scrollX": true,
        "ajax": "/sistema/tipo/getdatatable",
        "columns":[
            {data:'nombre'},
            {data:'action', orderable:false, searchable: false},
        ],
        dom: 'Bfrtip',
        buttons: [
            'csv', 'excel', 'pdf'
        ]
    });
});
$(document).on('click', '.edit-sistemaTipo', function(){
    var arrayID = [];
    var id = $(this).attr("id");
    $("#sistema_tipo_id").val(id);
    $.ajax({
        url : 'sistema/tipo/'+id,
        type : 'get',
        dataType: 'json',
        success:function(data)
        {
            $('#nombre_sistema_tipo').val(data.nombre);
            $('#modalEditSistemaTipo').modal('show');
            $('#btn-update-sistemaTipo').css('display','inline');
            $('#btn-new-sistemaTipo').css('display','none');
            $('#action').val('Editar');
            $('.modal-title-sistemaTipo').text('Editar tipo de sistema');
        },
        error: function (data) {
            $("#capaError").css('display','block');
            $("#labelError").html('');
            var errors = $.parseJSON(data.responseText);
            $.each(errors.errors, function (key, value) {
                $("#labelError").append( value + '<br />' );
            });
            btnThis.removeAttr("disabled");
            alertify.error('Ha ocurrido un error, revise los campos del formulario');
        }
    })
});
$(document).on('click', '.delete-sistemaTipo', function(){
    var id = $(this).attr("id");
    alertify.confirm('¿Desea eliminar el tipo de sistema?', 'Esta acción no puede deshacerse', 
        function(){ 
            $.ajax({
                url : 'sistema/tipo/'+id,
                type : 'DELETE',
                data: $("#formEditSistemaTipo").serialize(),
                success:function(data)
                {
                    $('#tableMasterSistemaTipo').DataTable().ajax.reload( null, false );
                    alertify.success('Tipo de sistema eliminado correctamente');
                }
            })
        }, 
        function(){ 
            alertify.error('Acción cancelada')
        }
    );
});
$("#btn-new-sistemaTipo").click(function(){
    var id = $(this).attr("id");
    $.ajax({
        url : 'sistema/tipo',
        type : 'POST',
        data: $("#formEditSistemaTipo").serialize(),
        success:function(data)
        {
            alertify.success('Tipo de sistema insertado con éxito');
            $('#tableMasterSistemaTipo').DataTable().ajax.reload(null, false);
            $('#modalEditSistemaTipo').modal('hide');
        },
        error: function (data) {
            console.log(data);
        }
    })
});
$("#btn-update-sistemaTipo").click(function(){
    var id = $("#sistema_tipo_id").val();
    $.ajax({
        url : 'sistema/tipo/'+id,
        type : 'PUT',
        data: $("#formEditSistemaTipo").serialize(),
        success:function(data)
        {
            alertify.success('Tipo de sistema modificado con éxito');
            $('#tableMasterSistemaTipo').DataTable().ajax.reload(null, false);
            $('#modalEditSistemaTipo').modal('hide');
        },
        error: function (data) {
            console.log(data);
        }
    })
});
//FUNCIONES INCIDENCIAS METODOS COMUNICACION
$(function () {
    $('#tableMasterIncidenciaMetodoComunicacion').DataTable({
        "paging": true,
        "lengthChange": false,
        "searching": true,
        "ordering": true,
        "info": true,
        "autoWidth": false,
        "processing" : true,
        "serverSide": true,
        "scrollX": true,
        "ajax": "/incidencia/metodo_comunicacion/getdatatable",
        "columns":[
            {data:'nombre'},
            {data:'action', orderable:false, searchable: false},
        ],
        dom: 'Bfrtip',
        buttons: [
            'csv', 'excel', 'pdf'
        ]
    });
});
$(document).on('click', '.edit-incidenciaMetodoComunicacion', function(){
    var arrayID = [];
    var id = $(this).attr("id");
    $("#incidencia_metodo_comunicacion_id").val(id);
    $.ajax({
        url : '/incidencia/metodo_comunicacion/'+id,
        type : 'get',
        dataType: 'json',
        success:function(data)
        {
            $('#nombre_incidencia_metodo_comunicacion').val(data.nombre);
            $('#modalEditIncidenciaMetodoComunicacion').modal('show');
            $('#btn-update-incidenciaMetodoComunicacion').css('display','inline');
            $('#btn-new-incidenciaMetodoComunicacion').css('display','none');
            $('#action').val('Editar');
        },
        error: function (data) {
            $("#capaError").css('display','block');
            $("#labelError").html('');
            var errors = $.parseJSON(data.responseText);
            $.each(errors.errors, function (key, value) {
                $("#labelError").append( value + '<br />' );
            });
            btnThis.removeAttr("disabled");
            alertify.error('Ha ocurrido un error, revise los campos del formulario');
        }
    })
});
$(document).on('click', '.delete-incidenciaMetodoComunicacion', function(){
    var id = $(this).attr("id");
    alertify.confirm('¿Desea eliminar el metodo de comunicación?', 'Esta acción no puede deshacerse', 
        function(){ 
            $.ajax({
                url : '/incidencia/metodo_comunicacion/'+id,
                type : 'DELETE',
                data: $("#formEditIncidenciaMetodoComunicacion").serialize(),
                success:function(data)
                {
                    $('#tableMasterIncidenciaMetodoComunicacion').DataTable().ajax.reload( null, false );
                    alertify.success('Método de comunicación eliminada correctamente');
                }
            })
        }, 
        function(){ 
            alertify.error('Acción cancelada')
        }
    );
});
$("#btn-new-incidenciaMetodoComunicacion").click(function(){
    var id = $(this).attr("id");
    $.ajax({
        url : '/incidencia/metodo_comunicacion',
        type : 'POST',
        data: $("#formEditIncidenciaMetodoComunicacion").serialize(),
        success:function(data)
        {
            alertify.success('Método de comunicación insertado con éxito');
            $('#tableMasterIncidenciaMetodoComunicacion').DataTable().ajax.reload(null, false);
            $('#modalEditIncidenciaMetodoComunicacion').modal('hide');
        },
        error: function (data) {
            console.log(data);
        }
    })
});
$("#btn-update-incidenciaMetodoComunicacion").click(function(){
    var id = $("#incidencia_metodo_comunicacion_id").val();
    $.ajax({
        url : '/incidencia/metodo_comunicacion/'+id,
        type : 'PUT',
        data: $("#formEditIncidenciaMetodoComunicacion").serialize(),
        success:function(data)
        {
            alertify.success('Método comunicación modificado con éxito');
            $('#tableMasterIncidenciaMetodoComunicacion').DataTable().ajax.reload(null, false);
            $('#modalEditIncidenciaMetodoComunicacion').modal('hide');
        },
        error: function (data) {
            console.log(data);
        }
    })
});
//FUNCIONES INCIDENCIAS PRIORIDAD
$(function () {
    $('#tableMasterIncidenciaPrioridad').DataTable({
        "paging": true,
        "lengthChange": false,
        "searching": true,
        "ordering": true,
        "info": true,
        "autoWidth": false,
        "processing" : true,
        "serverSide": true,
        "scrollX": true,
        "ajax": "/incidencia/prioridad/getdatatable",
        "columns":[
            {data:'nombre'},
            {data:'action', orderable:false, searchable: false},
        ],
        dom: 'Bfrtip',
        buttons: [
            'csv', 'excel', 'pdf'
        ]
    });
});
$(document).on('click', '.edit-incidenciaPrioridad', function(){
    var arrayID = [];
    var id = $(this).attr("id");
    $("#incidencia_prioridad_id").val(id);
    $.ajax({
        url : '/incidencia/prioridad/'+id,
        type : 'get',
        dataType: 'json',
        success:function(data)
        {
            $('#nombre_incidencia_prioridad').val(data.nombre);
            $('#modalEditIncidenciaPrioridad').modal('show');
            $('#btn-update-incidenciaPrioridad').css('display','inline');
            $('#btn-new-incidenciaPrioridad').css('display','none');
            $('#action').val('Editar');
        },
        error: function (data) {
            $("#capaError").css('display','block');
            $("#labelError").html('');
            var errors = $.parseJSON(data.responseText);
            $.each(errors.errors, function (key, value) {
                $("#labelError").append( value + '<br />' );
            });
            btnThis.removeAttr("disabled");
            alertify.error('Ha ocurrido un error, revise los campos del formulario');
        }
    })
});
$(document).on('click', '.delete-incidenciaPrioridad', function(){
    var id = $(this).attr("id");
    alertify.confirm('¿Desea eliminar el metodo de comunicación?', 'Esta acción no puede deshacerse', 
        function(){ 
            $.ajax({
                url : '/incidencia/prioridad/'+id,
                type : 'DELETE',
                data: $("#formEditIncidenciaPrioridad").serialize(),
                success:function(data)
                {
                    $('#tableMasterIncidenciaPrioridad').DataTable().ajax.reload( null, false );
                    alertify.success('Método de comunicación eliminada correctamente');
                }
            })
        }, 
        function(){ 
            alertify.error('Acción cancelada')
        }
    );
});
$("#btn-new-incidenciaPrioridad").click(function(){
    var id = $(this).attr("id");
    $.ajax({
        url : '/incidencia/prioridad',
        type : 'POST',
        data: $("#formEditIncidenciaPrioridad").serialize(),
        success:function(data)
        {
            alertify.success('Método de comunicación insertado con éxito');
            $('#tableMasterIncidenciaPrioridad').DataTable().ajax.reload(null, false);
            $('#modalEditIncidenciaPrioridad').modal('hide');
        },
        error: function (data) {
            console.log(data);
        }
    })
});
$("#btn-update-incidenciaPrioridad").click(function(){
    var id = $("#incidencia_prioridad_id").val();
    $.ajax({
        url : '/incidencia/prioridad/'+id,
        type : 'PUT',
        data: $("#formEditIncidenciaPrioridad").serialize(),
        success:function(data)
        {
            alertify.success('Método comunicación modificado con éxito');
            $('#tableMasterIncidenciaPrioridad').DataTable().ajax.reload(null, false);
            $('#modalEditIncidenciaPrioridad').modal('hide');
        },
        error: function (data) {
            console.log(data);
        }
    })
});
//FUNCIONES INCIDENCIAS TIPO
$(function () {
    $('#tableMasterIncidenciaTipo').DataTable({
        "paging": true,
        "lengthChange": false,
        "searching": true,
        "ordering": true,
        "info": true,
        "autoWidth": false,
        "processing" : true,
        "serverSide": true,
        "scrollX": true,
        "ajax": "/incidencia/tipo/getdatatable",
        "columns":[
            {data:'nombre'},
            {data:'action', orderable:false, searchable: false},
        ],
        dom: 'Bfrtip',
        buttons: [
            'csv', 'excel', 'pdf'
        ]
    });
});
$(document).on('click', '.edit-incidenciaTipo', function(){
    var arrayID = [];
    var id = $(this).attr("id");
    $("#incidencia_tipo_id").val(id);
    $.ajax({
        url : '/incidencia/tipo/'+id,
        type : 'get',
        dataType: 'json',
        success:function(data)
        {
            $('#nombre_incidencia_tipo').val(data.nombre);
            $('#modalEditIncidenciaTipo').modal('show');
            $('#btn-update-incidenciaTipo').css('display','inline');
            $('#btn-new-incidenciaTipo').css('display','none');
            $('#action').val('Editar');
        },
        error: function (data) {
            $("#capaError").css('display','block');
            $("#labelError").html('');
            var errors = $.parseJSON(data.responseText);
            $.each(errors.errors, function (key, value) {
                $("#labelError").append( value + '<br />' );
            });
            btnThis.removeAttr("disabled");
            alertify.error('Ha ocurrido un error, revise los campos del formulario');
        }
    })
});
$(document).on('click', '.delete-incidenciaTipo', function(){
    var id = $(this).attr("id");
    alertify.confirm('¿Desea eliminar el Tipo?', 'Esta acción no puede deshacerse', 
        function(){ 
            $.ajax({
                url : '/incidencia/tipo/'+id,
                type : 'DELETE',
                data: $("#formEditIncidenciaTipo").serialize(),
                success:function(data)
                {
                    $('#tableMasterIncidenciaTipo').DataTable().ajax.reload( null, false );
                    alertify.success('Tipo de incidencia eliminada correctamente');
                }
            })
        }, 
        function(){ 
            alertify.error('Acción cancelada')
        }
    );
});
$("#btn-new-incidenciaTipo").click(function(){
    var id = $(this).attr("id");
    $.ajax({
        url : '/incidencia/tipo',
        type : 'POST',
        data: $("#formEditIncidenciaTipo").serialize(),
        success:function(data)
        {
            alertify.success('Tipo de incidencia insertada con éxito');
            $('#tableMasterIncidenciaTipo').DataTable().ajax.reload(null, false);
            $('#modalEditIncidenciaTipo').modal('hide');
        },
        error: function (data) {
            console.log(data);
        }
    })
});
$("#btn-update-incidenciaTipo").click(function(){
    var id = $("#incidencia_tipo_id").val();
    $.ajax({
        url : '/incidencia/tipo/'+id,
        type : 'PUT',
        data: $("#formEditIncidenciaTipo").serialize(),
        success:function(data)
        {
            alertify.success('Incidencia modificada con éxito');
            $('#tableMasterIncidenciaTipo').DataTable().ajax.reload(null, false);
            $('#modalEditIncidenciaTipo').modal('hide');
        },
        error: function (data) {
            console.log(data);
        }
    })
});
//FUNCIONES ACTUACIONES ESTADOS
$(function () {
    $('#tableMasterActuacionTipoEstado').DataTable({
        "paging": true,
        "lengthChange": false,
        "searching": true,
        "ordering": true,
        "info": true,
        "autoWidth": false,
        "processing" : true,
        "serverSide": true,
        "scrollX": true,
        "ajax": "/actuacion/tipo_estado/getdatatable",
        "columns":[
            {data:'nombre'},
            {data:'cierra'},
            {data:'action', orderable:false, searchable: false},
        ],
        dom: 'Bfrtip',
        buttons: [
            'csv', 'excel', 'pdf'
        ]
    });
});
$(document).on('click', '.edit-actuacionTipoEstado', function(){
    var arrayID = [];
    var id = $(this).attr("id");
    $("#actuacion_tipo_estado_id").val(id);
    $.ajax({
        url : '/actuacion/tipo_estado/'+id,
        type : 'get',
        dataType: 'json',
        success:function(data)
        {
        	if(data.cierra_incidencia == 0) $('#cierra_incidencia_tipo_estado').iCheck('uncheck');
        	if(data.cierra_incidencia == 1) $('#cierra_incidencia_tipo_estado').iCheck('check');
            $('#nombre_actuacion_tipo_estado').val(data.nombre);
            $('#modalEditActuacionTipoEstado').modal('show');
            $('#btn-update-actuacionTipoEstado').css('display','inline');
            $('#btn-new-actuacionTipoEstado').css('display','none');
            $('#action').val('Editar');
        },
        error: function (data) {
            $("#capaError").css('display','block');
            $("#labelError").html('');
            var errors = $.parseJSON(data.responseText);
            $.each(errors.errors, function (key, value) {
                $("#labelError").append( value + '<br />' );
            });
            btnThis.removeAttr("disabled");
            alertify.error('Ha ocurrido un error, revise los campos del formulario');
        }
    })
});
$(document).on('click', '.delete-actuacionTipoEstado', function(){
    var id = $(this).attr("id");
    alertify.confirm('¿Desea eliminar el tipo de estado?', 'Esta acción no puede deshacerse', 
        function(){ 
            $.ajax({
                url : '/actuacion/tipo_estado/'+id,
                type : 'DELETE',
                data: $("#formEditActuacionTipoEstado").serialize(),
                success:function(data)
                {
                    $('#tableMasterActuacionTipoEstado').DataTable().ajax.reload( null, false );
                    alertify.success('Tipo de estado eliminada correctamente');
                }
            })
        }, 
        function(){ 
            alertify.error('Acción cancelada')
        }
    );
});
$("#btn-new-actuacionTipoEstado").click(function(){
    var id = $(this).attr("id");
    $.ajax({
        url : '/actuacion/tipo_estado',
        type : 'POST',
        data: $("#formEditActuacionTipoEstado").serialize(),
        success:function(data)
        {
            alertify.success('Tipo de estado insertada con éxito');
            $('#tableMasterActuacionTipoEstado').DataTable().ajax.reload(null, false);
            $('#modalEditActuacionTipoEstado').modal('hide');
        },
        error: function (data) {
            console.log(data);
        }
    })
});
$("#btn-update-actuacionTipoEstado").click(function(){
    var id = $("#actuacion_tipo_estado_id").val();
    $.ajax({
        url : '/actuacion/tipo_estado/'+id,
        type : 'PUT',
        data: $("#formEditActuacionTipoEstado").serialize(),
        success:function(data)
        {
            alertify.success('Tipo de estado modificado con éxito');
            $('#tableMasterActuacionTipoEstado').DataTable().ajax.reload(null, false);
            $('#modalEditActuacionTipoEstado').modal('hide');
        },
        error: function (data) {
            console.log(data);
        }
    })
});
//FUNCIONES INCIDENCIAS ESTADOS
$(function () {
    $('#tableMasterIncidenciaTipoEstado').DataTable({
        "paging": true,
        "lengthChange": false,
        "searching": true,
        "ordering": true,
        "info": true,
        "autoWidth": false,
        "processing" : true,
        "serverSide": true,
        "scrollX": true,
        "ajax": "/incidencia/tipo_estado/getdatatable",
        "columns":[
            {data:'nombre'},
            {data:'action', orderable:false, searchable: false},
        ],
        dom: 'Bfrtip',
        buttons: [
            'csv', 'excel', 'pdf'
        ]
    });
});
$(document).on('click', '.edit-incidenciaTipoEstado', function(){
    var arrayID = [];
    var id = $(this).attr("id");
    $("#incidencia_tipo_estado_id").val(id);
    $.ajax({
        url : '/incidencia/tipo_estado/'+id,
        type : 'get',
        dataType: 'json',
        success:function(data)
        {
            $('#nombre_incidencia_tipo_estado').val(data.nombre);
            $('#modalEditIncidenciaTipoEstado').modal('show');
            $('#btn-update-incidenciaTipoEstado').css('display','inline');
            $('#btn-new-incidenciaTipoEstado').css('display','none');
            $('#action').val('Editar');
        },
        error: function (data) {
            $("#capaError").css('display','block');
            $("#labelError").html('');
            var errors = $.parseJSON(data.responseText);
            $.each(errors.errors, function (key, value) {
                $("#labelError").append( value + '<br />' );
            });
            btnThis.removeAttr("disabled");
            alertify.error('Ha ocurrido un error, revise los campos del formulario');
        }
    })
});
$(document).on('click', '.delete-incidenciaTipoEstado', function(){
    var id = $(this).attr("id");
    alertify.confirm('¿Desea eliminar el tipo de estado?', 'Esta acción no puede deshacerse', 
        function(){ 
            $.ajax({
                url : '/incidencia/tipo_estado/'+id,
                type : 'DELETE',
                data: $("#formEditIncidenciaTipoEstado").serialize(),
                success:function(data)
                {
                    $('#tableMasterIncidenciaTipoEstado').DataTable().ajax.reload( null, false );
                    alertify.success('Tipo de estado eliminada correctamente');
                }
            })
        }, 
        function(){ 
            alertify.error('Acción cancelada')
        }
    );
});
$("#btn-new-incidenciaTipoEstado").click(function(){
    var id = $(this).attr("id");
    $.ajax({
        url : '/incidencia/tipo_estado',
        type : 'POST',
        data: $("#formEditIncidenciaTipoEstado").serialize(),
        success:function(data)
        {
            alertify.success('Tipo de estado insertada con éxito');
            $('#tableMasterIncidenciaTipoEstado').DataTable().ajax.reload(null, false);
            $('#modalEditIncidenciaTipoEstado').modal('hide');
        },
        error: function (data) {
            console.log(data);
        }
    })
});
$("#btn-update-incidenciaTipoEstado").click(function(){
    var id = $("#incidencia_tipo_estado_id").val();
    $.ajax({
        url : '/incidencia/tipo_estado/'+id,
        type : 'PUT',
        data: $("#formEditIncidenciaTipoEstado").serialize(),
        success:function(data)
        {
            alertify.success('Tipo de estado modificado con éxito');
            $('#tableMasterIncidenciaTipoEstado').DataTable().ajax.reload(null, false);
            $('#modalEditIncidenciaTipoEstado').modal('hide');
        },
        error: function (data) {
            console.log(data);
        }
    })
});
//FUNCIONES CONFIG
$(function () {
    $('#tableMasterConfig').DataTable({
        "paging": true,
        "lengthChange": false,
        "searching": true,
        "ordering": true,
        "info": true,
        "autoWidth": false,
        "processing" : true,
        "serverSide": true,
        "scrollX": true,
        "ajax": "/config/getdatatable",
        "columns":[
            {data:'version_android'},
            {data:'action', orderable:false, searchable: false},
        ],
        dom: 'Bfrtip',
        buttons: [
            'csv', 'excel', 'pdf'
        ]
    });
});
$(document).on('click', '.edit-config', function(){
    var arrayID = [];
    var id = $(this).attr("id");
    $("#config_id").val(id);
    $.ajax({
        url : '/config/'+id,
        type : 'get',
        dataType: 'json',
        success:function(data)
        {
            $('#version_android').val(data.version_android);
            $('#modalEditConfig').modal('show');
            $('#btn-update-config').css('display','inline');
            $('#btn-new-config').css('display','none');
            $('#action').val('Editar');
        },
        error: function (data) {
            $("#capaError").css('display','block');
            $("#labelError").html('');
            var errors = $.parseJSON(data.responseText);
            $.each(errors.errors, function (key, value) {
                $("#labelError").append( value + '<br />' );
            });
            btnThis.removeAttr("disabled");
            alertify.error('Ha ocurrido un error, revise los campos del formulario');
        }
    })
});
$(document).on('click', '.delete-config', function(){
    var id = $(this).attr("id");
    alertify.confirm('¿Desea eliminar la configuración?', 'Esta acción no puede deshacerse', 
        function(){ 
            $.ajax({
                url : '/config/'+id,
                type : 'DELETE',
                data: $("#formEditConfig").serialize(),
                success:function(data)
                {
                    $('#tableMasterConfig').DataTable().ajax.reload( null, false );
                    alertify.success('Configuración eliminada correctamente');
                }
            })
        }, 
        function(){ 
            alertify.error('Acción cancelada')
        }
    );
});
$("#btn-new-config").click(function(){
    var id = $(this).attr("id");
    $.ajax({
        url : '/config',
        type : 'POST',
        data: $("#formEditConfig").serialize(),
        success:function(data)
        {
            alertify.success('Config insertada con éxito');
            $('#tableMasterConfig').DataTable().ajax.reload(null, false);
            $('#modalEditConfig').modal('hide');
        },
        error: function (data) {
            console.log(data);
        }
    })
});
$("#btn-update-config").click(function(){
    var id = $("#config_id").val();
    $.ajax({
        url : '/config/'+id,
        type : 'PUT',
        data: $("#formEditConfig").serialize(),
        success:function(data)
        {
            alertify.success('Configuración modificado con éxito');
            $('#tableMasterConfig').DataTable().ajax.reload(null, false);
            $('#modalEditConfig').modal('hide');
        },
        error: function (data) {
            console.log(data);
        }
    })
});
$('a[data-toggle="tab"]').on('shown.bs.tab', function (e) {
    currentTab = $(e.target).attr("id_tab");
    $($.fn.dataTable.tables( true ) ).css('width', '100%');
    $($.fn.dataTable.tables( true ) ).DataTable().columns.adjust().draw();
});

//FUNCIONES CARACTERISTICAS TIPOS
$(function () {
    $('#tableMasterInventarioCaracteristicaTipo').DataTable({
        "paging": true,
        "lengthChange": false,
        "searching": true,
        "ordering": true,
        "info": true,
        "autoWidth": false,
        "processing" : true,
        "serverSide": true,
        "scrollX": true,
        "ajax": "sistema/inventario/caracteristica/tipo/getdatatable",
        "columns":[
            {data:'nombre'},
            {data:'action', orderable:false, searchable: false},
        ],
        dom: 'Bfrtip',
        buttons: [
            'csv', 'excel', 'pdf'
        ]
    });
});
$(document).on('click', '.edit-inventario-caracteristica-tipo', function(){
    var arrayID = [];
    var id = $(this).attr("id");
    $("#inventario_caracteristica_tipo_id").val(id);
    $.ajax({
        url : 'sistema/inventario/caracteristica/tipo/'+id,
        type : 'get',
        dataType: 'json',
        success:function(data)
        {
            $('#nombre_inventario_caracteristica_tipo').val(data.nombre);
            $('#modalEditInventarioCaracteristicaTipo').modal('show');
            $('#btn-update-inventario-caracteristica-tipo').css('display','inline');
            $('#btn-new-inventario-caracteristica-tipo').css('display','none');
            $('#action').val('Editar');
        },
        error: function (data) {
            $("#capaError").css('display','block');
            $("#labelError").html('');
            var errors = $.parseJSON(data.responseText);
            $.each(errors.errors, function (key, value) {
                $("#labelError").append( value + '<br />' );
            });
            btnThis.removeAttr("disabled");
            alertify.error('Ha ocurrido un error, revise los campos del formulario');
        }
    })
});
$(document).on('click', '.delete-inventario-caracteristica-tipo', function(){
    var id = $(this).attr("id");
    alertify.confirm('¿Desea eliminar el tipo de caracteristica?', 'Esta acción no puede deshacerse', 
        function(){ 
            $.ajax({
                url : 'sistema/inventario/caracteristica/tipo/'+id,
                type : 'DELETE',
                data: $("#formEditIncidenciaTipoEstado").serialize(),
                success:function(data)
                {
                    $('#tableMasterIncidenciaTipoEstado').DataTable().ajax.reload( null, false );
                    alertify.success('Tipo de caracteristica eliminada correctamente');
                }
            })
        }, 
        function(){ 
            alertify.error('Acción cancelada')
        }
    );
});
$("#btn-new-inventario-caracteristica-tipo").click(function(){
    var id = $(this).attr("id");
    $.ajax({
        url : 'sistema/inventario/caracteristica/tipo',
        type : 'POST',
        data: $("#formEditInventarioCaracteristicaTipo").serialize(),
        success:function(data)
        {
            console.log(data);
            alertify.success('Tipo de caracteristica insertada con éxito.');
            $('#tableMasterInventarioCaracteristicaTipo').DataTable().ajax.reload(null, false);
            $('#modalEditInventarioCaracteristicaTipo').modal('hide');
        },
        error: function (data) {
            console.log(data);
        }
    })
});
$("#btn-update-inventario-caracteristica-tipo").click(function(){
    var id = $("#inventario_caracteristica_tipo_id").val();
    $.ajax({
        url : 'sistema/inventario/caracteristica/tipo/'+id,
        type : 'PUT',
        data: $("#formEditInventarioCaracteristicaTipo").serialize(),
        success:function(data)
        {
            alertify.success('Tipo de caracteristica modificado con éxito');
            $('#tableMasterInventarioCaracteristicaTipo').DataTable().ajax.reload(null, false);
            $('#modalEditInventarioCaracteristicaTipo').modal('hide');
        },
        error: function (data) {
            console.log(data);
        }
    })
});

$("#new").click(function(){
    console.log(currentTab);
    if(currentTab == 0){
        $("#nombre_familia").val('');
        $('#btn-update').css('display','none');
        $('#btn-new').css('display','inline');
        $('#seccion_famlia').val(null).trigger('change');
        $('#modalEdit').modal('show');
    }else if(currentTab == 1){
        $("#nombre_seccion").val('');
        $('#btn-update-seccion').css('display','none');
        $('#btn-new-seccion').css('display','inline');
        $('#modalEditSeccion').modal('show');
    }else if(currentTab == 2){
        $("#nombre_tipo_iva").val('');
        $('#btn-update-tipoIVA').css('display','none');
        $('#btn-new-tipoIVA').css('display','inline');
        $('#modalEditIVA').modal('show');
    }else if(currentTab == 3){
        $("#nombre_sistema_tipo").val('');
        $('#btn-update-sistemaTipo').css('display','none');
        $('#btn-new-sistemaTipo').css('display','inline');
        $('#modalEditSistemaTipo').modal('show');
    }else if(currentTab == 4){
        $("#nombre_incidencia_metodo_comunicacion").val('');
        $('#btn-update-incidenciaMetodoComunicacion').css('display','none');
        $('#btn-new-incidenciaMetodoComunicacion').css('display','inline');
        $('#modalEditIncidenciaMetodoComunicacion').modal('show');
    }else if(currentTab == 5){
        $("#nombre_incidencia_prioridad").val('');
        $('#btn-update-incidenciaPrioridad').css('display','none');
        $('#btn-new-incidenciaPrioridad').css('display','inline');
        $('#modalEditIncidenciaPrioridad').modal('show');
    }else if(currentTab == 6){
        $("#nombre_incidencia_prioridad").val('');
        $('#btn-update-incidenciaTipo').css('display','none');
        $('#btn-new-incidenciaTipo').css('display','inline');
        $('#modalEditIncidenciaTipo').modal('show');
    }else if(currentTab == 7){
    	$('#cierra_incidencia_tipo_estado').iCheck('uncheck');
        $("#nombre_actuacion_tipo_estado").val('');
        $('#btn-update-actuacionTipoEstado').css('display','none');
        $('#btn-new-actuacionTipoEstado').css('display','inline');
        $('#modalEditActuacionTipoEstado').modal('show');
    }else if(currentTab == 8){
        $("#nombre_incidencia_tipo_estado").val('');
        $('#btn-update-incidenciaTipoEstado').css('display','none');
        $('#btn-new-incidenciaTipoEstado').css('display','inline');
        $('#modalEditIncidenciaTipoEstado').modal('show');
    }else if(currentTab == 9){
        $("#version_android").val('');
        $('#btn-update-config').css('display','none');
        $('#btn-new-config').css('display','inline');
        $('#modalEditConfig').modal('show');
    }else if(currentTab == 10){
        $("#nombre_inventario_caracteristica_tipo").val('');
        $('#btn-update-inventario-caracteristica-tipo').css('display','none');
        $('#btn-new-inventario-caracteristica-tipo').css('display','inline');
        $('#modalEditInventarioCaracteristicaTipo').modal('show');
    }
});
</script>
@endpush