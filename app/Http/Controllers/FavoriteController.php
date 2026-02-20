<?php

namespace App\Http\Controllers;

use App\Models\Favorite;
use App\Services\IucnApiService;
use App\Traits\FooterData;
use Illuminate\Http\Request;

class FavoriteController extends Controller
{

    use FooterData;

    public function index(IucnApiService $api)
    {
        $favorites = Favorite::orderBy('created_at', 'desc')->get();

        $footerData = $this->getFooterData($api);

        return view('pages.favorites.index', compact('favorites', 'footerData'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'sis_taxon_id' => 'required|integer',
            'scientific_name' => 'required|string',
            'common_names' => 'nullable|string'
        ]);

        // converte stringa JSON in array
        if (isset($validated['common_names'])) {
            $validated['common_names'] = json_decode($validated['common_names'], true);
        }

        // Verifica se esiste già
        $exists = Favorite::where('sis_taxon_id', $validated['sis_taxon_id'])->exists();

        if ($exists) {
            Favorite::where('sis_taxon_id', $validated['sis_taxon_id'])->delete();
            return redirect()->back()->with('success', 'Rimosso dai preferiti');
        } else {
            Favorite::create($validated);
            return redirect()->back()->with('success', 'Aggiunto ai preferiti');
        }
    }
}
