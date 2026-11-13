@extends('layout.admin')

@section('titulo', 'Gestión de Personal y Nómina')

@section('contenido')
<div class="container-fluid px-4">
    <h1 class="mt-4 text-dark"><i class="fas fa-users text-primary me-2"></i>Gestión de Recursos Humanos y Nómina</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
        <li class="breadcrumb-item active">Empleados y Regentes</li>
    </ol>

    <div class="card mb-4 shadow-sm border-0">
        <div class="card-header d-flex justify-content-between align-items-center bg-dark text-white py-3">
            <div><i class="fas fa-table me-1"></i> Personal de Droguería y Farmacia DISFARMA</div>
            <a href="{{ route('empleados.create') }}" class="btn btn-primary btn-sm">
                <i class="fas fa-user-plus me-1"></i> Nuevo Colaborador
            </a>
        </div>
        <div class="card-body">
            <!-- Buscador -->
            <form method="GET" action="{{ route('empleados.index') }}" class="mb-3">
                <div class="input-group">
                    <input type="text" name="search" class="form-control" placeholder="Buscar por Nombre, Apellido, Identidad o Correo..." value="{{ $search ?? '' }}">
                    <button class="btn btn-outline-primary" type="submit"><i class="fas fa-search"></i> Buscar</button>
                    @if($search)
                        <a href="{{ route('empleados.index') }}" class="btn btn-outline-secondary">Limpiar</a>
                    @endif
                </div>
            </form>

            <div class="table-responsive">
                <table class="table table-bordered table-striped align-middle">
                    <thead class="table-dark text-center">
                        <tr>
                            <th>Identidad (13 Dígitos)</th>
                            <th>Nombre Completo</th>
                            <th>Correo Electrónico</th>
                            <th>Cargo Desempeñado</th>
                            <th>Salario Base (L.)</th>
                            <th>Fecha de Ingreso</th>
                            <th>Estado</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($empleados as $emp)
                        <tr>
                            <td><strong>{{ $emp->identidad }}</strong></td>
                            <td>{{ $emp->nombre }} {{ $emp->apellido }}</td>
                            <td>{{ $emp->correo }}</td>
                            <td>
                                @if($emp->cargo == 'Regente Farmaceutico')
                                    <span class="badge bg-primary">Regente Farmacéutico</span>
                                @elseif($emp->cargo == 'Asistente de farmacia')
                                    <span class="badge bg-info text-dark">Asistente de Farmacia</span>
                                @elseif($emp->cargo == 'jefe de bodega')
                                    <span class="badge bg-warning text-dark">Jefe de Bodega</span>
                                @elseif($emp->cargo == 'despachador')
                                    <span class="badge bg-secondary">Despachador</span>
                                @else
                                    <span class="badge bg-dark">Cajero</span>
                                @endif
                            </td>
                            <td class="text-success fw-bold">L. {{ number_format($emp->salario, 2) }}</td>
                            <td class="text-center">{{ \Carbon\Carbon::parse($emp->fecha_ingreso)->format('d/m/Y') }}</td>
                            <td class="text-center">
                                @if($emp->estado == 'Activo')
                                    <span class="badge bg-success">Activo</span>
                                @else
                                    <span class="badge bg-secondary">Inactivo</span>
                                @endif
                            </td>
                            <td class="text-center">
                                <a href="{{ route('empleados.edit', $emp->id) }}" class="btn btn-warning btn-sm" title="Editar">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <form action="{{ route('empleados.destroy', $emp->id) }}" method="POST" class="d-inline delete-form">
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
                            <td colspan="8" class="text-center text-muted py-4">No se encontraron colaboradores registrados en la nómina.</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <!-- Paginación -->
            <div class="d-flex justify-content-center mt-3">
                {{ $empleados->links() }}
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
                if (confirm('¿Está seguro de que desea eliminar a este colaborador del sistema? Esta acción no se puede deshacer.')) {
                    this.submit();
                }
            });
        });
    });
</script>
@endsection