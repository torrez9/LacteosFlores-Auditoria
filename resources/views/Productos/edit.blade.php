@extends('adminlte::page')
@section('content')

<div class="main-container">
    <div class="box box-solid box-primary rounded">
        <div class="box-header with-border">
        <center>
        <br><br>
        <h1 class="titulo-facturacion" style="color: #0056b3; font-size: 30px;">Productos</h1>
     </center>        </div>
        <form action="{{route('Productos.update', $producto->id_producto)}}" method="POST"> 
            @csrf
            @method('PUT')
        <div class="info-container">
            <div class="row">
                <div class="col-md-6">
                    @include('Productos.form1') 
                </div>
            </div>
        </div>


    <div class="button-container">
    <button id="nuevoProducto" class="btn btn-info btn-sm">Nuevo</button>
    <button type="submit" class="btn btn-success btn-sm mr-2">Guardar</button>
    {{-- <button id="ActualizarProducto" class="btn btn-primary">Actualizar</button>
    <button class="btn btn-danger btn-sm mr-2">Cancelar</button> --}}
    <br>
    <div class="custom-btn-container">
        <br>
       <a href="{{route('Productos.index')}}" class="btn btn-primary btn-sm">Ver Productos</a>
    </div>
</div>
</form>
@stop

@section('css')
<style>
    
</style>
@stop