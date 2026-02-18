@extends ('layouts.master')

@section('title', 'IUCN RedList Explorer')

@section('content')

    <div class="">
        <h1 class="text-3xl font-bold mb-6">IUCN Red List Explorer</h1>

        {{-- @dd($systems[0]['description']) --}}

        {{-- Sistemi --}}
        <section class="mb-8">
            <h2 class="text-2xl font-semibold mb-4">Sistemi</h2>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                @foreach ($systems as $system)
                    <div class="border p-4 rounded">
                        <h3>{{ $system['description']['en'] }}</h3>
                    </div>
                @endforeach
            </div>
        </section>

        {{-- Nazioni --}}
        <section>
            <h2 class="text-2xl font-semibold mb-4">Nazioni</h2>
            <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
                @foreach ($countries as $country)
                    <div class="border p-2">
                        {{ $country['description']['en'] }}
                    </div>
                @endforeach
            </div>
        </section>
    </div>
@endsection
