@extends('layouts.auth')

@section('title', 'Verifikasi Email')

@section('content')
    <h2>Verifikasi Email</h2>
    <p class="auth-sub">
        Terima kasih sudah mendaftar. Sebelum mulai, silakan verifikasi alamat email Anda
        melalui tautan yang baru saja kami kirimkan.
    </p>

    @if (session('status') === 'verification-link-sent')
        <div class="auth-note">
            Tautan verifikasi baru telah dikirim ke alamat email yang Anda daftarkan.
        </div>
    @endif

    <form method="POST" action="{{ route('verification.send') }}">
        @csrf
        <button type="submit" class="btn btn-primary btn-block">Kirim Ulang Email Verifikasi</button>
    </form>

    <form method="POST" action="{{ route('logout') }}" style="margin-top: 12px;">
        @csrf
        <button type="submit" class="btn btn-secondary btn-block">Keluar</button>
    </form>
@endsection
