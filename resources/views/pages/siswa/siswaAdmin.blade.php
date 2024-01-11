<x-header :page="$page" />
<div class="flex">

    <x-sidebar-admin :dataSidebar="$get_nis_from_cookie" :currentRoute="$nameRoute" />

    <div class="bg-white shadow-xl rounded-xl p-4 container mt-3 ml-28 w-11/12 mb-5">
        <x-title />
        <div class="text-xl font-semibold py-3 px-4 bg-empat rounded-xl text-black mb-3">List Siswa
        </div>
        <div class="bg-base p-8 rounded-3xl">
            <div class="w-full flex justify-end ">
                <a href="/students/create"
                    class=" flex items-center gap-4 mb-4 px-4 py-2 bg-gray-900 text-white rounded-lg hover:bg-gray-700 ">
                    <span class="material-symbols-outlined">
                        person_add
                    </span>Tambah Siswa</a>
            </div>
            @if (session('message'))
                <div id="toast-success"
                    class="flex items-center w-full max-w-xs p-4 mb-4 text-gray-500 bg-white rounded-lg shadow dark:text-gray-400 dark:bg-gray-800"
                    role="alert">
                    <div
                        class="inline-flex items-center justify-center flex-shrink-0 w-8 h-8 text-green-500 bg-green-100 rounded-lg dark:bg-green-800 dark:text-green-200">
                        <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                            viewBox="0 0 20 20">
                            <path
                                d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 8.207-4 4a1 1 0 0 1-1.414 0l-2-2a1 1 0 0 1 1.414-1.414L9 10.586l3.293-3.293a1 1 0 0 1 1.414 1.414Z" />
                        </svg>
                        <span class="sr-only">Check icon</span>
                    </div>
                    <div class="ms-3 text-sm font-normal"> {{ session('message') }}</div>
                    <button type="button"
                        class="ms-auto -mx-1.5 -my-1.5 bg-white text-gray-400 hover:text-gray-900 rounded-lg focus:ring-2 focus:ring-gray-300 p-1.5 hover:bg-gray-100 inline-flex items-center justify-center h-8 w-8 dark:text-gray-500 dark:hover:text-white dark:bg-gray-800 dark:hover:bg-gray-700"
                        data-dismiss-target="#toast-success" aria-label="Close">
                        <span class="sr-only">Close</span>
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                        </svg>
                    </button>
                </div>
            @endif
            <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="px-6 py-3">
                                Gambar
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Nama
                            </th>
                            <th scope="col" class="px-6 py-3">
                                NISN
                            </th>
                            <th scope="col" class="px-6 py-3">
                                NIS
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Kelas
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Aksi
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($siswas as $siswa)
                            <tr
                                class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                                <th scope="row"
                                    class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    {{-- {{ $siswa->profile }} --}}
                                    <img src="{{ Storage::url($siswa->profile) }}" alt="" srcset=""
                                        class="w-16 h-16 aspect-square object-cover ">
                                </th>
                                <td class="px-6 py-4">
                                    {{ $siswa->nama }}
                                </td>
                                <td class="px-6 py-4">
                                    {{ $siswa->nisn }}
                                </td>
                                <td class="px-6 py-4">
                                    {{ $siswa->nis }}
                                </td>
                                <td class="px-6 py-4">
                                    {{ $siswa->kelas->nama_kelas }}
                                </td>
                                <td class="px-6 py-4">
                                    <a href="/students/{{ $siswa->id }}"
                                        class="px-4 py-2 rounded-lg bg-green-600 hover:bg-green-400 text-white font-bold ">Edit</a>
                                    <button onclick="deleteData({{ $siswa->id }})"
                                        class="px-4 py-2 rounded-lg bg-red-600 hover:bg-red-400 text-white font-bold ">
                                        Hapus
                                    </button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                {{ $siswas->links() }}
            </div>


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
                axios.delete(`/students/${id}`);
                setTimeout(() => {

                    window.location.href = "/students"
                }, 1000);
            } else if (result.isDenied) {
                Swal.fire("Operasi digagalkan", "", "info");
            }
        });
    }
</script>
<x-footer />
