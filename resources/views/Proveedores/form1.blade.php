
<div class="form-group">
    <label for="cedula" style="color: #0056b3;">Cédula:</label> <!-- Cambio de color -->
    <input type="text" name="cedula" class="form-control" style="color: #000; height: 35px;" value="{{$proveedor->cedula}}"> <!-- Cambio de color -->
    @error('cedula')
        <span class="text-danger text-error">{{$message}} </span>
    @enderror
</div>

<div class="form-group">
    <label for="nombre" style="color: #0056b3;">Nombre:</label> <!-- Cambio de color -->
    <input type="text" name="nombre" class="form-control" style="color: #000; height: 35px;" value="{{$proveedor->nombre}}"> <!-- Cambio de color -->
    @error('nombre')
        <span class="text-danger text-error">{{$message}} </span>
    @enderror
</div>
<div class="form-group">
    <label for="apellido" style="color: #0056b3;">Apellido:</label> <!-- Cambio de color -->
    <input type="text" name="apellido" class="form-control" style="color: #000; height: 35px;" value="{{$proveedor->apellido}}"> <!-- Cambio de color -->
    @error('apellido')
        <span class="text-danger text-error">{{$message}} </span>
    @enderror
</div>
<div class="form-group">
    <label for="telefono" style="color: #0056b3;">Teléfono:</label> <!-- Cambio de color -->
    <input type="number" name="telefono" class="form-control" style="color: #000; height: 35px;" value="{{$proveedor->telefono}}"> <!-- Cambio de color -->
    @error('telefono')
        <span class="text-danger text-error">{{$message}} </span>
    @enderror
</div>
<div class="form-group">
    <label for="apellido" style="color: #0056b3;">Estado:</label> <!-- Cambio de color -->
    <input type="text" name="estado" class="form-control" style="color: #000; height: 35px;" value="{{$proveedor->estado}}"> <!-- Cambio de color -->
    {{-- @error('apellido')
        <span class="text-danger text-error">{{$message}} </span>
    @enderror --}}
</div>
<!--<div class="form-group">
    <label for="estado" style="color: #000;">Estado:</label> <!-- Cambio de color 
    <select name="estado" class="form-control" style="color: #000;"> <!-- Cambio de color 
        <option value="activo">Activo</option>
        <option value="inactivo">Inactivo</option>
    </select>
</div>-->

</div>

<div class="col-md-6">

<div class="form-group">
    <label for="ruc" style="color: #0056b3;">RUC:</label> <!-- Cambio de color -->
    <input type="text" name="ruc" class="form-control" style="color: #000; height: 35px;" value="{{$proveedor->ruc}}"><!--metodo value sirve para preservar datos aunque se recargue <!-- Cambio de color -->
    @error('ruc')
        <span class="text-danger text-error">{{$message}} </span>
    @enderror
</div>
<div class="form-group">
    <label for="razonsocial" style="color: #0056b3;">Razón Social:</label> <!-- Cambio de color -->
    <input type="text" name="razonsocial" class="form-control" style="color: #000; height: 35px;" value="{{$proveedor->razonsocial}}"> <!-- Cambio de color -->
    @error('razonsocial')
        <span class="text-danger text-error">{{$message}} </span>
    @enderror
</div>
<div class="form-group">
    <label for="direccion" style="color: #0056b3;">Dirección:</label> <!-- Cambio de color -->
    <input type="text" name="direccion" class="form-control" style="color: #000; height: 35px;" value="{{$proveedor->direccion}}"> <!-- Cambio de color -->
    @error('direccion')
        <span class="text-danger text-error">{{$message}} </span>
    @enderror
</div>
<div class="form-group">
    <label for="correo" style="color: #0056b3;">Correo:</label> <!-- Cambio de color -->
    <input type="text" name="email" class="form-control" style="color: #000; height: 35px;" value="{{$proveedor->email}}"> <!-- Cambio de color -->
    @error('email')
        <span class="text-danger text-error">{{$message}} </span>
    @enderror
</div>
<!--<div class="form-group">
    <label for="filtro" style="color: #000;">Búsqueda por:</label> <!-- Cambio de color 
    <select name="filtro" class="form-control" style="color: #000;"> <!-- Cambio de color -
        <option value="descripcion">Descripción</option>
        <option value="cantidad">Cantidad</option>
        <option value="proveedor">Proveedor</option>
        <option value="precio">Precio</option>
    </select>
</div>-->
<!--<div class="form-group">
    <label for="busqueda" style="color: #000;">Buscar:</label> <!-- Cambio de color 
    <div class="input-group">
        <input type="text" name="busqueda" class="form-control" style="color: #000;"> <!-- Cambio de color 
        <span class="input-group-btn">
            <button class="btn btn-primary" type="button"><i class="fa fa-search"></i></button>
        </span>
    </div>-->
</div>
</div>
