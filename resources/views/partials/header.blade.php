<header class="bg-slate-700 text-neutral-50 py-3 px-10">
    <div class="flex justify-between items-center">
        <div class="bg-neutral-50 p-5 rounded-2xl">
            <p class="text-black font-bold">LOGO</p>
        </div>
        <nav>
            <ul class="flex gap-4">
                <li>
                    <a href="{{ route('home') }}">Home</a>
                </li>

                <li>
                    <a href="{{ route('favorites.index') }}">Preferiti</a>
                </li>


            </ul>
        </nav>

    </div>
</header>
