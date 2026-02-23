@extends('layouts.master')

@section('title', 'I Miei Preferiti - IUCN RedList Explorer')

@section('content')
    {{-- titolo --}}
    <div class="bg-linear-to-r from-red-950 to-red-700 text-white rounded-lg p-6 shadow-lg mb-8">
        <div class="text-center">
            <h1 class="text-3xl md:text-4xl font-bold">I Miei Preferiti</h1>
        </div>
    </div>

    @if ($favorites->isEmpty())
        {{-- Messaggio vuoto --}}
        <div class="bg-yellow-50 border-2 border-yellow-200 rounded-lg p-8 text-center">
            <svg class="w-16 h-16 text-yellow-600 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M5 8h14M5 8a2 2 0 110-4h14a2 2 0 110 4M5 8v10a2 2 0 002 2h10a2 2 0 002-2V8m-9 4h4"></path>
            </svg>
            <p class="text-lg text-yellow-800 font-semibold mb-2">Nessuna specie salvata</p>
            <p class="text-yellow-700 mb-4">Non hai ancora aggiunto nessuna specie ai preferiti</p>
            <a href="{{ route('home') }}"
                class="inline-flex items-center gap-2 bg-red-600 hover:bg-red-700 text-white px-6 py-3 rounded-lg font-medium transition-all">
                <span>Torna a Home</span>
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-5 h-5">
                    <path fill-rule="evenodd"
                        d="M3 10a.75.75 0 01.75-.75h10.638L10.23 5.29a.75.75 0 111.04-1.08l5.5 5.25a.75.75 0 010 1.08l-5.5 5.25a.75.75 0 11-1.04-1.08l4.158-3.96H3.75A.75.75 0 013 10z"
                        clip-rule="evenodd" />
                </svg>
            </a>
        </div>
    @else
        {{-- contatore --}}
        <div class="mb-6">
            <p class="text-gray-600">
                <span class="font-bold text-red-700 text-lg">{{ $favorites->count() }}</span>
                {{ $favorites->count() === 1 ? 'specie salvata' : 'specie salvate' }}
            </p>
        </div>

        {{-- card preferiti --}}
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
            @foreach ($favorites as $favorite)
                <div
                    class="bg-white border border-gray-200 rounded-lg shadow-sm hover:shadow-lg hover:border-red-300 transition-all overflow-hidden">

                    {{-- titolo card --}}
                    <div class="bg-red-800 text-white p-4">
                        <h3 class="text-lg font-bold mb-1">
                            <a href="{{ route('taxon.show', ['sisId' => $favorite->sis_taxon_id]) }}"
                                class="text-white hover:underline">
                                {{ $favorite->scientific_name }}
                            </a>
                        </h3>
                        <p class="text-sm opacity-90">ID: {{ $favorite->sis_taxon_id }}</p>
                    </div>

                    {{-- corpo card --}}
                    <div class="p-4">
                        {{-- nomi comuni --}}
                        @if ($favorite->common_names)
                            <div class="mb-3">
                                <p class="text-xs text-gray-500 mb-1">Nomi comuni:</p>
                                <div class="flex flex-wrap gap-1">
                                    @foreach ($favorite->common_names as $name)
                                        <span
                                            class="inline-block px-2 py-1 text-xs rounded-full {{ $name['main'] ? 'bg-red-100 text-red-800 font-bold' : 'bg-gray-100 text-gray-700' }}">
                                            {{ $name['name'] }}
                                        </span>
                                    @endforeach
                                </div>
                            </div>
                        @else
                            <p class="text-sm text-gray-500 italic mb-3">Nessun nome comune disponibile</p>
                        @endif

                        <div class="flex items-center gap-2 text-xs text-gray-500 pt-3 border-t">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-4 h-4">
                                <path fill-rule="evenodd"
                                    d="M5.75 2a.75.75 0 01.75.75V4h7V2.75a.75.75 0 011.5 0V4h.25A2.75 2.75 0 0118 6.75v8.5A2.75 2.75 0 0115.25 18H4.75A2.75 2.75 0 012 15.25v-8.5A2.75 2.75 0 014.75 4H5V2.75A.75.75 0 015.75 2zm-1 5.5c-.69 0-1.25.56-1.25 1.25v6.5c0 .69.56 1.25 1.25 1.25h10.5c.69 0 1.25-.56 1.25-1.25v-6.5c0-.69-.56-1.25-1.25-1.25H4.75z"
                                    clip-rule="evenodd" />
                            </svg>
                            <span>Aggiunto il {{ $favorite->created_at->format('d/m/Y') }}</span>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @endif
@endsection
