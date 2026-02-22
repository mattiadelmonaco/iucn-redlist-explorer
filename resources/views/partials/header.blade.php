<header class="bg-red-900 text-neutral-50 py-2 px-3 xl:px-25">
    <div class="flex justify-between items-center">

        {{-- logo --}}
        <a href="{{ route('home') }}" class="bg-red-700 p-1 rounded-lg w-14 h-14">
            <img src="{{ asset('images/iucn-redlist-explorer-logo.png') }}" alt="logo IUCN RedList Explorer">
        </a>

        <nav>
            <ul class="flex gap-3 sm:gap-8">
                <li>
                    <a href="{{ route('home') }}"
                        class="flex gap-2 text-md items-center rounded px-2 py-1 hover:bg-red-700 hover:scale-105 transition-all duration-200">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6">
                            <path
                                d="M11.47 3.841a.75.75 0 0 1 1.06 0l8.69 8.69a.75.75 0 1 0 1.06-1.061l-8.689-8.69a2.25 2.25 0 0 0-3.182 0l-8.69 8.69a.75.75 0 1 0 1.061 1.06l8.69-8.689Z" />
                            <path
                                d="m12 5.432 8.159 8.159c.03.03.06.058.091.086v6.198c0 1.035-.84 1.875-1.875 1.875H15a.75.75 0 0 1-.75-.75v-4.5a.75.75 0 0 0-.75-.75h-3a.75.75 0 0 0-.75.75V21a.75.75 0 0 1-.75.75H5.625a1.875 1.875 0 0 1-1.875-1.875v-6.198a2.29 2.29 0 0 0 .091-.086L12 5.432Z" />
                        </svg>
                        Home
                    </a>
                </li>

                <li>
                    <a href="{{ route('favorites.index') }}"
                        class="flex gap-2 text-md items-center rounded px-2 py-1 hover:bg-red-700 hover:scale-105 transition-all duration-200">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6">
                            <path fill-rule="evenodd"
                                d="M6.32 2.577a49.255 49.255 0 0 1 11.36 0c1.497.174 2.57 1.46 2.57 2.93V21a.75.75 0 0 1-1.085.67L12 18.089l-7.165 3.583A.75.75 0 0 1 3.75 21V5.507c0-1.47 1.073-2.756 2.57-2.93Z"
                                clip-rule="evenodd" />
                        </svg>
                        Preferiti
                    </a>
                </li>


            </ul>
        </nav>

    </div>
</header>
