<x-header :page="$page" />

<section class="w-screen h-screen flex justify-center items-center">
    <div class="bg-base flex justify-center items-center p-8 h-2/3 md:w-1/3 rounded-3xl shadow-xl">
        <div class="">

            <div class="text-2xl text-center mb-2 font-bold">Dosa-Murid</div>
            <div class="text-md text-center mb-6">Sistem pencatatan pelanggaran siswa</div>
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
            <div class="text-sm my-3 ml-1">Masukkan NIS kamu.</div>
            <form action="{{ route('dashboard') }}" class="w-full">
                <div class="flex flex-wrap justify-center">
                    <input type="number" id="nis" name="nis" placeholder="NIS" required
                        class="block w-full mb-3 p-4 text-gray-900 border-none rounded-3xl shadow bg-white sm:text-md focus:ring-blue-500 focus:border-blue-500 ">
                    <button type="submit"
                        class="px-5 w-full py-3 mb-3 text-md font-medium text-center text-white bg-second shadow rounded-3xl focus:outline-none">Cari</button>
                </div>
            </form>
            <footer class="text-center text-xs text-gray-500 mt-10">
                <p class="">PT. Bogeng Media Prima <span class="text-red-400">X</span> Tefa Studio</p>
            </footer>
        </div>
    </div>

</section>

<x-footer />
