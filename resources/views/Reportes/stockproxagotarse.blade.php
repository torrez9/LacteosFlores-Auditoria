@extends('adminlte::page')

@section('title', 'Stock prox Agotarse')

@section('content_header')
    <h1 style="color: #3498db;"></h1>
@stop

@section('content')
    <form action="{{ route('reportstockproxagotar') }}" method="GET" id="reporteForm">
        <div class="card">
            <div class="card-header" style="background-color: #3498db; color: white; border-top-left-radius: 8px; border-top-right-radius: 8px; padding: 10px;">
                <h3 class="card-title">Reporte de Stock prox Agotarse</h3>
            </div>
            <div class="card-body">
                <div class="form-row">
                    <div class="form-group col-md-3">
                        <label for="search_id_producto">Buscar por Id Producto:</label>
                        <input type="text" class="form-control" id="search_id_producto">
                    </div>
                </div>
                <div class="table-responsive">
                    <table id="stockproxagotarse" class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>Id Producto</th>
                                <th>Descripción</th>
                                <th>Cantidad de Productos</th>
                                <th>Proveedor</th>
                                <th>Precio Venta</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($reportes as $reporte)
                                <tr>
                                    <td>{{ $reporte->id_producto }}</td>
                                    <td>{{ $reporte->descripcion }}</td>
                                    <td>{{ $reporte->cantidadprod }}</td>
                                    <td>{{ $reporte->proveedor }}</td>
                                    <td>{{ $reporte->precioventa }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr style="background-color: #f2f2f2; color: #333; font-weight: bold;">
                                <td colspan="4" style="text-align:right">Total:</td>
                                <td id="precioventa">$ 0.00</td>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
            <div class="card-footer">
                <button type="submit" id="imprimirButton" class="btn btn-primary float-right" formtarget="_blank">
                    <i class="fas fa-print"></i> Imprimir
                </button>
            </div>
        </div>
    </form>
@stop

@section('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css" />
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.4.2/css/buttons.dataTables.min.css" />
    <style>
        .card {
            border: 1px solid #d1d1d1;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;
        }
        .card-header {
            background-color: #3498db;
            color: white;
            padding: 10px;
            border-top-left-radius: 8px;
            border-top-right-radius: 8px;
        }
        .card-body {
            padding: 15px;
        }
        .table thead {
            background-color: #3498db;
            color: white;
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
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.2/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.2/js/buttons.print.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.2/js/buttons.html5.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>

    <script>
        $(document).ready(function() {
            var table = $('#stockproxagotarse').DataTable({
                "paging": false,
                "info": false,
                "searching": true, // Habilitar búsqueda global
                "footerCallback": function(row, data, start, end, display) {
                    var api = this.api();
                    var total = api.column(4, { page: 'current' }).data()
                                .reduce(function(a, b) {
                                    return parseFloat(a) + parseFloat(b);
                                }, 0);
                    
                    $('#precioventa').text('C$ ' + total.toFixed(2)); // Mostrar el total en el footer
                }
            });

            // Calcular el total inicial al cargar la página
            var initialTotal = table.column(4).data().reduce(function(a, b) {
                return parseFloat(a) + parseFloat(b);
            }, 0);
            $('#precioventa').text('C$ ' + initialTotal.toFixed(2));

            // Buscador por Id Producto
            $('#search_id_producto').on('keyup', function() {
                table.column(0).search(this.value).draw();
            });
        });
    </script>
@stop
