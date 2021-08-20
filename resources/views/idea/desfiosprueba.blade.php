@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1><b>Crear Nuevo Desafio</b></h1>
@stop

@section('content')
<div class="container-fluid">

    <div class="card card-secondary">
              <div class="card-header">
                <h3 class="card-title">Asignar preguntas para el desafio</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <form method="POST" action="{{ route('challenge.store') }}" enctype="multipart/form-data">

                 @csrf
                  <div class="row">
                    <div class="col-sm-6">


                        <div class="form-group">
                            <label for="name">Nombre del desafio</label>
                            <input id="name" type="text" placeholder="nombre del desafio" class="form-control">
                        </div>


                        <div class="form-group">
                            <!-- Area a la cual se asignara el desafio -->
                            <label for="privacity">Que tipo de area podra ver el desafio?</label>
                            <select class="custom-select rounded-0" name="privacity" id="privacity">
                                <option >-Seleccionar</option>
                                <option>area 1</option>
                                <option>area 2</option>
                                <option>area 3</option>
                                <option>Todas las areas</option>
                            </select>
                            <!--  /. Area a la cual se asignara el desafio -->
                        </div>


                      <!-- checkbox - switch -->
                        <div class="form-group">

                            <div class="custom-control custom-switch custom-switch-off-danger custom-switch-on-success">
                                <input type="checkbox" class="custom-control-input" id="customSwitch1">
                                <label for="customSwitch1" class="custom-control-label">Primera pregunta (Ej: Nombre de la idea)</label>
                            </div>
                            <div class="custom-control custom-switch custom-switch-off-danger custom-switch-on-success">
                                <input type="checkbox" class="custom-control-input" id="customSwitch2">
                                <label for="customSwitch2" class="custom-control-label">Segunda pregunta (Ej: Descripción)</label>
                            </div>
                            <div class="custom-control custom-switch custom-switch-off-danger custom-switch-on-success">
                                <input type="checkbox" class="custom-control-input" id="customSwitch3">
                                <label for="customSwitch3" class="custom-control-label">Tercera pregunta (Ej: Presupuesto)</label>
                            </div>
                            <div class="custom-control custom-switch custom-switch-off-danger custom-switch-on-success">
                                <input  type="checkbox" class="custom-control-input" id="customSwitch4">
                                <label for="customSwitch4" class="custom-control-label">Cuarta pregunta (Ej: Tiempo de ejecución)</label>
                            </div>
                            <div class="custom-control custom-switch custom-switch-off-danger custom-switch-on-success">
                                <input type="checkbox" class="custom-control-input" id="customSwitch5">
                                <label for="customSwitch5" class="custom-control-label">Quinta pregunta (Ej: Antecedentes de la idea)</label>
                            </div>
                            
                        </div>

                       <!-- /. checkbox - switch -->
                        </div>

                  </div>


                  <div>
                    <div>
                      <label>Si quiere agregar mas preguntas, Escribalas en un documento de texto y arrastralas aqui</label>
                    </div>
                  </div>


                </form>

                <div class="row" style="clear: both;margin-top: 18px;">
                    <div class="col-12">
                        <div class="dropzone" id="myDropzone"></div>
                    </div>
                </div>
              </div>

              <div class="card-footer">
                    <button type="submit" id="submit-all" class="btn btn-primary">Crear Desafio</button>
              </div>
              <!-- /.card-body -->
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