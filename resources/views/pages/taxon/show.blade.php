@extends('layouts.master')

@section('title', 'Dettaglio Specie - IUCN RedList Explorer')

@section('content')
    <div class="container mx-auto px-4 py-8">

        {{-- nome scientifico e id --}}
        <div class="mb-8">
            <h1 class="text-3xl font-bold mb-2">{{ $taxon['scientific_name'] }}</h1>
            <p class="text-gray-600 mb-4">ID: {{ $taxon['sis_id'] }}</p>

            {{-- tasto preferiti --}}
            <form action="/favorites" method="POST" class="mb-4">
                @csrf
                <input type="hidden" name="sis_taxon_id" value="{{ $taxon['sis_id'] }}">
                <input type="hidden" name="scientific_name" value="{{ $taxon['scientific_name'] }}">
                <input type="hidden" name="common_names" value="{{ json_encode($taxon['common_names']) }}">

                <button type="submit"
                    class="px-4 py-2 rounded {{ $isFavorite ? 'bg-red-600 hover:bg-red-700' : 'bg-green-600 hover:bg-green-700' }} text-white">
                    {{ $isFavorite ? '❤️ Rimuovi dai Preferiti' : '🤍 Aggiungi ai Preferiti' }}
                </button>
            </form>

            {{-- nomi comuni --}}
            <div class="mb-4">
                <h2 class="text-xl font-semibold mb-2">Nomi Comuni</h2>
                <ul class="list-disc list-inside">
                    @foreach ($taxon['common_names'] as $commonName)
                        <li class="{{ $commonName['main'] ? 'font-bold text-blue-600' : '' }}">
                            {{ $commonName['name'] }}
                            <span class="text-sm text-gray-500">({{ $commonName['language'] }})</span>
                            @if ($commonName['main'])
                                <span class="text-xs bg-blue-100 px-2 py-1 rounded">Principale</span>
                            @endif
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>

        <h2 class="text-2xl font-semibold mb-4">Valutazioni</h2>
        <div class="mb-4">
            @include('partials.view-switcher')
        </div>

        {{-- tabella valutazioni (list-view) --}}
        <div id="list-view">
            <div class="overflow-x-auto">
                <table class="min-w-full bg-white border">
                    <thead class="bg-gray-100">
                        <tr>
                            <th class="px-4 py-2 border">ID Valutazione</th>
                            <th class="px-4 py-2 border">Anno Pubblicazione</th>
                            <th class="px-4 py-2 border">Possibile Estinto</th>
                            <th class="px-4 py-2 border">Possibile Estinto in Natura</th>
                            <th class="px-4 py-2 border">Categoria</th>
                            <th class="px-4 py-2 border">Link IUCN</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($assessments as $assessment)
                            <tr>
                                <td class="px-4 py-2 border"><a href="/assessments/{{ $assessment['assessment_id'] }}"
                                        class="text-blue-600 hover:underline">
                                        {{ $assessment['assessment_id'] }}
                                    </a></td>
                                <td class="px-4 py-2 border">{{ $assessment['year_published'] }}</td>
                                <td class="px-4 py-2 border">{{ $assessment['possibly_extinct'] ? 'Sì' : 'No' }}</td>
                                <td class="px-4 py-2 border">
                                    {{ $assessment['possibly_extinct_in_the_wild'] ? 'Sì' : 'No' }}
                                </td>
                                <td class="px-4 py-2 border">
                                    {{ $assessment['category_translated'] }}
                                </td>
                                <td class="px-4 py-2 border">
                                    <a href="{{ $assessment['url'] }}" target="_blank"
                                        class="text-blue-600 hover:underline">
                                        Vedi su IUCN
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        {{-- card valutazioni (card-view) --}}
        <div id="card-view" class="hidden container mx-auto px-4 py-8">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-3">
                @foreach ($assessments as $assessment)
                    <div class="border rounded-lg">
                        <div class="flex justify-between items-center border-b p-2">
                            <div>
                                ID Valutazione: <a href="/assessments/{{ $assessment['assessment_id'] }}"
                                    class="text-blue-600 hover:underline">
                                    {{ $assessment['assessment_id'] }}
                                </a>
                            </div>
                            <div>
                                Anno Pubblicazione: {{ $assessment['year_published'] }}
                            </div>
                        </div>
                        <div class="p-2">
                            <div>
                                Possibile Estinto: {{ $assessment['possibly_extinct'] ? 'Sì' : 'No' }}
                            </div>
                            <div>
                                Possibile Estinto in Natura:
                                {{ $assessment['possibly_extinct_in_the_wild'] ? 'Sì' : 'No' }}
                            </div>

                            <div>
                                Categoria: {{ $assessment['category_translated'] }}
                            </div>
                        </div>
                        <div class="border-t-2 p-2">
                            <a href="{{ $assessment['url'] }}" target="_blank" class="text-blue-600 hover:underline">
                                Vedi su IUCN
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    <script src="{{ asset('js/view-switcher.js') }}"></script>

@endsection
