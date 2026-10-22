<div class="card">
    <div class="card-head">
        @if ($laporan->tinggi_genangan < 30)
            <span class="badge badge-waspada">Waspada</span>
        @elseif ($laporan->tinggi_genangan <= 70)
            <span class="badge badge-siaga">Siaga</span>
        @else
            <span class="badge badge-awas">Awas</span>
        @endif

        <span class="card-kode">#{{ $laporan->id }}</span>
    </div>

    <p class="card-lokasi">{{ $laporan->lokasi }}</p>
    <p class="card-meta">Pelapor: {{ $laporan->nama_pelapor }}</p>

    <div class="card-footer">
        <span>Tinggi genangan: <strong>{{ $laporan->tinggi_genangan }} cm</strong></span>
        <span class="card-meta">{{ $laporan->tanggal_kejadian->translatedFormat('j F Y') }}</span>
    </div>
</div>
