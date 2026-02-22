@extends ('layouts.master')

@section('title', 'IUCN RedList Explorer')

@section('content')

    <div class="bg-linear-to-r from-red-950 to-red-700 text-white rounded-lg p-4 mb-10 shadow-lg">
        <h1 class="text-4xl font-bold mb-3 text-center">IUCN Red List Explorer</h1>
    </div>

    {{-- @dd($systems[0]['description']) --}}

    {{-- Sistemi --}}
    <section class="mb-12">
        <h2 class="text-2xl font-semibold mb-4 border-b-2 border-red-700 pb-2 inline-block">Sistemi</h2>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
            @foreach ($systems as $system)
                <a href="{{ route('systems.show', ['code' => $system['code']]) }}"
                    class="border-2 border-gray-200 px-6 py-4 rounded-lg block hover:border-red-600 hover:text-red-600 hover:shadow-lg transition-all duration-200">
                    <h3 class="text-lg">
                        {{ $system['description']['en'] }}</h3>
                </a>
            @endforeach
        </div>
    </section>

    {{-- paesi --}}
    <section>
        <h2 class="text-2xl font-semibold mb-4 border-b-2 border-red-700 pb-2 inline-block">Paesi</h2>
        <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-5 xl:grid-cols-6 gap-3">
            @foreach ($countries as $country)
                <a href="{{ route('countries.show', ['code' => $country['code']]) }}"
                    class="border border-gray-200 p-3 rounded hover:shadow-md hover:border-red-600 transition-all duration-200 flex items-center gap-2"
                    title="{{ $country['description']['en'] }}">
                    <img src="https://flagcdn.com/w40/{{ strtolower($country['code']) }}.png"
                        alt="{{ $country['description']['en'] }}" class="w-8 h-6 object-cover rounded">
                    <span class="text-sm truncate">{{ $country['description']['en'] }}</span>
                </a>
            @endforeach
        </div>
    </section>
    </div>
@endsection
