<?php

return [
    'required' => 'Kolom :attribute wajib diisi.',
    'email' => 'Kolom :attribute harus berupa alamat email yang valid.',
    'unique' => ':attribute sudah digunakan.',
    'confirmed' => 'Konfirmasi :attribute tidak cocok.',
    'current_password' => 'Password yang Anda masukkan salah.',
    'string' => 'Kolom :attribute harus berupa teks.',
    'integer' => 'Kolom :attribute harus berupa bilangan bulat.',
    'numeric' => 'Kolom :attribute harus berupa angka.',
    'date' => 'Kolom :attribute harus berupa tanggal yang valid.',
    'min' => [
        'numeric' => 'Kolom :attribute minimal :min.',
        'string' => 'Kolom :attribute minimal :min karakter.',
    ],
    'max' => [
        'numeric' => 'Kolom :attribute maksimal :max.',
        'string' => 'Kolom :attribute maksimal :max karakter.',
    ],
    'between' => [
        'numeric' => 'Kolom :attribute harus di antara :min dan :max.',
    ],

    'attributes' => [
        'name' => 'nama lengkap',
        'email' => 'alamat email',
        'password' => 'password',
        'password_confirmation' => 'konfirmasi password',
        'current_password' => 'password saat ini',
        'nama_pelapor' => 'nama pelapor',
        'lokasi' => 'lokasi kejadian',
        'tinggi_genangan' => 'tinggi genangan air',
        'tanggal_kejadian' => 'tanggal kejadian',
    ],
];
