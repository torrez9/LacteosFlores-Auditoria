@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
   <h1 class="text-gradient">¡Bienvenidos!</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-header bg-primary text-white">
            <h3 class="card-title">Sistema de Facturación de Productos Lácteos Flores</h3>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-4 text-center">
                    <img src="{{ asset('images/logo.png') }}" class="img-fluid" alt="Logo de Lacteos Flores">
                </div>
                <div class="col-md-8">
                    <h4>¡Hola! Nos alegra tenerte aquí.</h4>
                    <p>
                        Este sistema está diseñado para facilitar la gestión y facturación de nuestros productos lácteos.
                        Para comenzar, selecciona una opción del menú a la izquierda.
                    </p>
                    
                    <p>
                        Si necesitas ayuda, visita nuestra sección de ayuda.
                    </p>
                </div>
            </div>
        </div>
    </div>
@stop

@section('content')
   <!-- <p>Bienvenido a este hermoso panel de administración.</p> {{-- Contenido --}}-->
    <div id="content">
  <!-- Contenido de la aplicación -->
  <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
<h1>Bienvenidos al Sistema de Facturación</h1>
<div id="logo-container">
    <img id="logo" src="{{ asset('images/logo.png') }}" alt="Logo de la aplicación">
</div>


  
@stop

@section('css')
    {{-- Agregar aquí hojas de estilo adicionales --}}
    {{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
    <style>
      /* Estilos para el encabezado h1 */
     h1 {
      font-family: Arial, sans-serif; /* Fuente Arial para estilo más cuadrado */
      font-size: 2.4em;
      color: #007ACC; /* Color del texto */
      text-align: center; /* Centrar el texto */
      margin-top: 20px; /* Espacio superior */
      margin-bottom: 20px; /* Espacio inferior */
      
     }

     /* Estilos para el contenedor del logo */
    #logo-container {
      display: flex;
      justify-content: center; /* Centrar el logo horizontalmente */
      align-items: center; /* Centrar el logo verticalmente */
      margin-top: -10px; /* Espacio superior */
      margin-bottom: 20px; /* Espacio inferior */
     }

     /* Estilos para la imagen del logo */
    #logo {
     max-width: 100%; /* Asegura que el logo no exceda el ancho del contenedor */
     height: auto; /* Mantiene la proporción del logo */
     width: 410px; /* Puedes ajustar el tamaño según tus necesidades */
     }
     
    /* Cambiar el color del menú lateral */
    .sidebar-dark-primary {
        background-color: #2e6da4 /* Fondo azul mas oscuro*/
    }


/* Cambiar el color de los iconos en el menú lateral */
.sidebar-dark-primary .nav-link i {
  color:  #ffffff; /* Color azul oscuro para los iconos */
}

/* Cambiar el color de los textos en el menú lateral */
.sidebar-dark-primary .nav-link,
.sidebar-dark-primary .nav-link i,
.sidebar-dark-primary .nav-header {
  color:  #ffffff; /* Color azul oscuro para los textos */
}

     /* Archivo: resources/css/custom.css */
     
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


/* Estilos personalizados para la página de bienvenida */
.card {
  border: none; /* Quitar borde de la tarjeta */
  box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); /* Añadir sombra para profundidad */
}

.card-header {
  background-image: linear-gradient(to right, #4dabf7, #2e6da4); /* Gradiente de azul primario a azul oscuro de izquierda a derecha */
  color: #FFFFFF; /* Color blanco para el texto del encabezado */
  padding: 1rem; /* Espaciado interno */
  border-bottom: none; /* Quitar borde inferior del encabezado */
}

.card-title {
  font-size: 1.75rem; /* Tamaño de fuente del título */
  font-weight: bold; /* Peso de la fuente */
  margin: 0; /* Quitar márgenes */
}

.card-body {
  background-color: #f8f9fa; /* Color de fondo del cuerpo de la tarjeta */
  padding: 2rem; /* Espaciado interno */
}

.card-body h4 {
  color: #4dabf7; /* Color azul primario para los encabezados */
  font-size: 1.5rem; /* Tamaño de fuente del encabezado */
  margin-bottom: 1rem; /* Espacio inferior */
}

.card-body p {
  font-size: 1.1rem; /* Tamaño de fuente para párrafos */
  line-height: 1.5; /* Altura de línea */
  color: #2e6da4; /* Color azul oscuro para los textos */
  margin-bottom: 1rem; /* Espacio inferior */
}

.card-body img {
  max-width: 100%; /* Asegurarse de que la imagen no exceda el contenedor */
  height: auto; /* Mantener la proporción de la imagen */
  margin-bottom: 1rem; /* Espacio inferior */
}

/* Agregar estilo para botones */
.btn-custom {
  background-image: linear-gradient(to right, #4dabf7, #2e6da4); /* Gradiente de azul primario a azul oscuro de izquierda a derecha */
  color: #FFFFFF; /* Color blanco para el texto */
  border: none; /* Quitar borde */
  padding: 0.5rem 1rem; /* Espaciado interno */
  font-size: 1rem; /* Tamaño de fuente */
  border-radius: 0.25rem; /* Bordes redondeados */
}

.btn-custom:hover {
  background-image: linear-gradient(to right, #2e6da4, #4dabf7); /* Invertir gradiente al pasar el ratón */
  color: #FFFFFF; /* Asegurarse de que el texto se mantenga blanco */
}

/* Estilo personalizado para el título de la página de bienvenida */
.text-gradient {
  background: linear-gradient(to right, #4dabf7, #2e6da4); /* Gradiente de azul primario a azul oscuro de izquierda a derecha */
  -webkit-background-clip: text;
  -webkit-text-fill-color: transparent;
  display: inline-block;
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
  background-color: #2e6da4;; /* Color de resaltado (blanco) */
  opacity: 0;
  transition: opacity 0.3s ease;
  z-index: -1; /* Asegura que el fondo esté detrás del texto */
}

.sidebar-dark-primary .nav-link:hover::before {
  opacity: 1; /* Mostrar el fondo blanco al pasar el ratón */
}
    </style>
@stop

@section('css')
    {{-- Agregar aquí hojas de estilo adicionales --}}
    {{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
   
@stop

@section('js')
    <script> console.log("¡Hola, estoy usando el paquete Laravel-AdminLTE!"); </script> {{-- JavaScript --}} 
@stop