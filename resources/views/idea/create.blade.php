@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Crear Nueva Idea</h1>
@stop

@section('content')
<div class="container-fluid">

    <div class="card">
            <form action="Enviar" method="POST">
                    <div class="card-body">
                            <div class="row">
                                    <div class="col">
                                        <label for="texto">Nombre de la Idea</label>
                                        <input type="text" class="form-control" placeholder="Escribe el Nombre aquí" aria-label="Nameidea">

                                        <!-- <label for="texto"></label>
                                        <input type="text" class="form-control" placeholder="Nombre De la idea" aria-label="">
                                        <label for="texto"></label>
                                        <input type="text" class="form-control" placeholder="Nombre De la idea" aria-label=""> -->
                <hr>
                                        <label for="exampleFormControlTextarea1" class="form-label">Descripción</label>
                                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                                        
                                        <div class="row" style="clear: both;margin-top: 18px;">
                                            <div class="col-12">
                                            <div class="dropzone" id="myDropzone"></div>
                                        </div>
                                    </div>  
                                    <div class="row" style="clear: both;margin-top: 18px;">
                                        <div class="col">
                                        <div class="dropzone" id="myDropzone"></div>
                                        </div>
                                    </div>                       
                            </div>

                            

                            </div>
                               <hr>
                               <a href="#" class="btn btn-primary">Guardar</a>
                            </div>
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