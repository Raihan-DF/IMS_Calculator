<?php

// app/Http/Controllers/KreditController.php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kontrak;
use App\Models\JadwalAngsuran;
use Carbon\Carbon;

class KreditController extends Controller
{
    public function index()
    {
        return view('kredit.form');
    }

    public function calculate(Request $request)
    {
        // Validasi input
        $request->validate([
            'client_name' => 'required|string|max:100',
            'otr' => 'required|numeric|min:0',
            'dp_percentage' => 'required|numeric|min:0|max:100',
            'tenor' => 'required|integer|min:1',
        ]);

        // Generate nomor kontrak unik
        $kontrak_no = 'KTR-' . date('Ymd') . '-' . rand(1000, 9999);

        // Hitung DP
        $otr = $request->otr;
        $dp_percentage = $request->dp_percentage;
        $dp = $otr * ($dp_percentage / 100);

        // Hitung pokok pinjaman
        $pokok_pinjaman = $otr - $dp;

        // Tentukan suku bunga berdasarkan tenor (sesuai flowchart)
        $tenor = $request->tenor;
        if ($tenor < 12) {
            $bunga = 12; // 12% untuk tenor < 12 bulan
        } elseif ($tenor > 24) {
            $bunga = 16.5; // 16.5% untuk tenor > 24 bulan
        } else {
            // Untuk tenor 12-24 bulan, asumsikan bunga 14.5%
            $bunga = 14;
        }

        // Hitung angsuran per bulan dengan rumus anuitas
        $bunga_per_bulan = $bunga / 100 / 12;
        $angsuran_per_bulan = $pokok_pinjaman * ($bunga_per_bulan * pow((1 + $bunga_per_bulan), $tenor)) / (pow((1 + $bunga_per_bulan), $tenor) - 1);

        // Simpan data kontrak
        $kontrak = Kontrak::create([
            'kontrak_no' => $kontrak_no,
            'client_name' => $request->client_name,
            'otr' => $otr,
            'dp' => $dp,
            'tenor' => $tenor,
            'bunga' => $bunga
        ]);

        // Buat jadwal angsuran
        $tanggal_mulai = Carbon::now()->addMonth(); // Angsuran dimulai 1 bulan dari sekarang
        for ($i = 1; $i <= $tenor; $i++) {
            $tanggal_jatuh_tempo = $tanggal_mulai->copy()->addMonths($i - 1);

            JadwalAngsuran::create([
                'kontrak_no' => $kontrak_no,
                'angsuran_ke' => $i,
                'angsuran_per_bulan' => $angsuran_per_bulan,
                'tanggal_jatuh_tempo' => $tanggal_jatuh_tempo
            ]);
        }

        // Ambil data jadwal angsuran
        $jadwalAngsuran = JadwalAngsuran::where('kontrak_no', $kontrak_no)->orderBy('angsuran_ke')->get();

        return view('kredit.result', [
            'kontrak' => $kontrak,
            'pokok_pinjaman' => $pokok_pinjaman,
            'angsuran_per_bulan' => $angsuran_per_bulan,
            'jadwalAngsuran' => $jadwalAngsuran
        ]);
    }
}
