<div class="side-bar fixed bg-black border  p-5 mx-4 my-3 rounded-3xl">
    <div class="logo flex gap-2 justify-center w-full">
        <img class="w-10 rounded-xl" src="{{ asset('img/logo.png') }}" alt="">
    </div>
    <div class="navigation flex flex-col gap-56 mb-3 ">
        <ul>
            <li class="rounded-2xl  text-white p-3">
                <a class="" href="{{ route('home') }}/search"><span class="text-3xl material-symbols-outlined">
                        home
                    </span></a>
            </li>
            <li class="rounded-2xl  text-white p-3">
                <a class="" href="{{ route('result') }}?nis={{ $dataSidebar }}"><span
                        class="text-3xl material-symbols-outlined  @if ($currentRoute == 'result') active @endif">
                        note_alt
                    </span></a>
            </li>
            <li class="rounded-2xl  text-white p-3">
                <a class="" href="/listpelanggaran/{{ $dataSidebar }}"><span
                        class="text-3xl material-symbols-outlined">
                        receipt_long
                    </span></a>
            </li>
            <li class="rounded-2xl  text-white p-3">
                <a class="" href="/teachers"><span
                        class="text-3xl material-symbols-outlined @if ($currentRoute == 'teachers.index') active @elseif($currentRoute == 'teachers.create') active @endif">
                        account_circle
                    </span></a>
            </li>
            <li class="rounded-2xl  text-white p-3">
                <a class="" href="/students"><span
                        class="material-symbols-outlined  @if ($currentRoute == 'siswaAdmin') active @elseif($currentRoute == 'siswaAdminAdd') active @endif">
                        group
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
