<?php

namespace App\Http\Controllers;

use App\Models\GuruBK;
use Illuminate\Http\Request;

class GuruController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $page = [
            'title' => env('APP_NAME', "LARAVEL") . " | List Guru ",
            'description' => 'Sistem Pembukuan Anak Nakal',
        ];
        $gurus = GuruBK::all();
        return view('guruBK', compact('page', 'gurus'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $page = [
            'title' => env('APP_NAME', "LARAVEL") . " | List Guru ",
            'description' => 'Sistem Pembukuan Anak Nakal',
        ];
        return view('addGuruBK', compact('page'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $validate = $request->validate([
            'nama' => 'required',
            'nip' => 'required',
            'alamat' => 'required',
            'nomor_telepon' => 'required',
            'kode_bk' => 'required',
        ]);
        GuruBK::create($validate);
        return redirect('/teachers')->with('message', "berhasil menambahkan Data Baru ");
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $guru = GuruBK::find($id);
        $nama_guru = $guru->nama;
        $guru->delete();
        return collect([
            'succces' => 'true',
            'message' => "$nama_guru berhasil dihapus"
        ])->toJson();
    }
}
