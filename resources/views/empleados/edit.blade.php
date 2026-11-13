@extends('layout.admin')

@section('titulo', 'Editar Colaborador')

@section('contenido')
<div class="container-fluid px-4">
    <h1 class="mt-4"><i class="fas fa-user-edit text-warning me-2"></i>Editar Colaborador: {{ $empleado->nombre }} {{ $empleado->apellido }}</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a href="{{ route('empleados.index') }}">Empleados y Regentes</a></li>
        <li class="breadcrumb-item active">Editar</li>
    </ol>

    <div class="card mb-4 shadow-sm border-0">
        <div class="card-header bg-dark text-white">
            <i class="fas fa-pen me-1"></i> Actualizar Información del Personal
        </div>
        <div class="card-body">
            <form action="{{ route('empleados.update', $empleado->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="row mb-3">
                    <div class="col-md-6">
                        <label class="form-label fw-bold">Número de Identidad (13 Dígitos, sin guiones) <span class="text-danger">*</span></label>
                        <input type="text" name="identidad" class="form-control @error('identidad') is-invalid @enderror" value="{{ old('identidad', $empleado->identidad) }}" maxlength="13" required>
                        @error('identidad')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>
                    <div class="col-md-6">
                        <label class="form-label fw-bold">Correo Electrónico <span class="text-danger">*</span></label>
                        <input type="email" name="correo" class="form-control @error('correo') is-invalid @enderror" value="{{ old('correo', $empleado->correo) }}" required>
                        @error('correo')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-6">
                        <label class="form-label fw-bold">Nombre <span class="text-danger">*</span></label>
                        <input type="text" name="nombre" class="form-control @error('nombre', $empleado->nombre) is-invalid @enderror" value="{{ old('nombre', $empleado->nombre) }}" required>
                        @error('nombre')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>
                    <div class="col-md-6">
                        <label class="form-label fw-bold">Apellido <span class="text-danger">*</span></label>
                        <input type="text" name="apellido" class="form-control @error('apellido') is-invalid @enderror" value="{{ old('apellido', $empleado->apellido) }}" required>
                        @error('apellido')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-4">
                        <label class="form-label fw-bold">Cargo Desempeñado <span class="text-danger">*</span></label>
                        <select name="cargo" class="form-select @error('cargo') is-invalid @enderror" required>
                            <option value="Regente Farmaceutico" {{ old('cargo', $empleado->cargo) == 'Regente Farmaceutico' ? 'selected' : '' }}>Regente Farmacéutico</option>
                            <option value="Asistente de farmacia" {{ old('cargo', $empleado->cargo) == 'Asistente de farmacia' ? 'selected' : '' }}>Asistente de Farmacia</option>
                            <option value="jefe de bodega" {{ old('cargo', $empleado->cargo) == 'jefe de bodega' ? 'selected' : '' }}>Jefe de Bodega</option>
                            <option value="despachador" {{ old('cargo', $empleado->cargo) == 'despachador' ? 'selected' : '' }}>Despachador</option>
                            <option value="cajero" {{ old('cargo', $empleado->cargo) == 'cajero' ? 'selected' : '' }}>Cajero</option>
                        </select>
                        @error('cargo')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>
                    <div class="col-md-4">
                        <label class="form-label fw-bold">Salario Base Mensual (L.) <span class="text-danger">*</span></label>
                        <input type="number" step="0.01" name="salario" class="form-control @error('salario') is-invalid @enderror" value="{{ old('salario', $empleado->salario) }}" min="0.01" required>
                        @error('salario')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>
                    <div class="col-md-4">
                        <label class="form-label fw-bold">Fecha de Ingreso <span class="text-danger">*</span></label>
                        <input type="date" name="fecha_ingreso" class="form-control @error('fecha_ingreso') is-invalid @enderror" value="{{ old('fecha_ingreso', $empleado->fecha_ingreso) }}" required>
                        @error('fecha_ingreso')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-6">
                        <label class="form-label fw-bold">Estado del Colaborador <span class="text-danger">*</span></label>
                        <select name="estado" class="form-select @error('estado') is-invalid @enderror" required>
                            <option value="Activo" {{ old('estado', $empleado->estado) == 'Activo' ? 'selected' : '' }}>Activo</option>
                            <option value="Inactivo" {{ old('estado', $empleado->estado) == 'Inactivo' ? 'selected' : '' }}>Inactivo</option>
                        </select>
                        @error('estado')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>
                </div>

                <div class="mt-4">
                    <button type="submit" class="btn btn-warning text-dark"><i class="fas fa-sync-alt me-1"></i> Actualizar Colaborador</button>
                    <a href="{{ route('empleados.index') }}" class="btn btn-secondary">Cancelar</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection