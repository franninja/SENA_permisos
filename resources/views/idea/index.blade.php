@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1><b>VISTA DE DESAFIOS</b></h1>
@stop

@section('content')

<div class="container-fluid">
    <H1 class="card-header">Lista de Desafios</H1>
    <div class="row row-cols-1 row-cols-md-3 g-4">
        <div class="col">
            <div class="card border h-100">
                <img src="{{ asset('img/images.jpg') }}" class="card-img-top" alt="Imagen no Disponible">

                <div class="card-body">
                    <h5 class="card-title"><b>Nombre De Desafio</b></h5>
                    <hr>
                    <p class="card-text">Descripcion: card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                </div>

                <div class="card-footer d-flex justify-content-around">
                    <span><a type="button" href="#" class="btn btn-primary text-uppercase">Abrir Documento</a></span>
                    <span><a type="button" href="#" class="btn btn-secondary text-uppercase">Editar</a></span>
                    <span><a type="button" href="#" class="btn btn-danger text-uppercase">Eliminar</a></span>

                    {{-- <span><a type="button" href="{{ route('#') }}" class="btn btn-primary text-uppercase">Abrir Documento</a></span>
                    <span><a type="button" href="{{ route('#') }}" class="btn btn-secondary text-uppercase">Editar</a></span>
                    <span><a type="button" href="{{ route('#') }}" class="btn btn-danger text-uppercase">Eliminar</a></span> --}}
                </div>

                <div class="card-footer">
                    <small class="text-muted">aqui va ir la Fecha de creacion de Desafio</small>
                </div>

            </div>
        </div>

        <div class="col">
            <div class="card border h-100">
                <img src="{{ asset('img/images.jpg') }}" class="card-img-top" alt="Imagen no Disponible">

                <div class="card-body">
                    <h5 class="card-title"><b>Nombre De Desafio</b></h5>
                    <hr>
                    <p class="card-text">Descripcion: This card has supporting text below as a natural lead-in to additional content.</p>
                </div>

                <div class="card-footer d-flex justify-content-around">
                    <span><a type="button" href="#" class="btn btn-primary text-uppercase">Abrir Documento</a></span>
                    <span><a type="button" href="#" class="btn btn-secondary text-uppercase">Editar</a></span>
                    <span><a type="button" href="#" class="btn btn-danger text-uppercase">Eliminar</a></span>
                </div>

                <div class="card-footer">
                    <small class="text-muted">aqui va a ir la Fecha de creacion de Desafio</small>
                </div>

            </div>
        </div>

        <div class="col">
            <div class="card border h-100">
                <img src="{{ asset('img/images.jpg') }}" class="card-img-top" alt="Imagen no disponible">

                <div class="card-body">
                    <h5 class="card-title"><b>Nombre De Desafio</b></h5>
                    <hr>
                    <p class="card-text">Descripcion: additional content. This card has even longer content than the first to show that equal height action.</p>
                </div>

                <div class="card-footer d-flex justify-content-around">
                    <span><a type="button" href="#" class="btn btn-primary text-uppercase">Abrir Documento</a></span>
                    <span><a type="button" href="#" class="btn btn-secondary text-uppercase">Editar</a></span>
                    <span><a type="button" href="#" class="btn btn-danger text-uppercase">Eliminar</a></span>
                </div>

                <div class="card-footer">
                    <small class="text-muted">aqui va a ir la Fecha de creacion de Desafio</small>
                </div>

            </div>
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
        var url = 'http://localhost/SENA_permisos/public/';
        Dropzone.options.myDropzone = {
            url: "{{ route('challenge.store') }}",
            autoProcessQueue: false,
            uploadMultiple: true,
            parallelUploads: 3,
            maxFiles: 3,
            maxFileSize: 2,
            acceptedFiles: "image/*,.pdf.txt.doc.xlsx",
            headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },

            init: function () {

                var submitButton = document.querySelector("#submit-all");
                var wrapperThis = this;

                submitButton.addEventListener("click", function () {
                    wrapperThis.processQueue();
                });

                this.on("addedfile", function (file) {

                    // Create the remove button
                    var removeButton = Dropzone.createElement("<button class='btn btn-lg dark'>Remove File</button>");

                    // Listen to the click event
                    removeButton.addEventListener("click", function (e) {
                        // Make sure the button click doesn't submit the form:
                        // e.preventDefault();
                        // e.stopPropagation();

                        // Remove the file preview.
                        wrapperThis.removeFile(file);
                        // If you want to the delete the file on the server as well,
                        // you can do the AJAX request here.
                    });

                    // Add the button to the file preview element.
                    file.previewElement.appendChild(removeButton);
                });

                this.on('sendingmultiple', function (data, xhr, formData) {
                    formData.append("name", $("#name").val());
                    formData.append("privacity", $("#privacity").val());
                    formData.append("description", $("#description").val());
                    // formData.append("status", $("#status").val());
                });

                // this.on('complete',function(){
                //     window.location.href = url+"challenge/store";
                // })
            }
        };
    </script>

    
@stop