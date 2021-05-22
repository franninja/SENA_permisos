@extends('adminlte::page')

@section('title', 'Asignar Rol a Usuario')

@section('content_header')
    <h1>Cambiar de rol a Usuarios</h1>
@stop

@section('content')
  <div class="card card-primary">
    <div class="card-header">
      <h3 class="card-title">Rol a Usuario</h3>
    </div>
    @include('includes.message')
    <!-- /.card-header -->
    <!-- form start -->
    <div class="row">
        <div class="col-md-6 ml-2">
            @auth
                <label for="name">nombre</label>
            @endauth
            <div class="input-group mb-3">
                <p class="form-control" disabled>{{ $user->name }}</p>
            
            </div>
        </div>
    </div>

    <form method="POST" action="{{ route('user.saverole') }}">
        @csrf @method('PATCH')

        <div class="card-body">
            <label for="roles">Roles</label>
            @foreach ($roles as $role)
                @if ($user->hasRole($role))
                    <div class="form-check">
                        <input type="checkbox" class="form-check-input" name="roles[]" value="{{$role->id}}" checked   >
                        <label class="form-check-label" for="exampleCheck1">{{$role->name}}</label>
                    </div>
                @else
                    <div class="form-check">
                        <input type="checkbox" class="form-check-input" name="roles[]" value="{{$role->id}}"    >
                        <label class="form-check-label" for="exampleCheck1">{{$role->name}}</label>
                    </div>
                @endif
                
            @endforeach
        </div>

        {{-- id del user --}}
        <input type="hidden" name="user" value="{{ $user->id }}">

      <div class="card-footer">
        <button type="submit" class="btn btn-primary">Asignar Rol</button>
      </div>
    </form>
  </div>

@stop



@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    
@stop

