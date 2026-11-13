@extends('layout.admin')

@section('content')
<div class="container-fluid px-4">
    <h1 class="mt-4"><i class="fas fa-edit text-primary me-2"></i>Editar Medicamento: {{ $medicamento->nombre }}</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a href="{{ route('medicamentos.index') }}">Inventario</a></li>
        <li class="breadcrumb-item active">Editar</li>
    </ol>

    <div class="card mb-4 shadow-sm">
        <div class="card-header bg-dark text-white">
            <i class="fas fa-pen me-1"></i> Actualizar Información Farmacéutica
        </div>
        <div class="card-body">
            <form action="{{ route('medicamentos.update', $medicamento->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="row mb-3">
                    <div class="col-md-6">
                        <label class="form-label">Código SKU Único</label>
                        <input type="text" name="codigo" class="form-control @error('codigo') is-invalid @enderror" value="{{ old('codigo', $medicamento->codigo) }}" required>
                        @error('codigo')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Nombre Comercial / Genérico</label>
                        <input type="text" name="nombre" class="form-control @error('nombre') is-invalid @enderror" value="{{ old('nombre', $medicamento->nombre) }}" required>
                        @error('nombre')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-4">
                        <label class="form-label">Categoría</label>
                        <select name="categoria" class="form-select @error('categoria') is-invalid @enderror" required>
                            <option value="Antibioticos" {{ old('categoria', $medicamento->categoria) == 'Antibioticos' ? 'selected' : '' }}>Antibióticos</option>
                            <option value="Analgesicos" {{ old('categoria', $medicamento->categoria) == 'Analgesicos' ? 'selected' : '' }}>Analgésicos</option>
                            <option value="Sueros" {{ old('categoria', $medicamento->categoria) == 'Sueros' ? 'selected' : '' }}>Sueros</option>
                            <option value="Material Quirurgico" {{ old('categoria', $medicamento->categoria) == 'Material Quirurgico' ? 'selected' : '' }}>Material Quirúrgico</option>
                            <option value="Vitaminas" {{ old('categoria', $medicamento->categoria) == 'Vitaminas' ? 'selected' : '' }}>Vitaminas</option>
                        </select>
                        @error('categoria')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>
                    <div class="col-md-4">
                        <label class="form-label">Precio de Venta (L.)</label>
                        <input type="number" step="0.01" name="precio" class="form-control @error('precio') is-invalid @enderror" value="{{ old('precio', $medicamento->precio) }}" required>
                        @error('precio')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>
                    <div class="col-md-4">
                        <label class="form-label">Costo de Adquisición (L.)</label>
                        <input type="number" step="0.01" name="costo" class="form-control @error('costo') is-invalid @enderror" value="{{ old('costo', $medicamento->costo) }}" required>
                        @error('costo')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-4">
                        <label class="form-label">Inventario / Stock</label>
                        <input type="number" name="inventario" class="form-control @error('inventario') is-invalid @enderror" value="{{ old('inventario', $medicamento->inventario) }}" required>
                        @error('inventario')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>
                    <div class="col-md-4">
                        <label class="form-label">Laboratorio Fabricante</label>
                        <input type="text" name="laboratorio" class="form-control @error('laboratorio') is-invalid @enderror" value="{{ old('laboratorio', $medicamento->laboratorio) }}" required>
                        @error('laboratorio')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>
                    <div class="col-md-4">
                        <label class="form-label">Número de Lote</label>
                        <input type="text" name="numero_lote" class="form-control @error('numero_lote') is-invalid @enderror" value="{{ old('numero_lote', $medicamento->numero_lote) }}" required>
                        @error('numero_lote')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-6">
                        <label class="form-label">Fecha de Vencimiento</label>
                        <input type="date" name="fecha_vencimiento" class="form-control @error('fecha_vencimiento') is-invalid @enderror" value="{{ old('fecha_vencimiento', $medicamento->fecha_vencimiento) }}" required>
                        @error('fecha_vencimiento')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Actualizar Fotografía del Empaque (Opcional)</label>
                        <input type="file" name="imagen" class="form-control @error('imagen') is-invalid @enderror" accept=".png, .jpg, .webp">
                        @error('imagen')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        @if($medicamento->imagen)
                            <div class="mt-2">
                                <small class="text-muted">Foto actual:</small><br>
                                <img src="{{ asset($medicamento->imagen) }}" alt="Actual" style="width: 50px; height: 50px; object-fit: cover;" class="rounded border">
                            </div>
                        @endif
                    </div>
                </div>

                <button type="submit" class="btn btn-primary"><i class="fas fa-sync-alt me-1"></i> Actualizar Medicamento</button>
                <a href="{{ route('medicamentos.index') }}" class="btn btn-secondary">Cancelar</a>
            </form>
        </div>
    </div>
</div>
@endsection