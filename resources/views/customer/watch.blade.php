@extends('customer.layouts.app')

@section('isi')
<div class="row justify-content-center mt-4">
    <div class="col-lg-10">
        <a href="{{ route('customer.dashboard') }}" class="btn btn-outline-secondary mb-3">
            ← Kembali ke Katalog
        </a>

        <div class="card shadow-sm border-0">
            <div class="card-body p-0 overflow-hidden rounded-top bg-dark text-center">
                <video controls controlsList="nodownload" autoplay style="width: 100%; max-height: 70vh; object-fit: contain; background-color: #000;">
                    <source src="{{ asset('storage/' . $video->file_path) }}" type="video/mp4">
                    Browser Anda tidak mendukung pemutar video.
                </video>
            </div>

            <div class="card-body">
                <h3 class="fw-bold text-primary mb-2">{{ $video->title }}</h3>
                <hr>
                <p class="text-muted" style="white-space: pre-line;">{{ $video->description }}</p>
            </div>
        </div>

    </div>
</div>
@endsection