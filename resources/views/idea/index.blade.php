@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1><b>VISTA DE DESAFIOS</b></h1>
@stop

@section('content')
<div class="container-fluid">
  <section>
    <div class="px-3 px-lg-4 px-lg-5 pt-3">
        <div class="card-columns">
            <div class="card">
                <img class="card-img-top" src="{{ asset('img/images.jpg') }}" alt="Imagen no Disponible">
                <div class="card-body">
                    <h3><b>Titulo</b></h3>
                    <hr>
                    <p>descripcion Lorem ipsum dolor sit amet consectetur adipisicing elit. Mollitia, aliquid!</p>
                    <span class="badge badge-pill badge-primary text-uppercase">Ver</span>
                    <span class="badge badge-pill badge-secondary text-uppercase">Editar</span>
                    <span class="badge badge-pill badge-warning text-uppercase">Eliminar</span>
                </div>

            </div>

        </div>
    </div>
  </section>



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