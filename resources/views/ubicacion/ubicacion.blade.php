@extends('admin.layout')

@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Ubicación
        <small>Ubicaciones</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="/"><i class="fa fa-dashboard"></i> Inicio</a></li>
        <li class="active">Ubicacion</li>
    </ol>
</section>
<!-- Main content -->
<section class="content container-fluid">
  <div class="row" style="margin-bottom: 5px;">
      <div class="col-xs-12">
          <a href="#" class="btn btn-success" id="newUbicacion"><b><i class="fa fa-fw fa-plus"></i> Nuevo</b></a>
      </div>
      <div class="clearfix"></div>
  </div>
  <div class="row">
      <div class="col-xs-12">
          <div class="box">
              <div class="box-header">
                  <h3 class="box-title">Listado de Ubicaciones</h3>
              </div>
              <!-- /.box-header -->
              <div class="box-body">
                  <table id="tableUbicacion" class="table table-bordered table-hover">
                      <thead>
                          <tr>
                              <th>ID</th>
                              <th>Nombre</th>
                              <th>Dirección</th>
                              <th>Número</th>
                              <th>C.P</th>
                              <th>Acción</th>
                          </tr>
                      </thead>
                  </table>
              </div>
              <!-- /.box-body -->
          </div>
          <!-- /.box -->
      </div>
      <!-- /.col -->
  </div>
  <!-- /.row -->
  <!-- /.row -->

  <!-- MODAL SECCION EDIT UBICACION -->
  <div class="modal fade" id="modalEdit">
      <form method="PUT" action="" id="formEdit" role="form">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title-edit-ubicacion">Editar ubicación</h4>
              </div>
              <div class="modal-body">
                  @csrf
                  <div class="modal-body">
                      <div class="box-body">
                          <div class="form-group col-md-6">
                              <label>Nombre de la Ubicación</label>
                              <div class="input-group">
                                  <span class="input-group-addon"><i class="fa fa-building"></i></span>
                                  <input  type="text" class="form-control" placeholder="Nombre de ubicación" name="name" id="name" required>
                              </div>
                          </div>
                          <div class="form-group col-md-6">
                              <label>Dirección</label>
                              <div class="input-group">
                                  <span class="input-group-addon"><i class="fa fa-road"></i></span>
                                  <input type="text" class="form-control" placeholder="Dirección" name="address" id="address">
                              </div>
                          </div>
                          <div class="form-group col-md-6">
                              <label>Número</label>
                              <div class="input-group">
                                  <span class="input-group-addon"><i class="fa fa-list-ol"></i></span>
                                  <input type="number" class="form-control" placeholder="Número" name="number" id="number">
                              </div>
                          </div>
                          <div class="form-group col-md-6">
                              <label>Codigo Postal</label>
                              <div class="input-group">
                                  <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                                  <input type="number" class="form-control" placeholder="Código Postal " name="cp" id="cp">
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
          <!-- /.modal-content -->
        </div>
      </form>
  </div>

<!--  MODAL SECCION ESPACIOS -->
  <div class="modal" id="modalEspacio" >
          <div class="modal-dialog" >
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title-space"></h4>
              </div>

              <div class="modal-body">
                <div class="row" style="margin-bottom: 5px;">
                    <div class="col-xs-12">
                        <a href="#" class="btn btn-success newSpace" id="newSpace"><b><i class="fa fa-fw fa-plus"></i> Nuevo</b></a>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <table id="tableEspacio" class="table table-bordered table-hover" >
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Piso</th>
                            <th>Número</th>
                            <th>Descripción</th>
                            <th>Acción</th>
                        </tr>
                    </thead>
                </table>
             </div>
          </div>
          <!-- /.modal-content -->
        </div>

  </div>

  <!--  MODAL SECCION UPDATE ESPACIOS-->
  <div class="modal fade" id="modalEspacioUpdate">
      <form method="PUT" action="" id="formEspacio" role="form">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title-space-edit">Editar espacio</h4>
              </div>
              <div class="modal-body">
                  @csrf
                  <div class="modal-body">
                      <div class="box-body">
                          <div class="form-group col-md-6">
                              <label>Piso</label>
                              <div class="input-group">
                                  <span class="input-group-addon"><i class="fa fa-building"></i></span>
                                  <input type="number" class="form-control" placeholder="Piso" name="floor_space" id="floor_space">
                              </div>
                          </div>
                          <div class="form-group col-md-6">
                              <label>Número</label>
                              <div class="input-group">
                                  <span class="input-group-addon"><i class="fa fa-road"></i></span>
                                  <input type="number" class="form-control" placeholder="Número" name="number_space" id="number_space">
                              </div>
                          </div>
                          <div class="form-group col-md-6">
                              <label>Descripción</label>
                              <div class="input-group">
                                  <span class="input-group-addon"><i class="fa fa-list-ol"></i></span>
                                  <input type="text" class="form-control" placeholder="Descripción" name="description_space" id="description_space">
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
              <div class="modal-footer">
                  <input type="hidden" name="id" id="id">
                  <input type="hidden" name="id_ubicacion" id="id_ubicacion">
                  <button type="button" class="btn btn-primary pull-left" id="btn-new-space" style="display: none">Añadir y Cerrar</button>
                  <button type="button" class="btn btn-primary pull-left" id="btn-update-space" style="display: none">Guardar y Cerrar</button>
                  <button type="button" class="btn btn-secondary pull-left" data-dismiss="modal">Cerrar</button>
              </div>
          </div>
          <!-- /.modal-content -->
        </div>
      </form>
  </div>
</section>
<!-- /.content -->
@stop
@push('scripts')
<script>

$(function () {
    $('#tableUbicacion').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": true,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "processing" : true,
      "serverSide": true,
      "scrollX": true,
      "ajax": "/ubicacion/getdatatable",
      "columns":[
          {data:'id'},
          {data:'name'},
          {data:'address'},
          {data:'number'},
          {data:'codigo_postal' },
          {data:'action', orderable:false, searchable: false},
      ],

      dom: 'Bfrtip',
      buttons: [
          'csv', 'excel', 'pdf'
      ]
    });
});

$("#newUbicacion").click(function(){
    $("#formEdit")[0].reset();
    $('#btn-update').css('display','none');
    $('#btn-new').css('display','inline');
    $('#role').val(null).trigger('change');
    $('#modalEdit').modal('show');
});

$("#btn-new").click(function(){
    var id = $(this).attr("id");
    $.ajax({
        url : 'ubicacion',
        type : 'POST',
        data: $("#formEdit").serialize(),
        success:function(data)
        {
            alertify.success('Ubicación insertada con éxito');
            $('#tableUbicacion').DataTable().ajax.reload(null, false);
            $('#modalEdit').modal('hide');
        },
        error:function(data)
        {

            console.log(data);
        }
    })
});

/**** BOTONES MODAL EDIT ****/
$(document).on('click', '.edit', function(){
    var id = $(this).attr("id");
    $.ajax({
        url : 'ubicacion/'+id,
        type : 'get',
        dataType: 'json',
        success:function(data)
        {
            console.log(data);
            $('#name').val(data.name);
            $('#address').val(data.address);
            $('#id').val(id);
            $('#number').val(data.number);
            $('#cp').val(data.codigo_postal);

            $('#modalEdit').modal('show');
            $('#btn-update').css('display','inline');
            $('#btn-new').css('display','none');
            $('#action').val('Editar');
            $('.modal-title').text('Editar ubicación');
        }
    })
});

$("#btn-update").click(function(){
    var id = $(this).attr("id");
    $.ajax({
        url : 'ubicacion/'+id,
        type : 'PUT',
        data: $("#formEdit").serialize(),
        success:function(data)
        {
            alertify.success('Ubicación modificada con éxito');
            $('#tableUbicacion').DataTable().ajax.reload(null, false);
            $('#modalEdit').modal('hide');
        },
        error:function(data)
        {
            console.log(data);
        }
    })
});

$(document).on('click', '.delete', function(){
  id = $(this).attr("id");
  alertify.confirm('¿Desea eliminar a esta ubicació?', 'Esta acción no puede deshacerse',
      function(){
          $.ajax({
              url : 'ubicacion/'+id,
              type : 'DELETE',
              data: $("#formEdit").serialize(),
              success:function(data)
              {
                  $('#tableUbicacion').DataTable().ajax.reload(null, false);
                  alertify.success('Ubicación eliminada correctamente');
              }
          })
      },
      function(){
          alertify.error('Acción cancelada')
      }
  );
});

//****BOTONES MODAL ESPACIO ***//
$(document).on('click', '.newSpace', function(){
    var id = $(this).attr("id");
    $('#modalEspacioUpdate').modal('show');
    $('.modal-title-space-edit').text('Añadiendo un espacio al sistema '+id);

    $("#formEspacio")[0].reset();
    $('#btn-update-space').css('display','none');
    $('#btn-new-space').css('display','inline');
    $('#id_ubicacion').val(id);
});

$("#btn-new-space").click(function(){
    $.ajax({
        url : 'espacio',
        type : 'POST',
        data: $("#formEspacio").serialize(),
        success:function(data)
        {
            console.log(data);
            alertify.success('Espacio AÑADIDO con éxito');
            $('#tableEspacio').DataTable().ajax.reload(null, false);
            $('#modalEspacioUpdate').modal('hide');
        },
        error:function(data)
        {
            console.log(data);
        }
    })
});

$(document).on('click', '.space', function(){
    var id = $(this).attr("id");
    $('.newSpace').attr('id',id);
    $('#modalEspacio').modal('show');
    $('.modal-title-space').text('Lista de espacios del sistema '+id);
    $('#tableEspacio').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": true,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "processing" : true,
      "serverSide": true,
      "scrollX": true,
      "destroy": true,
      "ajax": "espacio/getdatatable/"+id,
      "columns":[
          {data:'id'},
          {data:'floor'},
          {data:'number'},
          {data:'description'},
          {data:'action', orderable:false, searchable: false},
      ],

      dom: 'Bfrtip',
      buttons: [
          'csv', 'excel', 'pdf'
      ]
    });

});

$(document).on('click', '.edit-space', function(){
    var id_espacio = $(this).attr("id");
    $.ajax({
        url : 'espacio/'+id_espacio,
        type : 'get',
        dataType: 'json',
        success:function(data)
        {

            $('#floor_space').val(data.floor);
            $('#number_space').val(data.number);
            $('#description_space').val(data.description);
            $('#id').val(data.id);
            $('#id_ubicacion').val(data.ubicacion_id)

            $('#modalEspacioUpdate').modal('show');
            $('#btn-update-space').css('display','inline');
            $('#btn-new-space').css('display','none');
            $('#action').val('Editar');

        }
    })
});

$("#btn-update-space").click(function(){
    id = $('#id').val();
    $.ajax({
        url : 'espacio/'+id,
        type : 'PUT',
        data: $("#formEspacio").serialize(),
        success:function(data)
        {
            console.log(data);
            alertify.success('Espacio modificada con éxito');
            $('#tableEspacio').DataTable().ajax.reload(null, false);
            $('#modalEspacioUpdate').modal('hide');
        },
        error:function(data)
        {
            console.log(data);
        }
    })
});

$(document).on('click', '.delete-espacio', function(){
  id = $(this).attr("id");
  alertify.confirm('¿Desea eliminar a este espacio?', 'Esta acción no puede deshacerse',
      function(){
          $.ajax({
              url : 'espacio/'+id,
              type : 'DELETE',
              data: $("#formEspacio").serialize(),
              success:function(data)
              {
                  $('#tableEspacio').DataTable().ajax.reload(null, false);
                  alertify.success('Ubicación eliminada correctamente');
              }
          })
      },
      function(){
          alertify.error('Acción cancelada')
      }
  );
});


</script>
@endpush
