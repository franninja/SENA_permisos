@csrf
<div class="card-body">
    <div class="form-group">
      <label for="name">Nombre</label>
      <input id="name" type="text" placeholder="nombre" class="form-control @error('name') is-invalid @enderror"
        name="name" value="{{ old('name', $role->name ) }}"  autocomplete="name" autofocus>

        @error('name')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>

    <h2 class="h3">Lista de Permisos</h2>
    @foreach ($permissions as $permission)
        @if ($role->hasDirectPermission($permission))
            
            <div class="form-check">
                <input type="checkbox" class="form-check-input" name="permissions[]" id="{{ $permission->name }}" value="{{$permission->id}}" checked>
                <label class="form-check-label" for="{{$permission->name}}">{{$permission->description}}</label>
            </div>
        @else
            <div class="form-check">
                <input type="checkbox" class="form-check-input" name="permissions[]" id="{{ $permission->name }}" value="{{$permission->id}}">
                <label class="form-check-label" for="{{$permission->name}}">{{$permission->description}}</label>
            </div>
        @endif

        {{-- {{$role->hasPermission($permission)}} --}}
    @endforeach
    
</div>