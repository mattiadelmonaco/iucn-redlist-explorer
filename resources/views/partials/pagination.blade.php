{{-- $baseUrl = 'systems' o 'countries' --}}
<div
    class="flex flex-col min-[530px]:flex-row justify-center min-[530px]:justify-between items-center gap-4 mt-8 bg-gray-50 p-4 rounded-lg shadow-sm">
    @if ($pagination['current_page'] > 1)
        <a href="{{ route($baseUrl . '.show', ['code' => $code]) }}?page={{ $pagination['current_page'] - 1 }}&{{ http_build_query(request()->except('page')) }}"
            class="flex items-center gap-2 px-5 py-2 bg-red-700 text-white rounded-md hover:bg-red-800 transition-all duration-200 shadow-sm">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-5 h-5">
                <path fill-rule="evenodd"
                    d="M11.78 5.22a.75.75 0 0 1 0 1.06L8.06 10l3.72 3.72a.75.75 0 1 1-1.06 1.06l-4.25-4.25a.75.75 0 0 1 0-1.06l4.25-4.25a.75.75 0 0 1 1.06 0Z"
                    clip-rule="evenodd" />
            </svg>
            <span>Precedente</span>
        </a>
    @else
        <span class="flex items-center gap-2 px-5 py-2 bg-gray-300 text-gray-500 rounded-md cursor-not-allowed">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-5 h-5">
                <path fill-rule="evenodd"
                    d="M11.78 5.22a.75.75 0 0 1 0 1.06L8.06 10l3.72 3.72a.75.75 0 1 1-1.06 1.06l-4.25-4.25a.75.75 0 0 1 0-1.06l4.25-4.25a.75.75 0 0 1 1.06 0Z"
                    clip-rule="evenodd" />
            </svg>
            <span>Precedente</span>
        </span>
    @endif

    <div class="flex items-center gap-2 px-4 py-2 bg-white rounded-md border border-gray-200">
        <span class="text-sm text-gray-600">Pagina</span>
        <span class="font-bold text-red-700">{{ $pagination['current_page'] }}</span>
        <span class="text-sm text-gray-600">di</span>
        <span class="font-bold text-gray-800">{{ $pagination['last_page'] }}</span>
    </div>

    @if ($pagination['current_page'] < $pagination['last_page'])
        <a href="{{ route($baseUrl . '.show', ['code' => $code]) }}?page={{ $pagination['current_page'] + 1 }}&{{ http_build_query(request()->except('page')) }}"
            class="flex items-center gap-2 px-5 py-2 bg-red-700 text-white rounded-md hover:bg-red-800 transition-all duration-200 shadow-sm">
            <span>Successivo</span>
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-5 h-5">
                <path fill-rule="evenodd"
                    d="M8.22 5.22a.75.75 0 0 1 1.06 0l4.25 4.25a.75.75 0 0 1 0 1.06l-4.25 4.25a.75.75 0 0 1-1.06-1.06L11.94 10 8.22 6.28a.75.75 0 0 1 0-1.06Z"
                    clip-rule="evenodd" />
            </svg>
        </a>
    @else
        <span class="flex items-center gap-2 px-5 py-2 bg-gray-300 text-gray-500 rounded-md cursor-not-allowed">
            <span>Successivo</span>
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-5 h-5">
                <path fill-rule="evenodd"
                    d="M8.22 5.22a.75.75 0 0 1 1.06 0l4.25 4.25a.75.75 0 0 1 0 1.06l-4.25 4.25a.75.75 0 0 1-1.06-1.06L11.94 10 8.22 6.28a.75.75 0 0 1 0-1.06Z"
                    clip-rule="evenodd" />
            </svg>
        </span>
    @endif
</div>
