<div class="overflow-x-auto rounded-lg shadow">
    <table class="min-w-full bg-white border border-gray-200">
        <thead class="bg-linear-to-r from-red-900 to-red-700 text-white">
            <tr>
                <th class="px-4 py-3 text-left text-sm font-semibold border-r border-gray-300">ID Specie</th>
                <th class="px-4 py-3 text-left text-sm font-semibold border-r border-gray-300">Pubblicazione</th>
                <th class="px-4 py-3 text-left text-sm font-semibold border-r border-gray-300">Poss. Estinto</th>
                <th class="px-4 py-3 text-left text-sm font-semibold border-r border-gray-300">Poss. Estinto Natura</th>
                <th class="px-4 py-3 text-left text-sm font-semibold border-r border-gray-300">ID Valutazione</th>
                <th class="px-4 py-3 text-left text-sm font-semibold border-r border-gray-300">Categoria</th>
                <th class="px-4 py-3 text-left text-sm font-semibold">Link IUCN</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($assessments as $assessment)
                <tr class="border-b border-gray-200 hover:bg-gray-100 transition-colors">
                    <td class="px-4 py-2 border-r border-gray-200">
                        @if (isset($assessment['sis_taxon_id']))
                            <a href="{{ route('taxon.show', ['sisId' => $assessment['sis_taxon_id']]) }}"
                                class="text-red-600 hover:text-red-800 font-medium">
                                {{ $assessment['sis_taxon_id'] }}
                            </a>
                        @else
                            <span class="text-gray-400">---</span>
                        @endif
                    </td>
                    <td class="px-4 py-2 border-r border-gray-200">{{ $assessment['year_published'] }}</td>
                    <td class="px-4 py-2 border-r border-gray-200">{{ $assessment['possibly_extinct'] ? 'Sì' : 'No' }}
                    </td>
                    <td class="px-4 py-2 border-r border-gray-200">
                        {{ $assessment['possibly_extinct_in_the_wild'] ? 'Sì' : 'No' }}</td>
                    <td class="px-4 py-2 border-r border-gray-200">
                        <a href="{{ route('assessments.show', ['assessmentId' => $assessment['assessment_id']]) }}"
                            class="text-red-600 hover:text-red-800 font-medium">
                            {{ $assessment['assessment_id'] }}
                        </a>
                    </td>
                    <td class="px-4 py-2 border-r border-gray-200">{{ $assessment['category_translated'] }}</td>
                    <td class="px-4 py-2">
                        <a href="{{ $assessment['url'] }}" target="_blank"
                            class="inline-flex items-center gap-1 text-red-600 hover:text-red-800 text-sm font-medium">
                            <span>IUCN</span>
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                                class="w-4 h-4">
                                <path fill-rule="evenodd"
                                    d="M4.25 5.5a.75.75 0 0 0-.75.75v8.5c0 .414.336.75.75.75h8.5a.75.75 0 0 0 .75-.75v-4a.75.75 0 0 1 1.5 0v4A2.25 2.25 0 0 1 12.75 17h-8.5A2.25 2.25 0 0 1 2 14.75v-8.5A2.25 2.25 0 0 1 4.25 4h5a.75.75 0 0 1 0 1.5h-5Z"
                                    clip-rule="evenodd" />
                                <path fill-rule="evenodd"
                                    d="M6.194 12.753a.75.75 0 0 0 1.06.053L16.5 4.44v2.81a.75.75 0 0 0 1.5 0v-4.5a.75.75 0 0 0-.75-.75h-4.5a.75.75 0 0 0 0 1.5h2.553l-9.056 8.194a.75.75 0 0 0-.053 1.06Z"
                                    clip-rule="evenodd" />
                            </svg>
                        </a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
