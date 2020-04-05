@extends('admin.layout')


@section('content')
<meta name="csrf-token" content="{{ csrf_token() }}">
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Incidiencias
        <small>Incidencia</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="/"><i class="fa fa-dashboard"></i> Incidencias</a></li>
        <li class="active">Incidencia</li>
    </ol>
</section>
<!-- Main content -->
<section class="content container-fluid">
    <div class="row">
        <div class="col-xs-12">
            <div class="nav-tabs-custom">
                <ul class="nav nav-tabs">
                    <li class="active" id="tab1"><a href="#tab_1" data-toggle="tab" aria-expanded="false">Incidencia</a></li>
                    <li id="tab2"><a href="#tab_2" data-toggle="tab" aria-expanded="true">Estados</a></li>
                    <li id="tab3"><a href="#tab_3" data-toggle="tab" aria-expanded="true">Documentos</a></li>
                    <li id="tab4"><a href="#tab_4" data-toggle="tab" aria-expanded="true">Actuaciones</a></li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane active" id="tab_1">
                        <div class="box-body">
                             <div class="alert alert-warning alert-dismissible" style="display: none" id="capaError">
                                <span id="labelError"></span>
                             </div>
                             <form method="PUT" action="" id="formEdit" role="form">
                                <input type="hidden" name="id" id="id" value="{{ $id }}">
                                @csrf
                                <div class="form-group col-md-6">
                                    <label>Cliente</label>
                                    <select class="form-control select2 editable" id="cliente_id" name="cliente_id" style="width:100%"  ></select>
                                </div>
                                <div class="form-group col-md-6">
                                    <label>Ubicación</label>
                                    <select class="form-control select2 editable" id="ubicacion_id" name="ubicacion_id" style="width:100%" ></select>
                                </div>
                                <div class="form-group col-md-4">
                                    <label>Sistema</label>
                                    <select class="form-control select2 editable" id="sistema_id" name="sistema_id" style="width:100%"  ></select  >
                                </div>
                                <div class="form-group col-md-4">
                                    <label>Prioridad</label>
                                    <select class="form-control select2 editable" id="incidencia_prioridad_id" name="incidencia_prioridad_id" style="width:100%" ></select>
                                </div>
                                <div class="form-group col-md-4">
                                    <label>Tipo</label>
                                    <select class="form-control select2 editable" id="incidencia_tipo_id" name="incidencia_tipo_id" style="width:100%" ></select>
                                </div>
                                <div class="form-group col-md-12">
                                    <label>Título</label>
                                    <input type="text" class="form-control editable" placeholder="Título" name="titulo" id="titulo" >
                                </div>
                                <div class="form-group col-md-6" id="description">
                                    <label>Descripción</label>
                                    <textarea class="form-control editable" placeholder="Descripción" name="descripcion" id="descripcion"  style="height: 150px;" ></textarea>
                                </div>
                                <div class="form-group col-md-6" id="observation">
                                    <label>Observaciones</label>
                                    <textarea class="form-control editable" placeholder="Observaciones" name="observaciones" id="observaciones" style="height: 150px;" ></textarea>
                                </div>
                                <div class="form-group col-md-4">
                                    <label>Método de comunicación</label>
                                    <select class="form-control select2 editable" id="incidencia_metodo_comunicacion_id" name="incidencia_metodo_comunicacion_id" style="width:100%" ></select>
                                </div>
                                <div class="form-group col-md-4">
                                    <label>Comunicada Por</label>
                                    <input type="text" class="form-control editable" placeholder="Comunicada Por" name="comunicada_por" id="comunicada_por" >
                                </div>
                                <div class="form-group col-md-4">
                                    <label>Fecha</label>
                                    <input type="text" class="form-control datepicker editable" placeholder="Fecha" name="fecha" id="fecha" >
                                </div>

                                <div class="form-group col-md-12">
                                    <button type="button" class="btn btn-success pull-right" id="btn-update"><i class="fa fa-floppy-o"></i>&nbsp;&nbsp;  Guardar Incidencia</button>
                                </div>
                            </form>
                            <div class="clearfix"></div>
                        </div>
                    </div>
                    <div class="tab-pane" id="tab_2">
                        <div class="box-body">
                             <div class="form-group col-md-12">
                                <table id="tableIncidenciaEstado" class="table table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>Estado</th>
                                            <th>Fecha</th>
                                            <th>Usuario</th>
                                            <th>Descripción</th>
                                            <th>#</th>
                                        </tr>
                                    </thead>
                                    <tbody></tbody>
                                </table>
                            </div>

                        <form class="soloAdmin" method="PUT" action="" id="formEditEstado" role="form">
                            @csrf
                            <input type="hidden" name="incidencia_id" id="estado_incidencia_id" value="{{ $id }}">
                            <div class="form-group col-md-5">
                                <label>Estado</label>
                                <select class="form-control select2" id="incidencia_estado_id" name="estado_id" style="width:100%"></select>
                            </div>
                            <div class="form-group col-md-5">
                                <label>Descripción</label>
                                <input type="text" class="form-control" placeholder="Descripción" name="estado" id="incidencia_estado">
                            </div>
                            <div class="form-group col-md-2">
                                <label>&nbsp;</label>
                                <button type="button" class="form-control btn btn-primary pull-left" id="btn-new-estado"><i class="fa fa-plus"></i></button>
                            </div>
                        </form>
                        </div>
                    </div>
                    <div class="tab-pane" id="tab_3">
                        <div class="box-body">
                            <div class="form-group col-md-12">
                                <table id="tableIncidenciaDocumento" class="table table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>Recurso</th>
                                            <th>Descripción</th>
                                            <th>#</th>
                                        </tr>
                                    </thead>
                                    <tbody></tbody>
                                </table>
                            </div>
                            <form  class="soloAdmin" method="PUT" action="" id="formEditIncidenciaDocumento" role="form" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="incidencia_id" id="incidencia_id_documento" value="{{ $id }}">
                                <div class="form-group col-md-4">
                                    <label>Descripción</label>
                                    <input type="text" class="form-control" placeholder="Descripcion" name="descripcion" id="incidencia_descripcion_documento" required="required">
                                </div>
                                <div class="form-group col-md-4">
                                    <label>Fichero</label>
                                    <div class="input-group input-file" name="incidencia_nombre_recurso_documento">
                                        <span class="input-group-btn">
                                            <button class="btn btn-default btn-choose" type="button"><i class="fa fa-search"></i> Examinar</button>
                                        </span>
                                        <input type="text" class="form-control" placeholder='Selecciona un fichero...' />
                                    </div>
                                </div>
                                <div class="form-group col-md-1">
                                    <label>&nbsp;</label>
                                    <button type="button" class="form-control btn btn-primary pull-left" id="btn-new-incidenciaDocumento"><i class="fa fa-plus"></i></button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="tab-pane" id="tab_4">
                        <div class="box-body">
                            <table id="tableMaster" class="table table-bordered table-hover" style="margin-top: -150px;">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Nombre</th>
                                        <th>Fecha</th>
                                        <th>Inicio</th>
                                        <th>Fin</th>
                                        <th>Presencial</th>
                                        <th>Estado</th>
                                        <th>Cerrada</th>
                                        <th>#</th>
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
                            <div class="alert alert-warning alert-dismissible" style="display: none" id="capaErrorActuacion">
                                <span id="labelErrorActuacion"></span>
                            </div>
                            <div class="nav-tabs-custom">
                                <ul class="nav nav-tabs">
                                    <li class="active" id="tab5"><a href="#tab_5" data-toggle="tab" aria-expanded="false">Actuación</a></li>
                                    <li id="tab6"><a href="#tab_6" data-toggle="tab" aria-expanded="true">Personal</a></li>
                                    <li id="tab7"><a href="#tab_7" data-toggle="tab" aria-expanded="true">Documentos</a></li>
                                </ul>
                                <div class="tab-content">
                                    <div class="tab-pane active" id="tab_5">
                                        <div class="box-body">
                                            <form method="PUT" action="" id="formEditActuacion" role="form">
                                                <input type="hidden" name="id" id="actuacion_id">
                                                <input type="hidden" name="incidencia_id" id="actuacion_incidencia_id" value="{{ $id }}">
                                                @csrf
                                                <div class="form-group col-md-4">

                                                    <label>Cliente</label>
                                                    <select class="form-control" id="actuacion_cliente_id" name="cliente_id" style="width:100%" readonly="readonly">

                                                    </select>
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label>Ubicación</label>
                                                    <select class="form-control" id="actuacion_ubicacion_id" name="ubicacion_id" style="width:100%" readonly="readonly">

                                                    </select>
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label>Sistema</label>
                                                    <select class="form-control" id="actuacion_sistema_id" name="sistema_id" style="width:100%" readonly="readonly">

                                                    </select>
                                                </div>
                                                <div class="form-group col-md-12">
                                                    <label>Nombre</label>
                                                    <input type="text" class="form-control" placeholder="Nombre" name="nombre" id="actuacion_nombre">
                                                </div>
                                                <div class="form-group col-md-3">
                                                    <label>Fecha</label>
                                                    <input type="text" class="form-control datepicker" placeholder="Fecha" name="fecha" id="actuacion_fecha">
                                                </div>
                                                <div class="form-group col-md-3">
                                                    <label>Hora Inicio</label>
                                                    <input type="text" class="form-control" placeholder="HH:MM" name="hora_ini" id="actuacion_hora_ini">
                                                </div>
                                                <div class="form-group col-md-3">
                                                    <label>Hora Fin</label>
                                                    <input type="text" class="form-control" placeholder="HH:MM" name="hora_fin" id="actuacion_hora_fin">
                                                </div>
                                                <div class="form-group col-md-3">
                                                    <label>Tiempo Estimado</label>
                                                    <input type="text" class="form-control" placeholder="HH:MM" name="tiempo_estimado" id="actuacion_tiempo_estimado">
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label>Descripción</label>
                                                    <textarea class="form-control" placeholder="Descripción" name="descripcion" id="actuacion_descripcion" style="height: 150px;"></textarea>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label>Observaciones</label>
                                                    <textarea class="form-control" placeholder="Observaciones" name="observaciones" id="actuacion_observaciones" style="height: 150px;"></textarea>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label>Estado</label>
                                                    <select class="form-control select2" id="actuacion_actuacion_tipo_estado_id" name="actuacion_tipo_estado_id" style="width:100%"></select>
                                                </div>
                                                <div class="form-group col-md-2">
                                                    <label>Firmado por</label>
                                                    <input type="text" class="form-control" placeholder="Firmado Por" name="firmada_por" id="actuacion_firmada_por">
                                                </div>
                                                <div class="form-group col-md-2">
                                                    <label>Desplazamientos</label>
                                                    <input type="text" class="form-control" placeholder="Número Desplazamientos" name="n_desplazamientos" id="actuacion_n_desplazamientos">
                                                </div>
                                                <div class="form-group col-md-2">
                                                    <label>Km</label>
                                                    <input type="text" class="form-control" placeholder="Km" name="km" id="actuacion_km">
                                                </div>
                                                <div class="form-group col-md-3">
                                                    <label>Presencial</label>
                                                    <div class="checkbox icheck">
                                                        <label>
                                                            <input type="checkbox" name="presencial" id="actuacion_presencial">
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="form-group col-md-3">
                                                    <label>Cerrada</label>
                                                    <div class="checkbox icheck">
                                                        <label>
                                                            <input type="checkbox" name="cerrada" id="actuacion_cerrada">
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="form-group col-md-3">
                                                    <label>Latitud GPS</label>
                                                    <input type="text" class="form-control" placeholder="Latitud" name="latitud_gps" id="actuacion_latitud_gps">
                                                </div>
                                                <div class="form-group col-md-3">
                                                    <label>Longitud GPS</label>
                                                    <input type="text" class="form-control" placeholder="Longitud" name="longitud_gps" id="actuacion_longitud_gps">
                                                </div>
                                                <div class="form-group col-md-12">
                                                    <hr />
                                                </div>
                                                <div class="form-group col-md-12">
                                                    <button type="button" class="btn btn-success pull-left" id="actuacion-btn-new" style="display: none"><i class="fa fa-floppy-o"></i>&nbsp;&nbsp;  Añadir y Cerrar</button>
                                                    <button type="button" class="btn btn-success pull-left" id="actuacion-btn-update" style="display: none"><i class="fa fa-floppy-o"></i>&nbsp;&nbsp;  Guardar y Cerrar</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                    <div class="tab-pane" id="tab_6">
                                        <div class="box-body">
                                            <div class="form-group col-md-12">
                                                <table id="tableUser" class="table table-bordered table-hover">
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
                                                <input type="hidden" name="actuacion_id" id="actuacion_actuacion_id_user">
                                                <div class="form-group col-md-5">
                                                    <label>Usuario</label>
                                                    <select class="form-control select2" id="actuacion_user_id_user" name="user_id" style="width:100%"></select>
                                                </div>
                                                <div class="form-group col-md-2">
                                                    <label>Firmado</label>
                                                    <select class="form-control" id="actuacion_firma_user" name="firma">
                                                        <option value="0">NO</option>
                                                        <option value="1">SI</option>
                                                    </select>
                                                </div>
                                                <div class="form-group col-md-2">
                                                    <label>Reservada</label>
                                                    <select class="form-control" id="actuacion_reservada_user" name="reservada">
                                                        <option value="0">NO</option>
                                                        <option value="1">SI</option>
                                                    </select>
                                                </div>
                                                <div class="form-group col-md-2">
                                                    <label>Preasignada</label>
                                                    <select class="form-control" id="actuacion_preasignacion_user" name="preasignacion">
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
                                    <div class="tab-pane" id="tab_7">
                                        <div class="box-body">
                                            <div class="form-group col-md-12">
                                                <table id="tableActuacionDocumento" class="table table-bordered table-hover">
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
                                                <input type="hidden" name="actuacion_id" id="actuacion_actuacion_id_documento">
                                                <div class="form-group col-md-4">
                                                    <label>Descripción</label>
                                                    <input type="text" class="form-control" placeholder="Descripcion" name="descripcion" id="actuacion_descripcion_documento" required="required">
                                                </div>
                                                <div class="form-group col-md-3">
                                                    <label>Tipo</label>
                                                    <select class="form-control" id="actuacion_tipo" name="tipo">
                                                        <option value="0">Documento</option>
                                                        <option value="1">Firma</option>
                                                    </select>
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label>Fichero</label>
                                                    <div class="input-group input-file" name="actuacion_nombre_recurso_documento">
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
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
    </div>
{{--     {{ dd($incidenciaOBJ) }} --}}
    <!-- /.modal-dialog -->
</section>
@stop

@push('scripts')
<script>

var idIncidencia = $("#id").val();
var idActuacion;


$(document).ready(function(){
  var a = 0;
  $.ajax({
    url: '/incidencia/user',
    type: 'get',
    dataType: 'json',
    success: function(data)
    {

      $.each(data['roles'],function (index,id){ //determinar si eres admin para ver el campo Observaciones
        if(id['id'] == '5' )
          a = 1;
      });
      console.log(a);
    },
    complete: function(data)
    {
      if(a != 1){
        $(".editable").prop("disabled","true");
        $("#btn-update").css("display","none");
        $('#observation').css("display","none");
        $('#description').addClass('form-group col-md-12')
        $('#description').removeClass('form-group col-md-6')
        $('.soloAdmin').css('display','none');
        $('#new').css('display','none');
      }
    }
  })
});

$('#tableIncidenciaEstado').dataTable({
      "paging": true,
      "lengthChange": false,
      "searching": true,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "processing" : true,
      "serverSide": true,
      "scrollX": true,
      "ajax": "/incidencia/estado/getdatatable/"+idIncidencia,
      "deferLoading": 0,
      "columns":[
          {data:'estado'},
          {data:'fecha'},
          {data:'user'},
          {data:'descripcion'},
          {data:'action'},
      ],
      "order": [[ 1, "desc" ]],
      dom: 'Bfrtip',
      buttons: [
          'csv', 'excel', 'pdf'
      ]
});

$('#tableIncidenciaDocumento').dataTable({
    "paging": true,
    "lengthChange": false,
    "searching": true,
    "ordering": true,
    "info": true,
    "autoWidth": false,
    "processing" : true,
    "serverSide": true,
    "scrollX": true,
    "ajax": "/incidencia/documento/getdatatable/"+{{$id}},
    "deferLoading": 0,
    "columns":[
        {data:'recurso'},
        {data:'descripcion'},
        {data:'action'}
    ],
    "order": [[ 1, "desc" ]],
    dom: 'Bfrtip',
    buttons: [
        'csv', 'excel', 'pdf'
    ]
});
$('#tableMaster').dataTable({
    "paging": true,
    "lengthChange": false,
    "searching": true,
    "ordering": true,
    "info": true,
    "autoWidth": false,
    "processing" : true,
    "serverSide": true,
    "scrollX": true,
    "ajax": "/incidencia/actuacion/getdatatable/"+idIncidencia,
    "deferLoading": 0,
    "columns":[
        {data:'nombre'},
        {data:'sistema'},
        {data:'fecha'},
        {data:'hora_ini'},
        {data:'hora_fin'},

        {data:'presencial'},
        {data:'estado'},
        {data:'cerrada'},
        {data:'action', orderable:false, searchable: false},
    ],
    "order": [[ 1, "desc" ]],
    dom: '<"toolbar">Bfrtip',
    buttons: [
        'csv', 'excel', 'pdf'
    ]
});
$("div.toolbar").html('<a href="#" class="btn btn-success" id="new" style="margin-bottom:-50px;"><b><i class="fa fa-fw fa-plus"></i> Nuevo</b></a>');

$.ajax({
    url : '/incidencia/usuario/'+idIncidencia,
    type : 'get',
    dataType: 'json',
    success:function(data)
    {
        //console.log(data);

        $('#id').val(idIncidencia);
        $('#titulo').val(data.titulo);
        $('#descripcion').val(data.descripcion);
        $('#observaciones').val(data.observaciones);
        $('#comunicada_por').val(data.comunicada_por);
        $('#fecha').val(data.fecha);

        var newOption = new Option(data.sistema.cliente_ubicacion.cliente.nombre, data.sistema.cliente_ubicacion.cliente.id, false, false);
        $('#cliente_id').append(newOption).trigger('change');
        $('#cliente_id').val(data.sistema.cliente_ubicacion.cliente.id).trigger('change');

        var newOption = new Option(data.sistema.cliente_ubicacion.nombre, data.sistema.cliente_ubicacion.id, false, false);
        $('#ubicacion_id').append(newOption).trigger('change');
        $('#ubicacion_id').val(data.sistema.cliente_ubicacion.id).trigger('change');

        var newOption = new Option(data.sistema.descripcion, data.sistema.id, false, false);
        $('#sistema_id').append(newOption).trigger('change');
        $('#sistema_id').val(data.sistema.id).trigger('change');

        var newOption = new Option(data.incidencia_prioridad.nombre, data.incidencia_prioridad.id, false, false);
        $('#incidencia_prioridad_id').append(newOption).trigger('change');
        $('#incidencia_prioridad_id').val(data.incidencia_prioridad.id).trigger('change');

        var newOption = new Option(data.incidencia_metodo_comunicacion.nombre, data.incidencia_metodo_comunicacion.id, false, false);
        $('#incidencia_metodo_comunicacion_id').append(newOption).trigger('change');
        $('#incidencia_metodo_comunicacion_id').val(data.incidencia_metodo_comunicacion.id).trigger('change');

        var newOption = new Option(data.incidencia_tipo.nombre, data.incidencia_tipo.id, false, false);
        $('#incidencia_tipo_id').append(newOption).trigger('change');
        $('#incidencia_tipo_id').val(data.incidencia_tipo.id).trigger('change');

        if(data.fecha != null) $('#fecha').datepicker("setDate", data.fecha.split("-").reverse().join("/"));

    },
    error: function (data) {
        console.log(data);
    }
})

$('#actuacion_presencial').iCheck({
    checkboxClass: 'icheckbox_square-blue',
    radioClass: 'iradio_square-blue',
    increaseArea: '20%' /* optional */
});
$('#actuacion_cerrada').iCheck({
    checkboxClass: 'icheckbox_square-blue',
    radioClass: 'iradio_square-blue',
    increaseArea: '20%' /* optional */
});
//Date picker
$('.datepicker').datepicker({
    todayBtn: "linked",
    language: "es",
    autoclose: true,
    todayHighlight: true,
    format: 'dd/mm/yyyy'
})
$('#cliente_id').select2({
    placeholder: " - Busca y selecciona un proyecto - ",
    ajax: {
        url: '/cliente/all',
        processResults: function (data) {
          return {
            results: $.map(data, function(obj) {
                return { id: obj.id, text: obj.nombre };
            })
          };

        }
    }
}).on('change', function (e) {
    $("#ubicacion_id").val(null).trigger("change");
    $("#sistema_id").val(null).trigger("change");
})
$('#ubicacion_id').select2({
    placeholder: " - Busca y selecciona una ubicación - ",
    ajax: {
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
    placeholder: " - Busca y selecciona un sistema - ",
    ajax: {
        url: function () {
            console.log($('#cliente_id').val());
            return '/clienteUbicacion/sistemas/'+$('#ubicacion_id').val();
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
$('#incidencia_prioridad_id').select2({
    placeholder: " - Busca y selecciona una prioridad - ",
    ajax: {
        url: '/incidencia/prioridad',
        processResults: function (data) {
          return {
            results: $.map(data, function(obj) {
                return { id: obj.id, text: obj.nombre };
            })
          };
        }
    }
});
$('#incidencia_metodo_comunicacion_id').select2({
    placeholder: " - Busca y selecciona un metodo de comunicación - ",
    ajax: {
        url: '/incidencia/metodo_comunicacion',
        processResults: function (data) {
          return {
            results: $.map(data, function(obj) {
                return { id: obj.id, text: obj.nombre };
            })
          };
        }
    }
});
$('#incidencia_tipo_id').select2({
    placeholder: " - Busca y selecciona un tipo - ",
    ajax: {
        url: '/incidencia/tipo',
        processResults: function (data) {
          return {
            results: $.map(data, function(obj) {
                return { id: obj.id, text: obj.nombre };
            })
          };
        }
    }
});
$('#actuacion_user_id_user').select2({
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
$("#btn-update").click(function(){
    var id = $(this).attr("id");

    $.ajax({
        url : '/incidencia/'+id,
        type : 'PUT',
        data: $("#formEdit").serialize(),
        success:function(data)
        {
            $("#capaError").css('display','none');
            $("#labelError").html('');
            alertify.success(data.success);
            $('#tableMaster').DataTable().ajax.reload(null, false);
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
$('#actuacion_actuacion_tipo_estado_id').select2({
    placeholder: " - Busca y selecciona un tipo de estado - ",
    ajax: {
        url: '/actuacion/tipo_estado/all',
        processResults: function (data) {
          return {
            results: $.map(data, function(obj) {
                return { id: obj.id, text: obj.nombre };
            })
          };
        }
    }
});
$('#incidencia_estado_id').select2({
    placeholder: " - Busca y selecciona un sistema - ",
    ajax: {
        url: function () {
            return '/incidencia/tipo_estado/all';
        },
        processResults: function (data) {
            return {
                results: $.map(data, function(obj) {
                    return { id: obj.id, text: obj.nombre };
                })
            };
        }
    }
});
/********************************************
*********** MODULO DE ACTUACIONES ***********
*********************************************/

$("div.toolbar").html('<a href="#" class="btn btn-success" id="new" style="margin-bottom:-50px;"><b><i class="fa fa-fw fa-plus"></i> Nuevo</b></a>');

//EVENTOS ACTUACIÓN
$("#actuacion-btn-new").click(function(){
    var id = $(this).attr("id");
    $.ajax({
        url : '/actuacion',
        type : 'POST',
        data: $("#formEditActuacion").serialize(),
        success:function(data)
        {
            console.log(data);
            $("#capaErrorActuacion").css('display','none');
            $("#labelErrorActuacion").html('');
            alertify.success(data.success);
            $('#tableMaster').DataTable().ajax.reload(null, false);
            $('#modalEdit').modal('hide');
            $("#formEditActuacion")[0].reset();
        },
        error: function (data) {
            console.log(data);
            $("#capaErrorActuacion").css('display','block');
            $("#labelErrorActuacion").html('');
            var errors = $.parseJSON(data.responseText);
            $.each(errors.errors, function (key, value) {
                $("#labelErrorActuacion").append( value + '<br />' );
            });
            alertify.error('Ha ocurrido un error, revise los campos del formulario');
        }
    })
});
$("#actuacion-btn-update").click(function(){
    var id = $(this).attr("id");
    $.ajax({
        url : '/actuacion/'+id,
        type : 'PUT',
        data: $("#formEditActuacion").serialize(),
        success:function(data)
        {
            console.log(data);
            $("#capaErrorActuacion").css('display','none');
            $("#labelErrorActuacion").html('');
            alertify.success(data.success);
            $('#tableMaster').DataTable().ajax.reload(null, false);
            $('#modalEdit').modal('hide');
            $("#formEditActuacion")[0].reset();
        },
        error: function (data) {
            console.log(data);
            $("#capaErrorActuacion").css('display','block');
            $("#labelErrorActuacion").html('');
            var errors = $.parseJSON(data.responseText);
            $.each(errors.errors, function (key, value) {
                $("#labelErrorActuacion").append( value + '<br />' );
            });
            alertify.error('Ha ocurrido un error, revise los campos del formulario');
        }
    })
});
$('#actuacion_actuacion_tipo_estado_id').select2({
    minimumResultsForSearch: -1,
    placeholder: " - Busca y selecciona un tipo de estado - ",
    ajax: {
        url: '/actuacion/estado/tipo/all',
        processResults: function (data) {
          return {
            results: $.map(data, function(obj) {
                return { id: obj.id, text: obj.nombre };
            })
          };
        }
    }
});
$("#new").click(function(){
    disableTab();
    $('#presencial').iCheck('uncheck');
    $('#cerrada').iCheck('uncheck');
    $('.nav-tabs a[href="#tab_5"]').tab('show');
    $("#formEditActuacion")[0].reset();
    $('#actuacion-btn-update').css('display','none');
    $('#actuacion-btn-new').css('display','inline');
    $('#modalEdit').modal('show');
});

$("#tab4").click(function(){
    var idIncidencia={{$id}};
    console.log(idIncidencia);
    $.ajax({
        url : '/incidencia/'+idIncidencia,
        type : 'get',
        dataType: 'json',
        success:function(data)
        {
            console.log(data);

            var newOption = new Option(data.sistema.cliente_ubicacion.cliente.nombre, data.sistema.cliente_ubicacion.cliente.id, false, false);
            $('#actuacion_cliente_id').append(newOption).trigger('change');
            $('#actuacion_cliente_id').val(data.sistema.cliente_ubicacion.cliente.id).trigger('change');

            var newOption2 = new Option(data.sistema.cliente_ubicacion.nombre, data.sistema.cliente_ubicacion.id, false, false);
            $('#actuacion_ubicacion_id').append(newOption2).trigger('change');
            $('#actuacion_ubicacion_id').val(data.sistema.cliente_ubicacion.id).trigger('change');

            var newOption3 = new Option(data.sistema.descripcion, data.sistema.id, false, false);
            $('#actuacion_sistema_id').append(newOption3).trigger('change');
            $('#actuacion_sistema_id').val(data.sistema.id).trigger('change');


        },
        error: function (data) {
            console.log(data);
        }

      })
});
$(document).on('click', '.edit', function(){
    enableTab();
    idActuacion = $(this).attr("id");
    $.ajax({
        url : '/actuacion/'+idActuacion,
        type : 'get',
        dataType: 'json',
        success:function(data)
        {
            console.log(data);
            actualizaUser(idActuacion);
            actualizaDocumento(idActuacion);

            $('#actuacion_actuacion_id_user').val(idActuacion);
            $('#actuacion_actuacion_id_documento').val(idActuacion);
            $('#actuacion_id').val(idActuacion);
            $('#actuacion_nombre').val(data.nombre);
            $('#actuacion_descripcion').val(data.descripcion);
            $('#actuacion_observaciones').val(data.observaciones);
            $('#actuacion_firmada_por').val(data.firmada_por);
            $('#actuacion_latitud_gps').val(data.latitud_gps);
            $('#actuacion_longitud_gps').val(data.longitud_gps);

            if(data.fecha != null) $('#actuacion_fecha').datepicker("setDate", data.fecha.split("-").reverse().join("/"));

            $('#actuacion_hora_ini').val(data.hora_ini);
            $('#actuacion_hora_fin').val(data.hora_fin);
            $('#actuacion_tiempo_estimado').val(data.tiempo_estimado);

            if(data.presencial == "1") $('#actuacion_presencial').iCheck('check'); else $('#actuacion_presencial').iCheck('uncheck');
            if(data.cerrada == "1") $('#actuacion_cerrada').iCheck('check'); else $('#actuacion_cerrada').iCheck('uncheck');

            $('#actuacion_estado').val(data.estado);
            $('#actuacion_n_desplazamientos').val(data.n_desplazamientos);
            $('#actuacion_km').val(data.km);

            $('#actuacion_actuacion_tipo_estado_id').empty();
            var newOption = new Option(data.actuacion_tipo_estado.nombre, data.actuacion_tipo_estado.id, false, false);
            $('#actuacion_actuacion_tipo_estado_id').append(newOption).trigger('change');
            $('#actuacion_actuacion_tipo_estado_id').val(data.actuacion_tipo_estado.id).trigger('change');

            $('#modalEdit').modal('show');
            $('#actuacion-btn-update').css('display','inline');
            $('#actuacion-btn-new').css('display','none');
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
                url : '/actuacion/'+idActuacion,
                type : 'DELETE',
                data: $("#formEditActuacion").serialize(),
                success:function(data)
                {
                    $('#tableMaster').DataTable().ajax.reload(null, false);
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
        url : '/actuacion/user',
        type : 'POST',
        data: $("#formEditPersonal").serialize(),
        success:function(data)
        {
            console.log(data);
            $("#capaErrorActuacion").css('display','none');
            $("#labelErrorActuacion").html('');
            btnThis.removeAttr("disabled");
            actualizaUser(idActuacion);
            alertify.success(data.success);
            $("#formEditPersonal")[0].reset();
        },
        error: function (data) {
            console.log(data);
            $("#capaErrorActuacion").css('display','block');
            $("#labelErrorActuacion").html('');
            var errors = $.parseJSON(data.responseText);
            $.each(errors.errors, function (key, value) {
                $("#labelErrorActuacion").append( value + '<br />' );
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
                url : '/actuacion/user/'+idActuacionUser,
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

//EVENTOS DOCUMENTO ACTUACION
$("#btn-new-actuacionDocumento").click(function(){
    var btnThis = $(this).attr("disabled", "disabled");
    var form_data = new FormData();
    form_data.append( 'nombre_recurso', $('#actuacion_nombre_recurso_documento').prop('files')[0] );
    form_data.append( 'descripcion', $('#actuacion_descripcion_documento').val() );
    form_data.append( 'actuacion_id', $('#actuacion_actuacion_id_documento').val() );
    form_data.append( 'tipo', $('#actuacion_tipo').val() );
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
            $("#capaErrorActuacion").css('display','none');
            $("#labelErrorActuacion").html('');
            btnThis.removeAttr("disabled");
            actualizaDocumento(idActuacion);
            alertify.success(data.success);
            $("#formEditActuacionDocumento")[0].reset();
        },
        error: function (data) {
            console.log(data);
            $("#capaErrorActuacion").css('display','block');
            $("#labelErrorActuacion").html('');
            var errors = $.parseJSON(data.responseText);
            $.each(errors.errors, function (key, value) {
                $("#labelErrorActuacion").append( value + '<br />' );
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
                data: $("#formEditActuacion").serialize(),
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

//EVENTOS DOCUMENTO INCIDENCIA
$("#btn-new-incidenciaDocumento").click(function(){
    var btnThis = $(this).attr("disabled", "disabled");
    var form_data = new FormData();
    form_data.append( 'nombre_recurso', $('#incidencia_nombre_recurso_documento').prop('files')[0] );
    form_data.append( 'descripcion', $('#incidencia_descripcion_documento').val() );
    form_data.append( 'incidencia_id', $('#incidencia_id_documento').val() );
    $.ajax({
        url : '/incidencia/documento',
        type : 'POST',
        data: form_data,
        processData: false,
        contentType: false,
        headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
        success:function(data)
        {
            console.log(data);
            $("#capaErrorIncidencia").css('display','none');
            $("#labelErrorIncidencia").html('');
            btnThis.removeAttr("disabled");
            actualizaDocumentoIncidencia({{$id}});
            alertify.success(data.success);
            $("#formEditIncidenciaDocumento")[0].reset();
        },
        error: function (data) {
            console.log(data);
            $("#capaErrorIncidencia").css('display','block');
            $("#labelErrorIncidencia").html('');
            var errors = $.parseJSON(data.responseText);
            $.each(errors.errors, function (key, value) {
                $("#labelErrorIncidencia").append( value + '<br />' );
            });
            btnThis.removeAttr("disabled");
            alertify.error('Ha ocurrido un error, revise los campos del formulario');
        }
    })
});
$(document).on('click', '.delete-incidenciaDocumento', function(){
    var idIncidenciaDocumento = $(this).attr("id");
    alertify.confirm('¿Desea eliminar el documento?', 'Esta acción no puede deshacerse',
        function(){
            $.ajax({
                url : '/incidencia/documento/'+idIncidenciaDocumento,
                type : 'DELETE',
                data: $("#formEditIncidenciaDocumento").serialize(),
                success:function(data)
                {
                    actualizaDocumentoIncidencia({{$id}});
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

//EVENTOS ESTADOS
$("#btn-new-estado").click(function(){
    var btnThis = $(this).attr("disabled", "disabled");
    $.ajax({
        url : '/incidencia/estado',
        type : 'POST',
        data: $("#formEditEstado").serialize(),
        success:function(data)
        {

            $("#capaErrorActuacion").css('display','none');
            $("#labelErrorActuacion").html('');
            btnThis.removeAttr("disabled");
            actualizaEstado(idIncidencia);
            alertify.success(data.success);
            $("#formEditPersonal")[0].reset();
        },
        error: function (data) {

            $("#capaErrorActuacion").css('display','block');
            $("#labelErrorActuacion").html('');
            var errors = $.parseJSON(data.responseText);
            $.each(errors.errors, function (key, value) {
                $("#labelErrorActuacion").append( value + '<br />' );
            });
            btnThis.removeAttr("disabled");
            alertify.error('Ha ocurrido un error, revise los campos del formulario');
        }
    })
});
$(document).on('click', '.delete-incidenciaEstado', function(){
    var idDocumento = $(this).attr("id");
    alertify.confirm('¿Desea eliminar el estado?', 'Esta acción no puede deshacerse',
        function(){
            $.ajax({
                url : '/incidencia/estado/'+idDocumento,
                type : 'DELETE',
                data: $("#formEditEstado").serialize(),
                success:function(data)
                {
                    actualizaEstado({{$id}});
                    alertify.success('Estado eliminado correctamente');
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
$(document).on('click', '.delete-user', function(){
    var idActuacionUser = $(this).attr("id");
    alertify.confirm('¿Desea eliminar el user?', 'Esta acción no puede deshacerse',
        function(){
            $.ajax({
                url : '/actuacion/user/'+idActuacionUser,
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
    $("#tab6").hide();
    $("#tab7").hide();
}
function enableTab(){
    $("#tab6").show();
    $("#tab7").show();
}
function actualizaUser(actuacion_id){
    $.ajax({
        url : '/actuacion/user/showTable/'+actuacion_id,
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
            $('#tableActuacionDocumento > tbody').empty();
            $.each(data, function(i, item) {
                $('#tableActuacionDocumento > tbody:last-child').append('<tr><td><a href="storage/actuacion_documento/'+item.ruta_recurso+'" target="_blank">'+item.nombre_recurso+'</a></td><td>'+item.descripcion+'</td><td>'+item.descripcion+'</td><td><a href="#" class="btn btn-xs btn-danger delete-actuacionDocumento" id="'+item.id+'"><i class="fa fa-trash" aria-hidden="true"></i></a></td></tr>');
            });
        }
    })
}
function actualizaDocumentoIncidencia(incidencia_id){
    $.ajax({
        url : '/incidencia/documento/showTable/'+incidencia_id,
        type : 'get',
        dataType: 'json',
        success:function(data)
        {
            $('#tableIncidenciaDocumento > tbody').empty();
            $.each(data, function(i, item) {
                $('#tableIncidenciaDocumento > tbody:last-child').append('<tr><td><a href="/storage/incidencia_documento/'+item.ruta_recurso+'" target="_blank">'+item.nombre_recurso+'</a></td><td>'+item.descripcion+'</td><td><a href="#" class="btn btn-xs btn-danger delete-incidenciaDocumento" id="'+item.id+'"><i class="fa fa-trash" aria-hidden="true"></i></a></td></tr>');
            });
        }
    })
}
function actualizaEstado(incidencia_id){
    $.ajax({
        url : '/incidencia/estado/showTable/'+incidencia_id,
        type : 'get',
        dataType: 'json',
        success:function(data)
        {
            $('#tableIncidenciaEstado > tbody').empty();
            $.each(data, function(i, item) {
                $('#tableIncidenciaEstado > tbody:last-child').append('<tr><td>'+item.estado_id+'</td><td>'+item.fecha+'</td><td>'+item.user_id+'</td><td>'+item.estado+'</td><td><a href="#" class="btn btn-xs btn-danger delete-incidenciaEstado" id="'+item.id+'"><i class="fa fa-trash" aria-hidden="true"></i></a></td></tr>');
            });
        }
    })
}
$(function() {
    bs_input_file();
});

$('a[data-toggle="tab"]').on('shown.bs.tab', function (e) {
    actualizaTabActiva($(e.target).attr("href"));
});
$('a[data-toggle="tab"]').on('shown.bs.tab', function (e) {
     actualizaTabActiva($(e.target).attr("href"));
});
function actualizaTabActiva(tab){
    switch(tab){
        case '#tab_2':
            tabActiva = '#tab_2';
            $('#tableIncidenciaEstado').DataTable().ajax.reload(null, false); //REFRESCAR PARA PINTAR.
            break;
        case '#tab_3':
            tabActiva = '#tab_3';
            $('#tableIncidenciaDocumento').DataTable().ajax.reload(null, false); //REFRESCAR PARA PINTAR.
            break;
        case '#tab_4':
            tabActiva = '#tab_4';
            $('#tableMaster').DataTable().ajax.reload(null, false); //REFRESCAR PARA PINTAR.
            break;
    }
}
</script>
@endpush
