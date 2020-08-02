@extends('layouts.appmi')


@section('titulo', "Productos")

@section('lateral')
   @parent
   <p class="mt-5">Esto se agrega a el sidebar para productos</p>
@endsection

@section('contenido')
    <p>Contenido de producto</p>
@endsection
