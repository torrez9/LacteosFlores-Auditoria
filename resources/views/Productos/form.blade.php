<div class="form-group">
    <label>Descripción:</label>
    <input type="text" name="descripcion" class="form-control" placeholder="Descripción del producto" value="{{old('descripcion')}}">
    @error('descripcion')
                <span class="text-danger text-error">{{$message}} </span>
            @enderror
        </div>
        
        <div class="form-group">
    <label>Cantidad:</label>
    <input type="number" name="cantidadprod" class="form-control" placeholder="Cantidad" value="{{old('cantidadprod')}}">
    @error('cantidadprod')
                <span class="text-danger text-error">{{$message}} </span>
            @enderror
        </div>
    <div class="busqueda-container">
        {{-- <div class="busqueda-column">
            <label>Búsqueda por:</label>
            <select id="filtro" class="form-control">
                <option value="descripcion">Descripción</option>
                <option value="cantidad">Cantidad</option>
                <option value="proveedor">Proveedor</option>
                <option value="precio">Precio</option>
            </select>
        </div> --}}
        {{-- <div class="busqueda-column">
            <div class="busqueda-input-container">
                <input type="text" id="busqueda" class="form-control" placeholder="Búsqueda">
                <a href="#" class="buscar-icon"><i class="fas fa-search"></i></a>
            </div>
        </div> --}}
    </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
    <label>Precio Venta:</label>
    <input type="number" name="precioventa" class="form-control" placeholder="Precio de venta" value="{{old('precioventa')}}" >
    @error('precioventa')
                <span class="text-danger text-error">{{$message}} </span>
            @enderror
        </div>
    
        <div class="form-group">
            <label for="proveedor" class="form-label">Selecciona un proveedor:</label>
            <input type="text" class="form-control" id="proveedor" name="proveedor"
                placeholder="Escribe el nombre del proveedor" value="{{old('proveedor')}}">
            <input type="hidden" id="idproveedor1" name="idproveedor">
            <!-- Este campo oculto almacenará el ID del proveedor seleccionado -->
        </div>
        @error('idproveedor')
        <span class="text-danger text-error">{{$message}} </span>
    @enderror
    
    </div>
    </div>
    </div>
    @section('css')
    
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <style>
     
      label {
        color: #0056b3; /* Color azul oscuro */
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
    <script src="https://code.jquery.com/ui/1.13.1/jquery-ui.min.js"></script>
    <script>
     $(function() {
            // Obtener la lista de proveedores para el autocompletado
            var proveedor = [
                @foreach ($proveedores as $provee)
                    {
                        label: "{{ $provee->razonsocial }}",
                        value: "{{ $provee->id_proveedores }}",
                    },
                @endforeach
            ];
    
            // Inicializar el autocompletado
            $("#proveedor").autocomplete({
                source: proveedor,
                minLength: 1,
                select: function(event, ui) {
                    // Al seleccionar un proveedor, actualizar el campo oculto con el ID del proveedor seleccionado
                    $('#idproveedor1').val(ui.item.value);
                    $('#proveedor').val(ui.item.label);
                    return false;
                }
            });
        });
    </script>
    @stop