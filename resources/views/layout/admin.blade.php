<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>@yield('titulo', 'Panel Administrativo') - DISFARMA Honduras</title>
    <link href="{{ asset('sb-admin/css/styles.css') }}" rel="stylesheet" />
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
</head>
<body class="sb-nav-fixed">
<!-- NAVBAR SUPERIOR -->
<nav class="sb-topnav navbar navbar-expand navbar-dark">
<a class="navbar-brand ps-3 font-weight-bold d-flex align-items-center" href="{{ route('dashboard') }}">
<img src="{{ asset('sb-admin/assets/img/disfarma_logo.png') }}" alt="DISFARMA Logo" style="height: 35px; width: auto;" class="me-2">
<span>DISFARMA</span>
</a>
<button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!">
<i class="fas fa-bars"></i>
</button>


<ul class="navbar-nav ms-auto me-3 me-lg-4">
    <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle text-white" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            <i class="fas fa-user-circle me-1" style="color: #628bc4;"></i>
            <span class="fw-bold">{{ Auth::user()->name ?? 'Administrador' }}</span>
        </a>
        <ul class="dropdown-menu dropdown-menu-end shadow" aria-labelledby="navbarDropdown">
            <li><span class="dropdown-item-text small text-muted">{{ Auth::user()->email ?? 'admin@disfarma.hn' }}</span></li>
            <li><hr class="dropdown-divider" /></li>
            <li>
                <form action="{{ route('logout') }}" method="POST" class="d-inline">
                    @csrf
                    <button type="submit" class="dropdown-item text-danger">
                        <i class="fas fa-sign-out-alt me-1"></i>Cerrar Sesión
                    </button>
                </form>
            </li>
        </ul>
    </li>
</ul>
</nav>

<div id="layoutSidenav">
<div id="layoutSidenav_nav">
<nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
<div class="sb-sidenav-menu">
<div class="nav">
<div class="sb-sidenav-menu-heading">Módulos de Gestión</div>
<a class="nav-link" href="{{ route('dashboard') }}">
<div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt" style="color: #628bc4;"></i></div>
Dashboard Gerencial
</a>
<a class="nav-link" href="{{ route('medicamentos.index') }}">
<div class="sb-nav-link-icon"><i class="fas fa-pills" style="color: #628bc4;"></i></div>
Medicamentos
</a>
<a class="nav-link" href="{{ route('proveedores.index') }}">
<div class="sb-nav-link-icon"><i class="fas fa-truck" style="color: #628bc4;"></i></div>
Proveedores
</a>
<a class="nav-link" href="{{ route('empleados.index') }}">
<div class="sb-nav-link-icon"><i class="fas fa-users" style="color: #628bc4;"></i></div>
Empleados y Regentes
</a>
</div>
</div>
<div class="sb-sidenav-footer">
<div class="small text-muted">Conectado como:</div>
<span class="text-white fw-bold">{{ Auth::user()->name ?? 'Administrador' }}</span>
</div>
</nav>
</div>


<div id="layoutSidenav_content">
<main>
<div class="container-fluid px-4 mt-4">
@if (session('success'))
<div class="alert alert-success alert-dismissible fade show shadow-sm" role="alert">
<i class="fas fa-check-circle me-2"></i>{{ session('success') }}
<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Cerrar"></button>
</div>
@endif

@if ($errors->any())
<div class="alert alert-danger alert-dismissible fade show shadow-sm" role="alert">
<i class="fas fa-exclamation-triangle me-2"></i>Por favor verifique los errores en el formulario.
<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Cerrar"></button>
</div>
@endif

@yield('contenido')
</div>
</main>
<footer class="py-4 bg-light mt-auto">
<div class="container-fluid px-4">
<div class="d-flex align-items-center justify-content-between small text-muted">
<div>© 2026 Droguería y Distribuidora Farmacéutica San Rafael (DISFARMA Honduras)</div>
<div>Programación WEB | UNAH III PAC 2026</div>
</div>
</div>
</footer>
</div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
<script src="{{ asset('sb-admin/js/scripts.js') }}"></script>
</body>
</html>