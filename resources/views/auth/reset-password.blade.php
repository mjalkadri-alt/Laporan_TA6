@extends('layouts.auth')

@section('title', 'Reset Password')

@section('content')
    <h2>Buat Password Baru</h2>
    <p class="auth-sub">Silakan tentukan password baru untuk akun Anda.</p>

    <form method="POST" action="{{ route('password.store') }}">
        @csrf

        <input type="hidden" name="token" value="{{ $request->route('token') }}">

        <div class="form-group">
            <label for="email">Alamat Email</label>
            <input type="email" id="email" name="email" value="{{ old('email', $request->email) }}"
                   class="@error('email') input-error @enderror"
                   placeholder="nama@email.com" required autofocus autocomplete="username">
            @error('email')
                <span class="error-text">{{ $message }}</span>
            @enderror
        </div>

        <div class="form-group">
            <label for="password">Password Baru</label>
            <input type="password" id="password" name="password"
                   class="@error('password') input-error @enderror"
                   placeholder="Minimal 8 karakter" required autocomplete="new-password">
            @error('password')
                <span class="error-text">{{ $message }}</span>
            @enderror
        </div>

        <div class="form-group">
            <label for="password_confirmation">Konfirmasi Password Baru</label>
            <input type="password" id="password_confirmation" name="password_confirmation"
                   placeholder="Ulangi password baru" required autocomplete="new-password">
        </div>

        <div class="form-actions">
            <button type="submit" class="btn btn-primary btn-block">Simpan Password Baru</button>
        </div>
    </form>
@endsection
