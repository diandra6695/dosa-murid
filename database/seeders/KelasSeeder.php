<?php

namespace Database\Seeders;

use App\Models\Kelas;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class KelasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Kelas::create([
            "kode_kelas" => "PPLG234",
            "nama_kelas" => "X PPLG 1",
            "kode_jurusan" => "PPLG",
        ]);
        Kelas::create([
            "kode_kelas" => "AKL643",
            "nama_kelas" => "XI AKL 2",
            "kode_jurusan" => "AKL",
        ]);
        Kelas::create([
            "kode_kelas" => "MPLB764",
            "nama_kelas" => "XII MPLB 3",
            "kode_jurusan" => "MPLB",
        ]);
    }
}
