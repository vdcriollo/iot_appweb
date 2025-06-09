<div class="d-inline-flex">
    <div class="dropdown">
        <a href="#" class="text-body" data-bs-toggle="dropdown">
            <i class="ph-list"></i>
        </a>

        <div class="dropdown-menu dropdown-menu-start">
            <a href="#" class="dropdown-item">
                <i class="ph-file-pdf me-2"></i>
                Export to .pdf
            </a>
            <a href="{{ route('usuarios.edit',$user->id) }}" class="dropdown-item text-primary">
                <i class="fa-solid fa-pen-to-square fw-bold me-2"></i>
                Actualizar
            </a>
            <button type="button"
                class="dropdown-item text-danger"
                data-url="{{ route('usuarios.destroy', $user->id) }}"
                onclick="confirmarEliminacion(this)">
                <i class="fa-solid fa-trash me-2 fw-bold"></i>
                Eliminar
            </button>


        </div>
    </div>
</div>
