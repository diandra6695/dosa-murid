<?php

namespace Database\Seeders;

use App\Models\GuruBK;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GuruBKSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        GuruBK::create([
            'kode_bk' => 'BK001',
            'nama' => 'Syukurillah',
            'nip' => '1234567890',
            'alamat' => 'Jl. Raya Bangsri',
            'nomor_telepon' => '0842623463',
        ]);
        GuruBK::create([
            'kode_bk' => 'BK002',
            'nama' => 'Titik',
            'nip' => '987654321',
            'alamat' => 'Jl. Raya Bangsri',
            'nomor_telepon' => '0843125783',
        ]);
    }
}
