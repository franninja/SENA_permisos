<div class="card-body">
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label for="name">nombre del Area</label>
            <input id="name" type="text" placeholder="nombre" class="form-control @error('name') is-invalid @enderror"
                name="name" value="{{ old('name', $area->name ) }}"  autocomplete="name" autofocus>

                @error('name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div>
    </div>

    <div class="form-group col-md-6">
        <label for="description">Descripcion</label>
        <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description" value="{{ old('description', $area->description ) }}"  autocomplete="description" autofocus>
            @if (!empty($area->description))
            {{ $area->description }}
            @endif
        </textarea>
    
            @error('description')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
    </div>
</div>




