@extends('layout.admin')

@section('titulo', 'Registrar Nuevo Proveedor')

@section('contenido')
<div class="container-fluid px-4">
    <h1 class="mt-4"><i class="fas fa-plus-circle text-primary me-2"></i>Registrar Nuevo Proveedor</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a href="{{ route('proveedores.index') }}">Proveedores</a></li>
        <li class="breadcrumb-item active">Nuevo</li>
    </ol>

    <div class="card mb-4 shadow-sm border-0">
        <div class="card-header bg-dark text-white">
            <i class="fas fa-edit me-1"></i> Formulario de Alta de Proveedor Mayorista
        </div>
        <div class="card-body">
            <form action="{{ route('proveedores.store') }}" method="POST">
                @csrf

                <div class="row mb-3">
                    <div class="col-md-6">
                        <label class="form-label fw-bold">RTN (Exactamente 14 Dígitos) <span class="text-danger">*</span></label>
                        <input type="text" name="rtn" class="form-control @error('rtn') is-invalid @enderror" value="{{ old('rtn') }}" maxlength="14" placeholder="Ej: 08019999123456" required>
                        @error('rtn')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>
                    <div class="col-md-6">
                        <label class="form-label fw-bold">Empresa / Razón Social <span class="text-danger">*</span></label>
                        <input type="text" name="empresa" class="form-control @error('empresa') is-invalid @enderror" value="{{ old('empresa') }}" placeholder="Ej: Droguería San Rafael S.A." required>
                        @error('empresa')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-6">
                        <label class="form-label fw-bold">Nombre del Asesor Comercial / Contacto <span class="text-danger">*</span></label>
                        <input type="text" name="contacto" class="form-control @error('contacto') is-invalid @enderror" value="{{ old('contacto') }}" placeholder="Ej: Lic. Carlos Mendoza" required>
                        @error('contacto')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>
                    <div class="col-md-6">
                        <label class="form-label fw-bold">Teléfono (8 Dígitos - Inicia en 2, 3, 8 o 9) <span class="text-danger">*</span></label>
                        <input type="text" name="telefono" class="form-control @error('telefono') is-invalid @enderror" value="{{ old('telefono') }}" maxlength="8" placeholder="Ej: 98765432" required>
                        @error('telefono')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-4">
                        <label class="form-label fw-bold">Categoría de Suministro <span class="text-danger">*</span></label>
                        <select name="categoria" class="form-select @error('categoria') is-invalid @enderror" required>
                            <option value="">Seleccione...</option>
                            <option value="Farmacos" {{ old('categoria') == 'Farmacos' ? 'selected' : '' }}>Fármacos</option>
                            <option value="Material Quirurgico" {{ old('categoria') == 'Material Quirurgico' ? 'selected' : '' }}>Material Quirúrgico</option>
                            <option value="Equipos" {{ old('categoria') == 'Equipos' ? 'selected' : '' }}>Equipos Médicos</option>
                        </select>
                        @error('categoria')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>
                    <div class="col-md-4">
                        <label class="form-label fw-bold">Límite de Crédito (L.) <span class="text-danger">*</span></label>
                        <input type="number" step="0.01" name="limite_credito" class="form-control @error('limite_credito') is-invalid @enderror" value="{{ old('limite_credito', '0.00') }}" min="0" required>
                        @error('limite_credito')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>
                    <div class="col-md-4">
                        <label class="form-label fw-bold">Días de Crédito Autorizados <span class="text-danger">*</span></label>
                        <select name="dias_credito" class="form-select @error('dias_credito') is-invalid @enderror" required>
                            <option value="">Seleccione plazo...</option>
                            <option value="15" {{ old('dias_credito') == '15' ? 'selected' : '' }}>15 Días</option>
                            <option value="30" {{ old('dias_credito') == '30' ? 'selected' : '' }}>30 Días</option>
                            <option value="45" {{ old('dias_credito') == '45' ? 'selected' : '' }}>45 Días</option>
                            <option value="60" {{ old('dias_credito') == '60' ? 'selected' : '' }}>60 Días</option>
                        </select>
                        @error('dias_credito')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-6">
                        <label class="form-label fw-bold">Estado del Proveedor <span class="text-danger">*</span></label>
                        <select name="estado" class="form-select @error('estado') is-invalid @enderror" required>
                            <option value="Activo" {{ old('estado') == 'Activo' ? 'selected' : '' }}>Activo</option>
                            <option value="Inactivo" {{ old('estado') == 'Inactivo' ? 'selected' : '' }}>Inactivo</option>
                        </select>
                        @error('estado')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>
                </div>

                <div class="mt-4">
                    <button type="submit" class="btn btn-primary"><i class="fas fa-save me-1"></i> Guardar Proveedor</button>
                    <a href="{{ route('proveedores.index') }}" class="btn btn-secondary">Cancelar</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection