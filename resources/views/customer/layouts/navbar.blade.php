<nav class="navbar navbar-expand-lg navbar-primary bg-primary">
    <div class="container">
        <a class="navbar-brand text-white fw-bold" href="#">Mediatama Video</a>
        <div class="ms-auto text-white">
            <a href="#" class="text-white text-decoration-none me-3">Beranda</a>
            <form action="{{ route('logout') }}" method="POST" class="d-inline">
                @csrf
                <button class="btn btn-light btn-sm text-primary">Logout</button>
            </form>
        </div>
    </div>
</nav>