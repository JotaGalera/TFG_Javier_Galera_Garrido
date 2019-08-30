@extends('admin.layout')

@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Tarifas 
        <small>Tarifas</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="/"><i class="fa fa-dashboard"></i> Inicio</a></li>
        <li class="active">Tarifas</li>
    </ol>
</section>
<!-- Main content -->
<section class="content container-fluid">
    <div class="row" style="margin-bottom: 5px;">
            <div class="col-xs-8">
                <a href="#" class="btn btn-success" id="newTarifa"><b><i class="fa fa-fw fa-plus"></i> Nueva Tarifa</b></a>
            </div>
            
        <div class="clearfix"></div>
    </div>
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Listado de Tarifas Aplicables</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <table id="tableTarifa" class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nombre tarifa</th>
                                <th>Descripción</th>
                                <th>Descuento</th>
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

    <!-- MOD ADD-MODIFY TARIFA -->
    <div class="modal fade" id="modalAddTarifa">
        <form method="POST" action="" id="formTarifa" role="form">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title"></h4>
                    </div>
                    <div class="modal-body">
                        @csrf
                        <div class="modal-body">
                            <div class="box-body">
                                <div>
                                    <div class="form-group col-md-6">
                                        <label>Nombre</label>
                                        <div class="input-group">
                                            <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                            <input type="text" class="form-control" placeholder="Nombre" name="name" id="name">
                                        </div>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label>Descripción</label>
                                        <div class="input-group">
                                            <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                            <input type="text" class="form-control" placeholder="Descripción" name="description" id="description">
                                        </div>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label>Descuento</label>
                                        <div class="input-group">
                                            <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                                            <input type="number" class="form-control" placeholder="Descuento, ejemplo: 33" name="descuento" id="descuento">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary pull-left" id="btn-add-tarifa" style="display: none">Añadir y Cerrar</button>
                    <button type="button" class="btn btn-primary pull-left" id="btn-update-tarifa" style="display: none">Guardar y Cerrar</button>
                    <button type="button" class="btn btn-secondary pull-left" data-dismiss="modal">Cerrar</button>
                </div>
            </div>
            <!-- /.modal-content -->
            </div>
        </form>
    </div>

    <!-- MOD ASIGNA TARIFA-USUARIO -->
    <div class="modal fade" id="modalAsignaTarifaUsuario">
        <form method="POST" action="" id="formAsignaTarifaUsuario" role="form">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title"></h4>
                    </div>
                    <div class="modal-body">
                        @csrf
                        <div class="modal-body">
                            <div class="box-body">
                                <div><input style="display:none" type="text" class="form-control" placeholder="Tarifa" name="user_tarifa_id" id="user_tarifa_id"></div>
                                <div class="form-group col-md-6">
                                    <label>Nombre de la tarifa</label>
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-id-card"></i></span>
                                        <input type="text" class="form-control" placeholder="Tarifa" name="user_tarifa" id="user_tarifa">
                                    </div>
                                </div>

                                <div class="form-group col-md-6">
                                    <label>Nombre del usuario</label>
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-tasks"></i></span>
                                        <select class="form-control select2 user_name" multiple="multiple" id="user_name" name="user_name[]" style="width:100%">
                                            
                                        @foreach ($usuarios as $u)
                                            <option value="{{ $u->id }}">{{ $u->name }}</option>
                                        @endforeach
                                        </select>
                                    </div>
                                </div>
                                
                            </div>
                        </div>
                    
                    <!-- TABLA USER-TARIFA -->
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="box">
                                <div class="box-header">
                                    <h3 class="box-title">Listado de usuarios con la tarifa</h3>
                                </div>
                                <!-- /.box-header -->
                                <div class="box-body">
                                    <table id="tableTarifaUser" class="table table-bordered table-hover">
                                        <thead>
                                            <tr>
                                                <th>Nombre de usuario</th>
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
                <!-- END modal body -->
                </div>
                <div class="modal-footer">
                    
                    <button type="button" class="btn btn-primary pull-left" id="btn-update-tarifa-user" style="display: inline">Guardar y Cerrar</button>
                    <button type="button" class="btn btn-secondary pull-left" data-dismiss="modal">Cerrar</button>
                </div>
            </div>
            
        </form>
        <!-- Tabla TARIFA - USER -->
        
            <!-- /.modal-content -->
    </div>
</section>
<!-- /.content -->
@stop
@push('scripts')
<script>

$(document).ready(function() {
    
    $select2UserName = $('#user_name').select2({
        placeholder: "Selecciona uno varios usuarios",
        allowClear: true
    });

    $(function () {
        $('#tableTarifa').DataTable({
            "paging": true,
            "lengthChange": false,
            "searching": true,
            "ordering": true,
            "info": true,
            "autoWidth": false,
            "processing" : true,
            "serverSide": true,
            "scrollX": true,
            "ajax": "/tarifa/getdatatable",
            "columns":[
                {data:'id'},
                {data:'name'},
                {data:'description'},
                {data:'descuento'},
                {data:'action', orderable:false, searchable: false},
            ],

            dom: 'Bfrtip',
            buttons: [
                'csv', 'excel', 'pdf'
            ]
        });
    });

    $(document).on('click','#newTarifa',function(){
        $('#name').val('');
        $('#description').val('');
        $('#descuento').val('');
        $('#modalAddTarifa').modal('show');
        $('.modal-title').text('Añadir tarifa');
        $('#btn-update-tarifa').css('display','none');
        $('#btn-add-tarifa').css('display','inline');
    });

    $(document).on('click','#btn-add-tarifa',function(){
            $.ajax({
            url : 'tarifa',
            type : 'POST',
            data: $("#formTarifa").serialize(),
            success:function(data)
            {
                console.log(data);
                alertify.success(data.success);
                $('#tableTarifa').DataTable().ajax.reload(null, false);
                $('#modalAddTarifa').modal('hide');
            },
            error:function(data)
            {
                alertify.error("El campo NOMBRE y DESCUENTO es obligatorio.");
                
                
            }
        })
    });
    
    $(document).on('click', '.tarifa-user', function(){
        var id = $(this).attr("id");
        $.ajax({
            url : 'tarifa/'+id,
            type : 'get',
            dataType: 'json',
            success:function(data)
            {
                console.log(data);
                $('#user_tarifa').val(data.name);
                $('#user_tarifa_id').val(data.id);

                $('#modalAsignaTarifaUsuario').modal('show');
                $('.modal-title').text('Asignar tarifas y usuarios');

            }
        })
        $('#tableTarifaUser').DataTable().destroy();
        $(function () {
            $('#tableTarifaUser').DataTable({
                "paging": true,
                "lengthChange": false,
                "searching": true,
                "ordering": true,
                "info": true,
                "autoWidth": false,
                "ajax": "/user/getdatatabletarifauser/"+id,
                "columns":[
                    {data:'name'},
                    {data:'action', orderable:false, searchable: false},
                ],

                dom: 'Bfrtip',
                buttons: [
                    'csv', 'excel', 'pdf'
                ]
            });
        });


        $('#modalAsignaTarifaUsuario').modal('show');
        $('.modal-title').text('Asignar tarifas y usuarios');
    });
    
    $(document).on('click','#btn-update-tarifa-user',function(){
        var id_tarifa = $('.tarifa-user').attr("id");
             
        $.ajax({
            url : 'user/asignatarifa',
            type : 'PUT',
            data: $("#formAsignaTarifaUsuario").serialize(),
            success:function(data)
            {
                //console.log(data);
                alertify.success(data.success);
                $('#tableTarifaUser').DataTable().ajax.reload(null, false);
                $('#user_name').val(null);
                refreshSinTarifa();
                
                
            },
            error:function(data)
            {
                alertify.error("El campo NOMBRE y DESCUENTO es obligatorio.");
                
            }
        })
    });

    $(document).on('click','.delete-user-tarifa',function(){
        var id = $(this).attr("id");
        $.ajax({
            url : 'user/desasignatarifa/'+id,
            type : 'PUT',
            data: $("#formAsignaTarifaUsuario").serialize(),
            success:function(data)
            {
                alertify.success(data.success);
                $('#tableTarifaUser').DataTable().ajax.reload(null, false);
                refreshSinTarifa();
            },
        })
    });

    $(document).on('click','.edit',function(){
        var id = $(this).attr("id");
        $.ajax({
            url : 'tarifa/'+id,
            type : 'get',
            dataType: 'json',
            success:function(data)
            {
                console.log(data);
                $('#name').val(data.name);
                $('#description').val(data.description);
                $('#descuento').val(data.descuento);
                
                $('#modalAddTarifa').modal('show');
                $('.modal-title').text('Modificar tarifa');
                $('#btn-update-tarifa').css('display','inline');
                $('#btn-add-tarifa').css('display','none');
            }
        })
    });
    
    $(document).on('click','#btn-update-tarifa',function(){
        var id_tarifa = $('.edit').attr("id");   
        $.ajax({
            url : 'tarifa/'+id_tarifa,
            type : 'PUT',
            data: $("#formTarifa").serialize(),
            success:function(data)
            {
                console.log(data);
                alertify.success(data.success);
                $('#tableTarifa').DataTable().ajax.reload(null, false);
                $('#modalAddTarifa').modal('hide');
                
            },
            error:function(data)
            {
                alertify.error("El campo NOMBRE y DESCUENTO es obligatorio.");
                
            }
        })
    });

    $(document).on('click', '.delete', function(){
        id = $(this).attr("id");
        alertify.confirm('¿Desea eliminar a esta tarifa?', 'Esta acción no puede deshacerse',
            function(){
                $.ajax({
                    url : 'tarifa/'+id,
                    type : 'DELETE',
                    data: $("#formTarifa").serialize(),
                    success:function(data)
                    {
                        $('#tableTarifa').DataTable().ajax.reload(null, false);
                        alertify.success('Ubicación eliminada correctamente');
                    }
                })
            },
            function(){
                alertify.error('Acción cancelada')
            }
        );
    });

    function refreshSinTarifa(){
        $("#user_name").select2({
            destroy: true,//primero destruye el anterior y después lo vuelve a cargar
            minimumResultsForSearch: Infinity,
            placeholder: "Selecciona un usuario",
            ajax: {
                url: 'user/sintarifa',
                type: 'GET',
                processResults: function (data) {
                    return {
                        results: $.map(data, function(obj) {
                            return { id: obj.id, text: obj.name };
                        })
                    };   
                },
            }
        });
    }
});



</script>
@endpush
