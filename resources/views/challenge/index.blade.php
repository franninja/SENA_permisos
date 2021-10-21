@extends('adminlte::page')

@section('title', 'Desafios')

@section('content_header')
<a href="{{ route('challenge.create') }}" class="btn btn-secondary btn-sm float-right">Crear Desafio</a>
<h1>Lista de Desafios</h1>
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
        <td>{{$challenge->area->name}}</td>
        <td>{{ substr($challenge->description, 0, 54)}}</td>
        <td>{{$challenge->status}}
          <div class="form-group">
            <div class="custom-control custom-switch custom-switch-off-danger custom-switch-on-success">
              <input type="checkbox" class="custom-control-input {{$challenge->status == 'activo' ? 'activo' : 'inactivo'}}" id="customSwitch3" {{$challenge->status == 'activo' ? 'checked' : ''}} data-toggle="modal"
              data-target="#modalState_{{$challenge->id}}">
              <label class="custom-control-label" for="customSwitch3"></label>
            </div>
          </div>
        </td>

        <div class="modal fade" id="modalState_{{$challenge->id}}" tabindex="-1" role="dialog"
          aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Cambiar Estado del Desafio</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                Estas Seguro de Cambiar el estado del Desafio({{$challenge->name}})?
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal" id="CambiarSwicth">Cancelar</button>
                <form method="POST" action="{{ route('challenge.changtestatus', $challenge->id) }}">
                  @csrf
                  <button type="submit" class="btn btn-primary">Cambiar Estado</button>
                </form>
              </div>
            </div>
          </div>
        </div>


        <td>{{$challenge->created_at}}</td>

        <td style="width: 2rem;">
          <a class="btn btn-primary" href="{{ route('challenge.edit', $challenge) }}">Editar</a>
        </td>

        <td style="width: 2rem;">
          <button type="submit" class="btn btn-danger" data-toggle="modal"
            data-target="#modalEliminar_{{$challenge->id}}">Eliminar</button>
        </td>

        <!-- Modal -->
        <div class="modal fade" id="modalEliminar_{{$challenge->id}}" tabindex="-1" role="dialog"
          aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Eliminar Usuario</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                Estas Seguro de Eliminar el Desafio({{$challenge->name}}) y todas su informacion e ideas relacionadas?
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal" >Cancelar</button>
                <form method="POST" action="{{ route('challenge.destroy', $challenge->id) }}">
                  @csrf
                  @method('DELETE')
                  <button type="submit" class="btn btn-danger">Eliminar</button>
                </form>
              </div>
            </div>
          </div>
        </div>
        
      </tr>
      @endforeach

    </tbody>
  </table>
</div>
@stop

@section('css')
{{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
@stop

@section('js')
  <script src="{{asset('js/main.js')}}"></script>
@stop