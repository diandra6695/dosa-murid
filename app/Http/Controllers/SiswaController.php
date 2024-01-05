<?php

namespace App\Http\Controllers;

use App\Models\Aksi;
use App\Models\GuruBK;
use App\Models\Pelanggaran;
use App\Models\Siswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SiswaController extends Controller
{
    public function index()
    {
        $page = [
            'title' => env('APP_NAME', "LARAVEL") . " | LOGIN ADMIN",
            'description' => 'Sistem Pembukuan Anak Nakal',
        ];
        return view('cariSiswa', compact('page'));
    }


    // public function dashboard()
    // {
    //     return view('dashboard');
    // }
    public function totalPoint(Int $nis): Int
    {
        $siswa = Siswa::where('nis', $nis)->with('aksi.listPelanggaran.pelanggaran')->first();
        $total = 0;

        if ($siswa == null) {
            return $total;
        }

        foreach ($siswa->aksi as $aksi) {
            foreach ($aksi->listPelanggaran as $list) {
                $total += $list->pelanggaran->poin;
            }
        }

        return $total;
    }

    public function resultSiswa(Request $request)
    {
        if (Auth::user()->role !== "siswa") {
            return redirect('/result?nis=' . $request->nis);
        }

        $nis = $request->nis;
        $nganu = Siswa::where('nis', $request->nis)->with('aksi.listPelanggaran.pelanggaran')->first();
        $pelanggaran = Pelanggaran::all();
        $siswa = Siswa::where('nis', $nis)->with('kelas.jurusan')->first();
        if ($siswa) {
            $title = $siswa->nama;
        } else {
            $title = " dengan Nis $nis tidak ada";
        }
        $page = [
            'title' => env('APP_NAME', "LARAVEL") . " | Siswa $title",
            'description' => 'Sistem Pembukuan Anak Nakal',
        ];
        // $aksi = Aksi::where('kode_aksi', $aksi)->with('siswa.kelas.jurusan', 'guruBK', 'listPelanggaran.pelanggaran')->first();
        return view('dashboardSiswa', compact('nis', 'siswa', 'pelanggaran', 'nganu', 'page'));
    }
}
