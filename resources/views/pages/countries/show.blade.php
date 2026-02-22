@extends ('layouts.master')

@section('title')
    {{ $country['description']['en'] }} - IUCN RedList Explorer
@endsection

@section('content')
    <div class="space-y-6">
        <div class="bg-linear-to-r from-red-950 to-red-700 text-white rounded-lg p-4 mb-10 shadow-lg">
            <div class="flex justify-center gap-3 items-center">
                <h1 class="text-3xl font-bold">{{ $country['description']['en'] }}</h1>
                <div>
                    <img src="https://flagcdn.com/w40/{{ strtolower($country['code']) }}.png"
                        alt="{{ $country['description']['en'] }}" class="shadow-md rounded mt-2">
                </div>
            </div>
            <div>
                <p class="text-lg opacity-90 mt-2 text-center">Elenco specie e stato di conservazione</p>
            </div>
        </div>

        {{-- filtri --}}
        @include('partials.filter')

    </div>
    @if (empty($assessments))
        <div
            class="bg-yellow-100 border border-yellow-400 text-yellow-700 text-center px-4 py-3 rounded my-8 mx-auto max-w-lg">
            <p class="font-semibold mb-2">Nessun risultato trovato con i filtri selezionati.</p>
            <a href="{{ route('countries.show', ['code' => $code, 'page' => $pagination['current_page']]) }}"
                class="text-yellow-800 underline hover:text-yellow-900">
                Rimuovi tutti i filtri
            </a>
        </div>
    @else
        {{-- switcher list/card --}}
        <div class="mt-6 justify-self-end">
            @include('partials.view-switcher')
        </div>

        {{-- tabella valutazioni (list-view) --}}
        <div id="list-view" class="py-4">
            @include('partials.assessments-table')
        </div>

        {{-- card valutazioni (card-view) --}}
        <div id="card-view" class="hidden py-4">
            @include('partials.assessments-card')
        </div>
    @endif

    {{-- Paginazione --}}
    @include('partials.pagination', ['baseUrl' => 'countries'])

    <script src="{{ asset('js/view-switcher.js') }}"></script>
@endsection
