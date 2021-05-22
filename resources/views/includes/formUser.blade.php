@auth
<label for="name">nombre</label>
@endauth
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

@auth
<label for="email">correo</label>
@endauth
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

@auth
<label for="password">contraseña (opcional)</label>
@endauth
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

@auth
<label for="password-confirm">confirmar contraseña (opcional)</label>
@endauth
<div class="input-group mb-3">
    <input id="password-confirm" type="password" placeholder="repetir contraseña" class="form-control"
        name="password_confirmation"  autocomplete="new-password">
    <div class="input-group-append">
        <div class="input-group-text">
            <span class="fas fa-lock"></span>
        </div>
    </div>
</div>