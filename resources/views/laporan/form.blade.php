@extends('layouts.app')

@section('title', 'Form Pelaporan Banjir')

@section('content')
    <div class="page-head">
        <h2>Form Pelaporan Banjir</h2>
        <p>Laporkan kejadian banjir di lingkungan Anda kepada BPBD Kabupaten Bandung.</p>
    </div>

    <div class="panel">
        <form action="{{ route('laporan.store') }}" method="POST">
            @csrf

            <div class="form-group">
                <label for="nama">Nama Pelapor</label>
                <input type="text" id="nama" name="nama" value="{{ old('nama') }}" placeholder="Nama lengkap Anda"
                       class="@error('nama') has-error @enderror" required>
                @error('nama')
                    <span class="error-text">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group">
                <label for="lokasi">Lokasi Kejadian</label>
                <input type="text" id="lokasi" name="lokasi" value="{{ old('lokasi') }}" placeholder="Alamat / wilayah terdampak"
                       class="@error('lokasi') has-error @enderror" required>
                @error('lokasi')
                    <span class="error-text">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group">
                <label for="tinggi">Tinggi Genangan Air (cm)</label>
                <input type="number" id="tinggi" name="tinggi" value="{{ old('tinggi') }}" min="0" placeholder="Contoh: 45"
                       class="@error('tinggi') has-error @enderror" required>
                @error('tinggi')
                    <span class="error-text">{{ $message }}</span>
                @enderror
                <small class="form-hint">Kurang dari 30 cm: Waspada, 30&ndash;70 cm: Siaga, lebih dari 70 cm: Awas.</small>
            </div>

            <div class="form-group">
                <label for="tanggal">Tanggal Kejadian</label>
                <input type="date" id="tanggal" name="tanggal" value="{{ old('tanggal') }}"
                       class="@error('tanggal') has-error @enderror" required>
                @error('tanggal')
                    <span class="error-text">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-actions">
                <button type="submit" class="btn btn-primary">Kirim Laporan</button>
                <a class="btn btn-secondary" href="{{ route('laporan.daftar') }}">Batal</a>
            </div>
        </form>
    </div>
@endsection