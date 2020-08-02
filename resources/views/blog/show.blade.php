@extends('layouts.app')
@section('content')
<div class="container">
     <div class="row justify-content-center">
          <div class="col-sm-12">
               <div class="card">
                     <div class="card-body">
                          <h5 class="card-title">
                                 {{$entrada->titulo}}
                          </h5>
                          <p class="card-text">
                                  {{$entrada->contenido}}
                          </p>
                          <p class="card-text">{{\Carbon\Carbon::parse($entrada->created_at)->isoFormat('DD MMMM,YYYY - hh:mm A')}}</p>
                          <a href="javascript:history.back()">@lang('main.go-back')</a>
                     </div>

               </div>
          </div>
     </div>
      @if(Session::has('mensaje'))
      <div class="row justify-content-center">
           <div class="col-sm-12">
                <div class="alert alert-success">
                  {{Session::get('mensaje')}}
                </div>
           </div>
      </div>
      @endif
     <div class="row justify-content-center">
           <div class="col-sm-12">
                 <div class="card">
                       <div class="card-body">
                             <form action="{{route('comentario.guardar')}}" method="post">
                                   @csrf
                                  <div class="form-group">
                                        <input type="hidden" name="entrada_id" id="entrada_id" value="{{$entrada->id}}">
                                         <label for="contenido">Contenido</label>
                                         <textarea class="form-control" name="contenido" id="contenido" rows="4" cols="30"></textarea>
                                  </div>
                                  <div class="form-group">
                                     <button type="submit" class="btn btn-primary btn-block">@lang('main.send')</button>
                                  </div>
                         </form>

                       </div>

                 </div>

           </div>
     </div>
     @if(count($comentarios)<=0)
     <div class="row justify-content-center">
          <div class="col-sm-12">
               <div class="card">
                     <div class="card-body">
                          <h5 class="card-title">
                                @lang('main.no-records')
                          </h5>
                          <p class="card-text">
                                    @lang('main.no-records')
                          </p>
                     </div>

               </div>
          </div>
     </div>
     @else
        @foreach($comentarios as $comentario)
            <div class="row justify-content-center">
                 <div class="col-sm-12">
                      <div class="card">
                            <div class="card-body">
                                 <h5 class="card-title">
                                        {{$comentario->name}} - {{$comentario->email}}
                                 </h5>
                                 <p class="card-text">
                                          {{$comentario->contenido}}
                                 </p>
                                <p class="card-text">
                                   {{\Carbon\Carbon::parse($comentario->created_at)->isoFormat('DD MMMM,YYYY - hh:mm A')}}
                                </p>
                            </div>

                      </div>
                 </div>
            </div>
        @endforeach
  @endif
</div>
@endsection
