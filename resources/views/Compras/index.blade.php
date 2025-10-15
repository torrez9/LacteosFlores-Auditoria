@extends('adminlte::page')

@section('title', 'Compra')

@section('content_header')
@stop

@section('content')
<form action="{{route('Compra.store')}}">
    @csrf
    <div class="main-container">
    <h1 class="titulo-facturacion" style="color: #0056b3; font-size: 30px;">Compra</h1>
   <div class="info-container">
    <div class="col-md-6" style="margin-left: -25px;">
        <label for="fecha">Fecha</label>
        <input type="date" class="form-control" id="fechacompra" name="fechacompra" placeholder="Fecha del día" disabled>
    </div>
    <div class="col-md-6" style="margin-right: -5px;">
        <label for="TextoFactura">No Compra</label>
        <input value="{{ $nuevoId }}" type="text" class="form-control ml-2 small-input" id="NoFactura" readonly>
        <input type="hidden" id="idusuario" name="idusuario" value="{{ Auth::id() }}">
    </div>
</div>

</div>
                </div>
                <div class="container">
                     <div class="column">
                        
                     <div class="form-group">
                         <label for="proveedor" class="form-label">Seleccionar un proveedor:</label>
                        <select class="form-control custom-select" id="id_proveedores" name="id_proveedores" disabled>
                    <option>Selecciona un proveedor</option>
                        @foreach ($proveedores as $proveedor)
                            <option value="{{ $proveedor->id_proveedores }}">
                                {{ $proveedor->nombre }}
                            </option>
                        @endforeach
                    </select>
                    <label>Precio compra:</label>
                    <input type="text" id="precio" name="precio" disabled>
                </div>
             </div>
                <div class="column">
                <div class="form-group">
                        <label for="producto" class="form-label">Seleccionar un producto:</label>
                        <select class="form-control custom-select" id="id_producto" name="id_producto" disabled>
                            <option>Selecciona un producto</option>
                            @foreach ($productos as $product)
                                <option value="{{ $product->id_producto }}" data-precio="{{ $product->precioventa }}"
                                    data-cantidad="{{ $product->cantidadprod }}">{{ $product->descripcion }}</option>
                            @endforeach
                        </select>
                    </div>
                        <!-- <label>Producto:</label>
                        <input type="text" id="id_producto"> -->
                        <label>Stock actual:</label>
                        <input type="number" id="cantidadprod" name="cantidadprod" class="form-control" readonly>
                       
                    </div>
                        <div class="column">
                            <label>Cantidad a comprar:</label>
                            <input type="text" id="cantidad" name="cantidad" disabled>
                           
                        </div>
                    </div>
                    <div class="table-responsive" style="max-height: 100px; overflow-y: auto;">
                        <table class="table table-bordered table-sm" id="tablacompras" style="width: 100%; border-collapse: collapse; margin-top: 20px; border: 1px solid #333;">
                            <thead style="background: linear-gradient(to right, #4dabf7, #2e6da4); color: white;">
                            <tr>
                            <th style="col">Id Producto</th>
                            <th style="col">Precio Compra</th>
                            <th style="col">Cantidad</th>
                            <th style="col">Subtotal</th>
                            <th style="col">Acciones</th>
                            </tr>
                            </thead>
                                    <tbody id="tablacompras-body"></tbody>
                        </table>
                    </div>
                            <div class="total-container" style="margin-top: 20px;">
                                <label class="total-label">Total:</label>
                                <input type="text" id="Total" name="Total" style="width: 100px;" readonly>
                            </div>

                            <div class="button-container text-left" style="margin-top: 20px;">
                            <button id="btnNuevaC" class="btn btn-info btn-sm mr-2">Nueva Compra</button>
                            <button id="btnguardar" class="btn btn-success btn-sm mr-2">Guardar Compra</button>
                            <button id="btnAgregarPro" class="btn btn-success btn-sm mr-2" type="button">Agregar</button>
                            <button id="btnCancelarC" class="btn btn-danger btn-sm mr-2">Cancelar</button>
                            <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#imagenAyuda" style="margin-left: 10px;">Ayuda</button>
                            </div>
                            <!-- Ventana emergente (modal) -->
                            <div class="modal fade" id="imagenAyuda" tabindex="-1" role="dialog" aria-labelledby="imagenAyudaLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-xl" role="document">
                                    <div class="modal-content">
                                        <div class="modal-body">
                                            <img src="{{ asset('images/ayuda/compra.png') }}" class="img-fluid" alt="Imagen de Ayuda">
                                        </div>
                                                </div>
                    </form>
<!-- </form> -->
@stop

@section('css')
    {{-- Agregar aquí hojas de estilo adicionales --}}
    <style>
        .main-container {
         padding: 20px;
        }
        .info-container {
    display: flex;
    justify-content: space-between;
    flex-wrap: wrap; /* Permite que los elementos se envuelvan en lugar de desbordarse */
}

.col-md-6 {
    display: flex;
    flex-direction: column;
    width: 48%;
    margin-bottom: 10px;
}

/* O si prefieres ajustar solo ciertos inputs */

#NoFactura {
    width: 100%; /* Ajusta este valor según tus necesidades */
}

#fechacompra{
    width: 100%; /* Ajusta este valor según tus necesidades */
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
        #Total {
            width: 130px!important; /* Reducir el ancho a 80px */
            display: inline-block;
        }

        /* Agregar estilos personalizados */
        .titulo-facturacion {
            text-align: center;
            color: #333; /* Color del texto */
        }

        /* Agregar más estilos si es necesario */
        
        .container {
            display: flex;
            justify-content: space-between;
            flex-wrap: wrap; /* Permite que los elementos se envuelvan en lugar de desbordarse */
        }

        .column {
            flex-basis: 30%;
        }

        .left-column, .right-column {
            margin-bottom: 20px;
        }

        label {
            margin-bottom: 5px;
            display: block;
        }

        input[type="text"] {
            width: calc(100% - 10px);
            padding: 5px;
            border-radius: 5px;
            border: 1px solid #ccc;
        }

        .datagrid th, .datagrid td {
            border: 1px solid #ccc;
            padding: 8px;
            text-align: center;
        }


        .button-container {
            margin-top: -25px!important;
            text-align: center;
        }

        label {
        color: #0056b3; /* Azul oscuro */
        margin-top: 10px;
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
        var today = new Date();
            var date = today.getFullYear()+'-'+(today.getMonth()+1).toString().padStart(2, '0')+'-'+today.getDate().toString().padStart(2, '0');
            
            // Mostrar la fecha en el cuadro de texto
            document.getElementById('fechacompra').value = date;


        document.getElementById("btnNuevaC").addEventListener("click", function(event) {
            event.preventDefault(); // Previene la recarga de la página

                document.getElementById('precio').disabled = false;
              //  document.getElementById('fechacompra').disabled = false;
                document.getElementById('id_proveedores').disabled = false;
                document.getElementById('id_producto').disabled = false;
                document.getElementById('cantidad').disabled = false;
              
            });
        });




        $(document).ready(function() {
            $('#id_producto').on('change', function() {
                var selectedOption = $(this).find('option:selected');
                var cantidad = selectedOption.data('cantidad');
                //asigna el stock al campo de stock
                $('#cantidadprod').val(cantidad);
            });
        });
        //La seleccion de idproveedor
        $(document).ready(function() {
          $('#idproveedores').on('change', function() {
              var selectedOption = $(this).find('option:selected');
            
              var id = selectedOption.val(); // Captura el valor del ID del proveedor
            });
        });




        $('#btnAgregarPro').click(function() {
            // Obtener los valores de los campos
            var precioCompra = parseFloat($('#precio').val());
            var cantidadprod = parseInt($('#cantidad').val());
            var id_producto = $('#id_producto').val();
            var id_proveedor = $('#idproveedores').val();

            // Validar que los campos no estén vacíos y que las selecciones no estén en valores predeterminados
            if (!isNaN(precioCompra) && !isNaN(cantidadprod) && precioCompra !== 0 && cantidadprod !== 0 && id_producto !== '') {
                // Agregar una nueva fila con los valores ingresados
                agregarFila(id_producto, precioCompra, cantidadprod);

                // Limpiar los campos después de agregar la fila
                $('#precio').val('');
                $('#cantidad').val('');
                $('#id_producto').val('');

                console.log('Producto agregado correctamente');
            } else {
                alert('Por favor, complete todos los campos.');
            }
            // calcularTotal();
            });

            // Función para agregar una nueva fila a la tabla
            function agregarFila(id_producto, precioCompra, cantidadprod) {
            var subtotal = precioCompra * cantidadprod;
            var newRow = '<tr>' +
                '<td>' + id_producto + '</td>' +
                '<td>' + precioCompra.toFixed(2) + '</td>' +
                '<td>' + cantidadprod + '</td>' +
                '<td>' + subtotal.toFixed(2) + '</td>' +
                '<td>' +
                '<button type="button" class="btn btn-warning btn-sm btn-editar">Editar</button>' +
                '<button type="button" class="btn btn-danger btn-sm btn-eliminar">Eliminar</button>' +
                '</td>' +
                '</tr>';
                
            $('#tablacompras tbody').append(newRow); // Cambiado a '#tablacompra'
            calcularTotal();
            desproveedor();
            }

            function desproveedor()
            {
                document.getElementById('id_proveedores').disabled = true;
                document.getElementById('fechacompra').disabled = true;
            }

            function calcularTotal() {
            var total = 0;
            // Iterar sobre cada fila de la tabla
            $('#tablacompras tbody tr').each(function() {
                // Obtener el valor del subtotal de la fila actual
                var subtotal = parseFloat($(this).find('td:eq(3)').text());

                // Verificar si el subtotal es un número válido
                if (!isNaN(subtotal)) {
                    // Sumar el subtotal al total
                    total += subtotal;
                }
            });
            // Actualizar el texto del campo de texto Totalventa con el total calculado
            $('#Total').val(total.toFixed(2));
        }

        document.getElementById("btnguardar").addEventListener("click", function(event) {
        event.preventDefault(); // Previene la recarga de la página

        var fechacompra = document.getElementById("fechacompra").value;
        var id_proveedores = parseInt(document.getElementById("id_proveedores").value);
        var idusuario = parseInt(document.getElementById("idusuario").value);
        var Total = parseFloat(document.getElementById("Total").value);

    var detalles = [];
    var tableRows = document.querySelectorAll("#tablacompras tbody tr");
    tableRows.forEach(function(row) {
        var idproducto = parseInt(row.cells[0].textContent);
        var precio = parseFloat(row.cells[1].textContent);
        var cantidad = parseInt(row.cells[2].textContent);
        var subtotal = precio * cantidad;

        var detalle = {
            idproducto: idproducto,
            precio: precio,
            cantidad: cantidad,
            importe: subtotal
        };
        detalles.push(detalle);
    });
  
    var data = {
        
        fechacompra: fechacompra,
        idproveedores: id_proveedores,
        id_usuario: idusuario,
        Total: Total,
        detalles: detalles
    };
    console.log(data); // Añade esta línea antes de fetch

    fetch('/crear-compra', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
        },
        body: JSON.stringify(data)
    })
    .then(response => {
        if (!response.ok) {
            return response.text().then(text => {
                throw new Error('Network response was not ok. Status: ' + response.status +
                    ', ' + response.statusText + ', Response Body: ' + text);
            });
        }
        return response.json();
    })
    .then(data => {
        console.log(data); // Verifica la respuesta aquí
        alert("Compra realizada con éxito");

         // Redirigir a la misma página después de un breve retraso
         setTimeout(function() {
            window.location.reload(); // Recargar la página actual
        }, 1000); // Recargar después de 1 segundo (1000 milisegundos)
    })
    .catch(error => {
        console.error('Error:', error);
    });
});



    </script>
@stop


