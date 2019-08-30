@extends('admin.layout')

@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Alquiler 
        <small>Alquiler</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="/"><i class="fa fa-dashboard"></i> Inicio</a></li>
        <li class="active">Alquiler</li>
    </ol>
</section>
<!-- Main content -->
<section class="content container-fluid">
    <div class="row" style="margin-bottom: 5px;">
            
        <div class="clearfix"></div>
    </div>
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Listado de Alquileres</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <table id="tableAlquiler" class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Usuario</th>
                                <th>Espacio</th>
                                <th>Pagado</th>
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

    <!-- MOD ADD ARTICULOS-ESPACIOS -->
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
                                <div>
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
                                </div>
                                <div>
                                    <div class="form-group col-md-12">
                                        <label>Articulos</label>
                                        <div class="input-group">
                                            <span class="input-group-addon"><i class="fa fa-tasks"></i></span>
                                            <select class="form-control select2" multiple="multiple" id="articulo" name="articulo[]" style="width:100%"></select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                
                <div class="modal-footer">
                    <input type="hidden" name="id" id="id">
                    <button type="button" class="btn btn-primary pull-left" id="btn-add-articulo" style="display: none">Añadir y Cerrar</button>
                    <button type="button" class="btn btn-primary pull-left" id="btn-update" style="display: none">Guardar y Cerrar</button>
                    <button type="button" class="btn btn-secondary pull-left" data-dismiss="modal">Cerrar</button>
                </div>
            </div>
            <!-- /.modal-content -->
            </div>
        </form>
    </div>

    <!-- MOD SHOW ARTICULOS-ESPACIOS -->
    <div class="modal" id="modalShowArticulo" >
          <div class="modal-dialog" >
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title-space">Listado de artículos</h4>
              </div>

              <div class="modal-body">
                <table id="tableArticulosEspacio" class="table table-bordered table-hover" >
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nombre</th>
                            <th>Descripción</th>
                            <th>Número de Serie</th>
                            <th>Precio</th>
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
                                    <label>Ubicación</label>
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-building"></i></span>
                                        <select  class="form-control select2" placeholder="Ubicacion" name="id_ubicacion" id="id_ubicacion" style="width:100%;"></select>
                                    </div>
                                </div>
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
                                <div class="form-group col-md-6">
                                    <label>precio</label>
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-list-ol"></i></span>
                                        <input type="number" class="form-control" placeholder="0.0" name="precio_space" id="precio_space">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <input type="hidden" name="id" id="id">
                        <button type="button" class="btn btn-primary pull-left" id="btn-new-space">Añadir y Cerrar</button>
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

$(document).ready(function() {
    $(function () {
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
            "ajax": "/alquiler/getdatatable",
            "columns":[
                {data:'id'},
                {data:'name_user'},
                {data:'name_space'},
                {data:'pagado'},
                {data:'action', orderable:false, searchable: false},
            ],

            dom: 'Bfrtip',
            buttons: [
                'csv', 'excel', 'pdf'
            ]
        });
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
                console.log(data);
                alertify.success('Alquiler cancelado correctamente.');
                $('#tableAlquiler').DataTable().ajax.reload(null, false);
            },
            error:function(data)
            {
                console.log(data);
                alertify.error('ERROR: No se ha podido cancelar la reserva.');
            }
        })
    });  
    
});

</script>
@endpush
