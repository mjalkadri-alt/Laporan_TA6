<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Laporan extends Model
{
    /**
     * Nama tabel yang terhubung dengan model ini.
     * Laravel secara bawaan menganggap nama tabel adalah bentuk jamak
     * dari nama model (laporans), sehingga perlu dituliskan secara eksplisit.
     */
    protected $table = 'laporan';

    /**
     * Kolom yang boleh diisi sekaligus melalui mass assignment,
     * misalnya Laporan::create([...]).
     */
    protected $fillable = [
        'nama_pelapor',
        'lokasi',
        'tinggi_genangan',
        'tanggal_kejadian',
    ];

    /**
     * Konversi tipe kolom sehingga tanggal_kejadian menjadi objek Carbon
     * dan dapat diformat langsung di dalam view.
     */
    protected $casts = [
        'tanggal_kejadian' => 'date',
    ];
}
