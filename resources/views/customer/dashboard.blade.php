@extends('customer.layouts.app')

@section('isi')
<div class="mb-4 text-center">
    <h2 class="fw-bold">Katalog Video Tutorial</h2>
    <p class="text-muted">Pilih video dan minta akses ke admin untuk menonton.</p>
</div>

@if(session('success'))
<div class="alert alert-success">{{ session('success') }}</div>
@endif
@if(session('error'))
<div class="alert alert-danger">{{ session('error') }}</div>
@endif

<div class="row g-4">
    @forelse($videos as $video)
    @php
    $userRequest = $video->requests->first();
    $isApproved = $userRequest && $userRequest->status === 'approved';
    $isExpired = $isApproved && $userRequest->permission && $userRequest->permission->expired_at < now();
        @endphp

        <div class="col-md-4 col-sm-6">
        <div class="card h-100 shadow-sm border-0">
            <div class="card-body">
                <h5 class="card-title fw-bold text-primary">{{ $video->title }}</h5>
                <p class="card-text text-muted small">{{ \Illuminate\Support\Str::limit($video->description, 100) }}</p>

                @if($isApproved && !$isExpired)
                <div class="alert alert-info py-2 small">
                    Akses aktif s/d: {{ \Carbon\Carbon::parse($userRequest->permission->expired_at)->format('d M H:i') }}
                </div>
                @endif
            </div>
            <div class="card-footer bg-white border-0 pb-3">
                @if(!$userRequest || $userRequest->status === 'rejected' || $isExpired)
                <form action="{{ route('customer.request', $video->id) }}" method="POST">
                    @csrf
                    <button type="submit" class="btn btn-primary w-100">
                        {{ $isExpired ? 'Akses Habis - Request Ulang' : 'Minta Akses Menonton' }}
                    </button>
                </form>
                @elseif($userRequest->status === 'pending')
                <button class="btn btn-warning w-100 disabled text-dark">Menunggu Persetujuan...</button>
                @elseif($isApproved && !$isExpired)
                <a href="{{ route('customer.watch', $video->id) }}" class="btn btn-success w-100">Tonton Sekarang</a>
                @endif
            </div>
        </div>
</div>
@empty
<div class="col-12 text-center py-5">
    <p class="text-muted">Belum ada video tersedia.</p>
</div>
@endforelse
</div>
@endsection