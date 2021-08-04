@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1><b>Crear Nueva Idea</b></h1>
@stop

@section('content')
<div class="container-fluid">

    <div class="card">
            <form action="Enviar" method="POST" enctype="multipart/form-data">
                    <div class="card-body">
                            <div class="row">
                                    <div class="col">
                                        <h3><b>Nombre de la Idea</b></h3>
                                        <input type="text" class="form-control" placeholder="Escribe el Nombre aquí" aria-label="Nameidea">
                                        <!-- <label for="texto"></label>
                                        <input type="text" class="form-control" placeholder="Nombre De la idea" aria-label="">
                                        <label for="texto"></label>
                                        <input type="text" class="form-control" placeholder="Nombre De la idea" aria-label=""> -->
                <hr>
                                        <h3><b>Descripción</b></h3>
                                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="Descripción de idea aquí"></textarea>                                        
                                    </div>                      
                            </div>


                            <!-- Cargar Documentos Dropzone -->

                            <div class="row" style="clear: both;margin-top: 18px;">

                                <div class="col">
                                    <h3><b>Arrastrá tu Idea aquí</b></h3>
                                    <div class="dropzone" id="myDropzone"></div>
                                </div>
                            </div>                             

                               <hr>
                               <a href="#" class="btn btn-primary center" id="submit-all">Guardar</a>


                    </div>      
            </form>
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