<x-header :page="$page" />
<div class="flex">

    <x-sidebar-admin :dataSidebar="$get_nis_from_cookie" :currentRoute="$nameRoute" />

    <div class="bg-white shadow-xl rounded-xl p-4 container mt-3 ml-28 w-11/12 mb-5">
        <x-title />
        <div class="text-xl font-semibold py-3 px-4 bg-empat rounded-xl text-black mb-3">Tambah Siswa
        </div>
        <div class="bg-base p-8 rounded-3xl">
            <div class="w-full flex justify-end ">
                <a href="/students"
                    class=" flex items-center gap-4 mb-4 px-4 py-2 bg-gray-900 text-white rounded-lg hover:bg-gray-700 ">
                    <span class="material-symbols-outlined">
                        arrow_back
                    </span>Kembali</a>
            </div>
            <form action="{{ route('siswaAdminAction') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="mb-4">
                    <label for="nama" class="block mb-2 text-lg font-medium">Nama Lengkap</label>
                    <input type="text" name="nama" id="nama" placeholder="Muhammad Rudi Adi Nugroho"
                        class="bg-white shadow border-none rounded-xl px-5 py-3 focus:empat-second focus:empat-second block w-full">
                </div>
                <div class="mb-4">
                    <label for="nisn" class="block mb-2 text-lg font-medium">NISN</label>
                    <input type="number" name="nisn" id="nisn" placeholder="9987757556"
                        class="bg-white shadow border-none rounded-xl px-5 py-3 focus:empat-second focus:empat-second block w-full">
                </div>
                <div class="mb-4">
                    <label for="nis" class="block mb-2 text-lg font-medium">NIS</label>
                    <input type="number" name="nis" id="nis" placeholder="2269"
                        class="bg-white shadow border-none rounded-xl px-5 py-3 focus:empat-second focus:empat-second block w-full">
                </div>
                <div class="mb-4">
                    <label for="tanggal_lahir" class="block mb-2 text-lg font-medium">Tanggal Lahir</label>
                    <input type="date" name="tanggal_lahir" id="tanggal_lahir"
                        class="bg-white shadow border-none rounded-xl px-5 py-3 focus:empat-second focus:empat-second block w-full">
                </div>

                <div class="mb-4">
                    <label for="tempat_lahir" class="block mb-2 text-lg font-medium">Tempat Lahir</label>
                    <input type="text" name="tempat_lahir" id="tempat_lahir" placeholder="JEPARA">
                </div>
                <div class="mb-5">
                    <label for="jenis_kelamin" class="block mb-2 text-lg font-medium">Jenis Kelamin</label>
                    <select id="jenis_kelamin" name="jenis_kelamin"
                        class="bg-white shadow border-none rounded-xl px-5 py-3 focus:empat-second focus:empat-second block w-full">
                        <option value="" disabled selected>--- PILIH JENIS KELAMIN ---</option>
                        <option value="L">Laki-Laki</option>
                        <option value="P">Perempuan</option>
                    </select>
                </div>
                <div class="mb-4">
                    <label for="alamat" class="block mb-2 text-lg font-medium">Alamat Siswa</label>
                    <input type="text" name="alamat" id="alamat" placeholder="JL. Srikandang Bangsri Jepara"
                        class="bg-white shadow border-none rounded-xl px-5 py-3 focus:empat-second focus:empat-second block w-full">
                </div>
                <div class="mb-4">
                    <label for="nomor_telepon" class="block mb-2 text-lg font-medium">Nomor Telepon / WA Siswa </label>
                    <input type="number" name="no_telepon" id="nomor_telepon" placeholder="083xxxxxxxxx"
                        class="bg-white shadow border-none rounded-xl px-5 py-3 focus:empat-second focus:empat-second block w-full">
                </div>
                <div class="mb-4">
                    <label for="nomor_telepon_ortu" class="block mb-2 text-lg font-medium">Nomor Telepon / WA Orang Tua
                        Siswa </label>
                    <input type="number" name="no_telepon_ortu" id="nomor_telepon_ortu" placeholder="083xxxxxxxxx"
                        class="bg-white shadow border-none rounded-xl px-5 py-3 focus:empat-second focus:empat-second block w-full">
                </div>

                <div class="mb-5">
                    <label for="kode_kelas" class="block mb-2 text-lg font-medium">Kelas</label>
                    <select id="kode_kelas" name="kode_kelas"
                        class="bg-white shadow border-none rounded-xl px-5 py-3 focus:empat-second focus:empat-second block w-full">
                        <option value="" disabled selected>--- PILIH KELAS ---</option>
                        @foreach ($kelas as $kela)
                            <option value="{{ $kela->kode_kelas }}">{{ $kela->nama_kelas }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-4">
                    <label for="profile" class="block mb-2 text-lg font-medium">Foto Siswa</label>
                    <input type="file" name="profile" id="profile"
                        class="bg-white shadow border-none rounded-xl px-5 py-3 focus:empat-second focus:empat-second block w-full">
                </div>
                <button type="submit"
                    class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 flex items-center gap-4"><span
                        class="material-symbols-outlined">
                        person_add
                    </span>Tambah</button>
            </form>
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
