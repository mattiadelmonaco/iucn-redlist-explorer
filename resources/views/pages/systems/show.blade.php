@extends ('layouts.master')

@section('title', 'IUCN RedList Explorer')

@section('content')

    <h1 class="text-3xl font-bold mb-6">Valutazioni - {{ $system['description']['en'] }}</h1>

    {{-- tabella valutazioni --}}
    <div class="container mx-auto px-4 py-8">
        <div class="overflow-x-auto">
            <table class="min-w-full bg-white border">
                <thead class="bg-gray-100">
                    <tr>
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
                            <td class="px-4 py-2 border">{{ $assessment['year_published'] }}</td>
                            <td class="px-4 py-2 border">{{ $assessment['possibly_extinct'] ? 'Sì' : 'No' }}</td>
                            <td class="px-4 py-2 border">{{ $assessment['possibly_extinct_in_the_wild'] ? 'Sì' : 'No' }}
                            <td class="px-4 py-2 border">{{ $assessment['assessment_id'] }}</td>
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

@endsection
