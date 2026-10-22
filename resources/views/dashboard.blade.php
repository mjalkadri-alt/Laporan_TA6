@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
    <div class="dashboard-hero">
        <div>
            <h2>Selamat datang, {{ Auth::user()->name }}!</h2>
            <p>Pantau laporan banjir terbaru dan kirimkan informasi kejadian di sekitar Anda.</p>
        </div>
        <a class="btn" href="{{ route('laporan.form') }}">+ Kirim Laporan</a>
    </div>

    <div class="stat-grid">
        <div class="stat-card">
            <p class="stat-label">Total Laporan</p>
            <p class="stat-value">{{ $total }}</p>
        </div>
        <div class="stat-card stat-waspada">
            <p class="stat-label">Status Waspada</p>
            <p class="stat-value">{{ $waspada }}</p>
        </div>
        <div class="stat-card stat-siaga">
            <p class="stat-label">Status Siaga</p>
            <p class="stat-value">{{ $siaga }}</p>
        </div>
        <div class="stat-card stat-awas">
            <p class="stat-label">Status Awas</p>
            <p class="stat-value">{{ $awas }}</p>
        </div>
    </div>

    <div class="section-head">
        <h3>Laporan Terbaru</h3>
        <a href="{{ route('laporan.daftar') }}">Lihat semua laporan &rarr;</a>
    </div>

    <div class="grid">
        @forelse ($laporanTerbaru as $item)
            @include('partials.laporan-card', ['laporan' => $item])
        @empty
            <div class="empty-state">
                <p>Belum ada laporan banjir yang masuk.</p>
            </div>
        @endforelse
    </div>
@endsection
