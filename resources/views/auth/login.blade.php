<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>Iniciar Sesión - DISFARMA Honduras</title>
    <link href="{{ asset('sb-admin/css/styles.css') }}" rel="stylesheet" />
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
</head>
<body class="bg-info">
<div id="layoutAuthentication">
    <div id="layoutAuthentication_content">
        <main>
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-5">
                        <div class="card shadow-lg border-0 rounded-lg mt-5">
                            <div class="card-header bg-dark text-white text-center py-4">
                                <div class="mb-2">
                                    <img src="{{ asset('sb-admin/assets/img/disfarma_logo.png') }}" alt="DISFARMA Logo" style="height: 75px; width: auto;">
                                </div>
                                <h3 class="font-weight-light my-2">DISFARMA Honduras</h3>
                                <small class="text-white-50">Droguería y Distribuidora Farmacéutica San Rafael</small>
                            </div>
                            <!-- Prueba de admin: admin@disfarma.hn / admin contra: contra123 -->
                            <div class="card-body p-4">
                                @if (session('success'))
                                    <div class="alert alert-success alert-dismissible fade show shadow-sm" role="alert">
                                        <i class="fas fa-check-circle me-1"></i>{{ session('success') }}
                                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Cerrar"></button>
                                    </div>
                                @endif

                                <form action="{{ route('login.post') }}" method="POST">
                                    @csrf
                                    
                                    <div class="form-floating mb-3">
                                        <input class="form-control @error('email') is-invalid @enderror" id="inputEmail" type="email" name="email" value="{{ old('email') }}" placeholder="admin@disfarma.hn" required autofocus />
                                        <label for="inputEmail"><i class="fas fa-envelope me-1 text-primary"></i>Correo Electrónico (@disfarma.hn)</label>
                                        @error('email')
                                            <div class="invalid-feedback">
                                                <i class="fas fa-exclamation-circle me-1"></i>{{ $message }}
                                            </div>
                                        @enderror
                                    </div>

                                    <div class="form-floating mb-3">
                                        <input class="form-control @error('password') is-invalid @enderror" id="inputPassword" type="password" name="password" placeholder="Contraseña" required />
                                        <label for="inputPassword"><i class="fas fa-lock me-1 text-primary"></i>Contraseña</label>
                                        @error('password')
                                            <div class="invalid-feedback">
                                                <i class="fas fa-exclamation-circle me-1"></i>{{ $message }}
                                            </div>
                                        @enderror
                                    </div>

                                    <div class="form-check mb-3">
                                        <input class="form-check-input" id="inputRememberPassword" type="checkbox" name="remember" />
                                        <label class="form-check-label text-muted" for="inputRememberPassword">Recordar mi sesión</label>
                                    </div>

                                    <div class="d-flex align-items-center justify-content-between mt-4 mb-0">
                                        <span class="small text-muted">Demo: <strong>admin@disfarma.hn</strong></span>
                                        <button type="submit" class="btn btn-primary px-4">
                                            <i class="fas fa-sign-in-alt me-1"></i>Ingresar
                                        </button>
                                    </div>
                                </form>
                            </div>
                            <div class="card-footer text-center py-3 bg-light">
                                <div class="small">
                                    ¿No tienes una cuenta de empleado? <a href="{{ route('register') }}" class="text-primary">Registrarse aquí</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
<script src="{{ asset('sb-admin/js/scripts.js') }}"></script>
</body>
</html>