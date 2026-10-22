@extends('layouts.auth')

@section('title', 'Daftar Akun')

@section('content')
    <h2>Daftar Akun Baru</h2>
    <p class="auth-sub">Buat akun untuk mulai melaporkan kejadian banjir di Kabupaten Bandung.</p>

    <form method="POST" action="{{ route('register') }}">
        @csrf

        <div class="form-group">
            <label for="name">Nama Lengkap</label>
            <input type="text" id="name" name="name" value="{{ old('name') }}"
                   class="@error('name') input-error @enderror"
                   placeholder="Nama lengkap Anda" required autofocus autocomplete="name">
            @error('name')
                <span class="error-text">{{ $message }}</span>
            @enderror
        </div>

        <div class="form-group">
            <label for="email">Alamat Email</label>
            <input type="email" id="email" name="email" value="{{ old('email') }}"
                   class="@error('email') input-error @enderror"
                   placeholder="nama@email.com" required autocomplete="username">
            @error('email')
                <span class="error-text">{{ $message }}</span>
            @enderror
        </div>

        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" id="password" name="password"
                   class="@error('password') input-error @enderror"
                   placeholder="Minimal 8 karakter" required autocomplete="new-password">
            @error('password')
                <span class="error-text">{{ $message }}</span>
            @enderror
            <small class="form-hint">Gunakan minimal 8 karakter yang sulit ditebak.</small>
        </div>

        <div class="form-group">
            <label for="password_confirmation">Konfirmasi Password</label>
            <input type="password" id="password_confirmation" name="password_confirmation"
                   placeholder="Ulangi password" required autocomplete="new-password">
        </div>

        <div class="form-actions">
            <button type="submit" class="btn btn-primary btn-block">Daftar</button>
        </div>
    </form>

    <p class="auth-switch">
        Sudah punya akun? <a href="{{ route('login') }}">Masuk di sini</a>
    </p>
@endsection
