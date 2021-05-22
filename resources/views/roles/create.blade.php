@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Crea Roles</h1>
@stop

@section('content')
<div class="container-fluid">
    <div class="card card-primary">
        <div class="card-header">
          <h3 class="card-title">Crear Role nuevo</h3>
        </div>

        <form method="POST" action="{{ route('roles.store') }}">

            @include('includes.formRole')

          <div class="card-footer">
            <button type="submit" class="btn btn-primary">Submit</button>
          </div>
          
        </form>
      </div>
</div><!-- /.container-fluid -->
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    
@stop