<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-4">
    @foreach ($assessments as $assessment)
        <div
            class="bg-white border border-gray-200 rounded-lg shadow-sm hover:shadow-lg transition-shadow overflow-hidden">

            {{-- header card --}}
            <div class="bg-red-800 text-white p-3">
                <div class="flex justify-between items-start gap-2 text-sm">
                    <div>
                        @if (isset($assessment['sis_taxon_id']))
                            <a href="{{ route('taxon.show', ['sisId' => $assessment['sis_taxon_id']]) }}"
                                class="text-white hover:underline font-semibold">
                                ID Specie: {{ $assessment['sis_taxon_id'] }}
                            </a>
                        @else
                            <span class="opacity-70">ID Specie: ---</span>
                        @endif
                    </div>
                    <div class="text-right">
                        <span class="opacity-90">{{ $assessment['year_published'] }}</span>
                    </div>
                </div>
            </div>

            {{-- corpo card --}}
            <div class="p-4 space-y-3">
                <div class="flex items-center justify-between text-sm">
                    <span class="text-gray-600">Poss. Estinto:</span>
                    <span class="px-2 py-1 text-xs rounded-full font-medium">
                        {{ $assessment['possibly_extinct'] ? 'Sì' : 'No' }}
                    </span>
                </div>

                <div class="flex items-center justify-between text-sm">
                    <span class="text-gray-600">Est. in Natura:</span>
                    <span class="px-2 py-1 text-xs rounded-full font-medium">
                        {{ $assessment['possibly_extinct_in_the_wild'] ? 'Sì' : 'No' }}
                    </span>
                </div>

                <div class="flex items-center justify-between text-sm">
                    <span class="text-gray-600">ID Valutazione:</span>
                    <a href="{{ route('assessments.show', ['assessmentId' => $assessment['assessment_id']]) }}"
                        class="text-red-600 hover:text-red-800 font-medium">
                        {{ $assessment['assessment_id'] }}
                    </a>
                </div>

                <div class="pt-2 border-t">
                    <div class="text-xs text-gray-500 mb-1">Categoria</div>
                    <span class="inline-block px-3 py-1 text-sm font-semibold rounded bg-gray-100 text-gray-800">
                        {{ $assessment['category_translated'] }}
                    </span>
                </div>
            </div>

            {{-- footer card --}}
            <div class="border-t border-gray-300 bg-gray-100 p-3">
                <a href="{{ $assessment['url'] }}" target="_blank"
                    class="flex items-center justify-center gap-2 text-red-600 hover:text-red-800 text-sm font-medium">
                    <span>Vedi su IUCN</span>
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-4 h-4">
                        <path fill-rule="evenodd"
                            d="M4.25 5.5a.75.75 0 0 0-.75.75v8.5c0 .414.336.75.75.75h8.5a.75.75 0 0 0 .75-.75v-4a.75.75 0 0 1 1.5 0v4A2.25 2.25 0 0 1 12.75 17h-8.5A2.25 2.25 0 0 1 2 14.75v-8.5A2.25 2.25 0 0 1 4.25 4h5a.75.75 0 0 1 0 1.5h-5Z"
                            clip-rule="evenodd" />
                        <path fill-rule="evenodd"
                            d="M6.194 12.753a.75.75 0 0 0 1.06.053L16.5 4.44v2.81a.75.75 0 0 0 1.5 0v-4.5a.75.75 0 0 0-.75-.75h-4.5a.75.75 0 0 0 0 1.5h2.553l-9.056 8.194a.75.75 0 0 0-.053 1.06Z"
                            clip-rule="evenodd" />
                    </svg>
                </a>
            </div>
        </div>
    @endforeach
</div>
