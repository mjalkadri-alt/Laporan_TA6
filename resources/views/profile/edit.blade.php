@extends('layouts.app')

@section('title', 'Profil Saya')

@section('content')
    <div class="page-head">
        <h2>Profil Saya</h2>
        <p>Perbarui informasi akun dan keamanan password Anda.</p>
    </div>

    <div class="panel" style="max-width: 680px;">
        <h3 style="font-size: 18px; color: var(--biru-gelap); margin-bottom: 4px;">Informasi Akun</h3>
        <p class="card-meta" style="margin-bottom: 18px;">Perubahan nama dan email akan langsung tersimpan pada akun Anda.</p>

        <form method="POST" action="{{ route('profile.update') }}">
            @csrf
            @method('patch')

            <div class="form-group">
                <label for="name">Nama Lengkap</label>
                <input type="text" id="name" name="name" value="{{ old('name', $user->name) }}"
                       class="@error('name') input-error @enderror" required autocomplete="name">
                @error('name')
                    <span class="error-text">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group">
                <label for="email">Alamat Email</label>
                <input type="email" id="email" name="email" value="{{ old('email', $user->email) }}"
                       class="@error('email') input-error @enderror" required autocomplete="username">
                @error('email')
                    <span class="error-text">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-actions">
                <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
            </div>
        </form>
    </div>

    <div class="panel" style="max-width: 680px; margin-top: 20px;">
        <h3 style="font-size: 18px; color: var(--biru-gelap); margin-bottom: 4px;">Ubah Password</h3>
        <p class="card-meta" style="margin-bottom: 18px;">Gunakan password yang panjang dan sulit ditebak.</p>

        <form method="POST" action="{{ route('password.update') }}">
            @csrf
            @method('put')

            <div class="form-group">
                <label for="current_password">Password Saat Ini</label>
                <input type="password" id="current_password" name="current_password"
                       class="@if ($errors->updatePassword->has('current_password')) input-error @endif"
                       required autocomplete="current-password">
                @if ($errors->updatePassword->has('current_password'))
                    <span class="error-text">{{ $errors->updatePassword->first('current_password') }}</span>
                @endif
            </div>

            <div class="form-group">
                <label for="new_password">Password Baru</label>
                <input type="password" id="new_password" name="password"
                       class="@if ($errors->updatePassword->has('password')) input-error @endif"
                       required autocomplete="new-password">
                @if ($errors->updatePassword->has('password'))
                    <span class="error-text">{{ $errors->updatePassword->first('password') }}</span>
                @endif
            </div>

            <div class="form-group">
                <label for="new_password_confirmation">Konfirmasi Password Baru</label>
                <input type="password" id="new_password_confirmation" name="password_confirmation"
                       required autocomplete="new-password">
            </div>

            <div class="form-actions">
                <button type="submit" class="btn btn-primary">Simpan Password</button>
            </div>
        </form>
    </div>

    <div class="panel" style="max-width: 680px; margin-top: 20px; border-left: 5px solid var(--merah);">
        <h3 style="font-size: 18px; color: var(--merah); margin-bottom: 4px;">Hapus Akun</h3>
        <p class="card-meta" style="margin-bottom: 18px;">
            Setelah akun dihapus, seluruh data akun tidak dapat dikembalikan. Masukkan password
            untuk mengonfirmasi tindakan ini.
        </p>

        <form method="POST" action="{{ route('profile.destroy') }}"
              onsubmit="return confirm('Yakin ingin menghapus akun Anda secara permanen?');">
            @csrf
            @method('delete')

            <div class="form-group">
                <label for="delete_password">Password</label>
                <input type="password" id="delete_password" name="password"
                       class="@if ($errors->userDeletion->has('password')) input-error @endif"
                       placeholder="Masukkan password Anda" required>
                @if ($errors->userDeletion->has('password'))
                    <span class="error-text">{{ $errors->userDeletion->first('password') }}</span>
                @endif
            </div>

            <div class="form-actions">
                <button type="submit" class="btn btn-danger">Hapus Akun Saya</button>
            </div>
        </form>
    </div>
@endsection
