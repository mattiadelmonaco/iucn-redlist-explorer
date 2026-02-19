<?php

namespace App\Http\Controllers;

use App\Services\IucnApiService;

class TaxonController extends Controller
{
    public function show(int $sisId, IucnApiService $api)
    {
        $data = $api->getTaxonDetails($sisId);
        $taxon = $data['taxon'];
        $assessments = $data['assessments'];

        // traduzione categorie
        foreach ($assessments as &$assessment) {
            $assessment['category_translated'] = \App\Helpers\CategoryHelper::translate($assessment['red_list_category_code']);
        }

        return view('pages.taxon.show', compact('assessments', 'taxon'));
    }
}
