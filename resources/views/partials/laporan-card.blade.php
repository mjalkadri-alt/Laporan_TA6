<div class="card">
    <div class="card-head">
        @if ($laporan['tinggi'] < 30)
            <span class="badge badge-waspada">Waspada</span>
        @elseif ($laporan['tinggi'] <= 70)
            <span class="badge badge-siaga">Siaga</span>
        @else
            <span class="badge badge-awas">Awas</span>
        @endif
    </div>

    <p class="card-lokasi">{{ $laporan['lokasi'] }}</p>
    <p class="card-meta">Pelapor: {{ $laporan['nama'] }}</p>

    <div class="card-footer">
        <span>Tinggi genangan: <strong>{{ $laporan['tinggi'] }} cm</strong></span>
        <span class="card-meta">{{ $laporan['tanggal'] }}</span>
    </div>
</div>
