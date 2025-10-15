@extends('adminlte::page')

@section('title', 'Devolución')

@section('content_header')
    <h1 class="titulo-facturacion" style="color: #0056b3; font-size: 30px;">Devolución</h1>
@stop

@section('content')
<!-- <form action="{{route('Devoluciones.store')}}" > -->
    @csrf
    <div class="main-container">
        <div class="box box-primary">
            <div class="box-header with-border">
            <h3 class="box-title" style="color: #0056b3; font-size: 20px;">Datos de Devolución</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
    <div class="info-container">
        <div class="left-column">
        <label for="searchInvoice" style="color: #0056b3;">Buscar Factura:</label>
        <input type="text" id="searchInvoice" style="color: #000; height: 30px;">
        <button id="searchInvoice1" class="btn btn-success btn-sm" onclick="buscarFactura()">Buscar</button>
        <br><br>
        <div class="table-responsive" style="max-height: 100px; overflow-y: auto;">
            <table class="table table-bordered table-sm" id="tablafact">
                <thead style="background: linear-gradient(to right, #4dabf7, #2e6da4); color: white;">
            <tr>
                <th>N° Factura</th>
                <th>Fecha Venta</th>
                <th>Total</th>
                <th>Estado</th>
                <!-- Agrega más columnas según sea necesario -->
                </tr>
            </thead>
            <tr>
                <td id="NumFactura"></td>
                <td id="fechafactura"></td>
                <td id="totalfactura"></td>
                <td id="estado"></td>
                <!-- Agrega más celdas según sea necesario -->
                </tr>
            </table>
        </div>
            <div class="form-group">
            
            <input type="hidden" id="idusuario" name="idusuario" value="{{Auth::id()}}">
            <input value="{{ $nuevoId }}" type="hidden" class="form-control ml-2 small-input" id="iddevolucion" readonly>
        </div>
        
        <div class="button-container">
            <button  id="Anularfact" class="btn btn-info btn-sm">Anular</button>
            <!-- id="anular" -->
            <button class="btn btn-danger btn-sm">Cancelar</button>
        </div>
    </div>
    <div class="right-column-container">
    <label for="returnDate" style="color: #0056b3;">Fecha Devoluciones:</label>
    <input type="date" class="form-control form-control-sm" id="fechadevolucion" name="fechadevolucion" disabled >
    <br>
    <div class="form-group">
    <br>
    <label for="returnDate" style="color: #0056b3;">Motivo anulación:</label>
    
    <select class="form-control-sm custom-select" id="motivodevolucion1" name="estado" disabled  placeholder="Escribe el motivo de la devolución">>
                         <option>Anular por error</option>
                             <option>Anular por devolucion</option>
    </select>
    </div>

    <label for="returnReason" style="color: #0056b3;">Motivo de Devolución:</label>
    <input id="motivodevolucion" class="form-control form-control-sm" name="motivodevolucion" rows="4" disabled >

    <label for="actionsTaken" style="color: #0056b3;">Acciones Tomadas:</label>
    <input type="text"  class="form-control form-control-sm" id="accionestomada" name="accionestomada" disabled>

    <div class="table-responsive" style="max-height: 100px; overflow-y: auto;">
        <table id="detallesTableBody" class="table table-bordered table-sm">
            <thead style="background: linear-gradient(to right, #4dabf7, #2e6da4); color: white;">
                <tr>
                    <th scope="col">ID Producto</th>
                    <th scope="col">cantidad</th>
                    <th scope="col">Precio</th>
                    <th scope="col">subtotal</th>
                </tr>
            </thead>
            <tbody id="detallesTableBody1">

            </tbody>
        </table>
    </div>
    <div class="total-section">
    <label for="total" class="total-label" style="color: #0056b3;">Total:</label>
    <input type="text" id="total" class="form-control form-control-sm"  disabled>
    </div>

</div>
<!-- </form> -->
@stop

@section('css')
    <style>
         .main-container {
        padding: 20px;
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
     .titulo-facturacion {
            text-align: center;
            margin-bottom: 20px;
        }
        .box-title {
            margin-bottom: 15px;
            margin-top: -30px;
        }
        .container {
            max-width: 1200px;
            margin: 20px auto;
            padding: 20px;
            box-sizing: border-box;
        }

        .info-container {
            display: flex;
            justify-content: space-between;
        }

        .left-column,
        .right-column-container {
            width: 48%;
        }

        label {
            display: block;
            margin-bottom: 5px;
            color: #0D0D0D; /* Nuevo color de texto */
        }

        input, textarea {
            width: calc(100% - 5px);
            padding: 8px;
            margin-bottom: 10px;
            box-sizing: border-box;
        }

        button {
            padding: 10px 20px;
            font-size: 16px;
            cursor: pointer;
            background-color: #0583F2; /* Nuevo color de botón */
            color: #F2F2F2; /* Nuevo color de texto */
            border: none;
            border-radius: 4px;
            margin-top: 10px;
            margin-right: 5px;
        }

        .datagrid {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); /* Sombreado corregido */
            overflow-y: auto; /* Cambia a desplazamiento vertical automático */
        }

        .datagrid th,
        .datagrid td {
            border: 1px solid #ddd;
            padding: 12px;
            text-align: left;
        }

        .datagrid th {
            background-color: #0583F2; /* Nuevo color de encabezado */
            color: #F2F2F2; /* Nuevo color de texto */
        }

        .total-section {
            margin-top: 20px;
            font-weight: bold;
        }

        .total-section input[type="text"] {
            width: calc(100% - 85px);
            /* Se usa 'calc' para restar el ancho del label 'Total:' */
        }

        #total {
            width: 130px; /* Ajusta según sea necesario */
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

        document.getElementById("searchInvoice1").addEventListener("click", function(event) {
            event.preventDefault(); // Previene la recarga de la página

            document.getElementById('fechadevolucion').disabled = false;
                document.getElementById('motivodevolucion').disabled = false;
                document.getElementById('accionestomada').disabled = false;
                document.getElementById('motivodevolucion1').disabled = false;
              
            });
        });


     function buscarFactura() {
    var numeroFactura = document.getElementById("searchInvoice").value;

    var xhr = new XMLHttpRequest();
    xhr.open("GET", "/buscarFactura?id_factura=" + numeroFactura, true);
    xhr.onreadystatechange = function () {
        if (xhr.readyState == 4) {
            if (xhr.status == 200) {
                var data = JSON.parse(xhr.responseText);
                var factura = data.factura;
                var detalles = data.detalles;

                console.log(factura);  // Log para verificar la respuesta de factura
                console.log(detalles);  // Log para verificar la respuesta de detalles

                // Asignar valores de la factura a los elementos de la tabla
                document.getElementById("NumFactura").innerText = factura.id_factura;
                document.getElementById("fechafactura").innerText = factura.fechafactura;
                document.getElementById("totalfactura").innerText = factura.totalfactura;
                document.getElementById("estado").innerText = factura.estado;
              
                  // Asignar valores de los detalles a los elementos de la tabla
                  var detallesTable = document.getElementById("detallesTableBody1");
                 detallesTable.innerHTML = ""; // Limpiar la tabla antes de agregar nuevos datos
                
                detalles.forEach(function(detalle) {
                    var row = detallesTable.insertRow();

                    var cellIdProducto = row.insertCell(0);
                    var cellCantidad = row.insertCell(1);
                    var cellPrecio = row.insertCell(2);
                    var cellSubtotal = row.insertCell(3);
                    //var cellIdDetalleFactura = row.insertCell(4);

                    cellIdProducto.innerText = detalle.idproducto;
                    cellCantidad.innerText = detalle.cantidad;
                    cellPrecio.innerText = detalle.precio;
                    cellSubtotal.innerText = detalle.importe;
                   // cellIdDetalleFactura.innerText = detalle.id_detallefactura;
                });
            } else {
                console.error("Error: " + xhr.statusText);
                alert("Factura no encontrada");
            }
        }
        calcularTotal();
    };
    xhr.send();
    
}


// document.getElementById('mostrardetalles').addEventListener('click', function() {
//     const elements = document.querySelectorAll('#product, #quantity, #price, #subtotalField');
//     elements.forEach(element => {
//         element.disabled = false;
//     });
    
// });

function calcularTotal() {
    var total = 0;
    $('#detallesTableBody1 tr').each(function() {
        var subtotal = parseFloat($(this).find('td:eq(3)').text());
        console.log('Subtotal:', subtotal);
        if (!isNaN(subtotal)) {
            total += subtotal;
        }
    });
    console.log('Total:', total);
    $('#total').val(total.toFixed(2));
}

document.getElementById("Anularfact").addEventListener("click", function(event) {
        event.preventDefault(); // Previene la recarga de la página

    var idfactura = parseInt(document.getElementById("searchInvoice").value);
   // var idusuario = document.getElementById("idusuario").value;
    var fechaDevolucion = document.getElementById("fechadevolucion").value;
    var totalDevolucion = parseFloat(document.getElementById("total").value); // Establecer el total fijo
    var iddevolucion = parseInt(document.getElementById("iddevolucion").value);
    var motivoDevolucion = document.getElementById("motivodevolucion").value;
    var accionesTomadas = document.getElementById("accionestomada").value;
    var estado = document.getElementById("motivodevolucion1").value;
    
    // var estado = document.getElementById("motivodevolucion1");
    //         selectElement.addEventListener("change", function() {
    //             var selectedValue = selectElement.value;
    //             var myVariable = selectedValue;})

    if (!idfactura || !fechaDevolucion || !totalDevolucion || !motivoDevolucion || !accionesTomadas) {
        alert("Por favor, complete todos los campos.");
        return;
    }
    // Inicializar array de detalles
    var detalles = [];
    
 // Obtener todas las filas de la tabla con detalles de la factura
    var tableRows = document.querySelectorAll("#detallesTableBody tbody tr");


// Recorrer cada fila y obtener los valores de las celdas
    tableRows.forEach(function(row) {
    var idproducto = parseFloat(row.cells[0].textContent)
    var precio = parseFloat(row.cells[2].textContent);
    var cantidadD = parseInt(row.cells[1].textContent);
    //var importe = parseInt(row.cells[3].textContent);

    // Crear objeto detalle
    var detalle = {
       
        cantidadD: cantidadD,
        precio: precio,
        idproducto: idproducto
      //  importe:importe
        
    };
    
    // Agregar el detalle al array
    detalles.push(detalle);
});
var data = {
        estado: estado,
        idfactura: idfactura,
       // idusuario: idusuario,
        fechadevolucion: fechaDevolucion,
        totaldevolucion: totalDevolucion,
        motivodevolucion: motivoDevolucion,
        accionestomadas: accionesTomadas,
        iddevolucion: iddevolucion,
        detalle: detalles

    };
    // Aquí podrías enviar `detalle` al servidor o procesarlo como necesites
    console.log(data);

    fetch('/anularFactura1', {
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
        alert("Factura anulada y devolución registrada correctamente");

        // Redirigir a la misma página después de un breve retraso
        setTimeout(function() {
            window.location.reload(); // Recargar la página actual
        }, 1000); // Recargar después de 1 segundo (1000 milisegundos)
    })
    .catch(error => {
        console.error('Error:', error);
        alert('Hubo un error al anular la factura. Verifique la consola para más detalles.');
    });
});


    </script>
@stop
