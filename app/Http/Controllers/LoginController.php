<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class LoginController extends Controller
{
    public function index()
    {
        return view('choseUser');
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
    public function login()
    {
        return view('login');
    }
}
