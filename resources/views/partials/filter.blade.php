<form method="GET" class="flex gap-3 flex-wrap">

    {{-- campo nascosto per mantenere pagina corrente --}}
    <input type="hidden" name="page" value="{{ $pagination['current_page'] }}">

    <input type="number" name="year" placeholder="Anno pubblicazione" value="{{ request('year') }}"
        class="border px-3 py-2 rounded">

    <select name="possibly_extinct" class="border px-3 py-2 rounded">
        <option value="">Possibile estinto - Tutti</option>
        <option value="1" {{ request('possibly_extinct') == '1' ? 'selected' : '' }}>
            Solo possibili estinti
        </option>
    </select>

    <select name="possibly_extinct_in_the_wild" class="border px-3 py-2 rounded">
        <option value="">Estinto in natura - Tutti</option>
        <option value="1" {{ request('possibly_extinct_in_the_wild') == '1' ? 'selected' : '' }}>
            Solo estinti in natura
        </option>
    </select>

    <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded cursor-pointer">
        Filtra
    </button>

    <a href="{{ url()->current() }}" class="px-4 py-2 bg-gray-200 rounded">
        Reset
    </a>
</form>
