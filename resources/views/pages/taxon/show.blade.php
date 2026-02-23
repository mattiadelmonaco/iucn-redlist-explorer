@extends('layouts.master')

@section('title')
    {{ $taxon['scientific_name'] }} - IUCN RedList Explorer
@endsection

@section('content')
    {{-- titolo --}}
    <div
        class="flex justify-between items-center bg-linear-to-r from-red-950 to-red-700 text-white rounded-lg p-6 shadow-lg mb-6">
        <h1 class="text-3xl md:text-4xl font-bold mb-2">{{ $taxon['scientific_name'] }}</h1>
        <p class="text-lg opacity-90">ID Specie: {{ $taxon['sis_id'] }}</p>
    </div>

    {{-- tasto preferito --}}
    <div class="mb-6 justify-self-end">
        <form action="{{ route('favorites.store') }}" method="POST">
            @csrf
            <input type="hidden" name="sis_taxon_id" value="{{ $taxon['sis_id'] }}">
            <input type="hidden" name="scientific_name" value="{{ $taxon['scientific_name'] }}">
            <input type="hidden" name="common_names" value="{{ json_encode($taxon['common_names']) }}">

            <button type="submit"
                class="flex items-center gap-2 px-6 py-3 rounded-lg font-medium shadow-md transition-all {{ $isFavorite ? 'bg-red-700 hover:bg-red-800' : 'bg-green-700 hover:bg-green-800' }} text-white cursor-pointer">
                <span class="text-xl">{{ $isFavorite ? '❤️' : '🤍' }}</span>
                <span>{{ $isFavorite ? 'Rimuovi dai Preferiti' : 'Aggiungi ai Preferiti' }}</span>
            </button>
        </form>
    </div>

    {{-- nomi comuni --}}
    <div class="bg-white border border-gray-200 rounded-lg p-6 shadow-sm mb-6">
        <h2 class="text-xl font-bold mb-4 border-b-2 border-red-600 pb-2 inline-block">Nomi Comuni</h2>
        <ul class="space-y-2">
            @foreach ($taxon['common_names'] as $commonName)
                <li class="flex items-center gap-3">
                    <span class="text-lg {{ $commonName['main'] ? 'font-bold text-red-600' : 'text-gray-700' }}">
                        {{ $commonName['name'] }}
                    </span>
                    <span class="text-sm text-gray-500">({{ $commonName['language'] }})</span>
                    @if ($commonName['main'])
                        <span class="text-xs bg-red-100 text-red-800 px-2 py-1 rounded-full font-semibold">Principale</span>
                    @endif
                </li>
            @endforeach
        </ul>
    </div>

    {{-- valutazioni --}}
    <div class="mb-4">
        <h2 class="text-2xl font-bold mb-4 border-b-2 border-red-600 pb-2 inline-block">Valutazioni</h2>
    </div>

    {{-- switcher list/card --}}
    <div class="mb-6">
        @include('partials.view-switcher')
    </div>

    {{-- tabella valutazioni --}}
    <div id="list-view">
        <div class="overflow-x-auto rounded-lg shadow">
            <table class="min-w-full bg-white border border-gray-200">
                <thead class="bg-linear-to-r from-red-900 to-red-700 text-white">
                    <tr>
                        <th class="px-4 py-3 text-left text-sm font-semibold border-r border-gray-300">ID Valutazione</th>
                        <th class="px-4 py-3 text-left text-sm font-semibold border-r border-gray-300">Anno</th>
                        <th class="px-4 py-3 text-left text-sm font-semibold border-r border-gray-300">Poss. Estinto</th>
                        <th class="px-4 py-3 text-left text-sm font-semibold border-r border-gray-300">Est. in Natura</th>
                        <th class="px-4 py-3 text-left text-sm font-semibold border-r border-gray-300">Categoria</th>
                        <th class="px-4 py-3 text-left text-sm font-semibold">Link</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($assessments as $assessment)
                        <tr class="border-b border-gray-200 hover:bg-gray-50 transition-colors">
                            <td class="px-4 py-2 border-r border-gray-200">
                                <a href="{{ route('assessments.show', ['assessmentId' => $assessment['assessment_id']]) }}"
                                    class="text-red-600 hover:text-red-800 font-medium">
                                    {{ $assessment['assessment_id'] }}
                                </a>
                            </td>
                            <td class="px-4 py-2 border-r border-gray-200">{{ $assessment['year_published'] }}</td>
                            <td class="px-4 py-2 border-r border-gray-200">
                                {{ $assessment['possibly_extinct'] ? 'Sì' : 'No' }}</td>
                            <td class="px-4 py-2 border-r border-gray-200">
                                {{ $assessment['possibly_extinct_in_the_wild'] ? 'Sì' : 'No' }}</td>
                            <td class="px-4 py-2 border-r border-gray-200">{{ $assessment['category_translated'] }}</td>
                            <td class="px-4 py-2">
                                <a href="{{ $assessment['url'] }}" target="_blank" class="text-red-600 hover:text-red-800">
                                    Vedi su IUCN →
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    {{-- card valutazioni --}}
    <div id="card-view" class="hidden">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-4">
            @foreach ($assessments as $assessment)
                <div
                    class="bg-white border border-gray-200 rounded-lg shadow-sm hover:shadow-lg transition-shadow overflow-hidden">
                    <div class="bg-red-800 text-white p-3">
                        <div class="flex justify-between items-start gap-2 text-sm">
                            <div>
                                <a href="{{ route('assessments.show', ['assessmentId' => $assessment['assessment_id']]) }}"
                                    class="text-white hover:underline font-semibold">
                                    ID Valutazione: {{ $assessment['assessment_id'] }}
                                </a>
                            </div>
                            <div class="text-right opacity-90">
                                {{ $assessment['year_published'] }}
                            </div>
                        </div>
                    </div>
                    <div class="p-4 space-y-3">
                        <div class="flex items-center justify-between text-sm">
                            <span class="text-gray-600">Poss. Estinto:</span>
                            <span>{{ $assessment['possibly_extinct'] ? 'Sì' : 'No' }}</span>
                        </div>
                        <div class="flex items-center justify-between text-sm">
                            <span class="text-gray-600">Est. in Natura:</span>
                            <span>{{ $assessment['possibly_extinct_in_the_wild'] ? 'Sì' : 'No' }}</span>
                        </div>
                        <div class="pt-2 border-t">
                            <div class="text-xs text-gray-500 mb-1">Categoria</div>
                            <span
                                class="inline-block px-3 py-1 text-sm font-semibold rounded-full bg-gray-100 text-gray-800">
                                {{ $assessment['category_translated'] }}
                            </span>
                        </div>
                    </div>
                    <div class="border-t border-gray-300 bg-gray-100 p-3">
                        <a href="{{ $assessment['url'] }}" target="_blank"
                            class="flex items-center justify-center gap-2 text-red-600 hover:text-red-800 text-sm font-medium">
                            Vedi su IUCN →
                        </a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <script src="{{ asset('js/view-switcher.js') }}"></script>
@endsection
