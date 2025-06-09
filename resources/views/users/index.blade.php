@extends('layouts.app')


@section('breadcrumb')
    {{ Breadcrumbs::render('usuarios') }}
@endsection


@section('breadcrumb_elements')
    <div class="d-lg-flex mb-2 mb-lg-0">
        <a href="{{ route('usuarios.create') }}" class="d-flex align-items-center text-body py-2" data-bs-placement="left" title="Crear nuevo usuario" data-bs-popup="tooltip">
            <i class="fa-solid fa-plus me-1"></i>
            Nuevo
        </a>

    </div>
@endsection


@section('content')
    <div class="card">
        <div class="table">
            <div class="table-responsive">
                {{ $dataTable->table() }}
            </div>
        </div>
        
        
    </div>
    
@endsection


@prepend('scripts')
   <script src="{{ asset('assets/js/vendor/tables/datatables/datatables.min.js') }}"></script>
@endprepend



@push('scripts')
    {{ $dataTable->scripts(attributes: ['type' => 'module']) }}
@endpush