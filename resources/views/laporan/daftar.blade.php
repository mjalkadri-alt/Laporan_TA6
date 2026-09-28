@extends('layouts.app')

@section('title', 'Daftar Laporan')

@section('content')
    <div class="toolbar">
        <div class="page-head" style="margin-bottom: 0;">
            <h2>Daftar Laporan Banjir</h2>
            <p>Laporan kejadian banjir yang masuk ke BPBD Kabupaten Bandung.</p>
        </div>

        <a class="btn btn-primary" href="{{ route('laporan.form') }}">+ Kirim Laporan Baru</a>
    </div>

    <div class="legend">
        <span>Kurang dari 30 cm: <strong>Waspada</strong></span>
        <span>30 &ndash; 70 cm: <strong>Siaga</strong></span>
        <span>Lebih dari 70 cm: <strong>Awas</strong></span>
    </div>

    <div class="grid" style="margin-top: 18px;">
        @forelse ($laporan as $item)
            @include('partials.laporan-card', ['laporan' => $item])
        @empty
            <div class="empty-state">
                <p>Belum ada laporan banjir yang masuk.</p>
            </div>
        @endforelse
    </div>
@endsection
