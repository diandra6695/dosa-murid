<x-header :page="$page" />

<section class="w-screen h-screen flex justify-center items-center">
    <div class="bg-base flex justify-center items-center p-8 h-2/3 md:w-1/3 rounded-3xl shadow-xl">
        <div class="">

            <div class="text-2xl text-center mb-2 font-bold">Dosa-Murid</div>
            <div class="text-md text-center mb-6">Sistem pencatatan pelanggaran siswa</div>

            <div class="text-sm my-3 ml-1">Cari tahu status Pelanggran Anda di bawah</div>
            <form action="{{ route('verif') }}" class="w-full">
                <select id="role" name="role"
                    class="bg-white shadow border-none rounded-xl px-5 py-3 focus:empat-second focus:empat-second block w-full">
                    <option value="" disabled selected>Pilih tipe pengguna</option>
                    <option value="admin">admin</option>
                    <option value="guruBK">guru BK</option>
                    <option value="siswa">siswa</option>
                </select>
                <button type="submit"
                    class="px-5 w-full py-3 mb-3 text-md font-medium text-center text-white mt-5 bg-second shadow rounded-3xl focus:outline-none">Lanjut</button>
            </form>
            <footer class="text-center text-xs text-gray-500 mt-10">
                <p class="">PT. Bogeng Media Prima <span class="text-red-400">X</span> Tefa Studio</p>
            </footer>
        </div>
    </div>

</section>

<x-footer />
