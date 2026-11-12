<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>Registro de Personal - DISFARMA Honduras</title>
    <link href="{{ asset('sb-admin/css/styles.css') }}" rel="stylesheet" />
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
</head>
<body class="bg-info">
<div id="layoutAuthentication">
    <div id="layoutAuthentication_content">
        <main>
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-7">
                        <div class="card shadow-lg border-0 rounded-lg mt-5">
                            <div class="card-header bg-dark text-white text-center py-4">
                                <div class="mb-2">
                                    <img src="{{ asset('sb-admin/assets/img/disfarma_logo.png') }}" alt="DISFARMA Logo" style="height: 65px; width: auto;">
                                </div>
                                <h3 class="font-weight-light my-2">
                                    <i class="fas fa-user-plus text-primary me-2"></i>Crear Cuenta
                                </h3>
                                <small class="text-white-50">DISFARMA Honduras - Droguería y Distribuidora Farmacéutica San Rafael</small>
                            </div>
                            <div class="card-body p-4">
                                <form action="{{ route('register.post') }}" method="POST">
                                    @csrf
                                    
                                    <div class="form-floating mb-3">
                                        <input class="form-control @error('name') is-invalid @enderror" id="inputName" type="text" name="name" value="{{ old('name') }}" placeholder="Juan Pérez" required />
                                        <label for="inputName"><i class="fas fa-user me-1 text-primary"></i>Nombre Completo</label>
                                        @error('name')
                                            <div class="invalid-feedback">
                                                <i class="fas fa-exclamation-circle me-1"></i>{{ $message }}
                                            </div>
                                        @enderror
                                    </div>

                                    <div class="form-floating mb-3">
                                        <input class="form-control @error('email') is-invalid @enderror" id="inputEmail" type="email" name="email" value="{{ old('email') }}" placeholder="empleado@disfarma.hn" required />
                                        <label for="inputEmail"><i class="fas fa-envelope me-1 text-primary"></i>Correo Institucional (@disfarma.hn)</label>
                                        @error('email')
                                            <div class="invalid-feedback">
                                                <i class="fas fa-exclamation-circle me-1"></i>{{ $message }}
                                            </div>
                                        @enderror
                                    </div>

                                    <div class="row mb-3">
                                        <div class="col-md-6">
                                            <div class="form-floating mb-3 mb-md-0">
                                                <input class="form-control @error('password') is-invalid @enderror" id="inputPassword" type="password" name="password" placeholder="Contraseña" required />
                                                <label for="inputPassword"><i class="fas fa-lock me-1 text-primary"></i>Contraseña</label>
                                                @error('password')
                                                    <div class="invalid-feedback">
                                                        <i class="fas fa-exclamation-circle me-1"></i>{{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-floating mb-3 mb-md-0">
                                                <input class="form-control" id="inputPasswordConfirm" type="password" name="password_confirmation" placeholder="Confirmar" required />
                                                <label for="inputPasswordConfirm"><i class="fas fa-check-double me-1 text-primary"></i>Confirmar Clave</label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="mt-4 mb-0">
                                        <div class="d-grid">
                                            <button type="submit" class="btn btn-primary py-2">
                                                <i class="fas fa-save me-1"></i>Registrar Cuenta y Acceder
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="card-footer text-center py-3 bg-light">
                                <div class="small">
                                    ¿Ya tienes cuenta autorizada? <a href="{{ route('login') }}" class="text-primary">Iniciar Sesión</a>
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