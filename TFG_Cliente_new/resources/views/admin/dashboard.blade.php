@extends('admin.layout')


@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Inicio
        <small>Panel de control</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Inicio</a></li>
        <li class="active">Panel de control</li>
    </ol>
</section>

<!-- AdminLTE dashboard -->
@stop

@push('scripts')
<script src="/admin-lte/js/pages/dashboard2.js"></script>
@endpush
