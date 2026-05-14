@extends('admin.layouts.app')

@section('isi')
<div class="d-flex flex-column flex-sm-row justify-content-between align-items-sm-center gap-3 mb-4">
    <h2 class="mb-0">Data Video</h2>
    <a href="{{ route('admin.videos.create') }}" class="btn btn-primary">
        Upload Video Baru
    </a>
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
                        <th>Judul</th>
                        <th>File Path</th>
                        <th>Tanggal Upload</th>
                        <th width="15%">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($videos as $video)
                    <tr>
                        <td>{{ $video->id }}</td>
                        <td>{{ $video->title }}</td>
                        <td><small class="text-muted">{{ $video->file_path }}</small></td>
                        <td>{{ $video->created_at->format('d M Y') }}</td>
                        <td>
                            <a href="{{ route('admin.videos.edit', $video->id) }}" class="btn btn-sm btn-warning">Edit</a>
                            <form action="{{ route('admin.videos.destroy', $video->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Hapus video ini?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger">Hapus</button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5" class="text-center text-muted py-4">Belum ada data video.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection