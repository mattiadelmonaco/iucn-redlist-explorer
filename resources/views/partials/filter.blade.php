<form method="GET" class="bg-gray-50 border border-gray-200 rounded-lg p-4 shadow-sm">
    {{-- campo nascosto per mantenere pagina corrente --}}
    <input type="hidden" name="page" value="{{ $pagination['current_page'] }}">

    <div class="flex flex-wrap gap-3 items-end">
        {{-- anno pubblicazione --}}
        <div class="flex-1 min-w-37.5">
            <label for="year" class="block text-sm font-medium text-gray-700 mb-1">Anno pubblicazione</label>
            <input type="number" id="year" name="year" placeholder="es. 2020" value="{{ request('year') }}"
                class="w-full border border-gray-300 px-3 py-2 rounded-md ">
        </div>

        {{-- possibile estinto --}}
        <div class="flex-1 min-w-50">
            <label for="possibly_extinct" class="block text-sm font-medium text-gray-700 mb-1">Possibile estinto</label>
            <select id="possibly_extinct" name="possibly_extinct"
                class="w-full border border-gray-300 px-3 py-2 rounded-md ">
                <option value="">Tutti</option>
                <option value="1" {{ request('possibly_extinct') == '1' ? 'selected' : '' }}>Solo estinti</option>
            </select>
        </div>

        {{-- estinto in natura --}}
        <div class="flex-1 min-w-50">
            <label for="possibly_extinct_wild" class="block text-sm font-medium text-gray-700 mb-1">Estinto in
                natura</label>
            <select id="possibly_extinct_wild" name="possibly_extinct_in_the_wild"
                class="w-full border border-gray-300 px-3 py-2 rounded-md ">
                <option value="">Tutti</option>
                <option value="1" {{ request('possibly_extinct_in_the_wild') == '1' ? 'selected' : '' }}>Solo
                    estinti</option>
            </select>
        </div>

        {{-- tasti --}}
        <div class="flex gap-2">
            <button type="submit"
                class="px-6 py-2 bg-red-600 hover:bg-red-700 text-white rounded-md font-medium transition-colors shadow-sm cursor-pointer">
                Filtra
            </button>
            <a href="{{ url()->current() }}"
                class="px-6 py-2 bg-gray-200 hover:bg-gray-300 text-gray-700 rounded-md font-medium transition-colors">
                Reset
            </a>
        </div>
    </div>
</form>
