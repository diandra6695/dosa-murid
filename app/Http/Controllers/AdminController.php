<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use App\Models\GuruBK;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Route;

class AdminController extends Controller
{
    //
    public function result(Request $request)
    {
        $nameRoute = Route::currentRouteName(); // string
        $nis = $request->nis;
        $siswa = Siswa::where('nis', $nis)->with('kelas.jurusan')->first();
        $guruBK = GuruBK::all();
        $page = [
            'title' => env('APP_NAME', "LARAVEL") . " | Nis : $nis ",
            'description' => 'Sistem Pembukuan Anak Nakal',
        ];
        Session::put('name', $siswa->nama);
        $user = Auth::user(['name', 'email']);
        $get_nis_from_cookie = Session::get('nis');
        return view('result', compact('nis', 'siswa', 'guruBK', 'page', 'user', 'get_nis_from_cookie', 'nameRoute'));
    }
    public function logout(Request $request): RedirectResponse
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();
        Session::flush();

        return redirect('/');
    }
}
