@extends('adminlte::page')

@section('title', 'Facturación')
@section('content_header')
@stop
@section('content')
<form action="{{route('Factura.store')}}">    
    @csrf
<div class="main-container">
<h1 class="titulo-facturacion" style="color: #0056b3; font-size: 30px;">Facturación</h1>
    <!-- Contenedor para la fecha de compra y número de compra después del título -->
    <div class="info-container">
        <div class="form-group">
            <input type="hidden" id="idusuario" name="idusuario" value="{{Auth::id()}}">
        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="fechaVentas">Fecha Venta</label>
                    <input type="date" class="form-control" name="fechafactura" id="fechafactura" placeholder="Fecha del día" disabled>
                </div>
                <div class="form-group">
                    <label for="producto" class="form-label">Seleccionar un producto:</label>
                    <select class="form-control form-control-sm custom-select" id="id_producto" name="id_producto" disabled>
                        <option>Selecciona un producto</option>
                        @foreach ($productos as $product)
                            <option value="{{ $product->id_producto }}" data-precio="{{ $product->precioventa }}"
                                data-cantidad="{{ $product->cantidadprod }}">{{ $product->descripcion }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="stock1">Cantidad:</label>
                    <input type="number" id="cantidad" name="cantidad" class="form-control form-control-sm" disabled>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="TextoFactura">No Factura</label>
                    <input value="{{ $nuevoId }}" type="text" class="form-control ml-2 small-input" id="NoFactura" readonly>
                </div>
                <div class="form-group">
                    <label for="precio1">Precio:</label>
                    <input type="number" id="precioventa" name="precio" class="form-control form-control-sm" readonly>
                </div>
                <div class="form-group">
                    <label for="cantidad1">Stock:</label>
                    <input type="number" id="cantidadprod" name="cantidadprod" class="form-control form-control-sm" readonly>
                </div>
            </div>
        </div>
    </div>

    <div class="button-container text-left">
        <button type="button" id="btnagregar" class="btn btn-success btn-sm"></i> Agregar</button>
        <button id="ActualizarPro" class="btn btn-primary btn-sm">Actualizar</button>
        <button id="Nuevaventa" class="btn btn-info btn-sm"></i> Nueva Venta</button>
    </div>
    
    <div class="table-responsive" style="max-height: 100px; overflow-y: auto;">
    <table class="table table-bordered table-sm" id="tablafact">
        <thead style="background: linear-gradient(to right, #4dabf7, #2e6da4); color: white;">
            <tr>
                <th scope="col">ID Producto</th>
                <th scope="col">Producto</th>
                <th scope="col">Precio</th>
                <th scope="col">Cantidad</th>
                <th scope="col">Subtotal</th>
                <th scope="col">Acciones</th>
            </tr>
        </thead>
        <tbody class="tBody">
            <!-- Aquí se agregarán las filas dinámicamente -->
        </tbody>
    </table>
</div>


    <div class="total-container mt-3 text-right">
    <div class="form-group d-inline-block" style="width: 200px;">
            <label class="total-label">Total:</label>
            <input type="number" id="totalfactura" name="totalfactura" class="form-control form-control-sm">
        </div>
    </div>

    <div class="button-container text-left">
        <button id="Guardarventa" class="btn btn-success btn-sm"></i> Guardar</button>
        <button id="Cancelarventa" class="btn btn-danger btn-sm"></i> Cancelar</button>
        <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#imagenAyuda" style="margin-left: 10px;">Ayuda</button>
    </div>
    <!-- Ventana emergente (modal) -->
    <div class="modal fade" id="imagenAyuda" tabindex="-1" role="dialog" aria-labelledby="imagenAyudaLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-xl" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <img src="{{ asset('images/ayuda/facturacion.png') }}" class="img-fluid" alt="Imagen de Ayuda">
                </div>
</div>
</form>
@stop

@section('css')
<style>
    .main-container {
        padding: 20px;
    }

    .titulo-facturacion {
        text-align: center;
        margin-bottom: 20px;
    }

    .info-container {
        display: flex;
        justify-content: space-between;
        margin-bottom: 20px;
    }

    .button-container {
        text-align: center;
    }

    .form-group {
        margin-bottom: 10px;
    }

    @media (max-width: 768px) {
        .info-container {
            flex-direction: column;
        }
    }  
    .total-container {
        display: flex;
        justify-content: flex-end;
        align-items: center;
    }
    .total-label {
        margin-right: 10px;
        font-size: 14px;
    }
    #totalfactura {
        width: 100px; /* Adjust the width as needed */
        display: inline-block;
    }
    .button-container {
        display: flex;
        justify-content: flex-start;
        gap: 10px; /* Adjust the space between buttons as needed */
    }
    .button-container .btn {
        margin-right: 10px; /* Optional, for additional spacing between buttons */
        margin-bottom: 10px; /* Ajustar el margen inferior para agregar espacio debajo de los botones */
        margin-top: 5px; /* Ajustar el margen superior para agregar espacio arriba de los botones */
    }
    label {
        color: #0056b3; /* Azul oscuro */
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
<script>
 document.addEventListener('DOMContentLoaded', (event) => {
        // Obtener la fecha actual
        var hoy = new Date();
            var Fecha = hoy.getFullYear()+'-'+(hoy.getMonth()+1).toString().padStart(2, '0')+'-'+hoy.getDate().toString().padStart(2, '0');
            
            // Mostrar la fecha en el cuadro de texto
            document.getElementById('fechafactura').value = Fecha;


        document.getElementById("Nuevaventa").addEventListener("click", function(event) {
            event.preventDefault(); // Previene la recarga de la página

                
                document.getElementById('fechafactura').disabled = false;
                document.getElementById('cantidad').disabled = false;
                document.getElementById('id_producto').disabled = false;
              
            });
        });


        $(document).ready(function() {
            $('#id_producto').on('change', function() {
                var selectedOption = $(this).find('option:selected');
                var precio = selectedOption.data('precio');
                var cantidad = selectedOption.data('cantidad');
                // Asigna el precio al campo de precio
                $('#precioventa').val(precio);
                // Asigna el stock al campo de stock
                $('#cantidadprod').val(cantidad);
            });
        });

        //Función para calcular el total de la factura
        function calcularTotal() {
            var total = 0;
            // Iterar sobre cada fila de la tabla
            $('#tablafact tbody tr').each(function() {
                // Obtener el valor del subtotal de la fila actual
                var subtotal = parseFloat($(this).find('td:eq(4)').text());
                // Verificar si el subtotal es un número válido
                if (!isNaN(subtotal)) {
                    // Sumar el subtotal al total
                    total += subtotal;
                }
            });
            // Actualizar el texto del campo de texto Totalventa con el total calculado
            $('#totalfactura').val(total.toFixed(2));
        }

        //Función para agregar datos de manera dinamica
        function agregarFila(id,producto, precioVenta, cantidad) {
            var subtotal = precioVenta * cantidad;
            var newRow = '<tr>' +
                '<td>' + id + '</td>' +
                '<td>' + producto + '</td>' +
                '<td>' + precioVenta.toFixed(2) + '</td>' +
                '<td>' + cantidad + '</td>' +
                '<td>' + subtotal.toFixed(2) + '</td>' +
                '<td>' +
                '<button type="button" class="btn btn-warning btn-sm btn-editar"><i class="fas fa-edit"></i></button>' +
                '<button type="button" class="btn btn-danger btn-sm btn-eliminar"><i class="fas fa-trash-alt"></i></button>' +
                '</td>' +
                '</tr>';
            $('tbody').append(newRow);
            calcularTotal();

        }


        //Función para agregar Productos a la tabla
        $('#btnagregar').click(function() {
            // Obtener los valores de los campos
            var precio = parseFloat($('#precioventa').val());
            var cantidad = parseInt($('#cantidad').val());
            var stock = parseInt($('#cantidadprod').val());
            var productoS = $('#id_producto option:selected').text();
            var id = $('#id_producto option:selected').val();


            // Validar que los campos no estén vacíos
            if (!isNaN(precio) && !isNaN(cantidad) && precio !== 0 && cantidad !== 0 &&
            productoS !== 'Seleccione un producto') {
                    if(cantidad > stock)
                    {
                        alert('La cantidad ingresada excede el stock disponible.');
                         return;
                    }
                   else if (cantidad < 1 || isNaN(cantidad)) {
                alert('Debe ingresar un número válido.');
                         return;;
            } 

                // Agregar una nueva fila con los valores editados
                agregarFila(id,productoS, precio, cantidad);

                // Limpiar los campos después de agregar la fila
                $('#precioventa').val('');
                $('#cantidad').val('');
                $('#cantidadprod').val('');
                $('#id_producto').val('Seleccione un producto');

                console.log('Producto agregado correctamente');
            } else {
                alert('Por favor, complete todos los campos.');
            }

           
            calcularTotal();
        });

        document.getElementById("Guardarventa").addEventListener("click", function() {
    // Obtener valores de los campos
    var fechaventa = document.getElementById("fechafactura").value;
    var id_usuario = document.getElementById("idusuario").value;
    var estado = null; // Estado es null por defecto
    var total = document.getElementById("totalfactura").value;

    // Inicializar array de detalles
    var detalles = [];

    // Obtener todas las filas de la tabla con detalles de la factura
    var tableRows = document.querySelectorAll("#tablafact tbody tr");

    // Recorrer cada fila y obtener los valores de las celdas
    tableRows.forEach(function(row) {
        var idproducto = row.cells[0].textContent;
        var precio = parseInt(row.cells[2].textContent);
        var cantidad = parseInt(row.cells[3].textContent);
        var importe = parseInt(row.cells[3].textContent);

        // Crear objeto detalle
        var detalle = {
            idproducto: idproducto,
            cantidad: cantidad,
            precio: precio,
            importe:importe
        };
        
        // Agregar el detalle al array
        detalles.push(detalle);
    });

    // Crear objeto con los datos
    var data = {
        totalfactura: total,
        fechafactura: fechaventa,
        idusuario: id_usuario,
        estado: estado,
        detalles: detalles
    };

    console.log(data);
    // Enviar la solicitud POST al controlador de Laravel
    fetch('crear-factura', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
        },
        body: JSON.stringify(data)
    })
    .then(response => {
        if (!response.ok) {
            // Acceder al cuerpo de la respuesta para obtener más detalles del error
            return response.text().then(text => {
                throw new Error('Network response was not ok. Status: ' + response.status + 
                    ', ' + response.statusText + ', Response Body: ' + text);
            });
        }
        return response.json();
    })
    .then(data => {
        console.log(data);
        // Mostrar mensaje de éxito
        alert("Venta realizada con éxito");

        // Redirigir a la misma página después de un breve retraso
        setTimeout(function() {
            window.location.reload(); // Recargar la página actual
        }, 1000); // Recargar después de 1 segundo (1000 milisegundos)
    })
    .catch(error => {
        console.error('Error:', error);
        alert('Hubo un error al realizar la venta. Verifique la consola para más detalles.');
    });
});


       
</script>
@stop
