@extends('layouts.master')

@section('title')
    {{ $assessment['taxon']['scientific_name'] }} - IUCN RedList Explorer
@endsection

@section('content')
    {{-- titolo --}}
    <div
        class="flex justify-between items-center flex-wrap bg-linear-to-r from-red-950 to-red-700 text-white rounded-lg p-6 shadow-lg mb-6">
        <h1 class="text-3xl md:text-4xl font-bold mb-2">{{ $assessment['taxon']['scientific_name'] }}</h1>
        <p class="text-lg opacity-90">ID Valutazione: {{ $assessment['assessment_id'] }}</p>
    </div>

    {{-- link iucn --}}
    <div class="mb-6 justify-self-end">
        <a href="{{ $assessment['url'] }}" target="_blank"
            class="inline-flex items-center gap-2 bg-red-700 text-white px-6 py-3 rounded-lg hover:bg-red-800 font-medium shadow-md transition-all">
            <span>Vedi su IUCN Red List</span>
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-5 h-5">
                <path fill-rule="evenodd"
                    d="M4.25 5.5a.75.75 0 0 0-.75.75v8.5c0 .414.336.75.75.75h8.5a.75.75 0 0 0 .75-.75v-4a.75.75 0 0 1 1.5 0v4A2.25 2.25 0 0 1 12.75 17h-8.5A2.25 2.25 0 0 1 2 14.75v-8.5A2.25 2.25 0 0 1 4.25 4h5a.75.75 0 0 1 0 1.5h-5Z"
                    clip-rule="evenodd" />
                <path fill-rule="evenodd"
                    d="M6.194 12.753a.75.75 0 0 0 1.06.053L16.5 4.44v2.81a.75.75 0 0 0 1.5 0v-4.5a.75.75 0 0 0-.75-.75h-4.5a.75.75 0 0 0 0 1.5h2.553l-9.056 8.194a.75.75 0 0 0-.053 1.06Z"
                    clip-rule="evenodd" />
            </svg>
        </a>
    </div>

    {{-- informazioni principali --}}
    <div class="mb-8">
        <h2 class="text-2xl font-bold mb-4 border-b-2 border-red-600 pb-2 inline-block">Informazioni Principali</h2>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4 mt-4">
            <div class="bg-white border border-gray-200 p-4 rounded-lg shadow-sm">
                <h3 class="text-sm font-semibold text-gray-600 mb-1">ID Valutazione</h3>
                <p class="text-lg font-bold text-gray-900">{{ $assessment['assessment_id'] }}</p>
            </div>

            <div class="bg-white border border-gray-200 p-4 rounded-lg shadow-sm">
                <h3 class="text-sm font-semibold text-gray-600 mb-1">Anno Pubblicazione</h3>
                <p class="text-lg font-bold text-gray-900">{{ $assessment['year_published'] }}</p>
            </div>

            <div class="bg-white border border-gray-200 p-4 rounded-lg shadow-sm">
                <h3 class="text-sm font-semibold text-gray-600 mb-1">Categoria</h3>
                <span class="inline-block px-3 py-1 text-sm font-semibold rounded-full bg-gray-100 text-gray-800">
                    {{ $assessment['category_translated'] }}
                </span>
            </div>

            <div class="bg-white border border-gray-200 p-4 rounded-lg shadow-sm">
                <h3 class="text-sm font-semibold text-gray-600 mb-1">Possibile Estinto</h3>
                <span
                    class="px-2 py-1 text-xs rounded-full font-medium {{ $assessment['possibly_extinct'] ? 'bg-red-100 text-red-800' : 'bg-green-100 text-green-800' }}">
                    {{ $assessment['possibly_extinct'] ? 'Sì' : 'No' }}
                </span>
            </div>

            <div class="bg-white border border-gray-200 p-4 rounded-lg shadow-sm">
                <h3 class="text-sm font-semibold text-gray-600 mb-1">Possibile Estinto in Natura</h3>
                <span
                    class="px-2 py-1 text-xs rounded-full font-medium {{ $assessment['possibly_extinct_in_the_wild'] ? 'bg-orange-100 text-orange-800' : 'bg-green-100 text-green-800' }}">
                    {{ $assessment['possibly_extinct_in_the_wild'] ? 'Sì' : 'No' }}
                </span>
            </div>

            <div class="bg-white border border-gray-200 p-4 rounded-lg shadow-sm">
                <h3 class="text-sm font-semibold text-gray-600 mb-1">Trend Popolazione</h3>
                <p class="text-lg font-bold text-gray-900">
                    {{ $assessment['population_trend']['description']['en'] ?? 'Non disponibile' }}
                </p>
            </div>
        </div>
    </div>

    {{-- azioni conservazione --}}
    @if (isset($assessment['supplementary_info']['conservation_actions_in_place']) &&
            count($assessment['supplementary_info']['conservation_actions_in_place']) > 0)
        <div class="mb-8">
            <h2 class="text-2xl font-bold mb-4 border-b-2 border-red-600 pb-2 inline-block">Azioni di Conservazione</h2>
            <div class="space-y-4 mt-4">
                @foreach ($assessment['supplementary_info']['conservation_actions_in_place'] as $action)
                    <div class="bg-white border border-gray-200 p-5 rounded-lg shadow-sm">
                        <h3 class="font-bold text-lg mb-3 text-red-700">{{ $action['name'] }}</h3>
                        <ul class="space-y-2">
                            @foreach ($action['actions'] as $subAction)
                                <li class="flex items-start gap-2">
                                    <svg class="w-5 h-5 text-green-600 mt-0.5 shrink-0" fill="currentColor"
                                        viewBox="0 0 20 20">
                                        <path fill-rule="evenodd"
                                            d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                            clip-rule="evenodd" />
                                    </svg>
                                    <span class="text-gray-700">
                                        {{ $subAction['name'] }}:
                                        <strong class="text-gray-900">{{ $subAction['value'] }}</strong>
                                    </span>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                @endforeach
            </div>
        </div>
    @else
        <div class="mb-8 bg-yellow-50 border border-yellow-200 rounded-lg p-4">
            <p class="text-yellow-800">Nessuna azione di conservazione registrata</p>
        </div>
    @endif

    {{-- documentazione --}}
    @if (isset($assessment['documentation']))
        <div class="mb-8">
            <h2 class="text-2xl font-bold mb-4 border-b-2 border-red-600 pb-2 inline-block">Documentazione</h2>
            <div class="space-y-4 mt-4">
                @foreach ($assessment['documentation'] as $key => $content)
                    @if ($content)
                        <div class="bg-white border border-gray-200 p-5 rounded-lg shadow-sm">
                            <h3 class="font-bold text-lg mb-3 text-red-700 capitalize">
                                {{ str_replace('_', ' ', $key) }}
                            </h3>
                            <div class="prose prose-sm max-w-none text-gray-700">
                                {!! $content !!}
                            </div>
                        </div>
                    @endif
                @endforeach
            </div>
        </div>
    @else
        <div class="mb-8 bg-gray-50 border border-gray-200 rounded-lg p-4">
            <p class="text-gray-600">Nessuna documentazione disponibile</p>
        </div>
    @endif

    {{-- sistemi associati --}}
    @if (isset($assessment['systems']) && count($assessment['systems']) > 0)
        <div class="mb-8">
            <h2 class="text-2xl font-bold mb-4 border-b-2 border-red-600 pb-2 inline-block">Sistemi Associati</h2>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mt-4">
                @foreach ($assessment['systems'] as $system)
                    <a href="{{ route('systems.show', ['code' => $system['code']]) }}"
                        class="bg-white border-2 border-gray-200 p-4 rounded-lg hover:border-red-600 hover:shadow-lg transition-all duration-200 block group">
                        <h3 class="text-lg font-semibold group-hover:text-red-600 transition-colors">
                            {{ $system['description']['en'] }}
                        </h3>
                    </a>
                @endforeach
            </div>
        </div>
    @endif
@endsection
