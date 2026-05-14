<nav id="sidebar" class="sidebar bg-dark text-white p-3">
    <div class="mb-4 border-bottom pb-3">
        <h5 class="fw-bold text-center">MEDIATAMA</h5>
    </div>

    <ul class="nav flex-column gap-2">
        <li class="nav-item">
            <a href="{{ route('admin.dashboard') }}" class="nav-link text-white bg-primary rounded">Dashboard</a>
        </li>
        <li class="nav-item">
            <a href="{{ route('admin.customers.index') }}" class="nav-link text-white">Data Customer</a>
        </li>
        <li class="nav-item">
            <a href="{{ route('admin.videos.index') }}" class="nav-link text-white">Upload Video</a>
        </li>
        <li class="nav-item">
            <a href="{{ route('admin.requests.index') }}" class="nav-link text-white">Persetujuan Akses</a>
        </li>
    </ul>
</nav>