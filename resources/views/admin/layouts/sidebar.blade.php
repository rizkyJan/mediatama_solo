<nav id="sidebar" class="sidebar bg-dark text-white p-3">
    <div class="d-flex align-items-center justify-content-between mb-4 pb-3 border-bottom border-secondary">
        <h5 class="mb-0 fw-bold text-uppercase">
            <i class="bi bi-play-circle-fill text-primary me-2"></i>Mediatama
        </h5>
        <button class="btn btn-sm btn-outline-light d-md-none border-0" id="closeSidebar">
            <i class="bi bi-x-lg"></i>
        </button>
    </div>

    <ul class="nav flex-column gap-2">
        <li class="nav-item">
            <a href="{{ route('admin.dashboard') }}"
                class="nav-link text-white {{ request()->routeIs('admin.dashboard') ? 'bg-primary rounded active' : 'text-opacity-75' }}">
                <i class="bi bi-speedometer2 me-2"></i> Dashboard
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('admin.customers.index') }}"
                class="nav-link text-white {{ request()->is('admin/customers*') ? 'bg-primary rounded active' : 'text-opacity-75' }}">
                <i class="bi bi-people me-2"></i> Data Customer
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('admin.videos.index') }}"
                class="nav-link text-white {{ request()->is('admin/videos*') ? 'bg-primary rounded active' : 'text-opacity-75' }}">
                <i class="bi bi-film me-2"></i> Upload Video
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('admin.requests.index') }}"
                class="nav-link text-white {{ request()->is('admin/requests*') ? 'bg-primary rounded active' : 'text-opacity-75' }}">
                <i class="bi bi-check2-square me-2"></i> Persetujuan Akses
            </a>
        </li>
    </ul>
</nav>