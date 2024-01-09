<x-header :page="$page" />
<div class="flex">

    <div class="side-bar fixed bg-black border  p-5 mx-4 my-3 rounded-3xl">
        <div class="logo flex gap-2 justify-center w-full">
            <img class="w-10 rounded-xl" src="{{ asset('img/logo.png') }}" alt="">
        </div>
        <div class="navigation flex flex-col gap-56 mb-3 ">
            <ul>
                <li class="rounded-2xl  text-white p-3">
                    <a class="" href="{{ route('home') }}"><span class="text-3xl material-symbols-outlined">
                            home
                        </span></a>
                </li>
                <li class="rounded-2xl  text-white p-3">
                    <a class="" href="{{ route('result') }}?nis="><span
                            class="text-3xl material-symbols-outlined">
                            note_alt
                        </span></a>
                </li>
                <li class="rounded-2xl  text-white p-3">
                    <a class="" href="{{ route('result') }}?nis="><span
                            class="text-3xl material-symbols-outlined">
                            format_list_bulleted
                        </span></a>
                </li>
                <li class="rounded-2xl  text-white p-3">
                    <a class="" href="{{ route('result') }}?nis="><span
                            class="text-3xl material-symbols-outlined">
                            receipt_long
                        </span></a>
                </li>
                <li class="rounded-2xl  text-white p-3">
                    <a class="" href="/teachers"><span class="text-3xl material-symbols-outlined active ">
                            account_circle
                        </span></a>
                </li>
            </ul>
            <li class="rounded-2xl list-none  text-white p-3">
                <form action="{{ route('logout') }}" method="post">
                    @csrf
                    <button type="submit" value="1" class="text-3xl material-symbols-outlined">Logout</button>
                </form>
            </li>

        </div>
    </div>

    <div class="bg-white shadow-xl rounded-xl p-4 container mt-3 ml-28 w-11/12 mb-5">
        <x-title />
        <div class="text-xl font-semibold py-3 px-4 bg-empat rounded-xl text-black mb-3">Tambah Guru
        </div>
        <div class="bg-base p-8 rounded-3xl">
            <div class="w-full flex justify-end ">
                <a href="/teachers"
                    class=" flex items-center gap-4 mb-4 px-4 py-2 bg-gray-900 text-white rounded-lg hover:bg-gray-700 ">
                    <span class="material-symbols-outlined">
                        arrow_back
                    </span>Kembali</a>
            </div>
            <form action="/teachers" method="post">
                @csrf
                <div class="mb-4">
                    <label for="nama_guru" class="block mb-2 text-lg font-medium">Nama Lengkap</label>
                    <input type="text" name="nama" id="nama_gueu" placeholder="Gabriel Anatasya, S.Pd"
                        class="bg-white shadow border-none rounded-xl px-5 py-3 focus:empat-second focus:empat-second block w-full">
                </div>
                <div class="mb-4">
                    <label for="nip" class="block mb-2 text-lg font-medium">NIP</label>
                    <input type="number" name="nip" id="nip" placeholder="9987757556"
                        class="bg-white shadow border-none rounded-xl px-5 py-3 focus:empat-second focus:empat-second block w-full">
                </div>
                <div class="mb-4">
                    <label for="alamat" class="block mb-2 text-lg font-medium">Alamat</label>
                    <input type="text" name="alamat" id="alamat"
                        placeholder="Jl. KH Achmad Fauzan No.17, Krasak, Bangsri, Kec. Bangsri, Kabupaten Jepara, Jawa Tengah 59415"
                        class="bg-white shadow border-none rounded-xl px-5 py-3 focus:empat-second focus:empat-second block w-full">
                </div>
                <div class="mb-4">
                    <label for="nomor_telepon" class="block mb-2 text-lg font-medium">Nomor Telepon / WA </label>
                    <input type="text" name="nomor_telepon" id="nomor_telepon" placeholder="083xxxxxxxxx"
                        class="bg-white shadow border-none rounded-xl px-5 py-3 focus:empat-second focus:empat-second block w-full">
                </div>
                <div class="mb-4">
                    <label for="kode_bk" class="block mb-2 text-lg font-medium">Kode Guru</label>
                    <input type="text" name="kode_bk" id="kode_bk" placeholder="BK9865656"
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
