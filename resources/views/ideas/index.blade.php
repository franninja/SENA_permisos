@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1 class="bg-gray-800 text-white text-center">IDEAS</h1>
@stop

@section('content')
<div class="container-fluid">
      <a type="button" href="{{ route('ideas.create') }}" class="bg-gray-500 px-12 py-2 rounded text-gray-200 font-semibold hover:bg-indigo-1000 transition duration-200 each-in-out">Crear IDEA</a>
      <br><br>
      
 <!-- prueba para apartado de ideas -->


    <div class="row row-cols-1 row-cols-md-3 g-4">
        
    @foreach ($ideas as $idea)
    
        <div class="col">

                <div class="card border h-100">
                    <img src="{{ asset('img/images1.jpg') }}" class="card-img-top" alt="Imagen no Disponible">

                    <div class="card-body">
                        <h5 class="card-title"><b>{{$idea->nombre}}</b></h5>
                        <hr>
                        <p class="card-text">{{$idea->descripcion}}</p>
                    </div>

                    <div class="card-footer d-flex justify-content-around">
                        <!-- Botón Para Abrir Documento en Otra Pestaña -->
                        <span><a type="button" href="#" class="btn btn-primary text-uppercase">Abrir Documento</a></span>

                        <!-- Botón editar -->
                        <span><a type="button" href="{{ route('ideas.edit', $idea->id) }}" class="btn btn-secondary text-uppercase">Editar</a></span>
                        

                        <!-- Botón Eliminar -->
                        <form action="{{ route('ideas.destroy', $idea->id) }}" method="POST" class="formEliminar">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger text-uppercase">Eliminar</button>
                        </form>                    
                    </div>

                    <div class="card-footer">
                        <small class="text-muted">Fecha de creación de idea: {{$idea->created_at}}</small>
                    </div>

                </div>
        </div>
       
    @endforeach
    </div>

    <br>

    <div class="row justify-content-center">
        {!! $ideas->links() !!}
    </div>

</div><!-- /.container-fluid -->
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
@stop

@section('js')
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
         (function () {
        'use strict'

        // Fetch all the forms we want to apply custom Bootstrap validation styles to
        var forms = document.querySelectorAll('.formEliminar')

        // Loop over them and prevent submission
        Array.prototype.slice.call(forms)
            .forEach(function (form) {
            form.addEventListener('submit', function (event) {
                event.preventDefault()
                event.stopPropagation()
                Swal.fire({
                    title: '¿Confirma la eliminación del registro?',
                    icon: 'info',
                    showCancelButton: true,
                    confirmButtonColor: '#20c997',
                    cancelButtonColor: '#6c757d',
                    cancelButtonText: 'Cancelar',
                    confirmButtonText: 'Confirmar'

                }).then((result) =>{
                    if (result.isConfirmed){
                        this.submit();
                        Swal.fire('¡Eliminado!' , 'El registro ha sido eliminado exitosamente.', 'success');
                    }
                })

            }, false)
            })
        })()
    </script>


@stop