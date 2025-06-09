@extends('layouts.app')

@section('breadcrumb')
    {{ Breadcrumbs::render('usuarios.edit', $usuario) }}
@endsection

@section('content')
    <form action="{{ route('usuarios.update', $usuario->id) }}" method="POST" id="form_global">
        @csrf
        @method('PUT')

        <div class="card">
            <div class="card-body">
                <div class="row g-3">

                    <!-- Nombre -->
                    <div class="col-12">
                        <div class="mb-0">
                            <div class="form-floating form-control-feedback form-control-feedback-start">
                                <div class="form-control-feedback-icon">
                                    <i class="fa-solid fa-user"></i>
                                </div>
                                <input 
                                    type="text" 
                                    name="name" 
                                    class="form-control @error('name') is-invalid @enderror"
                                    value="{{ old('name', $usuario->name) }}" 
                                    required
                                    placeholder="Nombre de usuario"
                                    autofocus
                                >
                                <label>Nombre de usuario</label>
                                @error('name')
                                    <div class="invalid-feedback fw-bold">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <!-- Email -->
                    <div class="col-md-6">
                        <div class="mb-0">
                            <div class="form-floating form-control-feedback form-control-feedback-start">
                                <div class="form-control-feedback-icon">
                                    <i class="fa-solid fa-envelope"></i>
                                </div>
                                <input 
                                    type="email" 
                                    name="email" 
                                    class="form-control @error('email') is-invalid @enderror"
                                    value="{{ old('email', $usuario->email) }}" 
                                    required
                                    placeholder="Email"
                                >
                                <label>Email</label>
                                @error('email')
                                    <div class="invalid-feedback fw-bold">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <!-- Password (opcional) -->
                    <div class="col-md-6">
                        <div class="mb-0">
                            <div class="form-floating form-control-feedback form-control-feedback-start">
                                <div class="form-control-feedback-icon">
                                    <i class="fa-solid fa-lock"></i>
                                </div>
                                <input 
                                    type="password" 
                                    name="password"
                                    class="form-control @error('password') is-invalid @enderror"
                                    placeholder="Dejar en blanco para no cambiar"
                                >
                                <label>Password (opcional)</label>
                                @error('password')
                                    <div class="invalid-feedback fw-bold">{{ $message }}</div>
                                @enderror
                            </div>
                        </div> 
                    </div>

                    <!-- Roles -->
                    <div class="col-12">
                        <div class="mb-0">
                            <p class="fw-semibold">Seleccione roles</p>
                            <div class="border p-3 rounded">
                                @foreach ($roles as $rol)
                                    <div class="form-check form-check-inline">
                                        <input 
                                            type="checkbox" 
                                            name="roles[]" 
                                            value="{{ $rol->name }}" 
                                            id="rol_{{ $rol->uuid }}" 
                                            class="form-check-input"
                                            {{ in_array($rol->name, old('roles', $usuario->roles->pluck('name')->toArray())) ? 'checked' : '' }}
                                        >
                                        <label class="form-check-label" for="rol_{{ $rol->uuid }}">{{ $rol->name }}</label>
                                    </div>
                                @endforeach
                                @error('roles')
                                    <div class="text-danger fw-bold mt-2">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>

                </div>
            </div>

            <div class="card-footer text-end">
                <a href="{{ route('usuarios.index') }}" class="btn btn-flat-danger">Cancelar</a>
                <button type="submit" class="btn btn-flat-primary">Actualizar</button>
            </div>
        </div>
    </form>
@endsection
