@extends ('layouts.master')

@section('title', 'IUCN RedList Explorer')

@section('content')

    <h1 class="text-3xl font-bold mb-6">
        Valutazioni - {{ $system['description']['en'] }}</h1>

    @include('partials.view-switcher')

    {{-- tabella valutazioni (list-view) --}}
    <div id="list-view" class="container mx-auto px-4 py-8">
        <div class="overflow-x-auto">
            <table class="min-w-full bg-white border">
                <thead class="bg-gray-100">
                    <tr>
                        <th class="px-4 py-2 border">ID Specie</th>
                        <th class="px-4 py-2 border">Anno Pubblicazione</th>
                        <th class="px-4 py-2 border">Possibile Estinto</th>
                        <th class="px-4 py-2 border">Possibile Estinto in Natura</th>
                        <th class="px-4 py-2 border">ID Valutazione</th>
                        <th class="px-4 py-2 border">Categoria</th>
                        <th class="px-4 py-2 border">Link IUCN</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($assessments as $assessment)
                        <tr>
                            <td class="px-4 py-2 border">
                                @if (isset($assessment['sis_taxon_id']))
                                    <a href="/taxon/{{ $assessment['sis_taxon_id'] }}"
                                        class="text-blue-600 hover:underline">
                                        {{ $assessment['sis_taxon_id'] }}
                                    </a>
                                @else
                                    ---
                                @endif
                            </td>
                            <td class="px-4 py-2 border">{{ $assessment['year_published'] }}</td>
                            <td class="px-4 py-2 border">{{ $assessment['possibly_extinct'] ? 'Sì' : 'No' }}</td>
                            <td class="px-4 py-2 border">{{ $assessment['possibly_extinct_in_the_wild'] ? 'Sì' : 'No' }}
                            <td class="px-4 py-2 border"><a href="/assessments/{{ $assessment['assessment_id'] }}"
                                    class="text-blue-600 hover:underline">
                                    {{ $assessment['assessment_id'] }}
                                </a></td>
                            </td>
                            <td class="px-4 py-2 border">{{ $assessment['category_translated'] }}</td>
                            <td class="px-4 py-2 border">
                                <a href="{{ $assessment['url'] }}" target="_blank" class="text-blue-600 hover:underline">
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
                        <div class="">
                            @if (isset($assessment['sis_taxon_id']))
                                <a href="/taxon/{{ $assessment['sis_taxon_id'] }}" class="text-blue-600 hover:underline">
                                    ID specie: {{ $assessment['sis_taxon_id'] }}
                                </a>
                            @else
                                ---
                            @endif
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
                            Possibile Estinto in Natura: {{ $assessment['possibly_extinct_in_the_wild'] ? 'Sì' : 'No' }}
                        </div>
                        <div>
                            ID Valutazione: <a href="/assessments/{{ $assessment['assessment_id'] }}"
                                class="text-blue-600 hover:underline">
                                {{ $assessment['assessment_id'] }}
                            </a>
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

    {{-- Paginazione --}}
    <div class="flex justify-between mt-4">
        @if ($pagination['current_page'] > 1)
            <a href="/systems/{{ $code }}?page={{ $pagination['current_page'] - 1 }}"
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
            <a href="/systems/{{ $code }}?page={{ $pagination['current_page'] + 1 }}"
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
