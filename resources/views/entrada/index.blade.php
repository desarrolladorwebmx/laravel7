@extends('layouts.app')

@section('content')
      <div class="container">
        <form action="{{route('entrada.index')}}" method="get">
          <div class="card mb-4">
              <div class="card-body">
                  <div class="input-group">
                    <input type="text" class="form-control" name="texto" id="texto" placeholder="{{Lang::get('main.search')}}" value="{{$texto}}">
                              <span class="input-group-btn"></span>
                              <button class="btn btn-primary" type="submit" name="button">@lang('main.search')</button>
                  </div>
              </div>

          </div>
        </form>
        @if(Session::has('mensaje'))
              <div class="mb-4">
                 <div class="alert alert-warning">
                   {{Session::get('mensaje')}}
                 </div>
              </div>
        @endif
         @if(count($entradas)<=0)
        <div class="card mb-4">
            <div class="card-body">
                <h5 class="card-title">@lang('main.no-records')</h5>
                <p class="card-text">@lang('main.no-records')</p>
            </div>
        </div>
        @endif
            @foreach($entradas as $entrada)
          <div class="card mb-4">
              <div class="card-body">
                  <h5 class="card-title">{{$entrada->titulo}}</h5>
                  <p class="card-text">{{$entrada->contenido}}........</p>
                  <p class="card-text">{{\Carbon\Carbon::parse($entrada->created_at)->isoFormat('DD MMMM,YYYY - hh:mm A')}}</p>
                  <a href="{{route('entrada.show',['entrada'=>$entrada->id])}}" class="btn btn-success">@lang('main.read-more')</a>
                  <a href="{{route('entrada.edit',['entrada'=>$entrada->id])}}" class="btn btn-primary ml-2">@lang('main.edit')</a>
                  <a href="" data-toggle="modal" data-target="#modal-destroy-delete-{{$entrada->id}}" class="btn btn-danger ml-2">@lang('main.delete')</a>
              </div>
          </div>
              @include('entrada.destroy')
            @endforeach
          {{$entradas->links()}}
      </div>
@endsection
