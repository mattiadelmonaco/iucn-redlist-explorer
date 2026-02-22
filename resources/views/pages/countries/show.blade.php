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
    @include('partials.pagination', ['baseUrl' => 'countries'])

    <script src="{{ asset('js/view-switcher.js') }}"></script>

@endsection
