<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{seting, Siswa};
use Carbon\Carbon;

class IndexController extends Controller
{
    public function index()
    {
        $setting = seting::find(1);
        return view('index', compact('setting'));
    }
    
    public function cekKelulusan(Request $request)
    {
        // Ambil pengaturan tanggal dari database
        $setting = seting::find(1);
        
        // Konversi tanggal dari database ke format Carbon
        $tanggalPengumuman = Carbon::parse($setting->tgl);
        $sekarang = Carbon::now();

        
        // Cek apakah waktu sekarang sudah melewati waktu pengumuman
        if ($sekarang->lt($tanggalPengumuman)) {
            // Jika belum waktunya, redirect ke halaman utama dengan pesan
            return redirect('/')->with('error', 'Maaf, pengumuman belum dibuka. Silakan tunggu hingga waktu yang ditentukan.');
        }
        
        // Jika sudah waktunya, lanjutkan proses
        $nis = $request->input('nis');
        $nisn = $request->input('nisn');
        $siswa = Siswa::where('nis', $nis)->where('nisn', $nisn)->firstOrFail();
        
        return view('hasil', compact('siswa', 'setting'));
    }
}