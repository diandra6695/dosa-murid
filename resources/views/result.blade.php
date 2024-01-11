<x-header :page="$page" />
<div class="flex">
    @if ($siswa !== null)
        <x-sidebar-admin :dataSidebar="$get_nis_from_cookie" :currentRoute="$nameRoute" />
    @endif
    <div class="bg-white shadow-xl rounded-xl p-4 container mt-3 ml-28 w-11/12 mb-5">
        <x-title />
        <div class="text-xl font-semibold py-3 px-4 bg-empat rounded-xl text-black mb-3">NIS : {{ $nis }}
        </div>
        @if ($siswa == null)
            <div class="text-xl w-full bg-slate-900 rounded-xl p-5 text-white text-center">..:: SISWA TIDAK DITEMUKAN
                ::..
            </div>
        @else
            <div class="bg-base p-8 rounded-3xl">
                <div class="md:w-1/2 p-2">
                    <div class="grid  grid-cols-2 text-left font-semibold mb-3">
                        <h3 class="font-normal">Nama</h3>
                        <h3>{{ $siswa->nama }}</h3>
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
                <form action="{{ route('pelanggaran.store.aksi') }}" method="POST">
                    @csrf
                    <input type="hidden" name="nis" value="{{ $siswa->nis }}">
                    <div class="mb-4">
                        <label for="tanggal" class="block mb-2 text-lg font-medium">Tanggal</label>
                        <input type="date" name="tanggal" id="tanggal"
                            class="bg-white shadow border-none rounded-xl px-5 py-3 focus:empat-second focus:empat-second block w-full">
                    </div>


                    <div class="mb-4">
                        <label for="waktu" class="block mb-2 text-lg font-medium">Waktu</label>
                        <input type="time" name="waktu" id="waktu"
                            class="bg-white shadow border-none rounded-xl px-5 py-3 focus:empat-second focus:empat-second block w-full">
                    </div>

                    <div class="mb-5">
                        <label for="kode_bk" class="block mb-2 text-lg font-medium">Guru</label>
                        <select id="kode_bk" name="kode_bk"
                            class="bg-white shadow border-none rounded-xl px-5 py-3 focus:empat-second focus:empat-second block w-full">
                            <option value="" disabled selected>--- PILIH GURU BK ---</option>
                            @foreach ($guruBK as $bk)
                                <option value="{{ $bk->kode_bk }}">{{ $bk->nama }}</option>
                            @endforeach
                        </select>
                    </div>

                    <button type="submit"
                        class="text-white bg-black hover:bg-slate-950 focus:ring-4 focus:outline-none focus:ring-slate-300 font-medium rounded-lg text-md px-5 py-2.5 text-center ">Catat
                        Pelanggaran</button>
                </form>

            </div>
        @endif
    </div>

</div>
<x-footer />
