@extends('layouts.master')

@section('title', 'I Miei Preferiti')

@section('content')
    <div class="mx-auto px-4 py-8">
        <h1 class="text-3xl font-bold mb-6">I Miei Preferiti</h1>

        @if ($favorites->isEmpty())
            <p class="text-gray-600">Non hai ancora aggiunto nessuna specie ai preferiti.</p>
        @else
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                @foreach ($favorites as $favorite)
                    <div class="border rounded p-4 hover:shadow-lg transition">
                        <div class="flex justify-between items-center">
                            <h3 class="text-xl font-semibold mb-2">
                                <a href="{{ route('taxon.show', ['sisId' => $favorite->sis_taxon_id]) }}"
                                    class="text-blue-600 hover:underline">
                                    {{ $favorite->scientific_name }}
                                </a>
                            </h3>

                            <p class="text-gray-500">ID: {{ $favorite->sis_taxon_id }}</p>

                        </div>

                        {{-- nomi comuni --}}
                        @if ($favorite->common_names)
                            <p class="text-gray-600 mb-2">
                                @foreach ($favorite->common_names as $name)
                                    <span class="text-sm {{ $name['main'] ? 'font-bold text-blue-600' : 'text-gray-600' }}">
                                        {{ $name['name'] }}{{ !$loop->last ? ' |' : '' }}
                                    </span>
                                @endforeach
                            </p>
                        @else
                            <p class="text-sm text-gray-700 font-semibold mb-2">Nessun nome comune disponibile</p>
                        @endif

                        <p class="text-sm text-gray-500">
                            Aggiunto il: {{ $favorite->created_at->format('d/m/Y H:i') }}
                        </p>
                    </div>
                @endforeach
            </div>
        @endif
    </div>
@endsection
