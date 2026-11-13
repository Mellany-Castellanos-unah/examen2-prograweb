@extends('layout.admin')

@section('titulo', 'Gestión de Proveedores')

@section('contenido')
<div class="container-fluid px-4">
    <h1 class="mt-4 text-dark"><i class="fas fa-truck text-primary me-2"></i>Proveedores y Laboratorios Mayoristas</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
        <li class="breadcrumb-item active">Proveedores</li>
    </ol>

    <div class="card mb-4 shadow-sm border-0">
        <div class="card-header d-flex justify-content-between align-items-center bg-dark text-white py-3">
            <div><i class="fas fa-table me-1"></i> Catálogo de Proveedores Mayoristas</div>
            <a href="{{ route('proveedores.create') }}" class="btn btn-primary btn-sm">
                <i class="fas fa-plus me-1"></i> Nuevo Proveedor
            </a>
        </div>
        <div class="card-body">
            <!-- Buscador -->
            <form method="GET" action="{{ route('proveedores.index') }}" class="mb-3">
                <div class="input-group">
                    <input type="text" name="search" class="form-control" placeholder="Buscar por Empresa, RTN o Contacto..." value="{{ $search ?? '' }}">
                    <button class="btn btn-outline-primary" type="submit"><i class="fas fa-search"></i> Buscar</button>
                    @if($search)
                        <a href="{{ route('proveedores.index') }}" class="btn btn-outline-secondary">Limpiar</a>
                    @endif
                </div>
            </form>

            <div class="table-responsive">
                <table class="table table-bordered table-striped align-middle">
                    <thead class="table-dark text-center">
                        <tr>
                            <th>RTN (14 Dígitos)</th>
                            <th>Empresa / Razón Social</th>
                            <th>Contacto Asesor</th>
                            <th>Teléfono</th>
                            <th>Categoría</th>
                            <th>Línea de Crédito</th>
                            <th>Plazo</th>
                            <th>Estado</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($proveedores as $prov)
                        <tr>
                            <td><strong>{{ $prov->rtn }}</strong></td>
                            <td>{{ $prov->empresa }}</td>
                            <td>{{ $prov->contacto }}</td>
                            <td><i class="fas fa-phone-alt text-muted me-1"></i> {{ $prov->telefono }}</td>
                            <td><span class="badge bg-info text-dark">{{ $prov->categoria }}</span></td>
                            <td class="text-success fw-bold">L. {{ number_format($prov->limite_credito, 2) }}</td>
                            <td class="text-center"><span class="badge bg-secondary">{{ $prov->dias_credito }} días</span></td>
                            <td class="text-center">
                                @if($prov->estado == 'Activo')
                                    <span class="badge bg-success">Activo</span>
                                @else
                                    <span class="badge bg-secondary">Inactivo</span>
                                @endif
                            </td>
                            <td class="text-center">
                                <a href="{{ route('proveedores.edit', $prov->id) }}" class="btn btn-warning btn-sm" title="Editar">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <form action="{{ route('proveedores.destroy', $prov->id) }}" method="POST" class="d-inline delete-form">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm" title="Eliminar">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="9" class="text-center text-muted py-4">No se encontraron proveedores registrados en el sistema.</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            
            <div class="d-flex justify-content-center mt-3">
                {{ $proveedores->links() }}
            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const deleteForms = document.querySelectorAll('.delete-form');
        deleteForms.forEach(form => {
            form.addEventListener('submit', function (e) {
                e.preventDefault();
                if (confirm('¿Está seguro de que desea eliminar este proveedor del sistema? Esta acción no se puede deshacer.')) {
                    this.submit();
                }
            });
        });
    });
</script>
@endsection