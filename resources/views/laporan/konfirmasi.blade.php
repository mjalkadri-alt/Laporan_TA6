@extends('layouts.app')

@section('title', 'Konfirmasi Laporan')

@section('content')
    <div class="page-head">
        <h2>Konfirmasi Laporan</h2>
        <p>Berikut rekap data laporan yang Anda kirimkan dan sudah tersimpan di database.</p>
    </div>

    @if ($laporan)
        <x-alert type="success" title="Laporan Berhasil Dikirim">
            {{ $sukses ?? 'Laporan Anda telah diterima BPBD Kabupaten Bandung dan akan segera ditindaklanjuti.' }}
        </x-alert>

        <div class="panel">
            <table class="table">
                <tbody>
                    <tr>
                        <td class="table-label">ID Laporan</td>
                        <td>#{{ $laporan->id }}</td>
                    </tr>
                    <tr>
                        <td class="table-label">Nama Pelapor</td>
                        <td>{{ $laporan->nama_pelapor }}</td>
                    </tr>
                    <tr>
                        <td class="table-label">Lokasi Kejadian</td>
                        <td>{{ $laporan->lokasi }}</td>
                    </tr>
                    <tr>
                        <td class="table-label">Tinggi Genangan Air</td>
                        <td>{{ $laporan->tinggi_genangan }} cm</td>
                    </tr>
                    <tr>
                        <td class="table-label">Tanggal Kejadian</td>
                        <td>{{ $laporan->tanggal_kejadian->translatedFormat('j F Y') }}</td>
                    </tr>
                    <tr>
                        <td class="table-label">Status Genangan</td>
                        <td>
                            @if ($laporan->tinggi_genangan < 30)
                                <span class="badge badge-waspada">Waspada</span>
                            @elseif ($laporan->tinggi_genangan <= 70)
                                <span class="badge badge-siaga">Siaga</span>
                            @else
                                <span class="badge badge-awas">Awas</span>
                            @endif
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>

        <div class="form-actions" style="margin-top: 22px;">
            <a class="btn btn-primary" href="{{ route('laporan.form') }}">Kirim Laporan Lain</a>
            <a class="btn btn-secondary" href="{{ route('laporan.daftar') }}">Lihat Daftar Laporan</a>
        </div>
    @else
        <x-alert type="info" title="Belum Ada Laporan Terkirim">
            Halaman ini menampilkan data laporan yang baru saja dikirim melalui form pelaporan.
            Silakan isi form terlebih dahulu.
        </x-alert>

        <a class="btn btn-primary" href="{{ route('laporan.form') }}">Buka Form Pelaporan</a>
    @endif
@endsection
