@extends('layouts.auth')

@section('title', 'Masuk')

@section('content')
    <h2>Masuk ke LaporBanjir</h2>
    <p class="auth-sub">Silakan masuk untuk mengakses dashboard dan melaporkan kejadian banjir.</p>

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <div class="form-group">
            <label for="email">Alamat Email</label>
            <input type="email" id="email" name="email" value="{{ old('email') }}"
                   class="@error('email') input-error @enderror"
                   placeholder="nama@email.com" required autofocus autocomplete="username">
            @error('email')
                <span class="error-text">{{ $message }}</span>
            @enderror
        </div>

        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" id="password" name="password"
                   class="@error('password') input-error @enderror"
                   placeholder="Masukkan password" required autocomplete="current-password">
            @error('password')
                <span class="error-text">{{ $message }}</span>
            @enderror
        </div>

        <div class="auth-actions">
            <label class="checkbox-row" for="remember_me" style="margin-bottom: 0;">
                <input type="checkbox" id="remember_me" name="remember">
                <span>Ingat saya</span>
            </label>

            @if (Route::has('password.request'))
                <a href="{{ route('password.request') }}">Lupa password?</a>
            @endif
        </div>

        <div class="form-actions" style="margin-top: 20px;">
            <button type="submit" class="btn btn-primary btn-block">Masuk</button>
        </div>
    </form>

    <p class="auth-switch">
        Belum punya akun? <a href="{{ route('register') }}">Daftar sekarang</a>
    </p>
@endsection
