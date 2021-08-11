@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Crear Desafios</h1>
@stop

@section('content')
<div class="container-fluid">
    <div class="card card-primary">
        <div class="card-header">
          <h3 class="card-title">Crear Desafio Nuevo</h3>
        </div>

        <form method="POST" action="{{ route('challenge.store') }}" enctype="multipart/form-data">

            @include('includes.formChallenge')

            
          </form>
          <div class="card-footer">
            <button type="submit" id="submit-all" class="btn btn-primary">Guardar</button>
          </div>
      </div>
</div><!-- /.container-fluid -->
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
    <link rel="stylesheet" href="{{ asset('css/dropzone.css') }}">
@stop

@section('js')
    <script src="../js/dropzone.js"></script>
    <script>
        // var url = 'http://localhost/SENA_permisos/public/';
        var url = 'http://localhost:8081/adsi/plataforma/public/';
        Dropzone.options.myDropzone = {
            url: "{{ route('challenge.store') }}",
            autoProcessQueue: false,
            uploadMultiple: true,
            parallelUploads: 3,
            maxFiles: 3,
            maxFileSize: 2,
            acceptedFiles: "image/*,.pdf",
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
                    formData.append("privacity", $("#privacity").val());
                    formData.append("description", $("#description").val());
                    formData.append("status", $("#status").val());
                });

                this.on('complete',function(){
                    window.location.href = "{{route('challenge.index')}}";
                });
            }
        };
    </script>
@stop