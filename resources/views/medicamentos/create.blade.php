@extends('layout.admin')

@section('contenido')
<div class="container-fluid px-4">
    <h1 class="mt-4"><i class="fas fa-plus-circle text-primary me-2"></i>Registrar Nuevo Medicamento</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a href="{{ route('medicamentos.index') }}">Inventario</a></li>
        <li class="breadcrumb-item active">Nuevo</li>
    </ol>

    <div class="card mb-4 shadow-sm">
        <div class="card-header bg-dark text-white">
            <i class="fas fa-edit me-1"></i> Formulario de Registro Farmacéutico
        </div>
        <div class="card-body">
            <form action="{{ route('medicamentos.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="row mb-3">
                    <div class="col-md-6">
                        <label class="form-label">Código SKU Único</label>
                        <input type="text" name="codigo" class="form-control @error('codigo') is-invalid @enderror" value="{{ old('codigo') }}" required>
                        @error('codigo')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Nombre Comercial / Genérico</label>
                        <input type="text" name="nombre" class="form-control @error('nombre') is-invalid @enderror" value="{{ old('nombre') }}" required>
                        @error('nombre')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-4">
                        <label class="form-label">Categoría</label>
                        <select name="categoria" class="form-select @error('categoria') is-invalid @enderror" required>
                            <option value="">Seleccione...</option>
                            <option value="Antibioticos" {{ old('categoria') == 'Antibioticos' ? 'selected' : '' }}>Antibióticos</option>
                            <option value="Analgesicos" {{ old('categoria') == 'Analgesicos' ? 'selected' : '' }}>Analgésicos</option>
                            <option value="Sueros" {{ old('categoria') == 'Sueros' ? 'selected' : '' }}>Sueros</option>
                            <option value="Material Quirurgico" {{ old('categoria') == 'Material Quirurgico' ? 'selected' : '' }}>Material Quirúrgico</option>
                            <option value="Vitaminas" {{ old('categoria') == 'Vitaminas' ? 'selected' : '' }}>Vitaminas</option>
                        </select>
                        @error('categoria')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>
                    <div class="col-md-4">
                        <label class="form-label">Precio de Venta (L.)</label>
                        <input type="number" step="0.01" name="precio" class="form-control @error('precio') is-invalid @enderror" value="{{ old('precio') }}" required>
                        @error('precio')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>
                    <div class="col-md-4">
                        <label class="form-label">Costo de Adquisición (L.)</label>
                        <input type="number" step="0.01" name="costo" class="form-control @error('costo') is-invalid @enderror" value="{{ old('costo') }}" required>
                        @error('costo')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-4">
                        <label class="form-label">Inventario / Stock Inicial</label>
                        <input type="number" name="inventario" class="form-control @error('inventario') is-invalid @enderror" value="{{ old('inventario') }}" required>
                        @error('inventario')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>
                    <div class="col-md-4">
                        <label class="form-label">Laboratorio Fabricante</label>
                        <input type="text" name="laboratorio" class="form-control @error('laboratorio') is-invalid @enderror" value="{{ old('laboratorio') }}" required>
                        @error('laboratorio')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>
                    <div class="col-md-4">
                        <label class="form-label">Número de Lote</label>
                        <input type="text" name="numero_lote" class="form-control @error('numero_lote') is-invalid @enderror" value="{{ old('numero_lote') }}" required>
                        @error('numero_lote')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-6">
                        <label class="form-label">Fecha de Vencimiento</label>
                        <input type="date" name="fecha_vencimiento" class="form-control @error('fecha_vencimiento') is-invalid @enderror" value="{{ old('fecha_vencimiento') }}" required>
                        @error('fecha_vencimiento')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Fotografía del Empaque (PNG, JPG, WEBP - Max 5MB)</label>
                        <input type="file" name="imagen" class="form-control @error('imagen') is-invalid @enderror" accept=".png, .jpg, .webp">
                        @error('imagen')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>
                </div>

                <button type="submit" class="btn btn-primary"><i class="fas fa-save me-1"></i> Guardar Medicamento</button>
                <a href="{{ route('medicamentos.index') }}" class="btn btn-secondary">Cancelar</a>
            </form>
        </div>
    </div>
</div>
@endsection