@extends('plantilla')

@section('seccion')
  <div class="container my-4">
        <h1 class="display-4">Productos</h1>

        <form action="{{ route('productos.crear')}}" method="POST">
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
      value="{{ old('nombre') }}"><!-- Old sirve para que laravel no olvide nuestros campos -->
      <!--seguimos usando el name -->

      <input type="text" name="descripcion"
       placeholder="Descripcion" class="form-control  mb-2"
       value="{{ old('descripcion') }}">

      <button class="btn btn-primary btn-block" type="submit">Agregar</button>
  </form>

        <div class="card-body">
                    <table class="table">

                        <thead>
                            <tr>
                            <th scope="col">#</th>
                            <th scope="col">Nombre</th>
                            <th scope="col">Descripción</th>
                            <th scope="col">Acción</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($productos as $item)
                            <tr>
                                <th scope="row">{{ $item->id }}</th>
                                <td>
                                <a href="{{ route('productos.detalle', $item)}}">
                                    {{$item->nombre}}
                                </a></td>

                                <td>{{ $item->descripcion }}</td>
                                <td>
                                    <a href="{{ route('productos.editar', $item)}}" class="btn btn-warning btn-sm">Editar</a>

                                    <form action="{{ route('productos.eliminar', $item) }}" method="POST" class="d-inline">
                                        @method('DELETE')
                                        @csrf
                                        <button class="btn btn-danger btn-sm" type="submit">
                                            Eliminar
                                        </button>
                                    </form>
                                 </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>

                </div>
    </div>

    @endsection
