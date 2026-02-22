<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-3">
    @foreach ($assessments as $assessment)
        <div class="border rounded-lg">
            <div class="flex justify-between items-center border-b p-2">
                <div class="">
                    @if (isset($assessment['sis_taxon_id']))
                        <a href="{{ route('taxon.show', ['sisId' => $assessment['sis_taxon_id']]) }}"
                            class="text-blue-600 hover:underline">
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
                    Possibile Estinto in Natura:
                    {{ $assessment['possibly_extinct_in_the_wild'] ? 'Sì' : 'No' }}
                </div>
                <div>
                    ID Valutazione: <a
                        href="{{ route('assessments.show', ['assessmentId' => $assessment['assessment_id']]) }}"
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
