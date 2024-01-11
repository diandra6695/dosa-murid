<x-header :page="$page" />
<div class="flex">

    <x-sidebar-admin :dataSidebar="$get_nis_from_cookie" :currentRoute="$nameRoute" />
    @if ($siswa !== null)
        <div class="bg-white shadow-xl rounded-xl p-4 container mt-3 ml-28 w-11/12 mb-5">
            <x-title />
            <div class="text-xl font-semibold py-3 px-4 bg-empat rounded-xl text-black mb-3">Update Siswa |
                {{ $siswa->nama }}
            </div>
            <div class="bg-base p-8 rounded-3xl">
                <div class="w-full flex justify-end ">
                    <a href="/students"
                        class=" flex items-center gap-4 mb-4 px-4 py-2 bg-gray-900 text-white rounded-lg hover:bg-gray-700 ">
                        <span class="material-symbols-outlined">
                            arrow_back
                        </span>Kembali</a>
                </div>

                <form action="{{ route('siswaAdminUpdateAction') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-4">
                        <label for="nama" class="block mb-2 text-lg font-medium">Nama Lengkap</label>
                        <input type="text" name="nama" id="nama" placeholder="Muhammad Rudi Adi Nugroho"
                            value="{{ $siswa->nama }}"
                            class="bg-white shadow border-none rounded-xl px-5 py-3 focus:empat-second focus:empat-second block w-full">
                    </div>
                    <div class="mb-4">
                        <label for="nisn" class="block mb-2 text-lg font-medium">NISN</label>
                        <input type="number" name="nisn" id="nisn" placeholder="9987757556"
                            value="{{ $siswa->nisn }}"
                            class="bg-white shadow border-none rounded-xl px-5 py-3 focus:empat-second focus:empat-second block w-full">
                    </div>
                    <div class="mb-4">
                        <label for="nis" class="block mb-2 text-lg font-medium">NIS</label>
                        <input type="number" name="nis" id="nis" placeholder="2269"
                            value="{{ $siswa->nis }}"
                            class="bg-white shadow border-none rounded-xl px-5 py-3 focus:empat-second focus:empat-second block w-full">
                    </div>
                    <div class="mb-4">
                        <label for="tanggal_lahir" class="block mb-2 text-lg font-medium">Tanggal Lahir</label>
                        <input type="date" name="tanggal_lahir" id="tanggal_lahir"
                            value="{{ $siswa->tanggal_lahir }}"
                            class="bg-white shadow border-none rounded-xl px-5 py-3 focus:empat-second focus:empat-second block w-full">
                    </div>

                    <div class="mb-4">
                        <label for="tempat_lahir" class="block mb-2 text-lg font-medium">Tempat Lahir</label>
                        <input type="text" name="tempat_lahir" id="tempat_lahir" placeholder="JEPARA"
                            value="{{ $siswa->tempat_lahir }}">
                    </div>
                    <div class="mb-5">
                        <label for="jenis_kelamin" class="block mb-2 text-lg font-medium">Jenis Kelamin</label>
                        <select id="jenis_kelamin" name="jenis_kelamin"
                            class="bg-white shadow border-none rounded-xl px-5 py-3 focus:empat-second focus:empat-second block w-full">
                            <option value="" disabled>--- PILIH JENIS KELAMIN ---</option>
                            <option value="L" @if ($siswa->jenis_kelamin == 'L') selected @endif>Laki-Laki</option>
                            <option value="P" @if ($siswa->jenis_kelamin == 'P') selected @endif>Perempuan</option>
                        </select>
                    </div>
                    <div class="mb-4">
                        <label for="alamat" class="block mb-2 text-lg font-medium">Alamat Siswa</label>
                        <input type="text" name="alamat" id="alamat" placeholder="JL. Srikandang Bangsri Jepara"
                            value="{{ $siswa->alamat }}"
                            class="bg-white shadow border-none rounded-xl px-5 py-3 focus:empat-second focus:empat-second block w-full">
                    </div>
                    <div class="mb-4">
                        <label for="nomor_telepon" class="block mb-2 text-lg font-medium">Nomor Telepon / WA Siswa
                        </label>
                        <input type="number" name="no_telepon" id="nomor_telepon" placeholder="083xxxxxxxxx"
                            value="{{ $siswa->no_telepon }}"
                            class="bg-white shadow border-none rounded-xl px-5 py-3 focus:empat-second focus:empat-second block w-full">
                    </div>
                    <div class="mb-4">
                        <label for="nomor_telepon_ortu" class="block mb-2 text-lg font-medium">Nomor Telepon / WA Orang
                            Tua
                            Siswa </label>
                        <input type="number" name="no_telepon_ortu" id="nomor_telepon_ortu" placeholder="083xxxxxxxxx"
                            value="{{ $siswa->no_telepon_ortu }}"
                            class="bg-white shadow border-none rounded-xl px-5 py-3 focus:empat-second focus:empat-second block w-full">
                    </div>
                    <div class="mb-4">
                        <label for="kode_kelas" class="block mb-2 text-lg font-medium">Kode Kelas</label>
                        <input type="text" name="kode_kelas" id="kode_kelas" placeholder="XIPPLG1"
                            value="{{ $siswa->kode_kelas }}"
                            class="bg-white shadow border-none rounded-xl px-5 py-3 focus:empat-second focus:empat-second block w-full">
                    </div>
                    <div class="mb-5">
                        <label for="kode_kelas" class="block mb-2 text-lg font-medium">Kelas</label>
                        <select id="kode_kelas" name="kode_kelas"
                            class="bg-white shadow border-none rounded-xl px-5 py-3 focus:empat-second focus:empat-second block w-full">
                            <option value="" disabled selected>--- PILIH KELAS ---</option>
                            @foreach ($kelas as $kela)
                                <option value="{{ $kela->kode_kelas }}"
                                    @if ($siswa->kode_kelas === $kela->kode_kelas) selected @endif>
                                    {{ $kela->nama_kelas }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-4">
                        <label for="profile" class="block mb-2 text-lg font-medium">Foto Siswa (jika tidak ingin
                            update abaikan)</label>
                        <input type="file" name="profile" id="profile"
                            class="bg-white shadow border-none rounded-xl px-5 py-3 focus:empat-second focus:empat-second block w-full">
                    </div>
                    <input type="hidden" name="profileOld" value="{{ $siswa->profile }}">
                    <input type="hidden" name="id" value="{{ $siswa->id }}">
                    <button type="submit"
                        class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 flex items-center gap-4"><span
                            class="material-symbols-outlined">
                            person_add
                        </span>Update</button>
                </form>
            @else
                <div class="text-xl w-full bg-slate-900 rounded-xl p-5 text-white text-center">..:: SISWA TIDAK
                    DITEMUKAN
                    ::..
                </div>
    @endif
</div>

</div>

</div>
<script>
    function deleteData(id) {
        Swal.fire({
            title: "Kamu Yakin ingin mengahapus?",
            showDenyButton: true,
            showCancelButton: false,
            confirmButtonText: "Hapus",
            denyButtonText: `Jangan Hapus`
        }).then((result) => {
            /* Read more about isConfirmed, isDenied below */
            if (result.isConfirmed) {
                axios.delete(`/teachers/${id}`);
                window.location.href = "/teachers"
            } else if (result.isDenied) {
                Swal.fire("Operasi digagalkan", "", "info");
            }
        });
    }
</script>
<x-footer />
