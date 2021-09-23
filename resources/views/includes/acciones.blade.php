<div class="badge bg-dark text-white position-absolute" style="top: 0.5rem; right: 0.5rem">
    <div class="nav-item dropdown ">     
        <div id="navbarDropdown" class=" nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
         <span class="caret"></span>
        </div>

        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="{{ route('upload.delete', ['disk' => $disk , 'filename' => $upload->path]) }}" >
                Borrar
            </a>
        </div>
    </div>
</div>