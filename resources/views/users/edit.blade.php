@extends('adminlte::page')

@section('title', 'Editar Usuario')

@section('content_header')
    <h1>Dashboard SENA Permisos</h1>
    @can('user.index')
      <a href="{{ route('user.index') }}" class="btn btn-warning">menu de usuarios</a>
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
    <form method="POST" action="{{ route('user.update', $user->id) }}">
        @csrf @method('PATCH')

        <div class="card-body">
                @include('includes.formUser')
        </div>
      <!-- /.card-body -->

        {{-- <input type="hidden" value="Auth::user()->id"> --}}

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

