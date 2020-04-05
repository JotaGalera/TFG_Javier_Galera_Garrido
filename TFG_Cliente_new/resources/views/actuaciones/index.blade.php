@extends('admin.layout')


@section('content')
<meta name="csrf-token" content="{{ csrf_token() }}">
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Proyectos y Actuaciones
        <small>Actuaciones</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="/"><i class="fa fa-dashboard"></i> Proyectos y Actuaciones</a></li>
        <li class="active">Actuaciones</li>
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
            <div class="box">
                <!-- /.box-header -->
                <div class="nav-tabs-custom">
                    <ul class="nav nav-tabs">
                        <li class="active" id="tab4"><a href="#tab_4" data-toggle="tab" aria-expanded="false">Pendientes</a></li>
                        <li id="tab5"><a href="#tab_5" data-toggle="tab" aria-expanded="true">Finalizadas</a></li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane active" id="tab_4">
                            <div class="box-body">
                                <table id="tableMasterPendientes" class="table table-bordered table-hover table-condensed">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Cliente</th>
                                            <th>Sistema</th>
                                            <th>Nombre</th>
                                            <th>Fecha</th>
                                            <th>Presencial</th>
                                            <th>Cerrada</th>

                                            <th>#</th>
                                        </tr>
                                    </thead>
                                </table>
                            </div>
                        </div>
                        <div class="tab-pane" id="tab_5">
                            <div class="box-body">
                                <table id="tableMasterFinalizadas" class="table table-bordered table-hover table-condensed">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Cliente</th>
                                            <th>Sistema</th>
                                            <th>Nombre</th>
                                            <th>Fecha</th>
                                            <th>Presencial</th>
                                            <th>Cerrada</th>

                                            <th>#</th>
                                        </tr>
                                    </thead>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </div>
        <!-- /.col -->
    </div>
    <!-- /.row -->
    <div class="modal fade" id="modalEdit">
        <div class="modal-dialog" style="width:70%">
            <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                  <h4 class="modal-title">Información de la actuación</h4>
                </div>
                <div class="modal-body">
                    <div class="modal-body">
                        <div class="box-body">
                            <div class="alert alert-warning alert-dismissible" style="display: none" id="capaError">
                                <span id="labelError"></span>
                            </div>
                            <div class="nav-tabs-custom">
                                <ul class="nav nav-tabs">
                                    <li class="active" id="tab1"><a href="#tab_1" data-toggle="tab" aria-expanded="false">Actuación</a></li>
                                    <li id="tab2"><a href="#tab_2" data-toggle="tab" aria-expanded="true">Personal</a></li>
                                    <li id="tab3"><a href="#tab_3" data-toggle="tab" aria-expanded="true">Documentos</a></li>
                                    <li id="tab6"><a href="#tab_6" data-toggle="tab" aria-expanded="true">Emails</a></li>

                                </ul>
                                <div class="tab-content">
                                    <div class="tab-pane active" id="tab_1">
                                        <div class="box-body">
                                            <form method="PUT" action="" id="formEdit" role="form">
                                                <input type="hidden" name="id" id="id">
                                                @csrf
                                                <div class="form-group col-md-12">
                                                    <label>Incidencia</label>
                                                    <select class="form-control select2" id="incidencia_id" name="incidencia_id" style="width:100%"></select>
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label>Cliente</label>
                                                    <select class="form-control select2" id="cliente_id" name="cliente_id" style="width:100%"></select>
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label>Ubicación</label>
                                                    <select class="form-control select2" id="ubicacion_id" name="ubicacion_id" style="width:100%"></select>
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label>Sistema</label>
                                                    <select class="form-control select2" id="sistema_id" name="sistema_id" style="width:100%"></select>
                                                </div>
                                                <div class="form-group col-md-12">
                                                    <label>Nombre</label>
                                                    <input type="text" class="form-control" placeholder="Nombre" name="nombre" id="nombre">
                                                </div>
                                                <div class="form-group col-md-3">
                                                    <label>Fecha</label>
                                                    <input type="text" class="form-control datepicker" placeholder="Fecha" name="fecha" id="fecha">
                                                </div>
                                                <div class="form-group col-md-3">
                                                    <label>Hora Inicio</label>
                                                    <input type="text" class="form-control" placeholder="HH:MM" name="hora_ini" id="hora_ini">
                                                </div>
                                                <div class="form-group col-md-3">
                                                    <label>Hora Fin</label>
                                                    <input type="text" class="form-control" placeholder="HH:MM" name="hora_fin" id="hora_fin">
                                                </div>
                                                <div class="form-group col-md-3">
                                                    <label>Tiempo Estimado</label>
                                                    <input type="text" class="form-control" placeholder="HH:MM" name="tiempo_estimado" id="tiempo_estimado">
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label>Descripción</label>
                                                    <textarea class="form-control" placeholder="Descripción" name="descripcion" id="descripcion" style="height: 150px;"></textarea>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label>Observaciones</label>
                                                    <textarea class="form-control" placeholder="Observaciones" name="observaciones" id="observaciones" style="height: 150px;"></textarea>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label>Estado</label>
                                                    <select class="form-control select2" id="actuacion_tipo_estado_id" name="actuacion_tipo_estado_id" style="width:100%"></select>
                                                </div>
                                                <div class="form-group col-md-2">
                                                    <label>Firmado por</label>
                                                    <input type="text" class="form-control" placeholder="Firmado Por" name="firmada_por" id="firmada_por">
                                                </div>
                                                <div class="form-group col-md-2">
                                                    <label>Desplazamientos</label>
                                                    <input type="text" class="form-control" placeholder="Número Desplazamientos" name="n_desplazamientos" id="n_desplazamientos">
                                                </div>
                                                <div class="form-group col-md-2">
                                                    <label>Km</label>
                                                    <input type="text" class="form-control" placeholder="Km" name="km" id="km">
                                                </div>
                                                <div class="form-group col-md-2">
                                                    <label>Presencial</label>
                                                    <div class="checkbox icheck">
                                                        <label>
                                                            <input type="checkbox" name="presencial" id="presencial">
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="form-group col-md-2">
                                                    <label>Cerrada</label>
                                                    <div class="checkbox icheck">
                                                        <label>
                                                            <input type="checkbox" name="cerrada" id="cerrada">
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="form-group col-md-3">
                                                    <label>Latitud GPS</label>
                                                    <input type="text" class="form-control" placeholder="Latitud" name="latitud_gps" id="latitud_gps">
                                                </div>
                                                <div class="form-group col-md-3">
                                                    <label>Longitud GPS</label>
                                                    <input type="text" class="form-control" placeholder="Longitud" name="longitud_gps" id="longitud_gps">
                                                </div>
                                                <div class="form-group col-md-12">
                                                    <hr />
                                                </div>
                                                <div class="form-group col-md-12">
                                                    <button type="button" class="btn btn-success pull-left" id="btn-new" style="display: none"><i class="fa fa-floppy-o"></i>&nbsp;&nbsp;  Añadir y Cerrar</button>
                                                    <button type="button" class="btn btn-success pull-left" id="btn-update" style="display: none"><i class="fa fa-floppy-o"></i>&nbsp;&nbsp;  Guardar y Cerrar</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                    <div class="tab-pane" id="tab_2">
                                        <div class="box-body">
                                            <div class="form-group col-md-12">
                                                <table id="tableUser" class="table table-bordered table-hover table-condensed">
                                                    <thead>
                                                        <tr>
                                                            <th>Usuario</th>
                                                            <th>Firmada</th>
                                                            <th>Reservada</th>
                                                            <th>Preasignada</th>
                                                            <th>#</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody></tbody>
                                                </table>
                                            </div>
                                            <form method="PUT" action="" id="formEditPersonal" role="form">
                                                @csrf
                                                <input type="hidden" name="actuacion_id" id="actuacion_id_user">
                                                <div class="form-group col-md-5">
                                                    <label>Usuario</label>
                                                    <select class="form-control select2" id="user_id_user" name="user_id" style="width:100%"></select>
                                                </div>
                                                <div class="form-group col-md-2">
                                                    <label>Firmado</label>
                                                    <select class="form-control" id="firma_user" name="firma">
                                                        <option value="0">NO</option>
                                                        <option value="1">SI</option>
                                                    </select>
                                                </div>
                                                <div class="form-group col-md-2">
                                                    <label>Reservada</label>
                                                    <select class="form-control" id="reservada_user" name="reservada">
                                                        <option value="0">NO</option>
                                                        <option value="1">SI</option>
                                                    </select>
                                                </div>
                                                <div class="form-group col-md-2">
                                                    <label>Preasignada</label>
                                                    <select class="form-control" id="preasignacion_user" name="preasignacion">
                                                        <option value="0">NO</option>
                                                        <option value="1">SI</option>
                                                    </select>
                                                </div>
                                                <div class="form-group col-md-1">
                                                    <label>&nbsp;</label>
                                                    <button type="button" class="form-control btn btn-primary pull-left" id="btn-new-user"><i class="fa fa-plus"></i></button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                    <div class="tab-pane" id="tab_3">
                                        <div class="box-body">
                                            <div class="form-group col-md-12">
                                                <table id="tableActuacionDocumento" class="table table-bordered table-hover table-condensed">
                                                    <thead>
                                                        <tr>
                                                            <th>Recurso</th>
                                                            <th>Descripción</th>
                                                            <th>Tipo</th>
                                                            <th>#</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody></tbody>
                                                </table>
                                            </div>
                                            <form method="PUT" action="" id="formEditActuacionDocumento" role="form" enctype="multipart/form-data">
                                                @csrf
                                                <input type="hidden" name="actuacion_id" id="actuacion_id_documento">
                                                <div class="form-group col-md-4">
                                                    <label>Descripción</label>
                                                    <input type="text" class="form-control" placeholder="Descripcion" name="descripcion" id="descripcion_documento" required="required">
                                                </div>
                                                <div class="form-group col-md-3">
                                                    <label>Tipo</label>
                                                    <select class="form-control" id="tipo" name="tipo">
                                                        <option value="0">Documento</option>
                                                        <option value="1">Firma</option>
                                                    </select>
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label>Fichero</label>
                                                    <div class="input-group input-file" name="nombre_recurso_documento">
                                                        <span class="input-group-btn">
                                                            <button class="btn btn-default btn-choose" type="button"><i class="fa fa-search"></i> Examinar</button>
                                                        </span>
                                                        <input type="text" class="form-control" placeholder='Selecciona un fichero...' />
                                                    </div>
                                                </div>
                                                <div class="form-group col-md-1">
                                                    <label>&nbsp;</label>
                                                    <button type="button" class="form-control btn btn-primary pull-left" id="btn-new-actuacionDocumento"><i class="fa fa-plus"></i></button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                    <div class="tab-pane" id="tab_6">
                                        <div class="box-body">
                                            <div class="form-group col-md-12">
                                                <table id="tableActuacionCorreo" class="table table-bordered table-hover table-condensed">
                                                    <thead>
                                                        <tr>
                                                            <th>Correo</th>
                                                            <th>#</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody></tbody>
                                                </table>
                                            </div>
                                            <form method="PUT" action="" id="formEditActuacionCorreo" role="form" enctype="multipart/form-data">
                                                @csrf
                                                <input type="hidden" name="actuacion_id" id="actuacion_id_correo">
                                                <div class="form-group col-md-11">
                                                    <label>Correo</label>
                                                    <input type="text" class="form-control" placeholder="Correo" name="correo" id="correo_correo" required="required">
                                                </div>
                                                <div class="form-group col-md-1">
                                                    <label>&nbsp;</label>
                                                    <button type="button" class="form-control btn btn-primary pull-left" id="btn-new-correo"><i class="fa fa-plus"></i></button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
    </div>
    <!-- /.modal-dialog -->
</section>
@stop

@push('scripts')

<script>

$(document).ready( function () {
  $.fn.dataTable.moment( 'DD/MM/YYYY' );
} );

var idActuacion;
var tabIndexModal;
var tabIndex = '#tab_4';
//Date picker
$('.datepicker').datepicker({
    todayBtn: "linked",
    language: "es",
    autoclose: true,
    todayHighlight: true,
    format: 'dd/mm/yyyy'
})

$('#verificado_control_economico').iCheck({
    checkboxClass: 'icheckbox_square-blue',
    radioClass: 'iradio_square-blue',
    increaseArea: '20%' /* optional */
});
$('#presencial').iCheck({
    checkboxClass: 'icheckbox_square-blue',
    radioClass: 'iradio_square-blue',
    increaseArea: '20%' /* optional */
});
$('#cerrada').iCheck({
    checkboxClass: 'icheckbox_square-blue',
    radioClass: 'iradio_square-blue',
    increaseArea: '20%' /* optional */
});


$('#tableMasterPendientes').DataTable({
    "paging": true,
    "lengthChange": false,
    "searching": true,
    "ordering": true,
    "info": true,
    "autoWidth": false,
    "processing" : true,
    //"serverSide": true,
    "scrollX": true,
    "ajax": "/actuacion/getdatatable/0",
    "columns":[
        {data:'id'},
        {data:'cliente'},
        {data:'sistema'},
        {data:'nombre'},
        {data:'fecha'},
        {data:'presencial'},
        {data:'cerrada'},
        {data:'action', orderable:false, searchable: false},
    ],
    "fnRowCallback": function( nRow ) {
        if(nRow.cells[8]) nRow.cells[8].noWrap = true;
        return nRow;
    },
    "order": [[ 4, "desc" ]],
    dom: 'Bfrtip',
    buttons: [
        'csv', 'excel', 'pdf'
    ]
});
$('#tableMasterFinalizadas').DataTable({
    "paging": true,
    "lengthChange": false,
    "searching": true,
    "ordering": true,
    "info": true,
    "autoWidth": false,
    "processing" : true,
    //"serverSide": true,
    "scrollX": true,
    "ajax": "/actuacion/getdatatable/1",
    "columns":[
        {data:'id'},
        {data:'cliente'},
        {data:'sistema'},
        {data:'nombre'},
        {data:'fecha'},
        {data:'presencial'},
        {data:'cerrada'},

        {data:'action', orderable:false, searchable: false},
    ],
    "fnRowCallback": function( nRow ) {
        if(nRow.cells[8]) nRow.cells[8].noWrap = true;
        return nRow;
    },
    "order": [[ 4, "desc" ]],
    dom: 'Bfrtip',
    buttons: [
        'csv', 'excel', 'pdf'
    ]
});
$('#cliente_id').select2({
    placeholder: " - Busca y selecciona un proyecto - ",
    ajax: {
        url: '/cliente/all',
        data: function (params) {
            return {
                q: $.trim(params.term)
            };
        },
        processResults: function (data) {
          return {
            results: $.map(data, function(obj) {
                return { id: obj.id, text: obj.nombre };
            })
          };
        },
        cache: true
    }
}).on('change', function (e) {
    $("#ubicacion_id").val(null).trigger("change");
    $("#sistema_id").val(null).trigger("change");
});
$('#empresa_id').select2({
    placeholder: " - Busca y selecciona una empresa - ",
    ajax: {
        url: '/empresa/find',
        data: function (params) {
            return {
                q: $.trim(params.term)
            };
        },
        processResults: function (data) {
          return {
            results: $.map(data, function(obj) {
                return { id: obj.id, text: obj.nombre_fiscal };
            })
          };
        },
        cache: true
    }
});
$('#ubicacion_id').select2({
    placeholder: " - Busca y selecciona una ubicación - ",
    ajax: {
        data: function (params) {
            return {
                q: $.trim(params.term)
            };
        },
        url: function () {
            console.log($('#cliente_id').val());
            return '/cliente/ubicaciones/'+$('#cliente_id').val();
        },
        processResults: function (data) {
            return {
                results: $.map(data, function(obj) {
                    return { id: obj.id, text: obj.nombre };
                })
            };
        }
    }
}).on('change', function (e) {
    $("#sistema_id").val(null).trigger("change");
});
$('#sistema_id').select2({
    minimumResultsForSearch: -1,
    placeholder: " - Busca y selecciona un sistema - ",
    ajax: {
        url: function () {
            console.log($('#cliente_id').val());
            return '/cliente/sistemas/'+$('#ubicacion_id').val();
        },
        processResults: function (data) {
            return {
                results: $.map(data, function(obj) {
                    return { id: obj.id, text: obj.descripcion };
                })
            };
        }
    }
});
$('#actuacion_tipo_estado_id').select2({
    minimumResultsForSearch: -1,
    placeholder: " - Busca y selecciona un tipo de estado - ",
    ajax: {
        url: 'actuacion/estado/tipo/all',
        processResults: function (data) {
          return {
            results: $.map(data, function(obj) {
                return { id: obj.id, text: obj.nombre };
            })
          };
        }
    }
});
$('#user_id_user').select2({
    placeholder: " - Busca y selecciona un usuario - ",
    ajax: {
        url: '/user/all/',
        processResults: function (data) {
            return {
                results: $.map(data, function(obj) {
                    return { id: obj.id, text: obj.name };
                })
            };
        }
    }
});
$('#incidencia_id').select2({
    placeholder: " - Sin incidencia asignada - ",
    ajax: {
        url: '/incidencia/find',
        data: function (params) {
            return {
                q: $.trim(params.term)
            };
        },
        processResults: function (data) {
          return {
            results: $.map(data, function(obj) {
                return { id: obj.id, text: '[ ID: ' + obj.id + ' ] ' + obj.titulo  };
            })
          };
        },
        cache: true
    }
});

//EVENTOS ACTUACIÓN
$("#btn-new").click(function(){
    var id = $(this).attr("id");
    $.ajax({
        url : 'actuacion',
        type : 'POST',
        data: $("#formEdit").serialize(),
        success:function(data)
        {
            console.log(data);
            $("#capaError").css('display','none');
            $("#labelError").html('');
            alertify.success(data.success);
            $('#tableMasterPendientes').DataTable().ajax.reload(null, false);
            $('#tableMasterFinalizadas').DataTable().ajax.reload(null, false);
            $('#modalEdit').modal('hide');
            $("#formEdit")[0].reset();
        },
        error: function (data) {
            console.log(data);
            $("#capaError").css('display','block');
            $("#labelError").html('');
            var errors = $.parseJSON(data.responseText);
            $.each(errors.errors, function (key, value) {
                $("#labelError").append( value + '<br />' );
            });
            alertify.error('Ha ocurrido un error, revise los campos del formulario');
        }
    })
});
$("#btn-update").click(function(){
  var id = idActuacion;
  console.log(id);
    $.ajax({
        url : 'actuacion/'+id,
        type : 'PUT',
        data: $("#formEdit").serialize(),
        success:function(data)
        {
            console.log(data);
            $("#capaError").css('display','none');
            $("#labelError").html('');
            alertify.success(data.success);
            $('#tableMasterPendientes').DataTable().ajax.reload(null, false);
            $('#tableMasterFinalizadas').DataTable().ajax.reload(null, false);
            $('#modalEdit').modal('hide');
            $("#formEdit")[0].reset();
        },
        error: function (data) {
            console.log(data);
            $("#capaError").css('display','block');
            $("#labelError").html('');
            var errors = $.parseJSON(data.responseText);
            $.each(errors.errors, function (key, value) {
                $("#labelError").append( value + '<br />' );
            });
            alertify.error('Ha ocurrido un error, revise los campos del formulario');
        }
    })
});
$("#new").click(function(){
    disableTab();
    $("#sistema_id").val(null).trigger("change");
    $("#cliente_id").val(null).trigger("change");
    $("#ubicacion_id").val(null).trigger("change");
    $("#incidencia_id").val(null).trigger("change");
    $("#actuacion_id").val(null).trigger("change");
    $('#actuacion_tipo_estado_id').val(null).trigger('change');
    $('#empresa_id').val(null).trigger('change');
    $('#presencial').iCheck('uncheck');
    $('#cerrada').iCheck('uncheck');
    $('.nav-tabs a[href="#tab_1"]').tab('show');
    $("#formEdit")[0].reset();
    $('#btn-update').css('display','none');
    $('#btn-new').css('display','inline');
    $('#modalEdit').modal('show');
});
$(document).on('click', '.edit', function(){
    enableTab();
    idActuacion = $(this).attr("id");
    $.ajax({
        url : 'actuacion/'+idActuacion,
        type : 'get',
        dataType: 'json',
        success:function(data)
        {
            console.log(data);
            actualizaUser(idActuacion);
            actualizaDocumento(idActuacion);
            actualizaCorreo(idActuacion);

            $('#actuacion_id_control_economico').val(idActuacion);
            $('#actuacion_id_user').val(idActuacion);
            $('#actuacion_id_documento').val(idActuacion);
            $('#actuacion_id_correo').val(idActuacion);
            $('#actuacion_id_empresa').val(idActuacion);

            $('#id').val(idActuacion);
            $('#nombre').val(data.nombre);
            $('#descripcion').val(data.descripcion);
            $('#observaciones').val(data.observaciones);
            $('#firmada_por').val(data.firmada_por);
            $('#latitud_gps').val(data.latitud_gps);
            $('#longitud_gps').val(data.longitud_gps);

            if(data.fecha != null) $('#fecha').datepicker("setDate", data.fecha.split("-").reverse().join("/"));

            $('#hora_ini').val(data.hora_ini);
            $('#hora_fin').val(data.hora_fin);
            $('#tiempo_estimado').val(data.tiempo_estimado);

            if(data.presencial == "1") $('#presencial').iCheck('check'); else $('#presencial').iCheck('uncheck');
            if(data.cerrada == "1") $('#cerrada').iCheck('check'); else $('#cerrada').iCheck('uncheck');

            $('#estado').val(data.estado);
            $('#n_desplazamientos').val(data.n_desplazamientos);
            $('#km').val(data.km);

            if(data.incidencia != null){
                var newOption = new Option( data.incidencia.titulo, data.incidencia.id , false, false);
                $('#incidencia_id').append(newOption).trigger('change');
                $('#incidencia_id').val(data.incidencia.id).trigger('change');
            }else $("#incidencia_id").val(null).trigger("change");
            if(data.actuacion_tipo_estado != null){
                var newOption = new Option(data.actuacion_tipo_estado.nombre, data.actuacion_tipo_estado.id, false, false);
                $('#actuacion_tipo_estado_id').append(newOption).trigger('change');
                $('#actuacion_tipo_estado_id').val(data.actuacion_tipo_estado.id).trigger('change');
            }else $('#actuacion_tipo_estado_id').append(null).trigger('change');
            var newOption = new Option(data.sistema.cliente_ubicacion.cliente.nombre, data.sistema.cliente_ubicacion.cliente.id, false, false);
            $('#cliente_id').append(newOption).trigger('change');
            $('#cliente_id').val(data.sistema.cliente_ubicacion.cliente.id).trigger('change');

            var newOption = new Option(data.sistema.cliente_ubicacion.nombre, data.sistema.cliente_ubicacion.id, false, false);
            $('#ubicacion_id').append(newOption).trigger('change');
            $('#ubicacion_id').val(data.sistema.cliente_ubicacion.id).trigger('change');

            var newOption = new Option(data.sistema.descripcion, data.sistema.id, false, false);
            $('#sistema_id').append(newOption).trigger('change');
            $('#sistema_id').val(data.sistema.id).trigger('change');

            if(data.empresa != null){
                var newOption = new Option(data.empresa.nombre_fiscal, data.empresa.id, false, false);
                $('#empresa_id').append(newOption).trigger('change');
                $('#empresa_id').val(data.empresa.id).trigger('change');
            }else $('#empresa_id').val('').trigger("change");

            //dataTableCE.ajax.url( '/actuacion/control_economico/getdatatable/'+idActuacion ).load();
            dataTableCE.ajax.reload(null, false); //REFRESCAR PARA PINTAR.

            $('#modalEdit').modal('show');
            $('#btn-update').css('display','inline');
            $('#btn-new').css('display','none');
            $('#action').val('Editar');
            $('.modal-title').text('Editar actuación');

        },
        error: function (data) {
            console.log(data);
        }

    })
});
$(document).on('click', '.delete', function(){
    idActuacion = $(this).attr("id");
    alertify.confirm('¿Desea eliminar a esta incidencia?', 'Esta acción no puede deshacerse',
        function(){
            $.ajax({
                url : 'actuacion/'+idActuacion,
                type : 'DELETE',
                data: $("#formEdit").serialize(),
                success:function(data)
                {
                    $('#tableMasterPendientes').DataTable().ajax.reload(null, false);
                    $('#tableMasterFinalizadas').DataTable().ajax.reload(null, false);
                    alertify.success('Incidencia eliminada correctamente');
                }
            })
        },
        function(){
            alertify.error('Acción cancelada')
        }
    );
});

//EVENTOS USUARIOS
$("#btn-new-user").click(function(){
    var btnThis = $(this).attr("disabled", "disabled");
    $.ajax({
        url : 'actuacion/user',
        type : 'POST',
        data: $("#formEditPersonal").serialize(),
        success:function(data)
        {
            console.log(data);
            $("#capaError").css('display','none');
            $("#labelError").html('');
            btnThis.removeAttr("disabled");
            actualizaUser(idActuacion);
            alertify.success(data.success);
            $("#formEditPersonal")[0].reset();
        },
        error: function (data) {
            console.log(data);
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
$(document).on('click', '.delete-user', function(){
    var idActuacionUser = $(this).attr("id");
    alertify.confirm('¿Desea eliminar el user?', 'Esta acción no puede deshacerse',
        function(){
            $.ajax({
                url : 'actuacion/user/'+idActuacionUser,
                type : 'DELETE',
                data: $("#formEditPersonal").serialize(),
                success:function(data)
                {
                    actualizaUser(idActuacion);
                    alertify.success('Usuario eliminado correctamente');
                },
                error: function (data) {
                    console.log(data);
                }
            })
        },
        function(){
            alertify.error('Acción cancelada')
        }
    );
});
//EVENTOS DOCUMENTO
$("#btn-new-actuacionDocumento").click(function(){
    var btnThis = $(this).attr("disabled", "disabled");
    var form_data = new FormData();
    form_data.append( 'nombre_recurso', $('#nombre_recurso_documento').prop('files')[0] );
    form_data.append( 'descripcion', $('#descripcion_documento').val() );
    form_data.append( 'actuacion_id', $('#actuacion_id_documento').val() );
    form_data.append( 'tipo', $('#tipo').val() );
    $.ajax({
        url : '/actuacion/documento',
        type : 'POST',
        data: form_data,
        processData: false,
        contentType: false,
        headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
        success:function(data)
        {
            console.log(data);
            $("#capaError").css('display','none');
            $("#labelError").html('');
            btnThis.removeAttr("disabled");
            actualizaDocumento(idActuacion);
            alertify.success(data.success);
            $("#formEditActuacionDocumento")[0].reset();
        },
        error: function (data) {
            console.log(data);
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
$(document).on('click', '.delete-actuacionDocumento', function(){
    var idActuacionDocumento = $(this).attr("id");
    alertify.confirm('¿Desea eliminar el documento?', 'Esta acción no puede deshacerse',
        function(){
            $.ajax({
                url : '/actuacion/documento/'+idActuacionDocumento,
                type : 'DELETE',
                data: $("#formEdit").serialize(),
                success:function(data)
                {
                    actualizaDocumento(idActuacion);
                    alertify.success('Documento eliminado correctamente');
                },
                error: function (data) {
                    console.log(data);
                }
            })
        },
        function(){
            alertify.error('Acción cancelada')
        }
    );
});
//EVENTOS CORREO
$("#btn-new-correo").click(function(){
    var btnThis = $(this).attr("disabled", "disabled");
    $.ajax({
        url : 'actuacion/correo',
        type : 'POST',
        data: $("#formEditActuacionCorreo").serialize(),
        success:function(data)
        {
            console.log(data);
            $("#capaError").css('display','none');
            $("#labelError").html('');
            btnThis.removeAttr("disabled");
            actualizaCorreo(idActuacion);
            alertify.success(data.success);
            $("#formEditActuacionCorreo")[0].reset();
        },
        error: function (data) {
            console.log(data);
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
$(document).on('click', '.mail', function(e){
    e.preventDefault();
    var actuacion_id = $(this).attr("id");
    alertify.confirm('¿Desea enviar el correo a todos sus destinatarios?', 'Esta acción no puede deshacerse',
        function(){
            $.ajax({
                url : '/actuacion/parte/send/'+actuacion_id,
                type : 'GET',
                data: $("#formEdit").serialize(),
                success:function(data)
                {
                    console.log(data);
                    alertify.success('Correo enviado correctamente');
                },
                error: function (data) {
                    console.log(data);
                }
            })
        },
        function(){
            alertify.error('Acción cancelada')
        }
    );
});
$(document).on('click', '.delete-correo', function(){
    var idActuacionUser = $(this).attr("id");
    alertify.confirm('¿Desea eliminar el correo?', 'Esta acción no puede deshacerse',
        function(){
            $.ajax({
                url : 'actuacion/correo/'+idActuacionUser,
                type : 'DELETE',
                data: $("#formEditActuacionCorreo").serialize(),
                success:function(data)
                {
                    actualizaCorreo(idActuacion);
                    alertify.success('Correo eliminado correctamente');
                },
                error: function (data) {
                    console.log(data);
                }
            })
        },
        function(){
            alertify.error('Acción cancelada')
        }
    );
});
//EVENTOS CONTROL ECONOMICO /* ESTO NO LO HAGO EN EL MOD ERP */
$("#btn-new-control-economico").click(function(){
    var btnThis = $(this).attr("disabled", "disabled");
    $.ajax({
        url : 'actuacion/control_economico',
        type : 'POST',
        data: $("#formEditActuacionControlEconomico").serialize(),
        success:function(data)
        {
            console.log(data);
            $("#capaError").css('display','none');
            $("#labelError").html('');
            dataTableCE.ajax.reload(null, false); //REFRESCAR PARA PINTAR.
            btnThis.removeAttr("disabled");
            alertify.success(data.success);
            $("#formEditActuacionControlEconomico")[0].reset();
        },
        error: function (data) {
            console.log(data);
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
$(document).on('click', '.delete-control-economico', function(){
    var id = $(this).attr("id");
    alertify.confirm('¿Desea eliminar la acción?', 'Esta acción no puede deshacerse',
        function(){
            $.ajax({
                url : '/actuacion/control_economico/'+id,
                type : 'DELETE',
                data: $("#formEditActuacionControlEconomico").serialize(),
                success:function(data)
                {
                    dataTableCE.ajax.reload(null, false); //REFRESCAR PARA PINTAR.
                    alertify.success('Acción eliminada correctamente');
                },
                error: function (data) {
                    console.log(data);
                }
            })
        },
        function(){
            alertify.error('Acción cancelada')
        }
    );
});
$(document).on('click', '.validar-control-economico', function(){
    var id = $(this).attr("id");
    alertify.confirm('¿Desea cambiar de estado la acción?', 'Esta acción no puede deshacerse',
        function(){
            $.ajax({
                url : '/actuacion/control_economico/validar/'+id,
                type : 'GET',
                success:function(data)
                {
                    dataTableCE.ajax.reload(null, false); //REFRESCAR PARA PINTAR.
                    alertify.success('Se ha cambiado de estado correctamente');
                },
                error: function (data) {
                    console.log(data);
                }
            })
        },
        function(){
            alertify.error('Acción cancelada')
        }
    );
});
var dataTableCE = $('#tableActuacionControlEconomico').DataTable({
    "paging": true,
    "lengthChange": false,
    "searching": true,
    "ordering": true,
    "info": true,
    "autoWidth": false,
    "processing" : true,
    "serverSide": true,
    "scrollX": true,
    "ajax": {
        url: "/actuacion/control_economico/getdatatable/"+idActuacion,
    },
    "deferLoading": 0,
    "columns":[
        {data:'accion'},
        {data:'verificado'},
        {data:'user'},
        {data:'fecha'},
        {data:'action', orderable:false, searchable: false},
    ],
    "fnRowCallback": function( nRow ) {
        if(nRow.cells[4]) nRow.cells[4].noWrap = true;
        return nRow;
    },
    dom: 'Bfrtip',
    buttons: [
        'csv', 'excel', 'pdf'
    ]
});
$("#btn-edit-empresa").click(function(){
    $.ajax({
        url : 'actuacion/empresa',
        type : 'POST',
        data: $("#formEditActuacionEmpresa").serialize(),
        success:function(data)
        {
            console.log(data);
            alertify.success(data.success);
        },
        error: function (data) {
            console.log(data);
            alertify.error('Ha ocurrido un error, revise los campos del formulario');
        }
    })
});

/**** ESTO DE AQUI ARRIBA NO ENTRA DENTRO DEL MODERP ************/
//FUNCIONES
function bs_input_file() {
    $(".input-file").before(
        function() {
            if ( ! $(this).prev().hasClass('input-ghost') ) {
                var element = $("<input type='file' id='" + $(this).attr("name") + "' class='input-ghost' style='visibility:hidden; height:0'>");
                element.attr( "name" , $(this).attr("name") );
                element.change(function(){
                    element.next(element).find('input').val((element.val()).split('\\').pop());
                });
                $(this).find("button.btn-choose").click(function(){
                    element.click();
                });
                $(this).find('input').css("cursor","pointer");
                $(this).find('input').mousedown(function() {
                    $(this).parents('.input-file').prev().click();
                    return false;
                });
                return element;
            }
        }
    );
}
function disableTab(){
    $("#tab2").hide();
    $("#tab3").hide();
    $("#tab6").hide();

}
function enableTab(){
    $("#tab2").show();
    $("#tab3").show();
    $("#tab6").show();

}
function actualizaUser(actuacion_id){
    $.ajax({
        url : 'actuacion/user/showTable/'+actuacion_id,
        type : 'get',
        dataType: 'json',
        success:function(data)
        {
            $('#tableUser > tbody').empty();
            $.each(data, function(i, item) {
                $('#tableUser > tbody:last-child').append('<tr><td>'+item.user_id+'</td><td>'+item.firma+'</td><td>'+item.reservada+'</td><td>'+item.preasignacion+'</td><td><a href="#" class="btn btn-xs btn-danger delete-user" id="'+item.id+'"><i class="fa fa-trash" aria-hidden="true"></i></a></td></tr>');
            });
        }
    })
}
function actualizaDocumento(actuacion_id){
    $.ajax({
        url : '/actuacion/documento/showTable/'+actuacion_id,
        type : 'get',
        dataType: 'json',
        success:function(data)
        {
            console.log("QUE ENTRO AQUI");
            $('#tableActuacionDocumento > tbody').empty();
            $.each(data, function(i, item) {
                console.log(data);
                  $('#tableActuacionDocumento > tbody:last-child').append('<tr><td><a href="{{env("URL_API")}}/storage/actuacion_documento/'+item.ruta_recurso+'" target="_blank">'+item.nombre_recurso+'</a></td><td>'+item.descripcion+'</td><td>'+item.tipo_texto+'</td><td><a href="#" class="btn btn-xs btn-danger delete-actuacionDocumento" id="'+item.id+'"><i class="fa fa-trash" aria-hidden="true"></i></a></td></tr>');
            });
        },
    })
}
function actualizaCorreo(actuacion_id){
    $.ajax({
        url : 'actuacion/correo/showTable/'+actuacion_id,
        type : 'get',
        dataType: 'json',
        success:function(data)
        {
            $('#tableActuacionCorreo > tbody').empty();
            $.each(data, function(i, item) {
                $('#tableActuacionCorreo > tbody:last-child').append('<tr><td>'+item.correo+'</td><td><a href="#" class="btn btn-xs btn-danger delete-correo" id="'+item.id+'"><i class="fa fa-trash" aria-hidden="true"></i></a></td></tr>');
            });
        }
    })
}
$(function() {
    bs_input_file();
});
$("#modalEdit").on("hidden.bs.modal", function () {
    console.log('CIERRO MODAL');
    actualizaTablas();
});
$('a[data-toggle="tab"]').on('shown.bs.tab', function (e) {
    var tabAUX = $(e.target).attr('href');
    console.log(tabAUX);
    if(tabAUX == "#tab_4" || tabAUX == "#tab_5") tabIndex = tabAUX; else tabIndexModal = tabAUX;
    actualizaTablas();
});
function actualizaTablas(){
    switch(tabIndex){
        case "#tab_4":
            $('#tableMasterPendientes').DataTable().ajax.reload(null, false); //REFRESCAR PARA PINTAR.7
            break;
        case "#tab_5":
            $('#tableMasterFinalizadas').DataTable().ajax.reload(null, false); //REFRESCAR PARA PINTAR.
            break;
    }

}
</script>

@endpush
