@extends('admin.layout')

@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Reservas
        <small>Reservas</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="/"><i class="fa fa-dashboard"></i> Inicio</a></li>
        <li class="active">Reservas</li>
    </ol>
</section>
<!-- Main content -->
<section class="content container-fluid">
    <div class="row" style="margin-bottom: 5px;">
        <div class="col-xs-8">
            <a href="#" class="btn btn-success" id="newAlquiler"><b><i class="fa fa-fw fa-plus"></i> Nuevo</b></a>
        </div>
        
        <div class="clearfix"></div>
    </div>
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Listado de Reservas</h3>
                </div>
                <div class="box-body">
                    <table id="tableAlquiler" class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>Fecha</th>
                                <th>Nombre de la ubicación</th>
                                <th>Nombre del espacio</th>
                                <th>Nota</th>
                                <th>Acción</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>

  <!--  MODAL ALQUILER NEW-->
    <div class="modal fade" id="modalAlquiler">
        <form method="PUT" action="" id="formAlquiler" role="form">
            <div class="modal-dialog" style="width:70%">
                <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Reservando</h4>
                </div>
                <div class="modal-body">
                    @csrf
                    <div class="modal-body">
                        <div class="box-body">
                            <div class="form-group col-md-3">
                                <label>Fecha</label>
                                <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                    <input type="text" class="form-control datepicker" placeholder="Fecha" name="fecha_alquiler" id="fecha_alquiler">
                                </div>
                            </div>
                            <div class="form-group col-md-5">
                                <label>Ubicación</label>
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-building"></i></span>
                                    <select  class="form-control select2" placeholder="Ubicacion" name="ubicacion_mod" id="ubicacion_mod" style="width:100%;"></select>
                                </div>
                            </div>
                            <div class="form-group col-md-3">
                                <label>Espacio</label>
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-road"></i></span>
                                    <select  class="form-control select2" placeholder="Espacio" name="espacio_mod" id="espacio_mod" style="width:100%;"></select>
                                </div>
                            </div>
                            <div class="form-group col-md-12">
                                <label>Notas</label>
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-road"></i></span>
                                    <input  class="form-control select2" placeholder="Notas" name="notas_mod" id="notas_mod" style="width:100%;"></select>
                                </div>
                            </div>
                            <div class="form-group col-md-12">
                                <label>Artículos</label>
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-tasks"></i></span>
                                    <select class="form-control select2" name="articulo[]" id="articulo" multiple="multiple" style="width:100%;"></select>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="hidden" name="id" id="id">
                    <button type="button" class="btn btn-primary pull-left" id="btn-new" style="display: none">Añadir y Cerrar</button>
                    <button type="button" class="btn btn-primary pull-left" id="btn-update" style="display: none">Guardar y Cerrar</button>
                    <button type="button" class="btn btn-secondary pull-left" data-dismiss="modal">Cerrar</button>
                </div>
            </div>
        </form>
    </div>
</section>
<!-- /.content -->
@stop
@push('scripts')
<script>


$('.datepicker').datepicker({
    todayBtn: "linked",
    language: "es",
    autoclose: true,
    todayHighlight: true,
    format: 'dd/mm/yyyy'
})

$('#newAlquiler').click(function(){
    $("#formAlquiler")[0].reset();
    $('#btn-update').css('display','none');
    $('#btn-new').css('display','inline');
    $('.modal-title').text('Creando reserva');
    $('#modalAlquiler').modal('show');
});

$(document).on('click','.generate-bill',function(){
    var id = $(this).attr("id");
    $.ajax({
        url : 'alquiler/generarfactura/'+id,
        type : 'get',
        dataType: 'json',
        success:function(data)
        {
            alertify.success('Generando.');
            console.log("hola");
        }
    })
});

$(document).on('click','.delete-alquiler',function(){
    var id_alquiler = $(this).attr('id');
    $.ajax({
        type: 'DELETE',
        url: 'alquiler/'+id_alquiler,
        data: {
            "_token": "{{ csrf_token() }}",
            "id": id_alquiler
            },
        success:function(data)
        {
            alertify.success('Alquiler cancelado correctamente.');
            $('#tableAlquiler').DataTable().ajax.reload(null, false);
        },
        error:function(data)
        {
            alertify.error('ERROR: No se ha podido cancelar la reserva.');
        }
    })
});

$(document).ready(function() {
  $('#tableAlquiler').DataTable({
    "paging": true,
    "lengthChange": false,
    "searching": true,
    "ordering": true,
    "info": true,
    "autoWidth": false,
    "processing" : true,
    "serverSide": true,
    "scrollX": true,
    "ajax": "alquiler/getdatatable/",
    "columns":[
      {data:'fecha_alquiler'},
      {data:'ubicacion'},
      {data:'espacio'},
      {data:'nota' },
      {data:'action', orderable:false, searchable: false},
    ],
    dom: 'Bfrtip',
    buttons: [
        'csv', 'excel', 'pdf'
    ]
  });
});

$('#btn-new').click(function(){
    $.ajax({
        url : 'alquiler',
        type : 'POST',
        data: $("#formAlquiler").serialize(),
        success:function(data)
        {
            alertify.success('Reserva realizada con éxito.');
            $('#tableAlquiler').DataTable().ajax.reload(null, false);
            $('#modalAlquiler').modal('hide');
        },
        error:function(data)
        {
            console.log(data);
        }
    })
});

$('.datepicker').on('change', function(e) {
    $("#ubicacion_mod").val(null).trigger("change");
    $("#espacio_mod").val(null).trigger("change");
    $("#articulo").val(null).trigger("change");
})

$('#ubicacion_mod').select2({
    minimumResultsForSearch: Infinity,
    placeholder: " - Busca y selecciona una ubicación - ",
    ajax: {
        url: '/ubicacion/all',
        processResults: function (data) {
          return {
            results: $.map(data, function(obj) {
                return { id: obj.id, text: obj.name };
            })
          };

        }
    }
}).on('change', function (e) {
    $("#espacio_mod").val(null).trigger("change");
    $("#articulo").val(null).trigger("change");
})

$('#espacio_mod').select2({
    placeholder: " - Busca y selecciona un espacio - ",
    ajax: {
        data: function (params) {
            return {
                q: $.trim(params.term)
            };
        },
        url: function () {
            return '/espacio/getespacioubicaciondisponible/'+$('#ubicacion_mod').val()+'/'+ transformDate($('#fecha_alquiler').val(),'/');
        },
        processResults: function (data) {
            return {
                results: $.map(data, function(obj) {
                    return { id: obj.id, text: obj.description + " Piso:" + obj.floor +" Nº:" + obj.number };
                })
            };
        }
    }
}).on('chage' , function (e) {
    $("#articulo").val(null).trigger("change");
});

$('#articulo').select2({
    placeholder: " - Busca y seleccione los productos - ",
    ajax: {
        data: function (params) {
            return {
                q: $.trim(params.term)
            };
        },
        url: function () {
            return '/alquiler/articulos/espacio&ubicacion/'+$('#espacio_mod').val()+'/'+ transformDate($('#fecha_alquiler').val(),'/');
        },
        processResults: function (data) {
            return {
                results: $.map(data, function(obj) {
                    return { id: obj.id, text: obj.name + " " + obj.description };
                })
            };
        }
    }
});

function transformDate(date,separador) {
   var arrayDate = date.split(separador)
   var arrayReturn = ""

   for (var i=0; i < arrayDate.length; i++) {
        arrayReturn += arrayDate[i]
      if (i < arrayDate.length - 1){
        arrayReturn += "-"
      } 
   }
   return arrayReturn
};
</script>
@endpush
