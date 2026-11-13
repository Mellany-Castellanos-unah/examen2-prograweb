@extends('layout.admin')

@section('titulo', 'Registrar Nuevo Colaborador')

@section('contenido')
<div class="container-fluid px-4">
    <h1 class="mt-4"><i class="fas fa-user-plus text-primary me-2"></i>Registrar Nuevo Colaborador</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a href="{{ route('empleados.index') }}">Empleados y Regentes</a></li>
        <li class="breadcrumb-item active">Nuevo</li>
    </ol>

    <div class="card mb-4 shadow-sm border-0">
        <div class="card-header bg-dark text-white">
            <i class="fas fa-edit me-1"></i> Formulario de Alta de Personal
        </div>
        <div class="card-body">
            <form action="{{ route('empleados.store') }}" method="POST">
                @csrf

                <div class="row mb-3">
                    <div class="col-md-6">
                        <label class="form-label fw-bold">Número de Identidad (13 Dígitos, sin guiones) <span class="text-danger">*</span></label>
                        <input type="text" name="identidad" class="form-control @error('identidad') is-invalid @enderror" value="{{ old('identidad') }}" maxlength="13" placeholder="Ej: 0801199512345" required>
                        @error('identidad')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>
                    <div class="col-md-6">
                        <label class="form-label fw-bold">Correo Electrónico <span class="text-danger">*</span></label>
                        <input type="email" name="correo" class="form-control @error('correo') is-invalid @enderror" value="{{ old('correo') }}" placeholder="Ej: c.mendoza@disfarma.hn" required>
                        @error('correo')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-6">
                        <label class="form-label fw-bold">Nombre <span class="text-danger">*</span></label>
                        <input type="text" name="nombre" class="form-control @error('nombre') is-invalid @enderror" value="{{ old('nombre') }}" placeholder="Ej: Carlos Alberto" required>
                        @error('nombre')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>
                    <div class="col-md-6">
                        <label class="form-label fw-bold">Apellido <span class="text-danger">*</span></label>
                        <input type="text" name="apellido" class="form-control @error('apellido') is-invalid @enderror" value="{{ old('apellido') }}" placeholder="Ej: Mendoza Ramos" required>
                        @error('apellido')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-4">
                        <label class="form-label fw-bold">Cargo Desempeñado <span class="text-danger">*</span></label>
                        <select name="cargo" class="form-select @error('cargo') is-invalid @enderror" required>
                            <option value="">Seleccione cargo...</option>
                            <option value="Regente Farmaceutico" {{ old('cargo') == 'Regente Farmaceutico' ? 'selected' : '' }}>Regente Farmacéutico</option>
                            <option value="Asistente de farmacia" {{ old('cargo') == 'Asistente de farmacia' ? 'selected' : '' }}>Asistente de Farmacia</option>
                            <option value="jefe de bodega" {{ old('cargo') == 'jefe de bodega' ? 'selected' : '' }}>Jefe de Bodega</option>
                            <option value="despachador" {{ old('cargo') == 'despachador' ? 'selected' : '' }}>Despachador</option>
                            <option value="cajero" {{ old('cargo') == 'cajero' ? 'selected' : '' }}>Cajero</option>
                        </select>
                        @error('cargo')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>
                    <div class="col-md-4">
                        <label class="form-label fw-bold">Salario Base Mensual (L.) <span class="text-danger">*</span></label>
                        <input type="number" step="0.01" name="salario" class="form-control @error('salario') is-invalid @enderror" value="{{ old('salario') }}" min="0.01" placeholder="Ej: 18500.00" required>
                        @error('salario')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>
                    <div class="col-md-4">
                        <label class="form-label fw-bold">Fecha de Ingreso <span class="text-danger">*</span></label>
                        <input type="date" name="fecha_ingreso" class="form-control @error('fecha_ingreso') is-invalid @enderror" value="{{ old('fecha_ingreso', date('Y-m-d')) }}" required>
                        @error('fecha_ingreso')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-6">
                        <label class="form-label fw-bold">Estado del Colaborador <span class="text-danger">*</span></label>
                        <select name="estado" class="form-select @error('estado') is-invalid @enderror" required>
                            <option value="Activo" {{ old('estado') == 'Activo' ? 'selected' : '' }}>Activo</option>
                            <option value="Inactivo" {{ old('estado') == 'Inactivo' ? 'selected' : '' }}>Inactivo</option>
                        </select>
                        @error('estado')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>
                </div>

                <div class="mt-4">
                    <button type="submit" class="btn btn-primary"><i class="fas fa-save me-1"></i> Guardar Colaborador</button>
                    <a href="{{ route('empleados.index') }}" class="btn btn-secondary">Cancelar</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection