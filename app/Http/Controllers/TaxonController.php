<?php

namespace App\Http\Controllers;

use App\Services\IucnApiService;
use App\Traits\FooterData;

class TaxonController extends Controller
{

    use FooterData;

    public function show(int $sisId, IucnApiService $api)
    {
        $data = $api->getTaxonDetails($sisId);
        $taxon = $data['taxon'];
        $assessments = $data['assessments'];

        // traduzione categorie
        foreach ($assessments as &$assessment) {
            $assessment['category_translated'] = \App\Helpers\CategoryHelper::translate($assessment['red_list_category_code']);
        }

        $isFavorite = \App\Models\Favorite::where('sis_taxon_id', $sisId)->exists();

        $footerData = $this->getFooterData($api);

        return view('pages.taxon.show', compact('assessments', 'taxon', 'isFavorite', 'footerData'));
    }
}
