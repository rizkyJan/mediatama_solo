<nav class="navbar navbar-expand bg-white border-bottom shadow-sm px-3 py-2">
    <div class="container-fluid px-0 d-flex justify-content-between align-items-center">

        <div class="d-flex align-items-center">
            <button class="btn btn-dark btn-sm d-md-none me-3" id="sidebarToggle">
                ☰
            </button>
            <span class="fw-bold d-none d-md-block">Panel Admin</span>
        </div>

        <div class="d-flex align-items-center gap-3">
            <div class="text-muted d-none d-sm-block">
                <strong>{{ Auth::user()->name ?? 'Admin' }}</strong>
            </div>
            <form action="{{ route('logout') }}" method="POST" class="d-inline">
                @csrf
                <button type="submit" class="btn btn-danger btn-sm">Logout</button>
            </form>
        </div>

    </div>
</nav>