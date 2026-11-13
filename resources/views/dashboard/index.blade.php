@extends('layout.admin')

@section('titulo', 'Dashboard Gerencial')

@section('contenido')
<div class="container-fluid px-4">
    <h1 class="mt-4 text-dark"><i class="fas fa-chart-line text-primary me-2"></i>Dashboard Gerencial - DISFARMA Honduras</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">Indicadores Clave de Rendimiento (KPIs)</li>
    </ol>

    
    <div class="row">
        
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow-sm h-100 py-2 border-0 border-top border-4 border-primary">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                Medicamentos en Catálogo
                            </div>
                            <div class="h5 mb-0 font-weight-bold text-dark">{{ $totalMedicamentos }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-pills fa-2x text-primary opacity-50"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-success shadow-sm h-100 py-2 border-0 border-top border-4 border-success">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                Proveedores Activos
                            </div>
                            <div class="h5 mb-0 font-weight-bold text-dark">{{ $totalProveedoresActivos }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-truck fa-2x text-success opacity-50"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-info shadow-sm h-100 py-2 border-0 border-top border-4 border-info">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                                Empleados en Nómina
                            </div>
                            <div class="h5 mb-0 font-weight-bold text-dark">{{ $totalEmpleados }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-users fa-2x text-info opacity-50"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-warning shadow-sm h-100 py-2 border-0 border-top border-4 border-warning">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                Valor Total Inventario
                            </div>
                            <div class="h5 mb-0 font-weight-bold text-success">L. {{ number_format($valorTotalInventario, 2) }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-file-invoice-dollar fa-2x text-warning opacity-50"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    
    <div class="row">
        <div class="col-xl-12">
            <div class="card mb-4 shadow-sm border-0">
                <div class="card-header bg-dark text-white py-3">
                    <i class="fas fa-info-circle me-1"></i> Resumen Operativo de la Droguería
                </div>
                <div class="card-body">
                    <p class="lead">Bienvenido al panel de control gerencial de <strong>DISFARMA Honduras</strong>. Desde aquí puede supervisar en tiempo real los volúmenes del inventario farmacéutico, la red de proveedores mayoristas autorizados y la gestión de recursos humanos.</p>
                    <hr>
                    <p class="mb-0 text-muted">Utilice el menú lateral para navegar entre los diferentes módulos de gestión e ingresar nuevos registros según sea requerido.</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection