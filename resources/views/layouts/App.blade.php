<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'LaporBanjir') BPBD Kabupaten Bandung</title>

    <style>
        :root {
            --biru: #1d4ed8;
            --biru-gelap: #1e3a8a;
            --teks: #1f2937;
            --teks-lembut: #6b7280;
            --garis: #e5e7eb;
            --latar: #f3f4f6;
            --kuning: #b45309;
            --kuning-bg: #fef3c7;
            --oranye: #c2410c;
            --oranye-bg: #ffedd5;
            --merah: #b91c1c;
            --merah-bg: #fee2e2;
            --hijau: #15803d;
            --hijau-bg: #dcfce7;
            --biru-bg: #dbeafe;
        }

        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: "Segoe UI", Tahoma, Geneva, Verdana, sans-serif;
            background-color: var(--latar);
            color: var(--teks);
            line-height: 1.6;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }

        /* ---------- Header ---------- */
        .site-header {
            background: linear-gradient(135deg, var(--biru-gelap), var(--biru));
            color: #fff;
            padding: 18px 0;
        }

        .header-inner {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 12px;
            flex-wrap: wrap;
        }

        .brand {
            display: flex;
            align-items: center;
            gap: 12px;
            color: #fff;
            text-decoration: none;
        }

        .brand-logo {
            width: 44px;
            height: 44px;
            border-radius: 10px;
            background: rgba(255, 255, 255, 0.18);
            display: grid;
            place-items: center;
            font-size: 22px;
        }

        .brand-text h1 {
            font-size: 22px;
            line-height: 1.2;
        }

        .brand-text p {
            font-size: 13px;
            opacity: 0.85;
        }

        /* ---------- Navigasi ---------- */
        .site-nav ul {
            list-style: none;
            display: flex;
            gap: 8px;
            flex-wrap: wrap;
        }

        .site-nav a {
            display: block;
            padding: 9px 16px;
            border-radius: 8px;
            color: #e0e7ff;
            text-decoration: none;
            font-size: 15px;
            font-weight: 500;
            transition: background-color 0.2s ease;
        }

        .site-nav a:hover {
            background: rgba(255, 255, 255, 0.15);
            color: #fff;
        }

        .site-nav a.active {
            background: #fff;
            color: var(--biru-gelap);
        }

        /* ---------- Konten ---------- */
        .container {
            width: 100%;
            max-width: 1080px;
            margin: 0 auto;
            padding: 0 20px;
        }

        main {
            flex: 1 0 auto;
            padding: 32px 0 48px;
        }

        .page-head {
            margin-bottom: 24px;
        }

        .page-head h2 {
            font-size: 26px;
            color: var(--biru-gelap);
        }

        .page-head p {
            color: var(--teks-lembut);
            font-size: 15px;
        }

        .panel {
            background: #fff;
            border: 1px solid var(--garis);
            border-radius: 12px;
            padding: 24px;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.05);
        }

        .grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
            gap: 20px;
        }

        .card {
            background: #fff;
            border: 1px solid var(--garis);
            border-left: 5px solid var(--biru);
            border-radius: 12px;
            padding: 20px;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.05);
        }

        .card-head {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 10px;
            margin-bottom: 12px;
        }

        .card-kode {
            font-size: 12px;
            color: var(--teks-lembut);
            font-family: Consolas, monospace;
        }

        .card-lokasi {
            font-size: 17px;
            font-weight: 600;
            color: var(--biru-gelap);
            margin-bottom: 4px;
        }

        .card-meta {
            font-size: 14px;
            color: var(--teks-lembut);
        }

        .card-footer {
            margin-top: 14px;
            padding-top: 12px;
            border-top: 1px dashed var(--garis);
            display: flex;
            align-items: center;
            justify-content: space-between;
            font-size: 14px;
        }

        /* ---------- Badge status ---------- */
        .badge {
            display: inline-block;
            padding: 5px 12px;
            border-radius: 999px;
            font-size: 12px;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 0.4px;
        }

        .badge-waspada {
            background: var(--kuning-bg);
            color: var(--kuning);
        }

        .badge-siaga {
            background: var(--oranye-bg);
            color: var(--oranye);
        }

        .badge-awas {
            background: var(--merah-bg);
            color: var(--merah);
        }

        /* ---------- Alert (x-alert) ---------- */
        .alert {
            border: 1px solid transparent;
            border-left-width: 5px;
            border-radius: 10px;
            padding: 16px 20px;
            margin-bottom: 20px;
        }

        .alert-title {
            font-size: 16px;
            font-weight: 700;
            margin-bottom: 4px;
        }

        .alert-text {
            font-size: 14px;
        }

        .alert-success {
            background: var(--hijau-bg);
            border-color: var(--hijau);
            color: #14532d;
        }

        .alert-info {
            background: var(--biru-bg);
            border-color: var(--biru);
            color: #1e3a8a;
        }

        .alert-danger {
            background: var(--merah-bg);
            border-color: var(--merah);
            color: #7f1d1d;
        }

        .alert-warning {
            background: var(--kuning-bg);
            border-color: var(--kuning);
            color: #713f12;
        }

        /* ---------- Formulir ---------- */
        .form-group {
            margin-bottom: 18px;
        }

        .form-group label {
            display: block;
            font-size: 14px;
            font-weight: 600;
            margin-bottom: 6px;
        }

        .form-group input,
        .form-group textarea {
            width: 100%;
            padding: 11px 12px;
            border: 1px solid #d1d5db;
            border-radius: 8px;
            font-family: inherit;
            font-size: 15px;
            background: #fff;
            transition: border-color 0.2s ease, box-shadow 0.2s ease;
        }

        .form-group input:focus,
        .form-group textarea:focus {
            outline: none;
            border-color: var(--biru);
            box-shadow: 0 0 0 3px rgba(29, 78, 216, 0.15);
        }

        .form-group input.has-error {
            border-color: var(--merah);
        }

        .form-hint {
            font-size: 12px;
            color: var(--teks-lembut);
            margin-top: 5px;
        }

        .error-text {
            display: block;
            font-size: 13px;
            color: var(--merah);
            margin-top: 5px;
            font-weight: 500;
        }

        .form-actions {
            display: flex;
            gap: 10px;
            flex-wrap: wrap;
            margin-top: 8px;
        }

        /* ---------- Tombol ---------- */
        .btn {
            display: inline-block;
            padding: 11px 20px;
            border: 1px solid transparent;
            border-radius: 8px;
            font-family: inherit;
            font-size: 15px;
            font-weight: 600;
            text-decoration: none;
            cursor: pointer;
            transition: filter 0.2s ease, background-color 0.2s ease;
        }

        .btn:hover {
            filter: brightness(0.93);
        }

        .btn-primary {
            background: var(--biru);
            color: #fff;
        }

        .btn-secondary {
            background: #fff;
            border-color: #d1d5db;
            color: var(--teks);
        }

        /* ---------- Tabel ---------- */
        .table {
            width: 100%;
            border-collapse: collapse;
            font-size: 15px;
        }

        .table th,
        .table td {
            padding: 12px 14px;
            text-align: left;
            border-bottom: 1px solid var(--garis);
        }

        .table th {
            background: #f9fafb;
            font-size: 13px;
            text-transform: uppercase;
            letter-spacing: 0.4px;
            color: var(--teks-lembut);
        }

        .table tbody tr:last-child td {
            border-bottom: none;
        }

        .table-label {
            width: 34%;
            font-weight: 600;
        }

        /* ---------- Daftar laporan ---------- */
        .toolbar {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 12px;
            flex-wrap: wrap;
            margin-bottom: 18px;
        }

        .toolbar p {
            font-size: 14px;
            color: var(--teks-lembut);
        }

        .empty-state {
            background: #fff;
            border: 1px dashed #d1d5db;
            border-radius: 12px;
            padding: 48px 24px;
            text-align: center;
            color: var(--teks-lembut);
        }

        .legend {
            display: flex;
            gap: 16px;
            flex-wrap: wrap;
            font-size: 13px;
            color: var(--teks-lembut);
            margin-top: 8px;
        }

        /* ---------- Footer ---------- */
        .site-footer {
            flex-shrink: 0;
            background: #111827;
            color: #9ca3af;
            padding: 20px 0;
            font-size: 13px;
            text-align: center;
        }

        .site-footer strong {
            color: #f9fafb;
        }

        @media (max-width: 640px) {
            .table-label {
                width: 45%;
            }

            .brand-text h1 {
                font-size: 19px;
            }
        }
    </style>
</head>
<body>
    <header class="site-header">
        <div class="container header-inner">
            <a class="brand" href="{{ route('laporan.daftar') }}">
                <span class="brand-logo">&#127754;</span>
                <span class="brand-text">
                    <h1>LaporBanjir</h1>
                    <p>Badan Penanggulangan Bencana Daerah Kabupaten Bandung</p>
                </span>
            </a>

            <nav class="site-nav">
                <ul>
                    <li>
                        <a href="{{ route('laporan.daftar') }}"
                           class="{{ request()->routeIs('laporan.daftar') ? 'active' : '' }}">
                            Daftar Laporan
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('laporan.form') }}"
                           class="{{ request()->routeIs('laporan.form') ? 'active' : '' }}">
                            Form Pelaporan
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('laporan.konfirmasi') }}"
                           class="{{ request()->routeIs('laporan.konfirmasi') ? 'active' : '' }}">
                            Konfirmasi
                        </a>
                    </li>
                </ul>
            </nav>
        </div>
    </header>

    <main>
        <div class="container">
            @yield('content')
        </div>
    </main>

    <footer class="site-footer">
        <div class="container">
            <p>
                <strong>LaporBanjir</strong>
            </p>
        </div>
    </footer>
</body>
</html>
