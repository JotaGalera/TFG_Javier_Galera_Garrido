<!DOCTYPE html>

<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>GMAO | ATIS </title>
        <!-- Tell the browser to be responsive to screen width -->
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <!-- Bootstrap 3.3.7 -->
        <link rel="stylesheet" href="/admin-lte/bootstrap/css/bootstrap.min.css">
        <!-- Font Awesome -->
        <link rel="stylesheet" href="/admin-lte/font-awesome/css/font-awesome.min.css">
        <!-- Ionicons -->
        <link rel="stylesheet" href="/admin-lte/Ionicons/css/ionicons.min.css">
        <!-- Theme style -->
        <link rel="stylesheet" href="/admin-lte/css/AdminLTE.min.css">
        <!-- iCheck -->
        <link rel="stylesheet" href="/admin-lte/plugins/iCheck/square/blue.css">

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->

        <!-- Google Font -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
    </head>
    <body class="hold-transition login-page">
        <div class="login-box">
            <div class="login-logo">
                <img src="/admin-lte/img/custom/atis.png" class="img-responsive" />
            </div>
            <!-- /.login-logo -->
            <div class="login-box-body">
                <p class="login-box-msg">Logueate para iniciar sesión</p>
                <form action="{{ route('login') }}" method="POST">
                    @csrf
                    <div class="form-group has-feedback">
                        <input type="text" name="user" id="user" class="form-control{{ $errors->has('user') ? ' is-invalid' : '' }}" placeholder="{{ __('E-Mail Address') }}" value="{{ old('user') }}" required autofocus>
                        <span class="glyphicon glyphicon-user form-control-feedback"></span>
                        @if ($errors->has('user'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('user') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="form-group has-feedback">
                        <input type="password" id="password" name="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" placeholder="{{ __('Password') }}" required>
                        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                        @if ($errors->has('password'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="row">
                        <div class="col-xs-8">
                            <div class="checkbox icheck">
                                <label>
                                    <input type="checkbox" name="remember" id="remember"  {{ old('remember') ? 'checked' : '' }}> &nbsp;&nbsp;&nbsp;Remember Me
                                </label>
                            </div>
                        </div>
                        <!-- /.col -->
                        <div class="col-xs-4">
                            <button type="submit" class="btn btn-primary btn-block btn-flat">{{ __('Login') }}</button>
                        </div>
                        <!-- /.col -->
                    </div>
                </form>
            </div>
            <!---<div class="modal fade" id="modal-default">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title">Versión DEMO</h4>
                        </div>
                        <div class="modal-body">
                            <p>Tu muertos Acaba de acceder a la versión demo de nuestro sistema de <code>Gestión del Mantenimiento Asistido por Ordenador</code></p>
                            <p>Deberá tener en cuenta que esta aplicación no tiene funcionalidades asociadas, únicamente podrá visualizar las secciones y sus características.</p>
                            <p>Los datos contenidos tampoco son los definitivos, estos han sido introducidos con motivo de tener una visión mas aproximada de como quedará la aplicación.</p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Cerrar y continuar con demo</button>
                        </div>
                    </div>
                </div>-->
                <!-- /.modal-dialog -->
            </div>
            <!-- /.login-box-body -->
        </div>
        <!-- /.login-box -->

        <!-- jQuery 3 -->
        <script src="/admin-lte/jquery/jquery.min.js"></script>
        <!-- Bootstrap 3.3.7 -->
        <script src="/admin-lte/bootstrap/js/bootstrap.min.js"></script>
        <!-- iCheck -->
        <script src="/admin-lte/plugins/iCheck/icheck.min.js"></script>
        <script>
            //$(document).ready(function() {
              //  $('#modal-default').modal('toggle');
            //});
            $(function () {
                $('input').iCheck({
                    checkboxClass: 'icheckbox_square-blue',
                    radioClass: 'iradio_square-blue',
                    increaseArea: '20%' /* optional */
                });
            });
        </script>
    </body>
</html>
