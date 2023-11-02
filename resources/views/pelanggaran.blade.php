<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-slate-200 text-slate-900">

    <div class="bg-white rounded-xl md:text-4xl text-xl font-bold py-10">
        <div class="container mx-auto text-slate-900 text-center">{{ config('app.name', 'Laravel') }}</div>
    </div>

    <div class="mt-4 bg-white shadow-xl rounded-xl p-4 container mx-auto mb-5">
        <div class="md:text-xl text-base py-3 px-4 bg-slate-900 rounded-xl text-white font-semibold mb-3">Kode Aksi
            Pelanggaran :
            {{ $kode_aksi }}</div>
        @if ($aksi == null)
            <div class="text-xl w-full bg-slate-900 rounded-xl p-5 text-white text-center">..:: AKSI TIDAK
                DITEMUKAN
                ::..
            </div>
        @else
            <div class="border p-5 rounded-xl border-slate-200">
                <div class="md:w-1/2 p-2">
                    <div class="grid text-sm md:text-base grid-cols-2 text-left font-semibold mb-3">
                        <h3 class="text-slate-500">Nama</h3>
                        <h3>{{ $siswa->nama }}</h3>
                    </div>
                    <div class="grid text-sm md:text-base grid-cols-2 text-left font-semibold mb-3">
                        <h3 class="text-slate-500">NISN</h3>
                        <h3>{{ $siswa->nisn }}</h3>
                    </div>
                    <div class="grid text-sm md:text-base grid-cols-2 text-left font-semibold mb-3">
                        <h3 class="text-slate-500">Kelas</h3>
                        <h3>{{ $siswa->kelas->nama_kelas }}</h3>
                    </div>
                    <div class="grid text-sm md:text-base grid-cols-2 text-left font-semibold mb-3">
                        <h3 class="text-slate-500">Jurusan</h3>
                        <h3>{{ $siswa->kelas->jurusan->nama_jurusan }}</h3>
                    </div>
                    <div class="grid text-sm md:text-base grid-cols-2 text-left font-semibold mb-3">
                        <h3 class="text-slate-500">Alamat</h3>
                        <h3>{{ $siswa->alamat }}</h3>
                    </div>
                    <div class="grid text-sm md:text-base grid-cols-2 text-left font-semibold mb-3">
                        <h3 class="text-slate-500">Tanggal</h3>
                        <h3>{{ $aksi->tanggal }}</h3>
                    </div>
                    <div class="grid text-sm md:text-base grid-cols-2 text-left font-semibold mb-3">
                        <h3 class="text-slate-500">Waktu</h3>
                        <h3>{{ $aksi->waktu }}</h3>
                    </div>
                    <div class=" grid text-sm md:text-base grid-cols-2 text-left font-semibold">
                        <h3 class="text-slate-500">Guru BK</h3>
                        <h3>{{ $aksi->guruBK->nama }}</h3>
                    </div>
                </div>

                <form action="{{ route('pelanggaran.add.aksi', $kode_aksi) }}" method="POST">
                    @csrf
                    <div class="mb-4">
                        <label for="kode_pelanggaran" class="block mb-2 text-lg font-medium">Pelanggaran</label>
                        <select id="kode_pelanggaran" name="kode_pelanggaran"
                            class="bg-gray-50 border border-gray-300  text-lg rounded-lg focus:ring-slate-500 focus:border-slate-500 block w-full p-2.5 ">
                            <option value="" disabled selected>--- PILIH PELANGGRAN ---</option>
                            @foreach ($pelanggaranAll as $pelanggaran)
                                <option value="{{ $pelanggaran->kode_pelanggaran }}">
                                    {{ $pelanggaran->nama_pelanggaran }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-4">
                        <label for="keterangan" class="block mb-2 text-lg font-medium">Keterangan</label>
                        <input type="text" name="keterangan" id="keterangan" placeholder="Keterangan"
                            class="bg-gray-50 border border-gray-300 text-lg rounded-lg focus:ring-slate-500 focus:border-slate-500 block w-full p-2.5 ">
                    </div>

                    <button type="submit"
                        class="text-white bg-slate-900 hover:bg-slate-950 focus:ring-4 focus:outline-none focus:ring-slate-300 font-medium rounded-lg text-md px-5 py-2.5 text-center ">Tambah
                        Pelanggaran</button>
                </form>

                <form action="{{ route('pelanggaran.print') }}" method="POST">
                    @csrf
                    <input type="hidden" name="kode_aksi" value="{{ $kode_aksi }}">
                    <button type="submit"
                        class="text-white mt-5 bg-slate-900 hover:bg-slate-950 focus:ring-4 focus:outline-none focus:ring-slate-300 font-medium rounded-lg text-md px-5 py-2.5 text-center ">Cetak</button>
                </form>

                <div class="relative mt-10 overflow-x-auto">
                    <table class="md:w-full w-[50rem] bg-slate-200 rounded-lg text-left text-slate-700 ">
                        <thead class="text-white uppercase md:text-base text-sm rounded-lg bg-slate-900">
                            <tr>
                                <th scope="col" class="px-6 rounded-tl-lg py-3">
                                    Kode Pelanggaran
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Pelanggaran
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Keterangan
                                </th>
                                <th scope="col" class="px-6 py-3 rounded-tr-lg">
                                    Hapus?
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($aksi->listPelanggaran as $pelanggaran)
                                <tr class="bg-slate-100 md:text-base text-sm border-b rounded-xl">
                                    <td class="px-6 md:py-4 py-2">
                                        {{ $pelanggaran->kode_pelanggaran }}
                                    </td>
                                    <td class="px-6 md:py-4 py-2">
                                        {{ $pelanggaran->pelanggaran->nama_pelanggaran }}
                                    </td>
                                    <td class="px-6 md:py-4 py-2">
                                        {{ $pelanggaran->keterangan }}
                                    </td>
                                    <td class="px-6 md:py-4 py-2">
                                        <form action="{{ route('pelanggaran.remove.aksi', $kode_aksi) }}"
                                            method="POST">
                                            @csrf
                                            <input type="hidden" name="id_list" value="{{ $pelanggaran->id }}">
                                            <button type="submit"
                                                class="focus:outline-none text-white bg-slate-900 transition hover:bg-slate-800 focus:ring-4 focus:ring-slate-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2">Hapus</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        @endif
    </div>

</body>

</html>
