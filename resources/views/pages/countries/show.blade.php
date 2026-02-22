@extends ('layouts.master')

@section('title', 'IUCN RedList Explorer')

@section('content')



    <div class="space-y-4">
        <div class="flex gap-3 items-center">
            <h1 class="text-3xl font-bold">Valutazioni - {{ $country['description']['en'] }}</h1>
            <div>
                <img src="https://flagcdn.com/w40/{{ strtolower($country['code']) }}.png"
                    alt="{{ $country['description']['en'] }}" class="w-8 h-6 object-cover rounded mt-2">
            </div>
        </div>

        {{-- filtri --}}
        @include('partials.filter')

    </div>
    @if (empty($assessments))
        <div
            class="justify-self-center bg-yellow-100 border border-yellow-400 text-yellow-700 text-center px-4 py-3 rounded my-30 w-3/5">
            <p>Nessun risultato trovato con i filtri selezionati.</p>
            <a href="{{ url()->current() }}?page={{ $pagination['current_page'] }}" class="underline">Rimuovi tutti i
                filtri</a>
        </div>
    @else
        {{-- switcher list/card --}}
        <div class="mt-4">
            @include('partials.view-switcher')
        </div>

        {{-- tabella valutazioni (list-view) --}}
        <div id="list-view" class="container mx-auto px-4 py-8">
            @include('partials.assessments-table')
        </div>

        {{-- card valutazioni (card-view) --}}
        <div id="card-view" class="hidden container mx-auto px-4 py-8">
            @include('partials.assessments-card')
        </div>
    @endif
    {{-- Paginazione --}}
    <div class="flex justify-between mt-4">
        @if ($pagination['current_page'] > 1)
            <a href="/countries/{{ $code }}?page={{ $pagination['current_page'] - 1 }}&{{ http_build_query(request()->except('page')) }}"
                class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">
                Precedente
            </a>
        @else
            <span class="px-4 py-2 bg-gray-300 text-gray-500 rounded cursor-not-allowed">
                Precedente
            </span>
        @endif

        <span class="px-4 py-2">
            Pagina {{ $pagination['current_page'] }} di {{ $pagination['last_page'] }}
        </span>

        @if ($pagination['current_page'] < $pagination['last_page'])
            <a href="/countries/{{ $code }}?page={{ $pagination['current_page'] + 1 }}&{{ http_build_query(request()->except('page')) }}"
                class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">
                Successivo
            </a>
        @else
            <span class="px-4 py-2 bg-gray-300 text-gray-500 rounded cursor-not-allowed">
                Successivo
            </span>
        @endif
    </div>

    <script src="{{ asset('js/view-switcher.js') }}"></script>

@endsection
