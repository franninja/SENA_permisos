@extends('adminlte::page')

@section('title', 'Editar area')

@section('content_header')
    <h1>Dashboard SENA Permisos</h1>
    @can('area.index')
      <a href="{{ route('area.index') }}" class="btn btn-warning">Lista de Areas</a>
    @endcan
@stop

@section('content')
  <div class="card card-primary">
    <div class="card-header  ">
      <h3 class="card-title">Editar Usuario</h3>
      
    </div>
    @include('includes.message')
    <!-- /.card-header -->
    <!-- form start -->
    <form method="POST" action="{{ route('area.update', $area->id) }}">
        @csrf @method('PATCH')

        <div class="card-body">
                <input type="hidden" name="id" value="{{$area->id}}">
                @include('includes.formArea')
        </div>
      <!-- /.card-body -->

        {{-- <input type="hidden" value="Auth::area()->id"> --}}

      <div class="card-footer">
        <button type="submit" class="btn btn-primary">Guardar</button>
      </div>
    </form>
  </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    
@stop

