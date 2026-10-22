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
                <label for="nama_pelapor">Nama Pelapor</label>
                <input type="text" id="nama_pelapor" name="nama_pelapor" value="{{ old('nama_pelapor', Auth::user()->name) }}" placeholder="Nama lengkap Anda"
                       class="@error('nama_pelapor') has-error @enderror" required>
                @error('nama_pelapor')
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
                <label for="tinggi_genangan">Tinggi Genangan Air (cm)</label>
                <input type="number" id="tinggi_genangan" name="tinggi_genangan" value="{{ old('tinggi_genangan') }}" min="0" placeholder="Contoh: 45"
                       class="@error('tinggi_genangan') has-error @enderror" required>
                @error('tinggi_genangan')
                    <span class="error-text">{{ $message }}</span>
                @enderror
                <small class="form-hint">Kurang dari 30 cm: Waspada, 30&ndash;70 cm: Siaga, lebih dari 70 cm: Awas.</small>
            </div>

            <div class="form-group">
                <label for="tanggal_kejadian">Tanggal Kejadian</label>
                <input type="date" id="tanggal_kejadian" name="tanggal_kejadian" value="{{ old('tanggal_kejadian') }}"
                       class="@error('tanggal_kejadian') has-error @enderror" required>
                @error('tanggal_kejadian')
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
