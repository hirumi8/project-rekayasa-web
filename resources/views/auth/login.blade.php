<!doctype html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            min-height: 100vh;
            background:
                linear-gradient(rgba(7, 17, 29, 0.45), rgba(7, 17, 29, 0.45)),
                url("{{ asset('img/Screenshot (280).png') }}") center / cover no-repeat fixed;
        }

        .login-card {
            width: min(100%, 360px);
            border: 0;
            border-radius: 0.35rem;
            overflow: hidden;
            box-shadow: 0 1rem 2.5rem rgba(0, 0, 0, 0.35);
        }

        .login-card-header {
            background-color: #ffc107;
            color: #212529;
            font-size: 0.8rem;
            font-weight: 700;
            letter-spacing: 0.04em;
            text-align: center;
        }
    </style>
</head>
<body class="d-flex align-items-center justify-content-center p-3">
    <main class="card login-card">
        <div class="card-header login-card-header py-2">SISTEM INFORMASI</div>
        <div class="card-body p-4">
            <h1 class="h5 fw-semibold text-center mb-4">Login Admin</h1>

            @if (session('status'))
                <div class="alert alert-success py-2" role="status">{{ session('status') }}</div>
            @endif

            <form action="{{ route('login.store') }}" method="POST">
                @csrf

                <div class="mb-3">
                    <label for="email" class="form-label small mb-1">Email</label>
                    <input type="email" name="email" id="email"
                        class="form-control @error('email') is-invalid @enderror"
                        value="{{ old('email') }}" autocomplete="username" required autofocus>
                    @error('email')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="password" class="form-label small mb-1">Password</label>
                    <input type="password" name="password" id="password"
                        class="form-control @error('password') is-invalid @enderror"
                        autocomplete="current-password" required>
                    @error('password')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-check mb-3">
                    <input type="checkbox" name="remember" id="remember"
                        class="form-check-input" value="1" @checked(old('remember'))>
                    <label for="remember" class="form-check-label small">Ingat saya</label>
                </div>

                <button type="submit" class="btn btn-primary w-100">Login</button>
            </form>
        </div>
    </main>
</body>
</html>
