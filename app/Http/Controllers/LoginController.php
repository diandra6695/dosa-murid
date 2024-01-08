<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Redis;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    public function index()

    {
        $page = [
            'title' => env('APP_NAME', "LARAVEL") . " | HOME | Pilih User",
            'description' => 'Sistem Pembukuan Anak Nakal',
        ];
        return view('choseUser', compact('page'));
    }
    public function test(Request $request)
    {
        $input = $request->all();
        $this->validate($request, [
            'role' => 'required',
        ]);
        if ($input['role'] == 'siswa') {
            return redirect()->route('siswa.index');
        } else {
            return redirect()->route('login');
        }
    }
    public function roleAction(Request $request)
    {
        $validate = $request->validate([
            'role' => 'required|min:4'
        ]);
        if (Session::has('role')) {
            if (Session::get('role') !== 'siswa') {
                return redirect()->route('siswa.index')->with('message', 'Anda sudah login sebelumnya');
            }
        }
        // make Session
        Session::put('role', $request->role);
        if ($request->role == "siswa") {
            return redirect()->route('siswa.index')->with('message', "kamu login menggunakan Role Siswa");
        } else {
            return redirect()->route('login.admin')->with('message', 'Masuk sebagai ' . $request->role);
        }
    }

    public function adminLoginPage()
    {
        $page = [
            'title' => env('APP_NAME', "LARAVEL") . " | LOGIN ADMIN",
            'description' => 'Sistem Pembukuan Anak Nakal',
        ];
        return view('loginAdmin', compact('page'));
    }

    // Validasi Login dari Admin
    // Validate Login from Admin Page   

    public function adminLogin(Request $request)
    {
        $validate = $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:2',
        ]);
        if (Auth::attempt($validate)) {
            $request->session()->regenerate();

            return redirect()->intended('search');
        }

        return back()->withErrors('email', 'error');
    }
}
