@extends('plantilla')

@section('seccion')
<h1>Detalle del productoa:</h1>
<h4>Id: {{$producto->id}}</h4>
<h4>Nombre: {{$producto->nombre}}</h4>
<h4>Detalle: {{$producto->descripcion}}</h4>
@endsection
