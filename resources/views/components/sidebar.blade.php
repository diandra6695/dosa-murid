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
