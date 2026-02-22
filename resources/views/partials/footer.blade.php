<footer class="bg-gray-950 text-neutral-50 py-3 px-3 sm:px-10">
    <div class="flex flex-col min-[450px]:flex-row min-[450px]:justify-between gap-10 items-center">

        <nav>
            <h5 class="mb-2 font-bold">Link Utili</h5>
            <ul class="text-xs space-y-1">
                <li class="opacity-70 hover:underline hover:opacity-100">
                    <a href="https://www.iucnredlist.org/" target="_blank">SitoWeb IUCN</a>
                </li>
                <li class="opacity-70 hover:underline hover:opacity-100">
                    <a href="{{ route('home') }}">Home</a>
                </li>
                <li class="opacity-70 hover:underline hover:opacity-100">
                    <a href="{{ route('favorites.index') }}">Preferiti</a>
                </li>

            </ul>
        </nav>

        {{-- logo --}}
        <a href="{{ route('home') }}" class="bg-red-700 p-1 rounded-lg w-22 h-22">
            <img src="{{ asset('images/iucn-redlist-explorer-logo.png') }}" alt="logo IUCN RedList Explorer">
        </a>

        <div>
            <ul class="text-xs space-y-1">
                <li>Versione API: {{ $footerData['apiVersion'] }}</li>
                <li>Versione Red List: {{ $footerData['redListVersion'] }}</li>
                <li>Specie Censite: {{ $footerData['speciesCount'] }}</li>

            </ul>
        </div>

    </div>
</footer>
