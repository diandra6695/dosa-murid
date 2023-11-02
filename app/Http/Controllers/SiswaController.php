<?php

namespace App\Http\Controllers;

use App\Models\Aksi;
use App\Models\GuruBK;
use App\Models\Pelanggaran;
use App\Models\Siswa;
use Illuminate\Http\Request;

class SiswaController extends Controller
{
    public function index()
    {
        return view('siswa');
    }
    public function result(Request $request)
    {
        $nis = $request->nis;
        $siswa = Siswa::where('nis', $nis)->with('kelas.jurusan')->first();
        $guruBK = GuruBK::all();
        return view('result', compact('nis', 'siswa', 'guruBK'));
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

    public function dashboard(Request $request)
    {
        $nis = $request->nis;
        $nganu = Siswa::where('nis', $request->nis)->with('aksi.listPelanggaran.pelanggaran')->first();
        $pelanggaran = Pelanggaran::all();
        $siswa = Siswa::where('nis', $nis)->with('kelas.jurusan')->first();
        // $aksi = Aksi::where('kode_aksi', $aksi)->with('siswa.kelas.jurusan', 'guruBK', 'listPelanggaran.pelanggaran')->first();
        return view('dashboard', compact('nis', 'siswa', 'pelanggaran', 'nganu'));
    }
}
