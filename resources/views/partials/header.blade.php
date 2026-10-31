<nav class="navbar navbar-expand-lg bg-primary shadow-sm mb-4">
    <div class="container">
        <a class="navbar-brand" href="{{ route('home') }}">UNPAM - Prodi</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
            data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false"
            aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a href="{{ route('home') }}" class="nav-link">Home</a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('profile') }}" class="nav-link">Profile</a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('project.index') }}" class="nav-link">Project</a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('about') }}" class="nav-link">About</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
