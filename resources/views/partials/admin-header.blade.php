<header class="admin-header d-flex align-items-center justify-content-between px-3 px-lg-4">
    <a href="{{ route('admin.dashboard') }}" class="fw-bold text-dark text-decoration-none">
        Admin Web Profile
    </a>
    <div class="d-flex align-items-center gap-3">
        <a href="{{ route('home') }}" class="link-dark link-underline-opacity-0 small">
            Lihat Website
        </a>
        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button type="submit" class="btn btn-sm btn-outline-dark">Logout</button>
        </form>
    </div>
</header>
