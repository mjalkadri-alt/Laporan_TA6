<?php

namespace App\Http\Controllers;

use App\Models\Laporan;
use Illuminate\Http\Request;

class LaporanController extends Controller
{
    /**
     * Menampilkan dashboard utama setelah user berhasil login.
     */
    public function dashboard()
    {
        return view('dashboard', [
            'total' => Laporan::count(),
            'waspada' => Laporan::where('tinggi_genangan', '<', 30)->count(),
            'siaga' => Laporan::whereBetween('tinggi_genangan', [30, 70])->count(),
            'awas' => Laporan::where('tinggi_genangan', '>', 70)->count(),
            'laporanTerbaru' => Laporan::latest()->take(6)->get(),
        ]);
    }

    /**
     * Menampilkan halaman form pelaporan banjir.
     */
    public function form()
    {
        return view('laporan.form');
    }

    /**
     * Menyimpan laporan hasil kiriman form ke tabel laporan,
     * lalu mengarahkan ke halaman konfirmasi.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'nama_pelapor' => ['required', 'string', 'max:255'],
            'lokasi' => ['required', 'string', 'max:255'],
            'tinggi_genangan' => ['required', 'integer', 'min:0'],
            'tanggal_kejadian' => ['required', 'date'],
        ]);

        // Data benar-benar tersimpan ke tabel laporan melalui model Eloquent.
        $laporan = Laporan::create($data);

        session()->flash('laporan_terkirim', $laporan);

        return redirect()->route('laporan.konfirmasi');
    }

    /**
     * Menampilkan halaman konfirmasi beserta data yang baru saja dikirim.
     */
    public function konfirmasi()
    {
        return view('laporan.konfirmasi', [
            'laporan' => session('laporan_terkirim'),
            'sukses' => session('sukses'),
        ]);
    }

    /**
     * Menampilkan halaman daftar laporan yang diambil dari tabel laporan.
     */
    public function daftar()
    {
        return view('laporan.daftar', [
            'laporan' => Laporan::all(),
        ]);
    }
}
