<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Masuk') &mdash; LaporBanjir</title>

    <link rel="stylesheet" href="{{ asset('css/laporbanjir.css') }}">
</head>
<body class="auth-body">
    <a class="auth-brand" href="{{ url('/') }}">
        <span class="brand-logo">&#127754;</span>
        <span>
            <h1>LaporBanjir</h1>
            <p>BPBD Kabupaten Bandung</p>
        </span>
    </a>

    <div class="auth-card">
        @if (session('status'))
            <x-alert type="success">{{ session('status') }}</x-alert>
        @endif

        @yield('content')
    </div>

    <p style="margin-top: 20px; color: rgba(255, 255, 255, 0.75); font-size: 13px;">
        &copy; {{ date('Y') }} LaporBanjir &mdash; BPBD Kabupaten Bandung
    </p>
</body>
</html>
