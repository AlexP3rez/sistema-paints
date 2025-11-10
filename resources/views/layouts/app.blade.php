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
        :root {
            --color-principal: #1e88e5;
            --color-principal-hover: #1565c0;
            --color-fondo: #f5f7fa;
            --color-blanco: #ffffff;
            --color-texto: #2c3e50;
            --color-texto-claro: #6c757d;
        }
        
        body {
            min-height: 100vh;
            background-color: var(--color-fondo);
            color: var(--color-texto);
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
        }
        
        /* Navbar */
        .navbar {
            background-color: var(--color-blanco) !important;
            box-shadow: 0 2px 4px rgba(0,0,0,0.08);
            padding: 1rem 0;
        }
        
        .navbar-brand {
            font-weight: 700;
            font-size: 1.5rem;
            color: var(--color-principal) !important;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }
        
        .navbar-brand i {
            font-size: 1.8rem;
        }
        
        .nav-link {
            color: var(--color-texto) !important;
            font-weight: 500;
            padding: 0.5rem 1rem !important;
        }
        
        .nav-link:hover {
            color: var(--color-principal) !important;
        }
        
        .dropdown-menu {
            border: none;
            box-shadow: 0 4px 12px rgba(0,0,0,0.15);
            border-radius: 8px;
            padding: 0.5rem 0;
        }
        
        .dropdown-header {
            color: var(--color-texto-claro);
            font-size: 0.75rem;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            padding: 0.5rem 1rem;
        }
        
        .dropdown-item {
            padding: 0.6rem 1.5rem;
            color: var(--color-texto);
        }
        
        .dropdown-item:hover {
            background-color: var(--color-fondo);
            color: var(--color-principal);
        }
        
        .dropdown-item i {
            width: 20px;
            margin-right: 0.5rem;
        }
        
        /* Contenido */
        .main-content {
            padding: 2rem 0;
            min-height: calc(100vh - 200px);
        }
        
        /* Cards */
        .card {
            border: none;
            border-radius: 12px;
            box-shadow: 0 2px 8px rgba(0,0,0,0.08);
            margin-bottom: 1.5rem;
            background-color: var(--color-blanco);
        }
        
        .card-header {
            background-color: var(--color-blanco);
            border-bottom: 2px solid var(--color-fondo);
            padding: 1.25rem 1.5rem;
            border-radius: 12px 12px 0 0 !important;
        }
        
        .card-header h4 {
            color: var(--color-texto);
            font-weight: 600;
            margin: 0;
        }
        
        .card-body {
            padding: 1.5rem;
        }
        
        /* Botones */
        .btn {
            border-radius: 8px;
            padding: 0.6rem 1.25rem;
            font-weight: 500;
            border: none;
        }
        
        .btn-primary {
            background-color: var(--color-principal);
            color: white;
        }
        
        .btn-primary:hover {
            background-color: var(--color-principal-hover);
        }
        
        .btn-success {
            background-color: #4caf50;
        }
        
        .btn-danger {
            background-color: #ef5350;
        }
        
        .btn-warning {
            background-color: #ffa726;
            color: white;
        }
        
        .btn-info {
            background-color: #42a5f5;
            color: white;
        }
        
        .btn-light {
            background-color: var(--color-blanco);
            color: var(--color-principal);
            border: 2px solid var(--color-principal);
        }
        
        .btn-light:hover {
            background-color: var(--color-principal);
            color: white;
        }
        
        .btn-sm {
            padding: 0.4rem 0.8rem;
            font-size: 0.875rem;
        }
        
        /* Tablas */
        .table {
            margin-bottom: 0;
        }
        
        .table thead th {
            background-color: var(--color-fondo);
            color: var(--color-texto);
            font-weight: 600;
            border: none;
            padding: 1rem;
            text-transform: uppercase;
            font-size: 0.75rem;
            letter-spacing: 0.5px;
        }
        
        .table tbody tr:hover {
            background-color: var(--color-fondo);
        }
        
        .table tbody td {
            padding: 1rem;
            vertical-align: middle;
            border-bottom: 1px solid #e9ecef;
        }
        
        /* Badges */
        .badge {
            padding: 0.5rem 0.75rem;
            font-weight: 500;
            border-radius: 6px;
            font-size: 0.75rem;
        }
        
        /* Alertas */
        .alert {
            border: none;
            border-radius: 10px;
            padding: 1rem 1.5rem;
            box-shadow: 0 2px 8px rgba(0,0,0,0.08);
        }
        
        .alert-success {
            background-color: #e8f5e9;
            color: #2e7d32;
        }
        
        .alert-danger {
            background-color: #ffebee;
            color: #c62828;
        }
        
        /* Inputs */
        .form-control, .form-select {
            border: 2px solid #e9ecef;
            border-radius: 8px;
            padding: 0.6rem 0.75rem;
        }
        
        .form-control:focus, .form-select:focus {
            border-color: var(--color-principal);
            box-shadow: 0 0 0 0.2rem rgba(30, 136, 229, 0.15);
        }
        
        .form-label {
            font-weight: 500;
            color: var(--color-texto);
            margin-bottom: 0.5rem;
        }
        
        /* Paginación */
        .pagination {
            gap: 0.25rem;
        }
        
        .page-link {
            border: none;
            border-radius: 8px;
            color: var(--color-texto);
            padding: 0.5rem 0.75rem;
            margin: 0 0.125rem;
        }
        
        .page-link:hover {
            background-color: var(--color-fondo);
            color: var(--color-principal);
        }
        
        .page-item.active .page-link {
            background-color: var(--color-principal);
            border-color: var(--color-principal);
        }
        
        /* Footer */
        footer {
            background-color: var(--color-blanco);
            border-top: 1px solid #e9ecef;
            margin-top: 3rem;
        }
        
        footer p {
            color: var(--color-texto-claro);
            margin: 0;
        }
        
        /* Responsive */
        @media (max-width: 768px) {
            .main-content {
                padding: 1rem 0;
            }
            .card-body {
                padding: 1rem;
            }
        }
    </style>
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg">
        <div class="container-fluid">
            <a class="navbar-brand" href="/">
                <i class="bi bi-brush-fill"></i>
                <span>Paints</span>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">
                            <i class="bi bi-grid-3x3-gap"></i> Módulos
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end">
                            <li><h6 class="dropdown-header">Catálogos</h6></li>
                            <li><a class="dropdown-item" href="{{ route('clientes.index') }}">
                                <i class="bi bi-people-fill"></i> Clientes
                            </a></li>
                            <li><a class="dropdown-item" href="{{ route('proveedores.index') }}">
                                <i class="bi bi-truck"></i> Proveedores
                            </a></li>
                            <li><a class="dropdown-item" href="{{ route('sucursales.index') }}">
                                <i class="bi bi-building"></i> Sucursales
                            </a></li>
                            
                            <li><hr class="dropdown-divider"></li>
                            <li><h6 class="dropdown-header">Productos</h6></li>
                            <li><a class="dropdown-item" href="{{ route('productos.index') }}">
                                <i class="bi bi-box-seam"></i> Productos
                            </a></li>
                            <li><a class="dropdown-item" href="{{ route('categorias.index') }}">
                                <i class="bi bi-tags-fill"></i> Categorías
                            </a></li>
                            <li><a class="dropdown-item" href="{{ route('marcas.index') }}">
                                <i class="bi bi-tag-fill"></i> Marcas
                            </a></li>
                            
                            <li><hr class="dropdown-divider"></li>
                            <li><h6 class="dropdown-header">Sistema</h6></li>
                            <li><a class="dropdown-item" href="{{ route('tipos-pago.index') }}">
                                <i class="bi bi-credit-card"></i> Tipos de Pago
                            </a></li>
                            <li><a class="dropdown-item" href="{{ route('usuarios.index') }}">
                                <i class="bi bi-person-badge"></i> Usuarios
                            </a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <div class="container-fluid main-content">
        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show">
                <i class="bi bi-check-circle-fill"></i> {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        @if(session('error'))
            <div class="alert alert-danger alert-dismissible fade show">
                <i class="bi bi-exclamation-triangle-fill"></i> {{ session('error') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        @if($errors->any())
            <div class="alert alert-danger alert-dismissible fade show">
                <strong>¡Error!</strong> Por favor corrige los siguientes errores:
                <ul class="mb-0 mt-2">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        @yield('content')
    </div>

    <!-- Footer -->
    <footer class="text-center py-4">
        <div class="container">
            <p>&copy; {{ date('Y') }} Sistema Paints - Proyecto final Programación web</p>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    @yield('scripts')
</body>
</html>