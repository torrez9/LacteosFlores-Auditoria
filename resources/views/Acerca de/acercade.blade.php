@extends('adminlte::page')

@section('title', 'Acerca de')

@section('content')
    <div class="main-container">
        <h1 class="titulo-facturacion" style="color: #0056b3; font-size: 30px;">Acerca de:</h1>
        <div class="container">
            <div class="profile-card">
                <img src="{{ asset('images/DarwinTorrez.png') }}" alt="Ingeniero">
                <div class="profile-details">
                    <h2>Darwin Torrez</h2>
                    <p>Estudiante de tercer año</p>
                    <p>Email: <a href="mailto:darwincarballo82@gmail.com">darwincarballo82@gmail.com</a></p>
                    <p>Teléfono: <a href="tel:+50582102295">+505 82102295</a></p>
                </div>
            </div>
            <div class="profile-card">
                <img src="{{ asset('images/HaroldGustavo.png') }}" alt="Ingeniero">
                <div class="profile-details">
                    <h2>Harold Gustavo</h2>
                    <p>Estudiante de tercer año</p>
                    <p>Email: <a href="mailto:gustavolopezharold15@gmail.com">gustavolopezharold15@gmail.com</a></p>
                    <p>Teléfono: <a href="tel:+50586119087">+505 86119087</a></p>
                </div>
            </div>
            <div class="profile-card">
                <img src="{{ asset('images/ManyelIssac.png') }}" alt="Ingeniero">
                <div class="profile-details">
                    <h2>Manyel Issac</h2>
                    <p>Estudiante de tercer año</p>
                    <p>Email: <a href="mailto:rodriisaac9819@gmail.com">rodriisaac9819@gmail.com</a></p>
                    <p>Teléfono: <a href="tel:+50558665322">+505 58665322</a></p>
                </div>
            </div>
            <div class="profile-card">
                <img src="{{ asset('images/MarioAcuna.png') }}" alt="Ingeniero">
                <div class="profile-details">
                    <h2>Mario Nicoya</h2>
                    <p>Estudiante de tercer año</p>
                    <p>Email: <a href="mailto:marionicoya4@gmail.com">marionicoya4@gmail.com</a></p>
                    <p>Teléfono: <a href="tel:+50587268006">+505 87268006</a></p>
                </div>
            </div>
            <div class="profile-card">
                <img src="{{ asset('images/KevinDavid.png') }}" alt="Ingeniero">
                <div class="profile-details">
                    <h2>Kevin David</h2>
                    <p>Estudiante de tercer año</p>
                    <p>Email: <a href="mailto:kevintorrezhernandez@gmail.com">kevintorrezhernandez@gmail.com</a></p>
                    <p>Teléfono: <a href="tel:+50557736856">+505 57736856</a></p>
                </div>
            </div>
        </div>
    </div>
@stop

@section('css')
    <style>
        .main-container {
            background-color: #F2F2F2;
            margin: 0 auto;
            padding: 20px;
            max-width: 1150px;
        }
        .titulo-facturacion {
        text-align: center;
        margin-bottom: 20px;
    }
        .container {
            display: flex;
            justify-content: center;
            flex-wrap: wrap;
        }
        .profile-card {
            background: white;
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
            transition: 0.3s;
            border-radius: 10px;
            overflow: hidden;
            margin: 10px;
            display: flex;
            flex-direction: column;
            align-items: center;
            width: 250px;
            text-align: center;
        }
        .profile-card:hover {
            box-shadow: 0 8px 16px rgba(0,0,0,0.2);
        }
        .profile-card img {
            width: 100px;
            height: 100px;
            border-radius: 50%;
            margin-top: 20px;
            object-fit: cover;
        }
        .profile-details {
            padding: 20px;
        }
        .profile-details h2 {
            margin: 10px 0 5px 0;
            color: #333;
        }
        .profile-details p {
            margin: 5px 0;
            color: #666;
        }
        @media screen and (max-width: 768px) {
            .profile-card {
                width: calc(50% - 20px);
            }
        }
        @media screen and (max-width: 480px) {
            .profile-card {
                width: calc(100% - 20px);
            }
        }
        /* Cambiar el color del menú lateral */
        .sidebar-dark-primary {
            background-color: #2e6da4; /* Fondo azul más oscuro */
        }
        /* Cambiar el color de los iconos en el menú lateral */
        .sidebar-dark-primary .nav-link i {
            color: #ffffff; /* Color blanco para los iconos */
        }
        /* Cambiar el color de los textos en el menú lateral */
        .sidebar-dark-primary .nav-link,
        .sidebar-dark-primary .nav-link i,
        .sidebar-dark-primary .nav-header {
            color: #ffffff; /* Color blanco para los textos */
        }
        /* Cambiar el color de la barra de navegación superior */
        .navbar-gradient {
            background-image: linear-gradient(to right, #4dabf7, #2e6da4); /* Gradiente de azul primario a azul oscuro de izquierda a derecha */
            color: #FFFFFF; /* Color blanco para los textos */
        }
        .navbar-gradient .navbar-nav .nav-link {
            color: #FFFFFF; /* Color blanco para los textos del menú */
        }
        .navbar-gradient .navbar-nav .nav-link:hover {
            color: #CCCCCC; /* Color gris claro para los textos del menú al pasar el ratón */
        }
        /* Estilo para el texto con gradiente */
        .nav-link-gradient {
            background: linear-gradient(to right, #3a8edb, #1f5b96); /* Gradiente de azul primario a azul oscuro */
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            display: inline-block;
        }
        .nav-link-gradient:hover {
            background: linear-gradient(to right, #1f5b96, #3a8edb); /* Invertir gradiente al pasar el ratón */
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }
        /* Definir text-blue-dark para que sea azul oscuro */
        .text-blue-dark {
            color: #1f5b96 !important; /* Azul oscuro */
        }
        /* Efecto de resaltado para los elementos del menú al pasar el ratón */
        .sidebar-dark-primary .nav-link {
            position: relative;
            padding-left: 1rem;
            padding-right: 1rem;
        }
        .sidebar-dark-primary .nav-link::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: #2e6da4; /* Color de resaltado */
            opacity: 0;
            transition: opacity 0.3s ease;
            z-index: -1; /* Asegura que el fondo esté detrás del texto */
        }
        .sidebar-dark-primary .nav-link:hover::before {
            opacity: 1; /* Mostrar el fondo blanco al pasar el ratón */
        }
    </style>
@stop
