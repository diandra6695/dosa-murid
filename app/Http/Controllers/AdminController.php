<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use App\Models\GuruBK;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminController extends Controller
{
    //
    public function result(Request $request)
    {
        $page = [
            'title' => env('APP_NAME', "LARAVEL") . " | coba",
            'description' => 'Sistem Pembukuan Anak Nakal',
        ];
        $nis = $request->nis;
        $siswa = Siswa::where('nis', $nis)->with('kelas.jurusan')->first();
        $guruBK = GuruBK::all();
        return view('result', compact('nis', 'siswa', 'guruBK', 'page'));
    }
}
