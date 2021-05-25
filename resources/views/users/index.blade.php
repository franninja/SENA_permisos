@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Lista de usuarios</h1>
    @include('includes.message')
@stop

@section('content')
<div class="card-body table-responsive p-0">
    <table class="table table-hover text-nowrap">
      <thead class="thead-dark">
        <tr>
          <th>nombre(rol)</th>
          <th>documento</th>
          <th>correo</th>
          <th>registrado el</th>
          <th colspan="2">Acciones</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($users as $user)
          <tr>
            
            <td>
              {{$user->name}}
              {{-- rol en caso de que exista --}}
              @if ($user->roles()->first())
               ( {{ $user->roles()->first()->name }})
              @endif
            </td>
            
            <td>
              {{$user->n_documento}}
            </td>

            <td>{{$user->email}}</td>
            <td>{{$user->created_at}}</td>
            <td style="width: 2rem;">
              <a class="btn btn-warning" href="{{ route('user.role', $user->id) }}">Gestionar Rol</a>
            </td>
            <td style="width: 2rem;">
                <a class="btn btn-primary" href="{{ route('user.edit', $user->id) }}">Editar</a>
            </td>
            {{-- <td style="width: 2rem;">
              <form method="POST" action="{{ route('user.destroy', $user) }}">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger" >Eliminar</button>
              </form>
            </td> --}}
          </tr>
        @endforeach
        
      </tbody>
      <div class="clearfix paginacion">
        {{$users->links()}}
    </div>
    </table>
  </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop