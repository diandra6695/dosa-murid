<x-header :page="$page" />

<section class="w-screen h-screen flex justify-center items-center">
    <div class="bg-base flex justify-center items-center p-8 h-2/3 md:w-1/3 rounded-3xl shadow-xl">
        <div class="">

            <div class="text-2xl text-center mb-2 font-bold">Dosa-Murid</div>
            <div class="text-md text-center mb-6">Sistem pencatatan pelanggaran siswa</div>

            <div class="text-sm my-3 ml-1">Login sebagai GuruBK / Admin</div>
            <form action="{{ route('adminLoginAction') }}" class="w-full" method="POST">
                @csrf
                <div class="flex flex-wrap justify-center">
                    <input type="email" id="email" name="email" placeholder="Email" required
                        class="block w-full mb-3 p-4 text-gray-900 border-none rounded-3xl shadow bg-white sm:text-md focus:ring-blue-500 focus:border-blue-500 ">

                    <input type="password" id="password" name="password" placeholder="password" required
                        class="block w-full mb-3 p-4 text-gray-900 border-none rounded-3xl shadow bg-white sm:text-md focus:ring-blue-500 focus:border-blue-500 ">

                    <button type="submit"
                        class="px-5 w-full py-3 mb-3 text-md font-medium text-center text-white bg-second shadow rounded-3xl focus:outline-none">Masuk</button>
                </div>
            </form>
            <footer class="text-center text-xs text-gray-500 mt-10">
                <a href="http://real.bogeng.skom.id" class="hover:underline hover:text-blue-200">PT. Bogeng Media
                    Prima</a> <span class="text-red-400">X</span> <a href="http://tefa-studio.com"
                    class="hover:underline hover:text-blue-200">Tefa Studio</a>
            </footer>
        </div>
    </div>

</section>

<x-footer />
