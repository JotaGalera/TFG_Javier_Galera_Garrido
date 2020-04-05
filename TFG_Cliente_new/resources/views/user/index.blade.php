@extends('admin.layout')


@section('content')

<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Administración
        <small>Usuarios</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="/"><i class="fa fa-dashboard"></i> Administración</a></li>
        <li class="active">Usuarios</li>
    </ol>
</section>
<!-- Main content -->
<section class="content container-fluid">
    <div class="row" style="margin-bottom: 5px;">
        <div class="col-xs-12">
            <a href="#" class="btn btn-success" id="newUser"><b><i class="fa fa-fw fa-plus"></i> Nuevo</b></a>
        </div>
        <div class="clearfix"></div>
    </div>
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Listado de Usuarios</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <table id="tableUser" class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Usuario</th>
                                <th>Nombre</th>
                                <th>Email</th>
                                <th>Permisos</th>
                                <th>Creado</th>
                                <th>Ultima Modificación</th>
                                <th>RFID</th>
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
    <div class="modal fade" id="modalEdit">
        <form method="PUT" action="" id="formEdit" role="form">
            <div class="modal-dialog" style="width:70%">
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                  <h4 class="modal-title">Información de la ubicación</h4>
                </div>
                <div class="modal-body">
                    @csrf
                    <div class="modal-body">
                        <div class="box-body">
                            <div class="form-group col-md-6">
                                <label>Nombre de Usuario</label>
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                    <input type="text" class="form-control" placeholder="Nombre de usuario" name="user" id="user">
                                </div>
                            </div>
                            <div class="form-group col-md-6">
                                <label>Nombre y apellidos</label>
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                    <input type="text" class="form-control" placeholder="Nombre" name="name" id="name">
                                </div>
                            </div>
                            <div class="form-group col-md-6">
                                <label>Email</label>
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                                    <input type="email" class="form-control" placeholder="Email" name="email" id="email">
                                </div>
                            </div>
                            <div class="form-group col-md-6">
                                <label>Contraseña</label>
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-key"></i></span>
                                    <input type="password" class="form-control" placeholder="password" name="password" id="password">
                                </div>
                            </div>
                            <div class="form-group col-md-6">
                                <label>Tag RFID</label>
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-id-card"></i></span>
                                    <input type="text" class="form-control" placeholder="TAG" name="rfid_tag" id="rfid_tag">
                                </div>
                            </div>
                            <div class="form-group col-md-6">
                                <label>PIN</label>
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-key"></i></span>
                                    <input type="password" class="form-control" placeholder="PIN" name="pin" id="pin">
                                </div>
                            </div>
                            <div class="form-group col-md-12">
                                <label>Permisos</label>
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-tasks"></i></span>
                                    <select class="form-control select2" multiple="multiple" id="role" name="role[]" style="width:100%">
                                        @foreach ($roles as $rol)
                                            <option value="{{ $rol->id }}">{{ $rol->name }}</option>
                                        @endforeach
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
        </form>
    </div>
    <!-- /.modal-dialog -->
</section> 
@stop

@push('scripts')
<script>
$('.select2').select2({
    placeholder: "Selecciona un permiso",
    allowClear: true
});
$(function () {
    $('#tableUser').DataTable({
        "paging": true,
        "lengthChange": false,
        "searching": true,
        "ordering": true,
        "info": true,
        "autoWidth": false,
        "processing" : true,
        "serverSide": true,
        "scrollX": true,
        "ajax": "/user/getdatatable",
        "columns":[
            {data:'id'},
            {data:'user'},
            {data:'name'},
            {data:'email'},
            {data:'roles' },
            {data:'created_at'},
            {data:'updated_at'},
            {data:'rfid_tag'},
            {data:'action', orderable:false, searchable: false},
        ],
        dom: 'Bfrtip',
        buttons: [
            'csv', 'excel', 'pdf'
        ]
    });
});
$(document).on('click', '.edit', function(){
    var arrayID = [];
    var id = $(this).attr("id");
    $.ajax({
        url : 'user/'+id,
        type : 'get',
        dataType: 'json',
        success:function(data)
        {
            $('#name').val(data.name);
            $('#email').val(data.email);
            $('#id').val(id);
            $('#user').val(data.user);
            $('#rfid_tag').val(data.rfid_tag);
            $('#pin').val(data.pin);

            $.each(data.roles, function( index, value ) {
                arrayID.push(value.id);
            });

            $('#role').val(arrayID).trigger('change');
            $("#password").val('');
            $('#modalEdit').modal('show');
            $('#btn-update').css('display','inline');
            $('#btn-new').css('display','none');
            $('#action').val('Editar');
            $('.modal-title').text('Editar usuario');
        }
    })
});
$(document).on('click', '.delete', function(){
    var id = $(this).attr("id");
    alertify.confirm('¿Desea eliminar a este usuario?', 'Esta acción no puede deshacerse', 
        function(){ 
            $.ajax({
                url : 'user/'+id,
                type : 'DELETE',
                data: $("#formEdit").serialize(),
                success:function(data)
                {
                    $('#tableUser').DataTable().ajax.reload(null, false);
                    alertify.success('Usuario eliminado correctamente');
                }
            })
        }, 
        function(){ 
            alertify.error('Acción cancelada')
        }
    );
});
$("#btn-new").click(function(){
    var id = $(this).attr("id");
    $.ajax({
        url : 'user',
        type : 'POST',
        data: $("#formEdit").serialize(),
        success:function(data)
        {
            alertify.success('Usuario insertado con éxito');
            $('#tableUser').DataTable().ajax.reload(null, false);
            $('#modalEdit').modal('hide');
        }
    })
});
$("#btn-update").click(function(){
    var id = $(this).attr("id");
    $.ajax({
        url : 'user/'+id,
        type : 'PUT',
        data: $("#formEdit").serialize(),
        success:function(data)
        {
            alertify.success('Usuario modificado con éxito');
            $('#tableUser').DataTable().ajax.reload(null, false);
            $('#modalEdit').modal('hide');
        }
    })
});
$("#newUser").click(function(){
    $("#formEdit")[0].reset();
    $('#btn-update').css('display','none');
    $('#btn-new').css('display','inline');
    $('#role').val(null).trigger('change');
    $('#modalEdit').modal('show');
});
</script>
@endpush
