@extends('layouts.auth')

@section('title', 'Konfirmasi Password')

@section('content')
    <h2>Konfirmasi Password</h2>
    <p class="auth-sub">Demi keamanan, masukkan kembali password Anda sebelum melanjutkan.</p>

    <form method="POST" action="{{ route('password.confirm') }}">
        @csrf

        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" id="password" name="password"
                   class="@error('password') input-error @enderror"
                   placeholder="Masukkan password" required autofocus autocomplete="current-password">
            @error('password')
                <span class="error-text">{{ $message }}</span>
            @enderror
        </div>

        <div class="form-actions">
            <button type="submit" class="btn btn-primary btn-block">Konfirmasi</button>
        </div>
    </form>
@endsection
