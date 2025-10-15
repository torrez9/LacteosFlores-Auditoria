@extends('adminlte::page')

@section('title', 'Usuario')
@section('content_header')
<a href="{{ route('Usuario.create')}} " class="btn btn-info btn-sm"> Crear Usuario</a>
<button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#imagenAyuda" style="margin-left: 10px;">Ayuda</button>
@stop
@section('content')
    <div class="main-container">
   
            <section id="datagrid">
                <h2 class="titulo-productos" style="color: #0056b3; font-size: 30px;">Usuarios</h2>
                <div class="table-responsive" style="max-height: 300px; overflow-y: auto;">
                <table class="table table-bordered table-sm" id="tablaProductos">
                <thead style="background: linear-gradient(to right, #4dabf7, #2e6da4); color: white;">
                            <tr>
                                <th>Id</th>
                                <th>Usuario</th>
                                <th>Tipo usuario</th>
                                <th>Teléfono</th>
                                <th>Email</th>
                                <th>Editar</th>
                                <th>Eliminar</th>
                            </tr>
                        </thead>
                        <tbody class="tbody5">
                             <!-- Fila vacía 1 con clase "fila-destacada" -->
                     @foreach ($usuarios as $usuario)
                     <tr class="fila-destacada">
                        <td>{{ $usuario->id_usuario }}</td>
                        <td>{{ $usuario->name }}</td>
                        <td>{{ $usuario->tipousuario }}</td>
                        <td>{{ $usuario->telefono }}</td>
                        <td>{{ $usuario->email }}</td>
                        <td>
                            <!- Icono de editar (usando Font Awesome como ejemplo) 
                            <a href="#" class="editar-icon"><i class="fas fa-edit"></i></a>
                        </td>
                        <td>
                            <!- Icono de eliminar (usando Font Awesome como ejemplo) 
                            <a href="#" class="eliminar-icon"><i class="fas fa-trash-alt"></i></a>
                        </td>
                    </tr>  
                     @endforeach
                            </tr>
                        </tbody>
                    </table>
                </div>
            </section>
        </div>
    </div>
    <!-- Ventana emergente (modal) -->
    <div class="modal fade" id="imagenAyuda" tabindex="-1" role="dialog" aria-labelledby="imagenAyudaLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-xl" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <img src="{{ asset('images/ayuda/usuariosagregados.png') }}" class="img-fluid" alt="Imagen de Ayuda">
                </div>
            </div>
        </div>
    </div>
@stop

@section('css')
<style>
   .titulo-productos {
        text-align: center;
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

@section('js')
    <script src="JS/Gusuarios.js"></script>
@stop
