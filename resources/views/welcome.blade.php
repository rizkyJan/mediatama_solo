<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Mediatama Video</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f4f6f9;
        }

        .login-card {
            max-width: 400px;
            width: 100%;
        }
    </style>
</head>

<body class="d-flex align-items-center justify-content-center min-vh-100">

    <div class="login-card">
        <div class="text-center mb-4">
            <h2 class="fw-bold text-primary">MEDIATAMA</h2>
            <p class="text-muted">Sistem Perijinan Akses Video</p>
        </div>

        @if (session('status'))
        <div class="alert alert-success mb-4 rounded-3">
            {{ session('status') }}
        </div>
        @endif

        <div class="card shadow-sm border-0 rounded-3">
            <div class="card-body p-4">

                <form method="POST" action="{{ route('login') }}">
                    @csrf

                    <div class="mb-3">
                        <label for="email" class="form-label fw-semibold">Email</label>
                        <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email') }}" required autofocus placeholder="Masukkan email">
                        @error('email')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="password" class="form-label fw-semibold">Password</label>
                        <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" required placeholder="Masukkan password">
                        @error('password')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>

                    <div class="mb-4 form-check">
                        <input type="checkbox" class="form-check-input" id="remember_me" name="remember">
                        <label class="form-check-label text-muted" for="remember_me">Ingat Saya</label>
                    </div>

                    <button type="submit" class="btn btn-primary w-100 py-2 fw-bold mb-3">
                        Masuk
                    </button>

                </form>

            </div>
        </div>

        <div class="text-center mt-4 text-muted small">
            &copy; {{ date('Y') }} Recruitment Test - Web Developer
        </div>
    </div>

</body>

</html>