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

<body class="bg-slate-300 text-slate-900">
    @php
        $test = app('App\Http\Controllers\SiswaController')->totalPoint(9333);
        // $result adalah hasil dari pemanggilan fungsi controller
    @endphp

    <div class="flex gap-5">

        <div class="side-bar fixed bg-slate-100 border p-5 h-screen my-2 rounded-r-xl w-72">
            <div class="logo flex gap-2 items-center">
                <img class="w-10" src="{{ asset('img/logo.png') }}" alt="">
                <h3>DASHBOARD</h3>
            </div>
            <div class="navigation mt-5">
                <ul>
                    <li class="rounded-2xl text-sm bg-slate-900 text-white p-3">
                        <a href="{{ route('result') }}?nis={{ $siswa->nis }}">CATAT PELANGGARAN</a>
                    </li>
                </ul>
            </div>
        </div>

        <header class="ml-72  w-9/12">
            <nav class="bg-white rounded-lg mx-5 text-xl font-extrabold p-5 mb-5 mt-2">
                <h3>{{ config('app.name', 'Laravel') }}</h3>

            </nav>
            <div class="profile bg-white rounded-lg border mb-5 mx-5 p-5">
                <div class="mb-5 flex items-center gap-5">
                    <img class="w-1/12" src="{{ asset('img/' . $siswa->profile) }}" alt="INI FOTO PROFILE YA GES YAK">
                    <div class="text-left mt-5 font-semibold mb-3">
                        <h3>{{ $siswa->nama }}</h3>
                        <h3>{{ $test }} Poin</h3>
                    </div>
                    {{-- @dd($aksi->listPelanggaran) --}}
                </div>
                <div class="grid text-base grid-cols-2 text-left font-semibold mb-3">
                    <h3 class="text-slate-500">NISN</h3>
                    <h3>{{ $siswa->nisn }}</h3>
                </div>
                <div class="grid text-base grid-cols-2 text-left font-semibold mb-3">
                    <h3 class="text-slate-500">Kelas</h3>
                    <h3>{{ $siswa->kelas->nama_kelas }}</h3>
                </div>
                <div class="grid text-base grid-cols-2 text-left font-semibold mb-3">
                    <h3 class="text-slate-500">Jurusan</h3>
                    <h3>{{ $siswa->kelas->jurusan->nama_jurusan }}</h3>
                </div>

            </div>

            <div class="riwayat p-5 bg-white rounded-lg mx-5">
                <header class="mb-5 text-xl font-bold">
                    <h3>RIWAYAT DOSA</h3>
                </header>

                @foreach ($nganu->aksi as $aksi)
                    <h1 class="my-2">{{ $aksi->kode_aksi }}</h1>
                    <table class=" w-full bg-slate-200 rounded-lg mb-5 text-left text-slate-700 ">
                        <thead class="text-white uppercase text-sm rounded-lg bg-slate-900">
                            <tr>
                                <th scope="col" class="px-6 rounded-tl-lg py-3">
                                    Kode Pelanggaran
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Pelanggaran
                                </th>
                                <th scope="col" class="px-6 rounded-tr-lg py-3">
                                    Keterangan
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($aksi->listPelanggaran as $test)
                                <tr class="bg-slate-100 md:text-base text-sm border-b rounded-xl">
                                    <td class="px-6 md:py-4 py-2">
                                        {{ $test->kode_pelanggaran }}
                                    </td>
                                    <td class="px-6 md:py-4 py-2">
                                        {{ $test->pelanggaran->nama_pelanggaran }}
                                    </td>
                                    <td class="px-6 md:py-4 py-2">
                                        {{ $test->keterangan }}
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @endforeach
            </div>
        </header>
    </div>

</body>

</html>
