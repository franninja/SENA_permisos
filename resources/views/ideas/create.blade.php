@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1 class="bg-gray-800 text-white text-center">Crear Idea</h1>
@stop

@section('content')
<div class="container-fluid font-semibold text-xl text-gray-800 leading-tight ">
    <div class="card bg-white overflow-hidden shadow-xl sm:rounded-lg">
            <form action="{{ route('ideas.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                    <div class="card-body">
                            <div class="row">
                                    <div class="col">        
                                        <label class="uppercase md:text-sm text-xs text-gray-500 font-semibold mb-1">Nombre de la Idea</label>
                                        <input name="nombre" class="form-control" placeholder="Escribe el Nombre aquí">
                <hr>
                                        <label class="uppercase md:text-sm text-xs text-gray-500 font-semibold mb-1">Descripción</label>
                                        <input name="descripcion" class="form-control" placeholder="Descripción de Idea aquí"></input>
                                                                                
                                    </div>                      
                            </div>


                            <!-- Cargar documento como vista previa -->
                            <div class="grid grid-cols-1 mt-5 mx-7">
                                <img id="archivoSeleccionado" style="max-height: 300px;">

                            </div>

                            <div class="grid grid-cols-1 mt-5 mx-7">
                                <label class="uppercase md:text-sm text-xs text-gray-500 font-semibold mb-1">Subir Documento</label>

                                <div class='flex items-center justify-center w-full'>
                                    <label class='flex flex-col border-4 border-dashed w-full h-32 hover:bg-gray-100 hover:border-blue-300 group'>
                                        <div class='flex flex-col items-center justify-center pt-7'>
                                         <svg class="mx-auto h-12 w-12 text-blue-400" stroke="currentColor" fill="none" viewBox="0 0 48 48" aria-hidden="true">
                                            <path d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                         </svg>
                                         <p class='text-sm text-gray-400 group-hover:text-blue-600 pt-1 tracking-winder'>Selecciona el Documento</p>
                                        </div>
                                    <input name="archivo" id="archivo" type="file" class="hidden"></input>
                                    </label>

                                </div>
                            </div>  
                           

                               <hr>
                               <br>
                               <a href="{{ route('ideas.index') }}" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"">Cancelar</a>
                               <button type="submit" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"">Guardar</button>



                    </div>      
            </form>
    </div>
        
</div><!-- /.container-fluid -->
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
@stop

@section('js')
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script>
    $(document).ready(function (e) {
        $('#archivo').change(function(){
            let reader = new FileReader();
            reader.onload = (e) => {
                $('#archivoSeleccionado').attr('src', e.target.result);
            }
            reader.readAsDataURL(this.files[0]);
        });

    });

</script>

@stop