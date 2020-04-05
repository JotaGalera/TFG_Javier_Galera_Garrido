@extends('admin.layout')


@section('content')
<meta name="csrf-token" content="{{ csrf_token() }}">
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Incidencias
        <small>Listado de Incidencias</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="/"><i class="fa fa-dashboard"></i> Incidencias</a></li>
        <li class="active">Listado de Incidencias</li>
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
                <div class="nav-tabs-custom">
                    <ul class="nav nav-tabs" id="sampleTabs">
                        <li class="active" id="tab0"><a href="#tab_0" data-toggle="tab" aria-expanded="false">Todas</a></li>
                        <li id="tab1"><a href="#tab_1" data-toggle="tab" aria-expanded="true">Registradas</a></li>
                        <li id="tab2"><a href="#tab_2" data-toggle="tab" aria-expanded="true">En Proceso</a></li>
                        <li id="tab3"><a href="#tab_3" data-toggle="tab" aria-expanded="true">Pendientes de Terceros</a></li>
                        <li id="tab4"><a href="#tab_4" data-toggle="tab" aria-expanded="true">Finalizadas</a></li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane active" id="tab_0">
                            <div class="box-body">
                                <table id="tableMasterAll" class="table table-bordered table-hover table-condensed">
                                    <thead>
                                        <tr>
                                            <th>Id</th>
                                            <th>Sistema</th>
                                            <th>Usuario</th>
                                            <th>Prioridad</th>
                                            <th>Metodo</th>
                                            <th>Título</th>
                                            <th>Fecha</th>
                                            <th>Comunicado</th>
                                            <th>Estado</th>
                                            <th>#</th>
                                        </tr>
                                    </thead>
                                </table>
                            </div>
                        </div>
                        <div class="tab-pane" id="tab_1">
                            <div class="box-body">
                                <table id="tableMasterRegistrada" class="table table-bordered table-hover table-condensed">
                                    <thead>
                                        <tr>
                                            <th>Id</th>
                                            <th>Sistema</th>
                                            <th>Usuario</th>
                                            <th>Prioridad</th>
                                            <th>Metodo</th>
                                            <th>Título</th>
                                            <th>Fecha</th>
                                            <th>Comunicado</th>
                                            <th>Estado</th>
                                            <th>#</th>
                                        </tr>
                                    </thead>
                                </table>
                            </div>
                        </div>
                        <div class="tab-pane" id="tab_2">
                            <div class="box-body">
                                <table id="tableMasterProceso" class="table table-bordered table-hover table-condensed">
                                    <thead>
                                        <tr>
                                            <th>Id</th>
                                            <th>Sistema</th>
                                            <th>Usuario</th>
                                            <th>Prioridad</th>
                                            <th>Metodo</th>
                                            <th>Título</th>
                                            <th>Fecha</th>
                                            <th>Comunicado</th>
                                            <th>Estado</th>
                                            <th>#</th>
                                        </tr>
                                    </thead>
                                </table>
                            </div>
                        </div>
                        <div class="tab-pane" id="tab_3">
                            <div class="box-body">
                                <table id="tableMasterTerceros" class="table table-bordered table-hover table-condensed">
                                    <thead>
                                        <tr>
                                            <th>Id</th>
                                            <th>Sistema</th>
                                            <th>Usuario</th>
                                            <th>Prioridad</th>
                                            <th>Metodo</th>
                                            <th>Título</th>
                                            <th>Fecha</th>
                                            <th>Comunicado</th>
                                            <th>Estado</th>
                                            <th>#</th>
                                        </tr>
                                    </thead>
                                </table>
                            </div>
                        </div>
                        <div class="tab-pane" id="tab_4">
                            <div class="box-body">
                                <table id="tableMasterFinalizada" class="table table-bordered table-hover table-condensed">
                                    <thead>
                                        <tr>
                                            <th>Id</th>
                                            <th>Sistema</th>
                                            <th>Usuario</th>
                                            <th>Prioridad</th>
                                            <th>Metodo</th>
                                            <th>Título</th>
                                            <th>Fecha</th>
                                            <th>Comunicado</th>
                                            <th>Estado</th>
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
                  <h4 class="modal-title">Información de la incidencia</h4>
                </div>
                <div class="modal-body">
                    <div class="modal-body">
                        <div class="box-body">
                            <div class="alert alert-warning alert-dismissible" style="display: none" id="capaError">
                                <span id="labelError"></span>
                            </div>
                            <div class="box-body">
                                <form method="PUT" action="" id="formEdit" role="form">
                                    <input type="hidden" name="id" id="id">
                                    @csrf
                                    <div class="form-group col-md-6">
                                        <label>Cliente</label>
                                        <select class="form-control select2" id="cliente_id" name="cliente_id" style="width:100%"></select>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label>Ubicación</label>
                                        <select class="form-control select2" id="ubicacion_id" name="ubicacion_id" style="width:100%"></select>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label>Sistema</label>
                                        <select class="form-control select2" id="sistema_id" name="sistema_id" style="width:100%"></select>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label>Prioridad</label>
                                        <select class="form-control select2" id="incidencia_prioridad_id" name="incidencia_prioridad_id" style="width:100%"></select>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label>Tipo</label>
                                        <select class="form-control select2" id="incidencia_tipo_id" name="incidencia_tipo_id" style="width:100%"></select>
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label>Título</label>
                                        <input type="text" class="form-control" placeholder="Título" name="titulo" id="titulo">
                                    </div>
                                    <div class="form-group col-md-6" id="description">
                                        <label>Descripción</label>
                                        <textarea class="form-control" placeholder="Descripción" name="descripcion" id="descripcion"  style="height: 150px;"></textarea>
                                    </div>
                                    <div class="form-group col-md-6" id="observation">
                                        <label>Observaciones</label>
                                        <textarea class="form-control" placeholder="Observaciones" name="observaciones" id="observaciones" style="height: 150px;"></textarea>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label>Método de comunicación</label>
                                        <select class="form-control select2" id="incidencia_metodo_comunicacion_id" name="incidencia_metodo_comunicacion_id" style="width:100%"></select>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label>Comunicada Por</label>
                                        <input type="text" class="form-control" placeholder="Vigilante: Nombre + 1 ͤ ʳ Apellido" name="comunicada_por" id="comunicada_por">
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label>Fecha</label>
                                        <input readonly type="text" class="form-control" placeholder="Fecha" name="fecha" id="fecha" value="<?php $today=date('d/m/Y');
                                                                                                                                                   echo $today;?>">
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
var idIncidencia;
var tabActiva;
var a=0;
var nombreCliente="";
var idCliente="";
var datalenght=0;
var nombreMetodoComunicacion;
var idMetodoComunicacion;

//Date picker
$('.datepicker').datepicker({
    todayBtn: "linked",
    language: "es",
    autoclose: true,
    todayHighlight: true,
    format: 'dd/mm/yyyy'
})

$(document).ready( function () {
  $.fn.dataTable.moment( 'DD/MM/YYYY' );
} );

$('#tableMasterAll').dataTable({
      "paging": true,
      "lengthChange": false,
      "searching": true,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "processing" : true,
      //"serverSide": true,
      "scrollX": true,
      "ajax": "/incidencia/getdatatable/0",
      "columns":[
          {data:'id'},
          {data:'sistema'},
          {data:'user'},
          {data:'prioridad'},
          {data:'metodo_comunicacion'},
          {data:'titulo'},
          {data:'fecha'},
          {data:'comunicada_por'},
          {data:'estado'},
          {data:'action', orderable:false, searchable: false},
      ],
      "order": [[ 6, "desc" ]],
      dom: 'Bfrtip',
      buttons: [
          'csv', 'excel', 'pdf'
      ]
});

$('#tableMasterRegistrada').dataTable({
    "paging": true,
    "lengthChange": false,
    "searching": true,
    "ordering": true,
    "info": true,
    "autoWidth": false,
    "processing" : true,
    //"serverSide": true,
    "scrollX": true,
    "deferLoading": 0,
    "ajax": "/incidencia/getdatatable/1",
    "columns":[
        {data:'id'},
        {data:'sistema'},
        {data:'user'},
        {data:'prioridad'},
        {data:'metodo_comunicacion'},
        {data:'titulo'},
        {data:'fecha'},
        {data:'comunicada_por'},
        {data:'estado'},
        {data:'action', orderable:false, searchable: false},
    ],
    "order": [[ 6, "desc" ]],
    dom: 'Bfrtip',
    buttons: [
        'csv', 'excel', 'pdf'
    ]
});

$('#tableMasterProceso').dataTable({
    "paging": true,
    "lengthChange": false,
    "searching": true,
    "ordering": true,
    "info": true,
    "autoWidth": false,
    "processing" : true,
    //"serverSide": true,
    "scrollX": true,
    "deferLoading": 0,
    "ajax": "/incidencia/getdatatable/2",
    "columns":[
        {data:'id'},
        {data:'sistema'},
        {data:'user'},
        {data:'prioridad'},
        {data:'metodo_comunicacion'},
        {data:'titulo'},
        {data:'fecha'},
        {data:'comunicada_por'},
        {data:'estado'},
        {data:'action', orderable:false, searchable: false},
    ],
    "order": [[ 6, "desc" ]],
    dom: 'Bfrtip',
    buttons: [
        'csv', 'excel', 'pdf'
    ]
});

$('#tableMasterTerceros').DataTable({
    "paging": true,
    "lengthChange": false,
    "searching": true,
    "ordering": true,
    "info": true,
    "autoWidth": false,
    "processing" : true,
    //"serverSide": true,
    "scrollX": true,
    "deferLoading": 0,
    "ajax": "/incidencia/getdatatable/3",
    "columns":[
        {data:'id'},
        {data:'sistema'},
        {data:'user'},
        {data:'prioridad'},
        {data:'metodo_comunicacion'},
        {data:'titulo'},
        {data:'fecha'},
        {data:'comunicada_por'},
        {data:'estado'},
        {data:'action', orderable:false, searchable: false},
    ],
    "order": [[ 6, "desc" ]],
    dom: 'Bfrtip',
    buttons: [
        'csv', 'excel', 'pdf'
    ]
});

$('#tableMasterFinalizada').DataTable({
    "paging": true,
    "lengthChange": false,
    "searching": true,
    "ordering": true,
    "info": true,
    "autoWidth": false,
    "processing" : true,
    //"serverSide": true,
    "scrollX": true,
    "deferLoading": 0,
    "ajax": "/incidencia/getdatatable/4",
    "columns":[
        {data:'id'},
        {data:'sistema'},
        {data:'user'},
        {data:'prioridad'},
        {data:'metodo_comunicacion'},
        {data:'titulo'},
        {data:'fecha'},
        {data:'comunicada_por'},
        {data:'estado'},
        {data:'action', orderable:false, searchable: false},
    ],
    "order": [[ 6, "desc" ]],
    dom: 'Bfrtip',
    buttons: [
        'csv', 'excel', 'pdf'
    ]
});
$('#cliente_id').select2({
    minimumResultsForSearch: Infinity,
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
    minimumResultsForSearch: Infinity,
    placeholder: " - Busca y selecciona un sistema - ",
    ajax: {
        url: function () {
            console.log('UBICACIONES: '+$('#ubicacion_id').val());
            return '/cliente/sistemas/'+$('#ubicacion_id').val();
        },
        processResults: function (data) {
            console.log(data);
            return {
                results: $.map(data, function(obj) {
                    return { id: obj.id, text: obj.descripcion };
                })
            };
        }
    }
});
$('#incidencia_prioridad_id').select2({
    minimumResultsForSearch: Infinity,
    placeholder: " - Busca y selecciona una prioridad - ",
    ajax: {
        url: 'incidencia/prioridad',
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
    minimumResultsForSearch: Infinity,
    placeholder: " - Busca y selecciona un metodo de comunicación - ",
    ajax: {
        url: 'incidencia/metodo_comunicacion',
        processResults: function (data) {
          return {
            results: $.map(data, function(obj) {
                return { id: obj.id, text: obj.nombre };
            })
          };
        },

    }
});
$('#incidencia_tipo_id').select2({
    minimumResultsForSearch: Infinity,
    placeholder: " - Busca y selecciona un tipo - ",
    ajax: {
        url: 'incidencia/tipo',
        processResults: function (data) {
          return {
            results: $.map(data, function(obj) {
                return {

                  id: obj.id, text: obj.nombre };
            })
          };
        }
    }
});
//EVENTOS INCIDENCIAS
$("#btn-new").click(function(){
    var id = $(this).attr("id");
    $.ajax({
        url : 'incidencia',
        type : 'POST',
        data: $("#formEdit").serialize(),
        success:function(data)
        {
            console.log(data);
            $("#capaError").css('display','none');
            $("#labelError").html('');
            alertify.success(data.success);
            actualizaTabActiva(tabActiva);
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
    var id = $(this).attr("id");
    $.ajax({
        url : '/incidencia/'+id,
        type : 'PUT',
        data: $("#formEdit").serialize(),
        success:function(data)
        {
            console.log(data);
            $("#capaError").css('display','none');
            $("#labelError").html('');
            alertify.success(data.success);
            actualizaTabActiva(tabActiva);
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

    $("#sistema_id").val(null).trigger("change");
    if(datalenght == 1){
      var newOption = new Option(nombreCliente, idCliente, false, false);
      $('#cliente_id').append(newOption).trigger('change');
      $('#cliente_id').val(idCliente).trigger('change');
    }else{
      $("#cliente_id").val(null).trigger("change");
    }
    $("#ubicacion_id").val(null).trigger("change");
    $("#incidencia_prioridad_id").val(null).trigger("change");

    console.log(nombreMetodoComunicacion);
    console.log(idMetodoComunicacion);
    var newOption = new Option(nombreMetodoComunicacion, idMetodoComunicacion, false, false);
    $('#incidencia_metodo_comunicacion_id').append(newOption).trigger('change');
    $('#incidencia_metodo_comunicacion_id').val(idMetodoComunicacion).trigger('change');


    $("#incidencia_tipo_id").val(null).trigger("change");
    $('.nav-tabs a[href="#tab_1"]').tab('show');
    $("#formEdit")[0].reset();
    $('#btn-update').css('display','none');
    $('#btn-new').css('display','inline');
    $('#modalEdit').modal('show');
    if(a != 1){
      $('#observation').css('display','none');
      $('#description').addClass('form-group col-md-12')
      $('#description').removeClass('form-group col-md-6')
    }

});
$(document).ready(function(){
  $.ajax({
    url: 'incidencia/user',
    type: 'get',
    dataType: 'json',
    success: function(data)
    {
      $.each(data['roles'],function (index,id){
        if(id['id'] == '5' )
          a = 1;
      });
    }
  })
});

$(document).ready(function(){
  $.ajax({
    url: 'incidencia/metodo_comunicacion',
    type: 'get',
    dataType: 'json',
    success: function(data)
    {

      $.each(data,function (index,id){ 1
        if(id['id'] == '3' ){
          nombreMetodoComunicacion = id['nombre'];
          idMetodoComunicacion = id['id'];
        }
      });
    }

  })
});

$(document).ready(function(){
  $.ajax({
    url: '/cliente/all',
    type: 'get',
    dataType: 'json',
    success: function(data)
    {
      console.log(data);
      datalengh = 0;
      var index = 0;
      for(i in data){
        datalenght+=1;
      }

      if(datalenght == 1){
        results: $.map(data, function(obj) {
              nombreCliente=obj.nombre;
              idCliente=obj.id;
            })
      }
    }
  })
});

$('#incidencia_metodo_comunicacion_id').select2({
    minimumResultsForSearch: Infinity,
    placeholder: " - Busca y selecciona un metodo de comunicación - ",
    ajax: {
        url: 'incidencia/metodo_comunicacion',
        processResults: function (data) {
          return {
            results: $.map(data, function(obj) {
                return { id: obj.id, text: obj.nombre };
            })
          };
        },

    }
});

$(document).on('click', '.edit', function(){
    idIncidencia = $(this).attr("id");
    $.ajax({
        url : 'incidencia/'+idIncidencia,
        type : 'get',
        dataType: 'json',
        success:function(data)
        {

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

            if(data.incidencia_prioridad_id != null){
                $.ajax({
                    type: 'GET',
                    url: 'incidencia/prioridad/' + data.incidencia_prioridad_id,
                    dataType: 'json'
                }).then(function (data) {
                    var newOption = new Option(data.nombre, data.id, false, false);
                    $('#incidencia_prioridad_id').append(newOption).trigger('change');
                });
            }
            $('#incidencia_prioridad_id').val(data.incidencia_prioridad_id).trigger('change');
            if(data.incidencia_metodo_comunicacion_id != null){
                $.ajax({
                    type: 'GET',
                    url: 'incidencia/metodo_comunicacion/' + data.incidencia_metodo_comunicacion_id,
                    dataType: 'json'
                }).then(function (data) {
                    var newOption = new Option(data.nombre, data.id, false, false);
                    $('#incidencia_metodo_comunicacion_id').append(newOption).trigger('change');
                });
            }
            $('#incidencia_metodo_comunicacion_id').val(data.incidencia_metodo_comunicacion_id).trigger('change');
            if(data.incidencia_tipo_id != null){
                $.ajax({
                    type: 'GET',
                    url: 'incidencia/tipo/' + data.incidencia_tipo_id,
                    dataType: 'json'
                }).then(function (data) {
                    var newOption = new Option(data.nombre, data.id, false, false);
                    $('#incidencia_tipo_id').append(newOption).trigger('change');
                });
            }
            $('#incidencia_tipo_id').val(data.incidencia_tipo_id).trigger('change');
            console.log(data.incidencia_tipo_id);
            if(data.fecha != null) $('#fecha').datepicker("setDate", data.fecha.split("-").reverse().join("/"));
            $('#modalEdit').modal('show');
            $('#btn-update').css('display','inline');
            $('#btn-new').css('display','none');
            $('#action').val('Editar');
            $('.modal-title').text('Editar incidencia');
        },
        error: function (data) {
            console.log(data);
        }

    })
});
$(document).on('click', '.delete', function(){
    idIncidencia = $(this).attr("id");
    alertify.confirm('¿Desea eliminar a esta incidencia?', 'Esta acción no puede deshacerse',
        function(){
            $.ajax({
                url : 'incidencia/'+idIncidencia,
                type : 'DELETE',
                data: $("#formEdit").serialize(),
                success:function(data)
                {
                    actualizaTabActiva(tabActiva);
                    alertify.success('Incidencia eliminada correctamente');
                }
            })
        },
        function(){
            alertify.error('Acción cancelada')
        }
    );
});
$('a[data-toggle="tab"]').on('shown.bs.tab', function (e) {
     actualizaTabActiva($(e.target).attr("href"));
});
function actualizaTabActiva(tab){
    switch(tab){
        case '#tab_0':
            tabActiva = '#tab_0';
            $('#tableMasterAll').DataTable().ajax.reload(null, false); //REFRESCAR PARA PINTAR.
            break;
        case '#tab_1':
            tabActiva = '#tab_1';
            $('#tableMasterRegistrada').DataTable().ajax.reload(null, false); //REFRESCAR PARA PINTAR.
            break;
        case '#tab_2':
            tabActiva = '#tab_2';
            $('#tableMasterProceso').DataTable().ajax.reload(null, false); //REFRESCAR PARA PINTAR.
            break;
        case '#tab_3':
            tabActiva = '#tab_3';
            $('#tableMasterTerceros').DataTable().ajax.reload(null, false); //REFRESCAR PARA PINTAR.
            break;
        case '#tab_4':
            tabActiva = '#tab_4';
            $('#tableMasterFinalizada').DataTable().ajax.reload(null, false); //REFRESCAR PARA PINTAR.
            break;
    }
}
</script>
@endpush
