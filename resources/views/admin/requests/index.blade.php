@extends('admin.layouts.app')

@section('isi')
<div class="d-flex flex-column flex-sm-row justify-content-between align-items-sm-center gap-3 mb-4">
    <h2 class="mb-0">Persetujuan Akses Video</h2>
</div>

@if(session('success'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
    {{ session('success') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif

<div class="card shadow-sm border-0">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0 text-nowrap">
                <thead class="table-light">
                    <tr>
                        <th width="5%">ID</th>
                        <th>Customer</th>
                        <th>Video</th>
                        <th>Status</th>
                        <th>Batas Akses</th>
                        <th width="10%">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($videoRequests as $req)
                    <tr>
                        <td>{{ $req->id }}</td>
                        <td>{{ $req->user->name }}</td>
                        <td>{{ $req->video->title }}</td>
                        <td>
                            @if($req->status === 'approved')
                            <span class="badge bg-success">Disetujui</span>
                            @elseif($req->status === 'rejected')
                            <span class="badge bg-danger">Ditolak</span>
                            @else
                            <span class="badge bg-warning text-dark">Menunggu</span>
                            @endif
                        </td>
                        <td>
                            @if($req->status === 'approved' && $req->permission)
                            {{ \Carbon\Carbon::parse($req->permission->expired_at)->format('d M Y H:i') }}
                            @else
                            <span class="text-muted">-</span>
                            @endif
                        </td>
                        <td>
                            <a href="{{ route('admin.requests.edit', $req->id) }}" class="btn btn-sm btn-primary">Proses</a>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="6" class="text-center text-muted py-4">Belum ada request akses video.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection