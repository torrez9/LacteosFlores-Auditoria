@extends('adminlte::page')
@section('content')
<div class="box box-solid box-primary rounded">
    <div class="box-header with-border text-left"> <!-- Añadido 'text-left' para alinear el texto a la izquierda -->
        <br>
        <h2 class="box-title" style="color: #0056b3; font-size: 30px;">Proveedor</h2> <!-- Ajuste del tamaño de fuente y color -->
    </div>
    <!-- /.box-header -->
    <!-- form start -->
    <form action="{{route('Proveedores.update', $proveedor->id_proveedores)}}" method="POST">    
        @csrf
        @method('PUT')
        <div class="box-body">
            <div class="row">
                <div class="col-md-6">
                    @include('Proveedores.form1')
                </div>
            </div>
            <!-- /.box-body -->
            <div class="box-footer">
                <button type="submit" class="btn btn-primary btn-sm mr-2">Actualizar</button>
                <a href="{{route('Proveedores.index')}}" class="btn btn-danger btn-sm mr-2">Cancelar</a>
                {{-- <button type="submit" class="btn btn-primary">Actualizar</button>
                <button type="submit" class="btn btn-primary">Nuevo</button>
                <button id="SalirP" class="btn btn-primary boton-salir">Salir</button> --}}
            </div>
            <!-- /.box-footer -->
        </div>
    </form>
@stop
@section('css')
<style>
    .box-title {
        color: #0056b3; /* Color azul */
        font-size: 30px; /* Tamaño de fuente */
        text-align: center; /* Centrar el texto */
    }
      /* Cambiar el color del menú lateral */
      .sidebar-dark-primary {
        background-color: #2e6da4; /* Fondo azul mas oscuro*/
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