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
                                <th>Fecha</th>
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
                {data:'fecha_alquiler'},
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

    $(document).on('click','.accept-alquiler',function(){
        var id_alquiler = $(this).attr('id');
        $.ajax({
            type: 'POST',
            url: 'alquiler/accept/'+id_alquiler,
            data: {
                "_token": "{{ csrf_token() }}",
                "id": id_alquiler
                },
            success:function(data)
            {
                alertify.success('Alquiler aceptado correctamente.');
                $('#tableAlquiler').DataTable().ajax.reload(null, false);
            },
            error:function(data)
            {
                alertify.error('ERROR: No se ha podido cancelar la reserva.');
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
    
});

</script>
@endpush
