@extends('layouts.app')
@section('content')
@if($errors->any())
<div class="row justify-content-center">
   <div class="col-sm-7">
       <div class="alert alert-danger">
           <ul>
             @foreach($errors->all() as $error)
                <li>{{$error}}</li>
             @endforeach
           </ul>
       </div>
   </div>
</div>

@endif
   <form method="post" action="{{route('entrada.store')}}">
     @csrf
      <div class="row justify-content-center">
          <div class="col-sm-7">
              <div class="form-group">
                <label for="titulo">Titulo</label>
                 <input type="text"  class="form-control" name="titulo" id="titulo" placeholder="Titulo" value="{{old('titulo')}}">
              </div>
              <div class="form-group">
                  <label for="contenido">Contenido</label>
                   <textarea  class="form-control" name="contenido" id="contenido" placeholder="contenido" cols="30" rows="10">{{old('contenido')}}</textarea>
              </div>
          </div>
          <div class="col-sm-7 text-center">
                 <button class="btn btn-primary btn-block" type="submit"> @lang('main.send')</button>
                  <a class="btn btn-secondary btn-block" href="javascript:history.back()">@lang('main.go-back')</a>
          </div>
      </div>
   </form>
@endsection
