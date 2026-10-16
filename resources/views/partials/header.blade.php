<nav class="navbar navbar-expand-lg bg-primary shadow-sm mb-4">
    <div class="container">
        <a class="navbar-brand" href="#">UNPAM - Prodi </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a href="{{ url('/') }}" class="nav-link">Home</a>
                </li>
                <li class="nav-item">
                    <a href="{{ url('/profile') }}" class="nav-link">Profile</a>
                </li>
                <li class="nav-item">
                    <a href="{{ url('/project') }}" class="nav-link">Project</a>
                </li>
                <li class="nav-item">
                    <a href="{{ url('/about') }}" class="nav-link">About</a>
                </li>
            </ul>
        </div>
    </div>
</nav>