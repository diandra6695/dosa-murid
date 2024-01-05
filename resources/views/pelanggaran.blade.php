<x-header :page="$page" />
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

    <div class="p-4 container mt-3 ml-28 w-11/12 mb-5">
        <x-title />
        <div class="text-xl font-semibold py-3 px-4 bg-empat rounded-xl text-black mb-3">Kode Aksi
            Pelanggaran :
            {{ $kode_aksi }}</div>
        @if ($aksi == null)
            <div class="text-xl w-full bg-slate-900 rounded-xl p-5 text-white text-center">..:: AKSI TIDAK
                DITEMUKAN
                ::..
            </div>
        @else
            <div class="bg-base p-8 rounded-3xl ">
                <div class="md:w-1/2 mb-5 p-2">
                    <div class="grid text-sm grid-cols-2 text-left font-semibold mb-3">
                        <h3 class="font-normal">Nama</h3>
                        <h3>{{ $siswa->nama }}</h3>
                    </div>
                    <div class="grid text-sm grid-cols-2 text-left font-semibold mb-3">
                        <h3 class="font-normal">NISN</h3>
                        <h3>{{ $siswa->nisn }}</h3>
                    </div>
                    <div class="grid text-sm grid-cols-2 text-left font-semibold mb-3">
                        <h3 class="font-normal">Kelas</h3>
                        <h3>{{ $siswa->kelas->nama_kelas }}</h3>
                    </div>
                    <div class="grid text-sm grid-cols-2 text-left font-semibold mb-3">
                        <h3 class="font-normal">Jurusan</h3>
                        <h3>{{ $siswa->kelas->jurusan->nama_jurusan }}</h3>
                    </div>
                    <div class="grid text-sm grid-cols-2 text-left font-semibold mb-3">
                        <h3 class="font-normal">Alamat</h3>
                        <h3>{{ $siswa->alamat }}</h3>
                    </div>
                    <div class="grid text-sm grid-cols-2 text-left font-semibold mb-3">
                        <h3 class="font-normal">Tanggal</h3>
                        <h3>{{ $aksi->tanggal }}</h3>
                    </div>
                    <div class="grid text-sm grid-cols-2 text-left font-semibold mb-3">
                        <h3 class="font-normal">Waktu</h3>
                        <h3>{{ $aksi->waktu }}</h3>
                    </div>
                    <div class=" grid text-sm grid-cols-2 text-left font-semibold">
                        <h3 class="font-normal">Guru BK</h3>
                        <h3>{{ $aksi->guruBK->nama }}</h3>
                    </div>
                </div>

                <form action="{{ route('pelanggaran.add.aksi', $kode_aksi) }}" method="POST">
                    @csrf
                    <div class="mb-4">
                        <label for="kode_pelanggaran" class="block mb-2 text-lg font-medium">Pelanggaran</label>
                        <select id="kode_pelanggaran" name="kode_pelanggaran"
                            class="bg-white shadow border-none rounded-xl px-5 py-3 focus:empat-second focus:empat-second block w-full">
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
                            class="bg-white shadow border-none rounded-xl px-5 py-3 focus:empat-second focus:empat-second block w-full">
                    </div>

                    <button type="submit"
                        class="text-white bg-black focus:ring-4 focus:outline-none focus:ring-empat font-medium rounded-lg text-md px-5 py-2.5 text-center ">Tambah
                        Pelanggaran</button>
                </form>



                <div class="relative mt-10 overflow-x-auto">
                    <table class="md:w-full w-[50rem] bg-slate-200 rounded-lg text-left text-slate-700 ">
                        <thead class="text-white uppercase md:text-base text-sm rounded-lg bg-black">
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
                                <tr class="bg-slate-100 text-black md:text-base text-sm border-b rounded-xl">
                                    <td class="px-6 text-black md:py-4 py-2">
                                        {{ $pelanggaran->kode_pelanggaran }}
                                    </td>
                                    <td class="px-6 text-black md:py-4 py-2">
                                        {{ $pelanggaran->pelanggaran->nama_pelanggaran }}
                                    </td>
                                    <td class="px-6 text-black md:py-4 py-2">
                                        {{ $pelanggaran->keterangan }}
                                    </td>
                                    <td class="px-6 text-black md:py-4 py-2">
                                        <form action="{{ route('pelanggaran.remove.aksi', $kode_aksi) }}"
                                            method="POST">
                                            @csrf
                                            <input type="hidden" name="id_list" value="{{ $pelanggaran->id }}">
                                            <button type="submit"
                                                class="focus:outline-none text-white bg-black transition  focus:ring-4 focus:ring-slate-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2">Hapus</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <form class="mt-5" action="{{ route('pelanggaran.print') }}" method="POST">
                        @csrf
                        <input type="hidden" name="kode_aksi" value="{{ $kode_aksi }}">
                        <button type="submit"
                            class="text-white bg-black focus:ring-4 focus:outline-none focus:ring-empat font-medium rounded-lg text-md px-5 py-2.5 text-center ">Cetak</button>
                    </form>
                </div>
            </div>
        @endif
    </div>

</div>
<x-footer />
