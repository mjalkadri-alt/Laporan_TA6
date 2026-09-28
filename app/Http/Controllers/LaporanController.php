<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

class LaporanController extends Controller
{
/**
 *  menampilkan halaman form pelaporan banjir.
 */
    public function form()
    {
        return view('laporan.form');
    }

/**
 *  menyimpan laporan hasil kiriman form dan mengarahkan ke halaman konfirmasi.
 */
    public function store(Request $requestdata)
    {
        $data = $requestdata->validate([
            'nama' => ['required', 'string', 'max:255'],
            'lokasi' => ['required', 'string', 'max:255'],
            'tinggi' => ['required', 'numeric', 'min:0'],
            'tanggal' => ['required', 'date'],
        ]);

        session()->flash('laporan_terkirim', [
            'nama' => $data['nama'],
            'lokasi' => $data['lokasi'],
            'tinggi' => (int) $data['tinggi'],
            'tanggal' => \Carbon\Carbon::parse($data['tanggal'])->translatedFormat('j F Y'),
        ]);

        return redirect()->route('laporan.konfirmasi');
    }

/**
 * menampilkan halaman konfirmasi beserta data yang baru saja dikirim.
 */
    public function konfirmasi()
    {
        return view('laporan.konfirmasi',
        [
            'laporan' => session('laporan_terkirim'),
            'sukses' => session('sukses'),
        ]);
    }
/**
 * Menampilkan halaman daftar laporan. Contoh data disimpan di controller.
 */
    public function daftar()
    {
        return view('laporan.daftar', [
            'laporan' => $this->dataContoh(),
        ]);
    }

/**
 * Contoh data laporan kejadian banjir
 */

    private function dataContoh()
    {
        return [
            [
                'nama' => 'Asep Kurniawan',
                'lokasi' => 'Jl. Raya Cililin, Kec. Cililin',
                'tinggi' => 15,
                'tanggal' => '12 September 2026',
            ],
            [
                'nama' => 'Siti Rohmah',
                'lokasi' => 'Kp. Pasirjaya, Kec. Padalarang',
                'tinggi' => 45,
                'tanggal' => '12 September 2026',
            ],
            [
                'nama' => 'Dedi Susanto',
                'lokasi' => 'Jl. Cibeureum, Kec. Cibeunying Kab.',
                'tinggi' => 70,
                'tanggal' => '11 September 2026',
            ],
            [
                'nama' => 'Nurul Hidayah',
                'lokasi' => 'Kp. Ciherang, Kec. Soreang',
                'tinggi' => 85,
                'tanggal' => '11 September 2026',
            ],
            [
                'nama' => 'Budi Santoso',
                'lokasi' => 'Jl. Raya Banjaran, Kec. Banjaran',
                'tinggi' => 120,
                'tanggal' => '10 September 2026',
            ],
        ];
    }
}