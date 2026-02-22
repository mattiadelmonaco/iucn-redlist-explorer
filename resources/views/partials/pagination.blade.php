{{-- $baseUrl = 'systems' o 'countries' --}}
<div class="flex justify-between mt-4">
    @if ($pagination['current_page'] > 1)
        <a href="{{ route($baseUrl . '.show', ['code' => $code]) }}?page={{ $pagination['current_page'] - 1 }}&{{ http_build_query(request()->except('page')) }}"
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
        <a href="{{ route($baseUrl . '.show', ['code' => $code]) }}?page={{ $pagination['current_page'] + 1 }}&{{ http_build_query(request()->except('page')) }}"
            class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">
            Successivo
        </a>
    @else
        <span class="px-4 py-2 bg-gray-300 text-gray-500 rounded cursor-not-allowed">
            Successivo
        </span>
    @endif
</div>
