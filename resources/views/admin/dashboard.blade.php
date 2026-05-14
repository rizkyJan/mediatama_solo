@extends('admin.layouts.app')

@section('isi')
<div class="mb-4">
    <h2 class="fw-bold text-dark">Ringkasan Sistem</h2>
    <p class="text-muted">Selamat datang kembali, {{ Auth::user()->name }}.</p>
</div>

<div class="row g-4">
    <div class="col-md-4">
        <div class="card border-0 shadow-sm rounded-3">
            <div class="card-body p-4">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h6 class="text-muted mb-1">Total Customer</h6>
                        <h3 class="fw-bold mb-0">{{ $totalCustomer }}</h3>
                    </div>
                    <div class="bg-primary bg-opacity-10 p-3 rounded-3">
                        <i class="bi bi-people-fill text-primary fs-3"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-4">
        <div class="card border-0 shadow-sm rounded-3">
            <div class="card-body p-4">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h6 class="text-muted mb-1">Total Video</h6>
                        <h3 class="fw-bold mb-0">{{ $totalVideo }}</h3>
                    </div>
                    <div class="bg-success bg-opacity-10 p-3 rounded-3">
                        <i class="bi bi-film text-success fs-3"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-4">
        <div class="card border-0 shadow-sm rounded-3">
            <div class="card-body p-4">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h6 class="text-muted mb-1">Request Akses (Pending)</h6>
                        <h3 class="fw-bold mb-0">{{ $pendingRequest }}</h3>
                    </div>
                    <div class="bg-warning bg-opacity-10 p-3 rounded-3">
                        <i class="bi bi-clock-history text-warning fs-3"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection