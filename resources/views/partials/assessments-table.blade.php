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
                            <a href="/taxon/{{ $assessment['sis_taxon_id'] }}" class="text-blue-600 hover:underline">
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
