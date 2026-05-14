@extends('admin.layouts.app')

@section('isi')
<div class="mb-4">
    <h2 class="mb-0">Upload Video</h2>
</div>

<div class="card shadow-sm border-0">
    <div class="card-body">
        <form action="{{ route('admin.videos.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label class="form-label">Judul Video</label>
                <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" value="{{ old('title') }}" required>
                @error('title')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label class="form-label">Deskripsi</label>
                <textarea name="description" class="form-control @error('description') is-invalid @enderror" rows="3">{{ old('description') }}</textarea>
                @error('description')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label class="form-label">File Video (MP4, Max 100MB)</label>
                <input type="file" name="video_file" class="form-control @error('video_file') is-invalid @enderror" accept=".mp4, .mov, .ogg, video/*" required>
                @error('video_file')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mt-4">
                <button type="submit" class="btn btn-primary">Upload</button>
                <a href="{{ route('admin.videos.index') }}" class="btn btn-secondary">Batal</a>
            </div>
        </form>
    </div>
</div>
@endsection