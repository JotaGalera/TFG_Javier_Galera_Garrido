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
                  <table id="tableEspacio" class="table table-bordered table-hover">
                      <thead>
                          <tr>
                              <th>ID</th>
                              <th>Nombre ubicación</th>
                              <th>Piso</th>
                              <th>Número</th>
                              <th>Descripción</th>
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

  <div class="modal fade" id="modalAddArticulo">
      <form method="PUT" action="" id="formAddArticulo" role="form">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Añadiendo Articulo</h4>
              </div>
              <div class="modal-body">
                  @csrf
                  <div class="modal-body">
                      <div class="box-body">
                          <div class="form-group col-md-6">
                              <label>Piso</label>
                              <div class="input-group">
                                  <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                  <input type="text" class="form-control" placeholder="Piso" name="floor_space" id="floor_space">
                              </div>
                          </div>
                          <div class="form-group col-md-6">
                              <label>Número</label>
                              <div class="input-group">
                                  <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                  <input type="text" class="form-control" placeholder="Numero" name="number_space" id="number_space">
                              </div>
                          </div>
                          <div class="form-group col-md-6">
                              <label>Descripción</label>
                              <div class="input-group">
                                  <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                                  <input type="email" class="form-control" placeholder="Descripcion" name="description_space" id="description_space">
                              </div>
                          </div>
                          <div class="form-group col-md-12">
                              <label>Articulos</label>
                              <div class="input-group">
                                  <span class="input-group-addon"><i class="fa fa-tasks"></i></span>
                                  <select class="form-control select2" multiple="multiple" id="articulo" name="articulo[]" style="width:100%">

                                  </select>
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


  <!-- /.row -->
  <!-- /.row -->


</section>
<!-- /.content -->
@stop
@push('scripts')
<script>

$select2MultiPermisos = $('#articulo').select2({
    placeholder: "Selecciona uno o varios permisos",
    allowClear: true
});

$(document).ready(function() {
  $(function () {
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
        "ajax": "/espacio/getdatatableall",
        "columns":[
            {data:'id'},
            {data:'name_ubicacion'},
            {data:'floor'},
            {data:'number'},
            {data:'description' },
            {data:'action', orderable:false, searchable: false},
        ],

        dom: 'Bfrtip',
        buttons: [
            'csv', 'excel', 'pdf'
        ]
      });
  });

  $(document).on('click','.add-articulos',function(){
    var id_espacio = $(this).attr('id');
    

    $('#artículo').select2({
      minimumResultsForSearch: Infinity,
      placeholder: " - Busca y selecciona una ubicación - ",
      ajax: {
          url: 'articulo/listado/'+id_espacio,
          processResults: function (data) {
            return {
              results: $.map(data, function(obj) {
                  return { id: obj.id, text: obj.name };
              })
            };
          }
      }
    });
    $('#modalAddArticulo').modal('show');
  });

});

</script>
@endpush
