@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1 class="font-semibold text-xl text-gray-800 leading-tight">Editar Idea</h1>
@stop

@section('content')

<div class="container-fluid font-semibold text-xl text-gray-800 leading-tight ">
    <div class="card bg-white overflow-hidden shadow-xl sm:rounded-lg">
            <form action="{{ route('ideas.update' ,$idea->id ) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                    <div class="card-body">
                            <div class="row">
                                    <div class="col-md-6">        
                                        <label class="uppercase md:text-sm text-xs text-gray-500 font-semibold mb-1">Nombre de la Idea</label>
                                        <input id="name" name="name" value="{{ $idea->name }}" class="form-control" placeholder="Escribe el Nombre aquí">
                                    </div>
                                        
                                        <hr>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="challenge_id" class="uppercase md:text-sm text-xs text-gray-500 font-semibold mb-1">Desafios Disponibles</label>
                                            <select class="custom-select rounded-0" name="challenge_id" id="challenge_id">
                                                <option >--Seleccionar--</option>
                                                @foreach ($challenges as $challenge)
                                                    <option {{ $challenge->id == $idea->challenge_id ? 'selected' : '' }} value="{{$challenge->id}}" >{{ $challenge->name . "-" . $challenge->description }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                            </div>

                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="description" class="uppercase md:text-sm text-xs text-gray-500 font-semibold mb-1">Descripción</label>
                                    <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description" placeholder="Descripción de la Idea aquí" value="{{ old('description', $idea->description ) }}"  autocomplete="description" autofocus>
                                        {{ old('description', $idea->description ) }}
                                    </textarea>
                        
                                        @error('description')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                </div>
                            </div>

                            @include('includes.showUploads', ['model' => $idea, 'disk' => 'idea'])
                            <div class="row" style="clear: both;margin-top: 18px;">
                                <label for="" class="uppercase md:text-sm text-xs text-gray-500 font-semibold mb-1">Subir Documentos Máximo &nbsp</label>
                                <br/>
                                @if (isset($uploads))
                                    <p>-puedes subir {{ $uploads ? 4 - count($uploads)  : '4' }}-</p>
                                @else
                                    <p class="uppercase md:text-sm text-xs text-gray-500 font-semibold mb-1">puedes subir 4 archivos:</p>
                                @endif
                                <div class="col-12">
                                    <div class="dropzone" id="myDropzone"></div>
                                </div>
                            </div>
                           

                               <hr>
                               <br>
                               <a href="{{ route('ideas.index') }}" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"">Cancelar</a>
                               <button id="submit-all" type="submit" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"">Guardar</button>



                    </div>      
            </form>
    </div>
        
</div><!-- /.container-fluid -->
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/dropzone.css') }}">

@stop

@section('js')
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
{{-- <script>
    $(document).ready(function (e) {
        $('#archivo').change(function(){
            let reader = new FileReader();
            reader.onload = (e) => {
                $('#archivoSeleccionado').attr('src', e.target.result);
            }
            reader.readAsDataURL(this.files[0]);
        });

    });

</script> --}}

{{-- Estructura drz --}}
<script src="{{ asset('js/dropzone.js') }}"></script>
<script>
    var url = 'http://localhost/SENA_permisos/public/';
    // var url = 'http://localhost:8081/adsi/plataforma/public/';
    Dropzone.options.myDropzone = {
        dictDefaultMessage: "Arrastré sus Documentos Aquí",
        url: "{{ route('ideas.update', $idea->id) }}",
        // method: "PATCH",
        autoProcessQueue: false,
        uploadMultiple: true,
        parallelUploads: 4,
        maxFiles: {{ 4 - count($uploads) }},
        maxFileSize: 2,
        acceptedFiles: "image/*,.pdf,.doc,.ppt,.docx,.txt",
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },

        init: function () {

            var submitButton = document.querySelector("#submit-all");
            var wrapperThis = this;

            submitButton.addEventListener("click", function () {
                wrapperThis.processQueue();
            });


            this.on('sendingmultiple', function (data, xhr, formData) {
                formData.append("name", $("#name").val());
                formData.append("challenge_id", $("#challenge_id").val());
                formData.append("description", $("#description").val());

            });

            this.on('complete',function(){
                window.location.href = "{{route('ideas.index')}}";
            });
        }
    };
</script>

@stop