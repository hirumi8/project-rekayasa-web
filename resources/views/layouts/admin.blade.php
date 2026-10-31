<!doctype html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Admin Project')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        :root {
            --admin-yellow: #ffc107;
            --admin-sidebar: #343a40;
        }

        body {
            background: #f5f6f8;
        }

        .admin-header {
            min-height: 70px;
            background: var(--admin-yellow);
        }

        .admin-shell {
            min-height: calc(100vh - 120px);
        }

        .admin-sidebar {
            width: 250px;
            flex: 0 0 250px;
            background: var(--admin-sidebar);
            color: #fff;
        }

        .admin-sidebar .nav-link {
            color: #d9dee3;
            border-radius: .375rem;
        }

        .admin-sidebar .nav-link:hover,
        .admin-sidebar .nav-link.active {
            color: #fff;
            background: #495057;
        }

        .admin-content {
            min-width: 0;
        }

        @media (max-width: 767.98px) {
            .admin-shell {
                flex-direction: column;
            }

            .admin-sidebar {
                width: 100%;
                flex-basis: auto;
            }
        }
    </style>
</head>
<body class="min-vh-100 d-flex flex-column">
    @include('partials.admin-header')

    <div class="admin-shell d-flex flex-grow-1">
        <aside class="admin-sidebar p-3">
            <h2 class="h6 mb-3">Admin Menu</h2>
            <nav class="nav nav-pills flex-column gap-1">
                <a href="{{ route('admin.dashboard') }}"
                    class="nav-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">Dashboard</a>
                <a href="{{ route('projects.index') }}"
                    class="nav-link {{ request()->routeIs('projects.*') ? 'active' : '' }}">Data Project</a>
            </nav>
        </aside>

        <main class="admin-content flex-grow-1 p-3 p-lg-4">
            @yield('content')
        </main>
    </div>

    @include('partials.footer')
</body>
</html>
