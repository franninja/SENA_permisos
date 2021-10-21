@if (!isset($user))
    @inject('user', 'App\User')
    {{-- @php($user = new User) --}}
@endif
{{-- para listar las areas en el formulario --}}
@if (!isset($areas))
    @inject('area', 'App\Area')
    @php($areas = $area->all())
@endif

<label for="n_documento">N° documento</label>
<div class="input-group mb-3">
    <input id="n_documento" type="number" placeholder="Numero documento" class="form-control @error('n_documento') is-invalid @enderror"
        name="n_documento" value="{{ old('n_documento', $user->n_documento ) }}"  autocomplete="n_documento" autofocus>
    <div class="input-group-append">
        <div class="input-group-text">
            <span class="fas fa-user"></span>
        </div>
    </div>

    @error('n_documento')
    <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
    </span>
    @enderror

</div>


<div class="input-group mb-3">
    <div class="form-group w-100 ">
        <label for="area_id">Area</label>
        <select class="custom-select rounded-0" name="area_id" id="area_id">
            <option >--Seleccionar--</option>
            @foreach ($areas as $area)
                <option {{ $area->id == $user->area_id ? 'selected' : '' }} value="{{$area->id}}" >{{ $area->name }}</option>
            @endforeach
        </select>
    </div>

    @error('area_id')
    <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
    </span>
    @enderror

</div>


<label for="name">nombre</label>

<div class="input-group mb-3">
    <input id="name" type="text" placeholder="nombre" class="form-control @error('name') is-invalid @enderror"
        name="name" value="{{ old('name', $user->name ) }}"  autocomplete="name" autofocus>
    <div class="input-group-append">
        <div class="input-group-text">
            <span class="fas fa-user"></span>
        </div>
    </div>

    @error('name')
    <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
    </span>
    @enderror

</div>


<label for="email">correo</label>

<div class="input-group mb-3">
    <input id="email" type="email" placeholder="correo" class="form-control @error('email') is-invalid @enderror"
        name="email" value="{{ old('email', $user->email ) }} "  autocomplete="email">
    <div class="input-group-append">
        <div class="input-group-text">
            <span class="fas fa-envelope"></span>
        </div>
    </div>

    @error('email')
    <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
    </span>
    @enderror

</div>


<label for="password">contraseña (opcional)</label>

<div class="input-group mb-3">
    <input id="password" type="password" placeholder="contraseña"
        class="form-control @error('password') is-invalid @enderror" name="password" 
        autocomplete="new-password">
    <div class="input-group-append">
        <div class="input-group-text">
            <span class="fas fa-lock"></span>
        </div>
    </div>

    @error('password')
    <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
    </span>
    @enderror

</div>


<label for="password-confirm">confirmar contraseña (opcional)</label>

<div class="input-group mb-3">
    <input id="password-confirm" type="password" placeholder="repetir contraseña" class="form-control"
        name="password_confirmation"  autocomplete="new-password">
    <div class="input-group-append">
        <div class="input-group-text">
            <span class="fas fa-lock"></span>
        </div>
    </div>
</div>