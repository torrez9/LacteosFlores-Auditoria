@extends('adminlte::page')

@section('content')
<style>
    .full-height {
        height: 80vh;
    }
    .center-content {
        display: flex;
        justify-content: center;
        align-items: center;
        flex-direction: column;
    }
    .text-blue {
        color: #0056b3;
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
<div class="container mt-0 full-height center-content">
    <div class="row justify-content-center w-100">
        <div class="col-md-8">
            <div class="card custom-card">
                <div class="card-header font-weight-bold text-center bg-lightpink" style="color: #0056b3; font-size: 18px;">Mantenimiento de base de Datos</div>
                <div class="card-body">
                    @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif

                    @if (session('error'))
                        <div class="alert alert-danger">
                            {{ session('error') }}
                        </div>
                    @endif

                    <p class="text-center" style="color: #00008B;">Modulo Respaldo</p>                    <form action="{{ route('backup.database') }}" method="post">
                        @csrf
                        <div class="form-group text-center">
                            <i class="bi bi-database-fill-add icon-large"></i>
                        </div>
                        <div class="form-group text-center">
                            <button type="submit" class="btn btn-primary">Realizar Respaldo de Base de Datos</button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="card custom-card mt-4">
                <div class="card-body">
                    <form action="{{ route('restore.database') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group text-center">
                            <i class="bi bi-database-fill-down icon-large"></i>
                        </div>
                        <div class="form-group text-center">
                            <input type="file" name="archivo_copia">
                        </div>
                        <div class="form-group text-center">
                            <button type="submit" class="btn btn-success">Restaurar Base de Datos desde Archivo</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
