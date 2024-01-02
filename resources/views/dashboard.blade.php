    <x-header />
    @if ($siswa == null)
        <div class="text-xl w-full bg-slate-900 rounded-xl p-5 text-white text-center">..:: SISWA TIDAK DITEMUKAN
            ::..
        </div>
    @else
        @php
            $test = app('App\Http\Controllers\SiswaController')->totalPoint($siswa->nis);
        @endphp

        <div class="flex">

            <div class="side-bar fixed bg-black border  p-5 mx-4 my-3 rounded-3xl">
                <div class="logo flex gap-2 items-center">
                    <img class="w-10" src="{{ asset('img/logo.png') }}" alt="">
                </div>
                <div class="navigation flex flex-col gap-56 mb-3 ">
                    <ul>
                        <li class="rounded-2xl  text-white p-3">
                            <a class="" href="{{ route('dashboard') }}?nis={{ $siswa->nis }}"><span
                                    class="text-3xl material-symbols-outlined">
                                    home
                                </span></a>
                        </li>
                        <li class="rounded-2xl  text-white p-3">
                            <a class="" href="{{ route('result') }}?nis={{ $siswa->nis }}"><span
                                    class="text-3xl material-symbols-outlined">
                                    note_alt
                                </span></a>
                        </li>
                        <li class="rounded-2xl  text-white p-3">
                            <a class="" href="{{ route('result') }}?nis={{ $siswa->nis }}"><span
                                    class="text-3xl material-symbols-outlined">
                                    format_list_bulleted
                                </span></a>
                        </li>
                        <li class="rounded-2xl  text-white p-3">
                            <a class="" href="{{ route('result') }}?nis={{ $siswa->nis }}"><span
                                    class="text-3xl material-symbols-outlined">
                                    receipt_long
                                </span></a>
                        </li>
                    </ul>
                    <li class="rounded-2xl list-none  text-white p-3">
                        <a class="" href="{{ route('result') }}?nis={{ $siswa->nis }}"><span
                                class="text-3xl material-symbols-outlined">
                                logout
                            </span></a>
                    </li>

                </div>
            </div>

            <header class=" container mt-3 ml-28 w-11/12">

                <div class="ml-5">
                    <x-title />
                </div>
                <div class="profile bg-base rounded-3xl mb-5 mx-5 p-8">
                    <header class=" text-xl font-bold">
                        <h3>PROFILE</h3>
                    </header>
                    <div class=" overflow-x-auto text-black sm:rounded-lg p-5">
                        <div class="mb-5 flex items-center gap-5 ">
                            <img class="w-1/12" src="{{ asset('img/' . $siswa->profile) }}"
                                alt="INI FOTO PROFILE YA GES YAK">
                            <div class="text-left mt-5 font-semibold mb-3">
                                <h3>{{ $siswa->nama }}</h3>
                                <h3 class="text-second">{{ $test }} Poin</h3>
                            </div>
                        </div>
                        <div class="grid text-black grid-cols-2 text-left font-semibold mb-3">
                            <h3 class="font-normal">NIS</h3>
                            <h3 class="text-black"> {{ $siswa->nis }}</h3>
                        </div>
                        <div class="grid text-black grid-cols-2 text-left font-semibold mb-3">
                            <h3 class="font-normal">NISN</h3>
                            <h3>{{ $siswa->nisn }}</h3>
                        </div>
                        <div class="grid text-black grid-cols-2 text-left font-semibold mb-3">
                            <h3 class="font-normal">Kelas</h3>
                            <h3>{{ $siswa->kelas->nama_kelas }}</h3>
                        </div>
                        <div class="grid text-black grid-cols-2 text-left font-semibold mb-3">
                            <h3 class="font-normal">Jurusan</h3>
                            <h3>{{ $siswa->kelas->jurusan->nama_jurusan }}</h3>
                        </div>
                    </div>

                </div>

                <div class="riwayat p-8 bg-base rounded-3xl mx-5">
                    <header class="mb-5 text-xl font-bold">
                        <h3 class="font-poppins">RIWAYAT DOSA</h3>
                    </header>

                    @foreach ($nganu->aksi as $aksi)
                        <div class="relative mb-5 overflow-x-auto shadow sm:rounded-3xl">
                            <table class="w-full  text-sm text-left text-gray-500 ">
                                <caption class="p-5 text-lg font-semibold text-left text-gray-900 bg-white ">
                                    {{ $aksi->kode_aksi }}
                                    <p class="mt-1 text-sm font-normal text-gray-500 ">Pelanggaran
                                        Dilakukan Pada
                                        Tanggal {{ $aksi->tanggal }}, Jam {{ $aksi->waktu }}. dicatat oleh
                                        {{ $aksi->guruBK->nama }}</p>
                                </caption>
                                <thead class="text-xs text-gray-700 uppercase bg-gray-50 ">
                                    <tr>
                                        <th scope="col" class="px-6 py-3">
                                            Kode Pelanggaran
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            Pelanggaran
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            Keteranagan
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($aksi->listPelanggaran as $test)
                                        <tr class="bg-white border-b 700">
                                            <th scope="row"
                                                class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap ">
                                                {{ $test->kode_pelanggaran }}
                                            </th>
                                            <td class="px-6 py-4">
                                                {{ $test->pelanggaran->nama_pelanggaran }}
                                            </td>
                                            <td class="px-6 py-4">
                                                {{ $test->keterangan }}
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @endforeach
                </div>
            </header>
        </div>
    @endif

    <x-footer />
