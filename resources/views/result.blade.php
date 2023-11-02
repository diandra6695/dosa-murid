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
        <div class="text-xl font-semibold py-3 px-4 bg-slate-900 rounded-xl text-white mb-3">NIS : {{ $nis }}
        </div>
        @if ($siswa == null)
            <div class="text-xl w-full bg-slate-900 rounded-xl p-5 text-white text-center">..:: SISWA TIDAK DITEMUKAN
                ::..
            </div>
        @else
            <div class="border p-5 rounded-xl border-slate-200">
                <div class="md:w-1/2 p-2">
                    <div class="grid text-base grid-cols-2 text-left font-semibold mb-3">
                        <h3 class="text-slate-500">Nama</h3>
                        <h3>{{ $siswa->nama }}</h3>
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
                <form action="{{ route('pelanggaran.store.aksi') }}" method="POST">
                    @csrf
                    <input type="hidden" name="nis" value="{{ $siswa->nis }}">
                    <div class="mb-4">
                        <label for="tanggal" class="block mb-2 text-lg font-medium">Tanggal</label>
                        <input type="date" name="tanggal" id="tanggal"
                            class="bg-gray-50 border border-gray-300 text-lg rounded-lg focus:ring-slate-500 focus:border-slate-500 block w-full p-2.5 ">
                    </div>


                    <div class="mb-4">
                        <label for="waktu" class="block mb-2 text-lg font-medium">Waktu</label>
                        <input type="time" name="waktu" id="waktu"
                            class="bg-gray-50 border border-gray-300 text-lg rounded-lg focus:ring-slate-500 focus:border-slate-500 block w-full p-2.5 ">
                    </div>

                    <div class="mb-4">
                        <label for="kode_bk" class="block mb-2 text-lg font-medium">Guru BK</label>
                        <select id="kode_bk" name="kode_bk"
                            class="bg-gray-50 border border-gray-300  text-lg rounded-lg focus:ring-slate-500 focus:border-slate-500 block w-full p-2.5 ">
                            <option value="" disabled selected>--- PILIH GURU BK ---</option>
                            @foreach ($guruBK as $bk)
                                <option value="{{ $bk->kode_bk }}">{{ $bk->nama }}</option>
                            @endforeach
                        </select>
                    </div>

                    <button type="submit"
                        class="text-white bg-slate-900 hover:bg-slate-950 focus:ring-4 focus:outline-none focus:ring-slate-300 font-medium rounded-lg text-md px-5 py-2.5 text-center ">Catat
                        Pelanggaran</button>
                </form>

            </div>
        @endif
    </div>

</body>

</html>
