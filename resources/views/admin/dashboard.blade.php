@extends('admin.layouts.app')

@section('isi')
<div class="d-flex flex-column flex-sm-row justify-content-between align-items-sm-center gap-3 mb-4">
    <h2 class="mb-0">Dashboard Admin</h2>
    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#uploadModal">
        <i class="bi bi-cloud-arrow-up me-1"></i> Upload Video Baru
    </button>
</div>

<div class="card shadow-sm border-0">
    <div class="card-body">

        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0 text-nowrap">
                <thead class="table-light">
                    <tr>
                        <th width="5%">ID</th>
                        <th>Judul Video</th>
                        <th>Status Request</th>
                        <th width="15%">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td colspan="4" class="text-center text-muted py-4">Belum ada data video.</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection