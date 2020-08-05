@extends('plantilla')

@section('seccion')
<h1>Editar producto {{ $producto->id }}</h1>


<a href="{{route('inicio')}}" style="margin-bottom:10px" class="btn btn-primary">Volver al listado</a>

@if(session('mensaje'))
<div class="alert alert-success">{{ session('mensaje')}}</div>
@endif

<form action="{{ route('productos.update', $producto->id) }}" method="POST">
 @method('PUT')
      @csrf <!-- toquen para proteger el formulario-->

      @error('nombre')
        <div class=" alert alert-danger">
              El nombre es obligatorio
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
              </button>
        </div>
      @enderror
      @error('descripcion')
        <div class=" alert alert-danger">
              La descripcion es obligatoria
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
              </button>
        </div>
      @enderror

      <input type="text" name="nombre"
      placeholder="Nombre" class="form-control  mb-2"
      value="{{ $producto->nombre}}"> <!-- mostramos el nombre que trae el objeto nota -->

      <input type="text" name="descripcion"
       placeholder="Descripcion" class="form-control  mb-2"
       value="{{ $producto->descripcion }}">

      <button class="btn btn-warning btn-block" type="submit">Guardar</button>
  </form>
@endsection
