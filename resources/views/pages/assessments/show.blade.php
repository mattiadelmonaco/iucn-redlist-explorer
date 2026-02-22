@extends('layouts.master')

@section('title', 'Dettaglio Valutazione')

@section('content')
    <div class="container mx-auto px-4 py-8">

        <div class="mb-8">
            <h1 class="text-3xl font-bold mb-2">{{ $assessment['taxon']['scientific_name'] }}</h1>
            <p class="text-gray-600 mb-4">Valutazione ID: {{ $assessment['assessment_id'] }}</p>

            <a href="{{ $assessment['url'] }}" target="_blank"
                class="inline-block bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 mb-4">
                Vedi su IUCN Red List →
            </a>
        </div>

        {{-- informazioni base --}}
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mb-8">
            <div class="border p-4 rounded">
                <h3 class="font-semibold mb-2">ID Valutazione</h3>
                <p>{{ $assessment['assessment_id'] }}</p>
            </div>

            <div class="border p-4 rounded">
                <h3 class="font-semibold mb-2">Anno Pubblicazione</h3>
                <p>{{ $assessment['year_published'] }}</p>
            </div>

            <div class="border p-4 rounded">
                <h3 class="font-semibold mb-2">Categoria</h3>
                <p>{{ $assessment['category_translated'] }}</p>
            </div>

            <div class="border p-4 rounded">
                <h3 class="font-semibold mb-2">Possibile Estinto</h3>
                <p>{{ $assessment['possibly_extinct'] ? 'Sì' : 'No' }}</p>
            </div>

            <div class="border p-4 rounded">
                <h3 class="font-semibold mb-2">Possibile Estinto in Natura</h3>
                <p>{{ $assessment['possibly_extinct_in_the_wild'] ? 'Sì' : 'No' }}</p>
            </div>

            <div class="border p-4 rounded">
                <h3 class="font-semibold mb-2">Trend Popolazione</h3>
                <p>{{ $assessment['population_trend']['description']['en'] ?? 'Non disponibile' }}</p>
            </div>
        </div>

        {{-- azioni conservazione --}}
        @if (isset($assessment['supplementary_info']['conservation_actions_in_place']) &&
                count($assessment['supplementary_info']['conservation_actions_in_place']) > 0)
            <div class="mb-8">
                <h2 class="text-2xl font-semibold mb-4">Azioni di Conservazione in Atto</h2>
                @foreach ($assessment['supplementary_info']['conservation_actions_in_place'] as $action)
                    <div class="border p-4 rounded mb-4">
                        <h3 class="font-semibold mb-2">{{ $action['name'] }}</h3>
                        <ul class="list-disc list-inside">
                            @foreach ($action['actions'] as $subAction)
                                <li>{{ $subAction['name'] }}: <strong>{{ $subAction['value'] }}</strong></li>
                            @endforeach
                        </ul>
                    </div>
                @endforeach
            </div>
        @else
            <p class="mb-8 text-gray-600">Nessuna azione di conservazione registrata</p>
        @endif

        {{-- docuentazione --}}
        @if (isset($assessment['documentation']))
            <div class="mb-8">
                <h2 class="text-2xl font-semibold mb-4">Documentazione</h2>

                @foreach ($assessment['documentation'] as $key => $content)
                    @if ($content)
                        <div class="border p-4 rounded mb-4">
                            <h3 class="font-semibold mb-2 capitalize">{{ str_replace('_', ' ', $key) }}</h3>
                            <div class="prose max-w-none">
                                {!! $content !!}
                            </div>
                        </div>
                    @endif
                @endforeach
            </div>
        @else
            <p class="mb-8 text-gray-600">--</p>
        @endif

        {{-- sistemi associati --}}
        @if (isset($assessment['systems']) && count($assessment['systems']) > 0)
            <div class="mb-8">
                <h2 class="text-2xl font-semibold mb-4">Sistemi</h2>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                    @foreach ($assessment['systems'] as $system)
                        <a href="{{ route('systems.show', ['code' => $system['code']]) }}"
                            class="border p-4 rounded hover:bg-gray-100 block">
                            {{ $system['description']['en'] }}
                        </a>
                    @endforeach
                </div>
            </div>
        @endif
    </div>
@endsection
