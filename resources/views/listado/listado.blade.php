@extends('admin.layout')

@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Espacios 
        <small>Espacios</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="/"><i class="fa fa-dashboard"></i> Inicio</a></li>
        <li class="active">Espacios</li>
    </ol>
</section>
<!-- Main content -->
<section class="content container-fluid">
    <div class="row" style="margin-bottom: 5px;">
            <div class="col-xs-8">
                <a href="#" class="btn btn-success" id="newUbicacion"><b><i class="fa fa-fw fa-plus"></i> Nuevo</b></a>
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
                    <h3 class="box-title">Listado de Espacios</h3>
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
                                <th>Precio</th>
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

$('#id_ubicacion').select2({
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
      "ajax": "/espacio/getdatatable_filtrado/"+data['id'],
      "columns":[
        {data:'id'},
        {data:'name_ubicacion'},
        {data:'floor'},
        {data:'number'},
        {data:'description' },
        {data:'precio'},
        {data:'action', orderable:false, searchable: false},
      ],
      dom: 'Bfrtip',
      buttons: [
          'csv', 'excel', 'pdf'
      ]
    });
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
                {data:'precio'},
                {data:'action', orderable:false, searchable: false},
            ],

            dom: 'Bfrtip',
            buttons: [
                'csv', 'excel', 'pdf'
            ]
        });
    });

    $(document).on('click','#newUbicacion',function(){
        $('#modalEspacioUpdate').modal('show');
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

    $('#btn-add-articulo').click(function() {
        var id_espacio = $(this).attr('value');
        $.ajax({
            type: 'PUT',
            url: 'articulo/actualizaEspacio/'+id_espacio,
            data: $('#formAddArticulo').serialize(),
            success:function(data)
            {
                console.log(data);
                alertify.success('Articulo asignado al espacio correctamente');
                $("#articulo").prop('selectedIndex',0);
                
            },
            error:function(data)
            {
                console.log(data);
                alertify.success('ERROR: No se ha podido asignar el articulo al espacio correctamente');
            }
        })
    });

    $(document).on('click','.modal-add-articulos',function(){
        var id_espacio = $(this).attr('id');
        $.ajax({
            url : 'espacio/'+id_espacio,
            type : 'GET',
            dataType: 'json',
            success:function(data)
            {
                $("#floor_space").attr("value",data.floor);
                $("#number_space").attr("value",data.number);
                $("#description_space").attr("value",data.description);
                $( "#floor_space" ).prop( "disabled", true );
                $( "#number_space" ).prop( "disabled", true );
                $( "#description_space" ).prop( "disabled", true );
            },
            error:function(data)
            {
                console.log(data);
            }
        })

        $('#articulo').select2({
            minimumResultsForSearch: Infinity,
            placeholder: "- Selecciona un articulo -",
            ajax: {
                url: 'articulo/espacio/'+id_espacio,
                type : 'GET',
                processResults: function (data) {
                    return {
                        results: $.map(data, function(obj) {
                            return { id: obj.id, text: obj.name+" ["+obj.description+"] ["+obj.numero_serie+"] " };
                        })
                    };
                }
            }
        });
        
        $('#modalAddArticulo').modal('show');
        $('#btn-add-articulo').css('display','inline');
        $('#btn-add-articulo').attr('value',id_espacio);
    });

    $(document).on('click','.show-articulos-espacios',function(){
        var id_espacio = $(this).attr('id');
        $('#tableArticulosEspacio').DataTable({
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
        "ajax": "articulo/espacio/getdatatable/"+id_espacio,
        "columns":[
            {data:'id'},
            {data:'name'},
            {data:'description'},
            {data:'numero_serie'},
            {data:'precio'},
            {data:'action', orderable:false, searchable: false},
        ],
        dom: 'Bfrtip',
        buttons: [
            'csv', 'excel', 'pdf'
        ]
        });
        $('#modalShowArticulo').modal('show');

    });
    $(document).on('click','.delete-articulo',function(){
        var id_articulo = $(this).attr('id');
        $.ajax({
            type: 'PUT',
            url: 'articulo/desasignarEspacio/'+id_articulo,
            data: {
                "_token": "{{ csrf_token() }}",
                "id": id_articulo
                },
            success:function(data)
            {
                console.log(data);
                alertify.success('Asociación articulo-espacio eliminada correctamente.');
                $('#tableArticulosEspacio').DataTable().ajax.reload(null, false);
            },
            error:function(data)
            {
                console.log(data);
                alertify.error('ERROR: No se ha podido desasignar el articulo del espacio correctamente');
            }
        })
    });  
});

</script>
@endpush
