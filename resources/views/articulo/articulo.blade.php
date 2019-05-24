@extends('admin.layout')

@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Articulos
        <small>Articulo</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="/"><i class="fa fa-dashboard"></i> Inicio</a></li>
        <li class="active">Articulos</li>
    </ol>
</section>
<!-- Main content -->
<section class="content container-fluid">
  <div class="row" style="margin-bottom: 5px;">
      <div class="col-xs-8">
          <a href="#" class="btn btn-success" id="newArticulo"><b><i class="fa fa-fw fa-plus"></i> Nuevo</b></a>
      </div>
      <div class="form-group col-xs-4 pull-right">
        <div class="form-group">
          <div style="padding-right: 10px;">
            <select id="ubicacion" class="form-control select2" name="state"></select>
          </div>
        </div>
      </div>
      <div class="clearfix"></div>
  </div>
  <div class="row">
      <div class="col-xs-12">
          <div class="box">
              <div class="box-header">
                  <h3 class="box-title">Listado de Articulos por Ubicación</h3>
              </div>
              <!-- /.box-header -->
              <div class="box-body">
                  <table id="tableArticulo" class="table table-bordered table-hover">
                      <thead>
                          <tr>
                              <th>ID</th>
                              <th>Nombre Ubicación</th>
                              <th>Espacio asocidado:Piso y Nº</th>
                              <th>Número de Serie</th>
                              <th>Descripción</th>
                              <th>Ubicación</th>
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

  <!--  MODAL ARTICULO NEW-->
  <div class="modal fade" id="modalArticulo">
      <form method="PUT" action="" id="formArticulo" role="form">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Añadiendo un artículo</h4>
              </div>
              <div class="modal-body">
                  @csrf
                  <div class="modal-body">
                      <div class="box-body">
                          <div class="form-group col-md-6">
                              <label>Ubicación</label>
                              <div class="input-group">
                                  <span class="input-group-addon"><i class="fa fa-building"></i></span>
                                  <select  class="form-control select2" placeholder="Ubicacion" name="ubicacion_mod" id="ubicacion_mod" style="width:100%;"></select>
                              </div>
                          </div>

                          <div class="form-group col-md-6">
                              <label>Número de serie</label>
                              <div class="input-group">
                                  <span class="input-group-addon"><i class="fa fa-road"></i></span>
                                  <input type="number" class="form-control" placeholder="Número de serie" name="numero_serie" id="numero_serie">
                              </div>
                          </div>
                          <div class="form-group col-md-6">
                              <label>Nombre del artículo</label>
                              <div class="input-group">
                                  <span class="input-group-addon"><i class="fa fa-list-ol"></i></span>
                                  <input type="text" class="form-control" placeholder="Nombre del articulo" name="name" id="name">
                              </div>
                          </div>
                          <div class="form-group col-md-6">
                              <label>Descripción del artículo</label>
                              <div class="input-group">
                                  <span class="input-group-addon"><i class="fa fa-list-ol"></i></span>
                                  <input type="text" class="form-control" placeholder="Descripción" name="description" id="description">
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
              <div class="modal-footer">
                  <input type="hidden" name="id" id="id">
                  <input type="hidden" name="id_ubicacion" id="id_ubicacion">
                  <button type="button" class="btn btn-primary pull-left" id="btn-new" style="display: none">Añadir y Cerrar</button>
                  <button type="button" class="btn btn-primary pull-left" id="btn-update" style="display: none">Guardar y Cerrar</button>
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
$(document).ready(function() {

  $('#tableArticulo').DataTable({
    "paging": true,
    "lengthChange": false,
    "searching": true,
    "ordering": true,
    "info": true,
    "autoWidth": false,
    "processing" : true,
    "serverSide": true,
    "scrollX": true,
    "ajax": "/articulo/getdatatable",
    "columns":[
      {data:'id'},
      {data:'nombre_ubicacion'},
      {data:'floor'},
      {data:'numero_serie'},
      {data:'name'},
      {data:'description' },
      {data:'action', orderable:false, searchable: false},
    ],

    dom: 'Bfrtip',
    buttons: [
        'csv', 'excel', 'pdf'
    ]
  });


  $('#ubicacion').select2({
    minimumResultsForSearch: Infinity,
    placeholder: " - Busca y selecciona una ubicación - ",
    ajax: {
        url: '/ubicacion/getubicacionesuser/',
        processResults: function (data) {
          return {
            results: $.map(data, function(obj) {
                return { id: obj.id, text: obj.name };
            })
          };

        }
    }
  });

  $('#ubicacion').on('select2:select',function(e){
    var data = e.params.data;
    var newOption = new Option(data.text, data.id, false, false);
    $('#ubicacion_mod').append(newOption).trigger('change');
    $('#ubicacion_mod').val(data.id).trigger('change');
    $('#tableArticulo').DataTable({
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
      "ajax": "/articulo/ubicacion/"+data['id'],
      "columns":[
        {data:'id'},
        {data:'nombre_ubicacion'},
        {data:'floor'},
        {data:'numero_serie'},
        {data:'name'},
        {data:'description' },
        {data:'action', orderable:false, searchable: false},
      ],
      dom: 'Bfrtip',
      buttons: [
          'csv', 'excel', 'pdf'
      ]
    });
  });

  /////EVENTOS DE ARTICULOS

  $('#newArticulo').click(function(){
    $("#formArticulo")[0].reset();
    $('#btn-update').css('display','none');
    $('#btn-new').css('display','inline');
    $('.modal-title').text('Añadir nuevo artículo');
    $('#modalArticulo').modal('show');
  });

  $('#ubicacion_mod').select2({
    minimumResultsForSearch: Infinity,
    placeholder: " - Busca y selecciona una ubicación - ",
    ajax: {
        url: '/ubicacion/getubicacionesuser/',
        processResults: function (data) {
          return {
            results: $.map(data, function(obj) {
                return { id: obj.id, text: obj.name };
            })
          };
        }
    }
  });

  $('#btn-new').click(function(){
    $.ajax({
        url : 'articulo',
        type : 'POST',
        data: $("#formArticulo").serialize(),
        success:function(data)
        {
            alertify.success('Articulo insertado con éxito');
            $('#tableArticulo').DataTable().ajax.reload(null, false);
            $('#modalArticulo').modal('hide');
        },
        error:function(data)
        {
            console.log(data);
        }
    })
  });

  $(document).on('click', '.edit', function(){
    var id = $(this).attr("id");
    $.ajax({
        url : 'articulo/'+id,
        type : 'get',
        dataType: 'json',
        success:function(data)
        {
          console.log(data);
          var newOption = new Option(data.ubicacion.name, data.ubicacion.id, false, false);
          $('#ubicacion_mod').append(newOption).trigger('change');
          $('#ubicacion_mod').val(data.ubicacion.id).trigger('change');

          $('#numero_serie').val(data.numero_serie);
          $('#name').val(data.name);
          $('#id').val(id);
          $('#description').val(data.description);

          $('#modalArticulo').modal('show');
          $('#btn-update').css('display','inline');
          $('#btn-new').css('display','none');
          $('#action').val('Editar');
          $('.modal-title').text('Editar artículo');

        }
    })
  });

  $("#btn-update").click(function(){
    var id = $(this).attr("id");
    $.ajax({
        url : 'articulo/'+id,
        type : 'PUT',
        data: $("#formArticulo").serialize(),
        success:function(data)
        {
            alertify.success('Ubicación modificada con éxito');
            $('#tableArticulo').DataTable().ajax.reload(null, false);
            $('#modalArticulo').modal('hide');
        },
        error:function(data)
        {
            console.log(data);
        }
    })
  });

  $(document).on('click', '.delete', function(){
    var id = $(this).attr("id");
    alertify.confirm('¿Desea eliminar a este articulo?', 'Esta acción no puede deshacerse',
        function(){
            $.ajax({
                url : 'articulo/'+id,
                type : 'DELETE',
                data: $("#formArticulo").serialize(),
                success:function(data)
                {
                    $('#tableArticulo').DataTable().ajax.reload(null, false);
                    alertify.success('Ubicación eliminada correctamente');
                }
            })
        },
        function(){
            alertify.error('Acción cancelada')
        }
    );
  });



});
</script>
@endpush
