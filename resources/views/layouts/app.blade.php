<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Beranda') &mdash; LaporBanjir</title>

    <link rel="stylesheet" href="{{ asset('css/laporbanjir.css') }}">
</head>
<body>
    <header class="site-header">
        <div class="container header-inner">
            <a class="brand" href="{{ route('dashboard') }}">
                <span class="brand-logo">&#127754;</span>
                <span class="brand-text">
                    <h1>LaporBanjir</h1>
                    <p>Badan Penanggulangan Bencana Daerah Kabupaten Bandung</p>
                </span>
            </a>

            <nav class="site-nav">
                <ul>
                    <li>
                        <a href="{{ route('dashboard') }}"
                           class="{{ request()->routeIs('dashboard') ? 'active' : '' }}">
                            Dashboard
                        </a>
                    </li>
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

                    @auth
                        <li>
                            <a href="{{ route('profile.edit') }}"
                               class="nav-user {{ request()->routeIs('profile.*') ? 'active' : '' }}">
                                {{ Auth::user()->name }}
                            </a>
                        </li>
                        <li>
                            <form method="POST" action="{{ route('logout') }}" class="nav-logout-form">
                                @csrf
                                <button type="submit" class="nav-button nav-logout">Keluar</button>
                            </form>
                        </li>
                    @else
                        <li>
                            <a href="{{ route('login') }}" class="nav-guest">Masuk</a>
                        </li>
                        <li>
                            <a href="{{ route('register') }}" class="nav-guest">Daftar</a>
                        </li>
                    @endauth
                </ul>
            </nav>
        </div>
    </header>

    <main>
        <div class="container">
            @if (session('status') === 'profile-updated')
                <x-alert type="success" title="Berhasil">Profil Anda berhasil diperbarui.</x-alert>
            @elseif (session('status') === 'password-updated')
                <x-alert type="success" title="Berhasil">Password Anda berhasil diperbarui.</x-alert>
            @elseif (session('status'))
                <x-alert type="success">{{ session('status') }}</x-alert>
            @endif

            @if (session('sukses'))
                <x-alert type="success" title="Berhasil">{{ session('sukses') }}</x-alert>
            @endif

            @yield('content')
        </div>
    </main>

    <footer class="site-footer">
        <div class="container">
            <p>
                <strong>LaporBanjir</strong> &mdash; BPBD Kabupaten Bandung
            </p>
        </div>
    </footer>
</body>
</html>
