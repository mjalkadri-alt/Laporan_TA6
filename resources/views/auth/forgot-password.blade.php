@extends('layouts.auth')

@section('title', 'Lupa Password')

@section('content')
    <h2>Lupa Password?</h2>
    <p class="auth-sub">Masukkan alamat email akun Anda. Kami akan mengirimkan tautan untuk membuat password baru.</p>

    <form method="POST" action="{{ route('password.email') }}">
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

        <div class="form-actions">
            <button type="submit" class="btn btn-primary btn-block">Kirim Tautan Reset</button>
        </div>
    </form>

    <p class="auth-switch">
        <a href="{{ route('login') }}">&larr; Kembali ke halaman masuk</a>
    </p>
@endsection
