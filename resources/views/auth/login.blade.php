<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Iniciar Sesión</title>
    <!-- AdminLTE CSS -->
    <link rel="stylesheet" href="{{ asset('vendor/adminlte/dist/css/adminlte.min.css') }}">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('vendor/fontawesome-free/css/all.min.css') }}">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    <style>
       
        .login-box {
            margin-top: 50px;
            border: 1px solid #ccc;
            border-radius: 10px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
            background: linear-gradient(to right, #4dabf7, #2e6da4); /* Gradiente de azul primario a azul oscuro de izquierda a derecha */
            color: #fff; /* Color del texto en blanco */
            padding: 20px;
            height: 500px; /* Ajusta la altura de la caja según tu preferencia */
            display: flex; /* Utiliza flexbox para centrar el contenido verticalmente */
            flex-direction: column; /* Coloca los elementos en columna */
            justify-content: center; /* Centra el contenido verticalmente */
        }
        
        .input-group input.form-control {
            height: 35px; /* Ajusta la altura del campo de entrada */
            font-size: 12px; /* Ajusta el tamaño del texto dentro del campo de entrada */
        }
        
        .btn-block {
            height: 32px;
            font-size: 12px;
            width: 120%; /* Ancho del 50% del contenedor padre */
            margin-left: -20px; /* Ajusta este valor para mover el botón hacia la izquierda */

        }



        .login-logo a {
            color: #fff;
            font-weight: bold;
        }

        .btn-custom {
            background-color: #0056b3;
            border-color: #0056b3;
            color: #fff;
        }

        .btn-custom:hover {
            background-color: #004085;
            border-color: #004085;
        }

        .input-group-text {
            background-color: #007bff;
            color: #fff;
        }

        .invalid-feedback {
            color: #ff0000;
        }

        .icheck-primary input:checked+input:checked+label::before {
            background-color: #007bff;
        }
        .btn:hover {
            background-color: #3667B5 !important;
        }
        .login-box-msg {
            font-size: 22px; /* Ajusta el tamaño del texto */
            color:  #0056b3; /* Ajusta el color del texto */
        }    
    </style>
</head>
<body class="hold-transition login-page">
<div class="login-box">
    <div class="login-logo">
        <img src="{{ url('images/MINILOGO.png') }}" alt="Lácteos Flores" style="height: 50px;">
        <a href="{{ url('/') }}"><b>Lácteos</b>Flores</a>
    </div>
    <br>
    <!-- /.login-logo -->
    <div class="card">
        <div class="card-body login-card-body">
            <p class="login-box-msg">Inicia sesión</p>

            <form action="{{ route('login') }}" method="post">
                @csrf
                <div class="input-group mb-3">
                    <input type="email" name="email" class="form-control" placeholder="Correo electrónico" required>
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-envelope"></span>
                        </div>
                    </div>
                </div>
                <div class="input-group mb-3">
                    <input type="password" name="password" class="form-control" placeholder="Contraseña" required>
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-lock"></span>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-8">
                        <div class="icheck-primary">
                            <input type="checkbox" name="remember" id="remember">
                            <label for="remember">
                                Recordarme
                            </label>
                        </div>
                    </div>
                    <!-- /.col -->
                    <div class="col-4">
                        <button type="submit" class="btn btn-primary btn-block">Iniciar Sesión</button>
                    </div>
                    <!-- /.col -->
                </div>
            </form>

            <p class="mb-1">
                <a href="{{ route('password.request') }}">Olvidé mi contraseña</a>
            </p>
            <p class="mb-0">
                <a href="{{ route('register') }}" class="text-center">Registrarse</a>
            </p>
        </div>
        <!-- /.login-card-body -->
    </div>
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
<!-- Bootstrap 4 -->
<script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('vendor/adminlte/dist/js/adminlte.min.js') }}"></script>
</body>
</html>
