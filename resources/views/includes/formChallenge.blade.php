@csrf
<div class="card-body">
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
            <label for="name">Nombre</label>
            <input id="name" type="text" placeholder="nombre" class="form-control @error('name') is-invalid @enderror"
                name="name" value="{{ old('name', $challenge->name ) }}"  autocomplete="name" autofocus>

                @error('name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div>
        
        <div class="col-md-6">
            <div class="form-group">
                <label for="privacity">privacidad</label>
                <select class="custom-select rounded-0" name="privacity" id="privacity">
                    <option >--Seleccionar--</option>
                    <option value="all" >Todos</option>
                    @foreach ($roles as $role)
                        <option value="{{$role->id}}" >{{ $role->name }}</option>
                    @endforeach
                </select>
            </div>
        </div>
    </div>
    
    

    <div class="row">
        <div class="form-group col-md-6">
            <label for="description">Descripcion</label>
            <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description" value="{{ old('description', $challenge->description ) }}"  autocomplete="description" autofocus>

            </textarea>

                @error('description')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
        </div>


        <!-- <div class="form-group col-md-6">
            <label for="status">Estado del Desafio</label>
            <div class="custom-control custom-radio">
                <input class="custom-control-input" type="radio" value="activo" id="status" name="status" >
                <label for="customRadio1" class="custom-control-label">Activo</label>
            </div>
            <div class="custom-control custom-radio">
                <input class="custom-control-input" type="radio" value="inactivo" id="status" name="status" >
                <label for="customRadio2" class="custom-control-label">inactivo</label>
            </div>
        </div> -->
    </div>
    
    <div class="row" style="clear: both;margin-top: 18px;">
        <div class="col-12">
          <div class="dropzone" id="myDropzone"></div>
        </div>
    </div>

</div>