@extends('adminlte::page')

@section('title', 'desafios')

@section('content_header')
    <a href="{{ route('roles.create') }}" class="btn btn-secondary btn-sm float-right">Crear Role</a>
    <h1>Lista de Roles</h1>
    @include('includes.message')
@stop

@section('content')
<div class="card-body table-responsive p-0">
    <table class="table table-hover text-nowrap">
      <thead class="thead-dark">
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Creado el</th>
            <th colspan="2">Acciones</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($roles as $role)
          <tr>
              <td>{{ $role->id }}</td>
              <td>{{$role->name}}</td>
              <td>{{$role->created_at}}</td>
              <td style="width: 2rem;">
                  <a class="btn btn-primary" href="{{ route('roles.edit', $role) }}">Editar</a>
              </td>
              <td style="width: 2rem;">
                  <form method="POST" action="{{ route('roles.destroy', $role) }}">
                      @csrf
                      @method('DELETE')
                      <button type="submit" class="btn btn-danger" >Eliminar</button>
                  </form>
              </td>
          </tr>
        @endforeach
        
      </tbody>
    </table>
  </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    
@stop