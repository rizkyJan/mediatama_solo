@extends('admin.layouts.app')

@section('isi')
<div class="mb-4">
    <h2 class="mb-0">Proses Akses Video</h2>
</div>

<div class="card shadow-sm border-0">
    <div class="card-body">
        <form action="{{ route('admin.requests.update', $videoRequest->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label class="form-label">Nama Customer</label>
                <input type="text" class="form-control" value="{{ $videoRequest->user->name }}" readonly disabled>
            </div>

            <div class="mb-3">
                <label class="form-label">Video yang Diminta</label>
                <input type="text" class="form-control" value="{{ $videoRequest->video->title }}" readonly disabled>
            </div>

            <div class="mb-3">
                <label class="form-label">Status Akses</label>
                <select name="status" class="form-select @error('status') is-invalid @enderror" required id="statusSelect">
                    <option value="pending" {{ old('status', $videoRequest->status) === 'pending' ? 'selected' : '' }}>Menunggu (Pending)</option>
                    <option value="approved" {{ old('status', $videoRequest->status) === 'approved' ? 'selected' : '' }}>Setujui (Approved)</option>
                    <option value="rejected" {{ old('status', $videoRequest->status) === 'rejected' ? 'selected' : '' }}>Tolak (Rejected)</option>
                </select>
                @error('status')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>


            <div class="mb-3" id="expiredDateGroup" @if(old('status', $videoRequest->status) !== 'approved') style="display: none;" @endif>
                <label class="form-label">Batas Waktu Akses</label>
                <input type="datetime-local" name="expired_at" class="form-control @error('expired_at') is-invalid @enderror"
                    value="{{ old('expired_at', $videoRequest->permission ? \Carbon\Carbon::parse($videoRequest->permission->expired_at)->format('Y-m-d\TH:i') : '') }}">
                @error('expired_at')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mt-4">
                <button type="submit" class="btn btn-primary">Simpan Persetujuan</button>
                <a href="{{ route('admin.requests.index') }}" class="btn btn-secondary">Batal</a>
            </div>
        </form>
    </div>
</div>

<script>
    document.getElementById('statusSelect').addEventListener('change', function() {
        var expiredGroup = document.getElementById('expiredDateGroup');
        if (this.value === 'approved') {
            expiredGroup.style.display = 'block';
        } else {
            expiredGroup.style.display = 'none';
        }
    });
</script>
@endsection