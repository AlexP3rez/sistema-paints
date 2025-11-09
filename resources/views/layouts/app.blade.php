<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title', 'Sistema Paints')</title>
    
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
    
    <style>
        body {
            min-height: 100vh;
            background-color: #f8f9fa;
        }
        
        .navbar-brand {
            font-weight: bold;
            font-size: 1.5rem;
        }
        
        .main-content {
            padding: 20px 0;
        }
        
        .card {
            border: none;
            margin-bottom: 20px;
        }
        
        .table th {
            font-weight: 600;
        }
        
        .btn-group-sm .btn {
            padding: 0.25rem 0.5rem;
        }
    </style>
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark shadow">
        <div class="container-fluid">
            <a class="navbar-brand" href="/">
                <i class="bi bi-brush"></i> Sistema Paints
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown">
                            <i class="bi bi-grid-3x3-gap"></i> Módulos
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end">
                            <li><h6 class="dropdown-header">Catálogos</h6></li>
                            <li><a class="dropdown-item" href="{{ route('clientes.index') }}"><i class="bi bi-people"></i> Clientes</a></li>
                            <li><a class="dropdown-item" href="{{ route('proveedores.index') }}"><i class="bi bi-truck"></i> Proveedores</a></li>
                            <li><a class="dropdown-item" href="{{ route('sucursales.index') }}"><i class="bi bi-building"></i> Sucursales</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li><h6 class="dropdown-header">Productos</h6></li>
                            <li><a class="dropdown-item" href="{{ route('productos.index') }}"><i class="bi bi-box"></i> Productos</a></li>
                            <li><a class="dropdown-item" href="{{ route('categorias.index') }}"><i class="bi bi-tags"></i> Categorías</a></li>
                            <li><a class="dropdown-item" href="{{ route('marcas.index') }}"><i class="bi bi-tag"></i> Marcas</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li><h6 class="dropdown-header">Sistema</h6></li>
                            <li><a class="dropdown-item" href="{{ route('tipos-pago.index') }}"><i class="bi bi-cash-coin"></i> Tipos de Pago</a></li>
                            <li><a class="dropdown-item" href="{{ route('usuarios.index') }}"><i class="bi bi-person-badge"></i> Usuarios</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <div class="container-fluid main-content">
        <!-- Mensajes de éxito/error -->
        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <i class="bi bi-check-circle"></i> {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        @if(session('error'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <i class="bi bi-exclamation-triangle"></i> {{ session('error') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        @if($errors->any())
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>¡Error!</strong> Por favor corrige los siguientes errores:
                <ul class="mb-0 mt-2">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        <!-- Contenido de la página -->
        @yield('content')
    </div>

    <!-- Footer -->
    <footer class="bg-dark text-white text-center py-3 mt-5">
        <div class="container">
            <p class="mb-0">&copy; {{ date('Y') }} Sistema Paints - Todos los derechos reservados</p>
        </div>
    </footer>

    <!-- Bootstrap 5 JS Bundle (includes Popper) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    
    @yield('scripts')
</body>
</html>