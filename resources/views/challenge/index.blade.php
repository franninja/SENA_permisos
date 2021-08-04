@extends('adminlte::page')

@section('title', 'desafios')

@section('content_header')
    <a href="{{ route('challenge.create') }}" class="btn btn-secondary btn-sm float-right">Crear challenge</a>
    <h1>Lista de challenges</h1>
    @include('includes.message')
@stop

@section('content')
<div class="card-body table-responsive p-0">
    <table class="table table-hover text-nowrap">
      <thead class="thead-dark">
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Privacidad</th>
            <th>Descripcion</th>
            <th>estado</th>
            <th>Creado el</th>
            <th colspan="2">Acciones</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($challenges as $challenge)
          <tr>
              <td>{{ $challenge->id }}</td>
              <td>{{$challenge->name}}</td>
              <td>
                @foreach ($roles as $role)
                  @if ($role->id == $challenge->privacity)
                    {{ $role->name}}
                  @endif
                @endforeach
              </td>
              <td>{{$challenge->description}}</td>
              <td>{{$challenge->status}}</td>
              <td>{{$challenge->created_at}}</td>
              <td style="width: 2rem;">
                  <a class="btn btn-primary" href="{{ route('challenge.edit', $challenge) }}">Editar</a>
              </td>
              <td style="width: 2rem;">
                  <form method="POST" action="{{ route('challenge.destroy', $challenge) }}">
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