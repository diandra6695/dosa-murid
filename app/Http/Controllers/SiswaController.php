<?php

namespace App\Http\Controllers;

use App\Models\Aksi;
use App\Models\Kelas;
use App\Models\Siswa;
use App\Models\GuruBK;
use App\Models\Pelanggaran;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

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
        // variabel Role get from Session

        if (Session::has('role')) {
            $role = Session::get('role');
        }
        // Statement 
        if ($role !== "siswa") {
            // make Session Nis
            Session::put('nis', $request->nis);
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


        // make Session Nis
        Session::put('nis', $request->nis);
        // $aksi = Aksi::where('kode_aksi', $aksi)->with('siswa.kelas.jurusan', 'guruBK', 'listPelanggaran.pelanggaran')->first();
        return view('dashboardSiswa', compact('nis', 'siswa', 'pelanggaran', 'nganu', 'page'));
    }

    // For Admin Page, check this Controller and learn
    public  function adminSiswaPage()
    {
        $get_nis_from_cookie = Session::get('nis');
        $nameRoute = Route::currentRouteName(); // string
        $page = [
            'title' => env('APP_NAME', "LARAVEL") . " | List Siswa",
            'description' => 'Sistem Pembukuan Anak Nakal',
        ];
        $siswas = Siswa::orderBy('created_at', 'desc')->paginate(10);
        return view('pages.siswa.siswaAdmin', compact('page', 'siswas', 'nameRoute', 'get_nis_from_cookie'));
    }

    public function adminSiswaAddPage()
    {
        $get_nis_from_cookie = Session::get('nis');
        $nameRoute = Route::currentRouteName(); // string
        $page = [
            'title' => env('APP_NAME', "LARAVEL") . " | List Siswa",
            'description' => 'Sistem Pembukuan Anak Nakal',
        ];
        $kelas = Kelas::all();
        return view('pages.siswa.siswaAdminAdd', compact('page', 'nameRoute', 'get_nis_from_cookie', 'kelas'));
    }

    public function adminSiswaAddAction(Request $request)
    {
        $validate = $request->validate([
            'nama' => 'required|min:5',
            'nisn' => 'required',
            'nis' => 'required',
            'tanggal_lahir' => 'required',
            'tempat_lahir' => 'required',
            'jenis_kelamin' => 'required',
            'alamat' => 'required',
            'no_telepon' => 'required',
            'no_telepon_ortu' => 'required',
            'profile' => 'required',
            'kode_kelas' => "required"

        ]);

        if ($request->has('profile')) {
            $path = $request->file('profile')->store('/siswaImage');
            $validate['profile'] = $path;
        } else {
            return "ILLEGALL ACTION!!!!";
        }

        Siswa::create($validate);
        return redirect()->route('siswaAdmin')->with('message', 'Data sudah di unggah');
    }

    public function adminSiswaUpdatePage(string $id)
    {
        $get_nis_from_cookie = Session::get('nis');
        $nameRoute = Route::currentRouteName(); // string
        $siswa = Siswa::find($id);
        $page = [
            'title' => env('APP_NAME', "LARAVEL") . " | Update Siswa",
            'description' => 'Sistem Pembukuan Anak Nakal',
        ];
        $kelas = Kelas::all();
        return view('pages.siswa.siswaAdminUpdate', compact('page', 'nameRoute', 'get_nis_from_cookie', 'siswa', 'kelas'));
    }

    public function adminSiswaUpdateAction(Request $request)
    {
        $validate = $request->validate([
            'id' => 'required',
            'profileOld' => 'required',
            'nama' => 'required|min:5',
            'nisn' => 'required',
            'nis' => 'required',
            'tanggal_lahir' => 'required',
            'tempat_lahir' => 'required',
            'jenis_kelamin' => 'required',
            'alamat' => 'required',
            'no_telepon' => 'required',
            'no_telepon_ortu' => 'required',
            'kode_kelas' => "required"

        ]);
        if ($request->has('profile')) {
            Storage::delete('/storage' . $request->profileOld);
            $path = $request->file('profile')->store('/siswaImage');
        } else {
            $path = $request->profileOld;
        }
        $siswa = Siswa::find($request->id);

        $siswa->update([
            'nama' => $validate['nama'],
            'nisn' => $validate['nisn'],
            'nis' => $validate['nis'],
            'tanggal_lahir' => $validate['tanggal_lahir'],
            'tempat_lahir' => $validate['tempat_lahir'],
            'jenis_kelamin' => $validate['jenis_kelamin'],
            'alamat' => $validate['alamat'],
            'no_telepon' => $validate['no_telepon'],
            'no_telepon_ortu' => $validate['no_telepon_ortu'],
            'kode_kelas' => $validate['kode_kelas'],
            'profile' => $path
        ]);

        return redirect()->route('siswaAdmin')->with('message', "Siswa  $siswa->nama berhasil diupdate");
    }

    public function adminSiswaDeleteAction(string $id)
    {
        $siswa = Siswa::find($id);
        $siswaNama = $siswa->nama;
        $siswa->delete();
        return redirect()->route('siswaAdmin')->with('message', "Siswa  $siswaNama berhasil dihapus");
    }
}
