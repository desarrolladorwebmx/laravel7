@extends('layouts.appmi')


@section('titulo', "Ventas")

@section('lateral')
   @parent
   <p class="mt-5">@lang('main.sales')</p>
@endsection

@section('contenido')
    <p>Contenido de Ventas</p>
@endsection
