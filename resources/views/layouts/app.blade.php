<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>My Shop – Dashboard</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Bootstrap CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

    <style>
        body { transition: all 0.3s; }

        /* SIDEBAR */
        #sidebar {
            width: 220px;
            transition: all 0.3s;
        }
        #sidebar.collapsed {
            width: 0;
            overflow: hidden;
        }

        #sidebar .list-group-item {
            transition: all 0.3s;
        }
        .active-user {
            background: #0d6efd !important;
            color: white !important;
            border-radius: 0.5rem;
        }

        /* MAIN content margin when sidebar collapsed */
        #main-content {
            transition: margin-left 0.3s;
            margin-left: 220px;
        }
        #main-content.sidebar-collapsed {
            margin-left: 0;
        }
    </style>
</head>

<body class="bg-gray-100">

<div class="d-flex">

    <!-- SIDEBAR -->
    <aside id="sidebar" class="bg-white shadow-sm border-end">
        <div class="p-4 border-bottom d-flex justify-content-between align-items-center">
            <h3 class="fw-bold text-primary mb-0">
                
                <a href="../dashboard"
               class="fw-bold text-primary text-decoration-none fs-4 {{ request()->routeIs('dashboard.index') ? 'active-user' : '' }}">
                📊 My Shop</h3>
            </a>
        </div>

        <ul class="list-group list-group-flush">
            <a href="{{ route('products.index') }}"
               class="list-group-item list-group-item-action {{ request()->routeIs('products.index') ? 'active-user' : '' }}">
                📦 Produits
            </a>
            <a href="{{ route('categories.index') }}"
               class="list-group-item list-group-item-action {{ request()->routeIs('categories.index') ? 'active-user' : '' }}">
                🗂 Catégories
            </a>
            @auth
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button class="list-group-item list-group-item-action text-danger">🚪 Logout</button>
            </form>
            @endauth
        </ul>
    </aside>

    <!-- MAIN CONTENT -->
    <main id="main-content1" class="flex-grow-1">

        <!-- TOP NAVBAR -->
        <nav class="navbar navbar-light bg-white shadow-sm px-4 py-3 d-flex justify-content-between">
            <button id="toggleSidebar" class="btn btn-outline-primary btn-sm">☰</button>
            @auth
            <div class="d-flex align-items-center">
                <span class="me-3">{{ auth()->user()->name }}</span>
                <img src="https://ui-avatars.com/api/?name={{ auth()->user()->name }}" 
                     class="rounded-circle" width="40">
            </div>
            @endauth
        </nav>

        <!-- CONTENT -->
        <div class="container-fluid px-4 py-4">
            @if(session('success'))
                <div class="alert alert-success shadow-sm">{{ session('success') }}</div>
            @endif

            @yield('content')
        </div>
    </main>
</div>

<script>
    const toggleBtn = document.getElementById('toggleSidebar');
    const sidebar = document.getElementById('sidebar');
    const mainContent = document.getElementById('main-content');

    toggleBtn.addEventListener('click', () => {
        sidebar.classList.toggle('collapsed');
        mainContent.classList.toggle('sidebar-collapsed');
    });
</script>

</body>
</html>
