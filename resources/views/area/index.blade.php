@extends('adminlte::page')

@section('title', 'Areas')

@section('content_header')
    <a href="{{ route('area.create') }}" class="btn btn-secondary btn-sm float-right">Crear Area</a>
    <h1>Lista de Areas Creadas</h1>
    <hr>
    @include('includes.message')
@stop

@section('content')
@if (count($areas) > 0)
<div class="card-body table-responsive p-0">
    <table class="table table-hover text-nowrap">
    <thead class="thead-dark">
        <tr>
            <th>Nombre</th>
            <th>Descripcion</th>
            <th>Creado el</th>
            <th colspan="2">Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($areas as $area)
        <tr>
            <td>{{$area->name}}</td>
            <td>{{$area->description}}</td>
            <td>{{$area->created_at}}</td>
            <td style="width: 2rem;">
                <a class="btn btn-primary" href="{{ route('area.edit', $area) }}">Editar</a>
            </td>
            <td style="width: 2rem;">
                <form method="POST" action="{{ route('area.destroy', $area) }}">
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
@else
    <h2>No hay areas creadas</h2>
@endif

@stop

@section('css')
    {{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
@stop

@section('js')
    
@stop