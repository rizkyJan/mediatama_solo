<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customer Panel - Mediatama</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light d-flex flex-column min-vh-100">

    <nav class="navbar navbar-expand-lg navbar-dark bg-primary shadow-sm">
        <div class="container">
            <a class="navbar-brand fw-bold" href="#">MEDIATAMA VIDEO</a>
            <div class="ms-auto d-flex align-items-center gap-3">
                <span class="text-white d-none d-sm-block">{{ Auth::user()->name }}</span>
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="btn btn-light btn-sm text-primary fw-bold">Logout</button>
                </form>
            </div>
        </div>
    </nav>

    <main class="container py-5 flex-grow-1">
        @yield('isi')
    </main>

    <footer class="bg-white border-top py-3 text-center text-muted">
        <small>© {{ date('Y') }} Mediatama - Recruitment Test</small>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>