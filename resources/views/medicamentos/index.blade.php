@extends('layout.admin')

@section('content')
<div class="container-fluid px-4">
    <h1 class="mt-4"><i class="fas fa-pills text-primary me-2"></i>Gestión de Inventario - Medicamentos</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
        <li class="breadcrumb-item active">Inventario Farmacéutico</li>
    </ol>

    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <i class="fas fa-check-circle me-1"></i>{{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Cerrar"></button>
        </div>
    @endif

    <div class="card mb-4 shadow-sm">
        <div class="card-header d-flex justify-content-between align-items-center bg-dark text-white">
            <div><i class="fas fa-table me-1"></i> Catálogo de Medicamentos y Suministros</div>
            <a href="{{ route('medicamentos.create') }}" class="btn btn-primary btn-sm">
                <i class="fas fa-plus me-1"></i> Nuevo Medicamento
            </a>
        </div>
        <div class="card-body">
            <!-- Buscador -->
            <form method="GET" action="{{ route('medicamentos.index') }}" class="mb-3">
                <div class="input-group">
                    <input type="text" name="search" class="form-control" placeholder="Buscar por Nombre o SKU..." value="{{ $search ?? '' }}">
                    <button class="btn btn-outline-primary" type="submit"><i class="fas fa-search"></i> Buscar</button>
                    @if($search)
                        <a href="{{ route('medicamentos.index') }}" class="btn btn-outline-secondary">Limpiar</a>
                    @endif
                </div>
            </form>

            <div class="table-responsive">
                <table class="table table-bordered table-striped align-middle">
                    <thead class="table-dark text-center">
                        <tr>
                            <th>Imagen</th>
                            <th>SKU / Código</th>
                            <th>Nombre</th>
                            <th>Categoría</th>
                            <th>Precio / Costo</th>
                            <th>Inventario</th>
                            <th>Lote / Vencimiento</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($medicamentos as $med)
                        <tr>
                            <td class="text-center">
                                @if($med->imagen)
                                    <img src="{{ asset($med->imagen) }}" alt="Empaque" style="width: 45px; height: 45px; object-fit: cover;" class="rounded border">
                                @else
                                    <span class="badge bg-secondary">Sin Foto</span>
                                @endif
                            </td>
                            <td><strong>{{ $med->codigo }}</strong></td>
                            <td>{{ $med->nombre }}</td>
                            <td><span class="badge bg-info text-dark">{{ $med->categoria }}</span></td>
                            <td>
                                <span class="text-success fw-bold">L. {{ number_format($med->precio, 2) }}</span><br>
                                <small class="text-muted">Costo: L. {{ number_format($med->costo, 2) }}</small>
                            </td>
                            <td class="text-center">
                                @if($med->inventario > 20)
                                    <span class="badge bg-success p-2">Óptimo ({{ $med->inventario }})</span>
                                @elseif($med->inventario >= 10 && $med->inventario <= 20)
                                    <span class="badge bg-warning text-dark p-2">Moderado ({{ $med->inventario }})</span>
                                @else
                                    <span class="badge bg-danger p-2 animate__animated animate__flash">Desabastecimiento! ({{ $med->inventario }})</span>
                                @endif
                            </td>
                            <td>
                                <small><strong>Lote:</strong> {{ $med->numero_lote }}</small><br>
                                <small class="text-muted">Exp: {{ $med->fecha_vencimiento }}</small>
                            </td>
                            <td class="text-center">
                                <a href="{{ route('medicamentos.edit', $med->id) }}" class="btn btn-warning btn-sm" title="Editar">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <form action="{{ route('medicamentos.destroy', $med->id) }}" method="POST" class="d-inline delete-form">
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
                            <td colspan="8" class="text-center text-muted py-4">No se encontraron medicamentos registrados en el inventario.</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            
            <div class="d-flex justify-content-center mt-3">
                {{ $medicamentos->links() }}
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
                if (confirm('¿Está seguro de que desea eliminar este medicamento del inventario de DISFARMA? Esta acción no se puede deshacer.')) {
                    this.submit();
                }
            });
        });
    });
</script>
@endsection