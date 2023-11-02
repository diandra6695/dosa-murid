<x-header />

<section class="w-screen h-screen relative">
    <img src="{{ asset('img/test.jpg') }}" alt="test" class="w-full h-full object-cover">
    <div class="absolute top-0 left-0 w-screen h-screen bg-black bg-opacity-40 text-center">
        <div class="container mx-auto px-4 h-full flex flex-col justify-center items-center">
            <div class="text-4xl font-bold text-white mb-3">{{ config('app.name', 'Laravel') }}</div>
            <div class="text-xl text-gray-200 mb-6">Masukin NIS Kamu Dulu Ya...</div>
            <form action="{{ route('dashboard') }}" class="w-full">
                <div class="flex flex-wrap justify-center">
                    <input type="text" id="nis" name="nis" placeholder="NIS" required
                        class="block w-full max-w-md mb-3 mx-4 p-4 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 sm:text-md focus:ring-blue-500 focus:border-blue-500 ">
                    <button type="submit"
                        class="px-5 py-3 mb-3 text-xl font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300">Cari</button>
                </div>
            </form>
        </div>
    </div>

</section>

<x-footer />
