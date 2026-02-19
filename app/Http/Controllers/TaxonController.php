<?php

namespace App\Http\Controllers;

use App\Services\IucnApiService;

class TaxonController extends Controller
{
    public function show(int $sisId, IucnApiService $api)
    {
        $taxon = $api->getTaxonDetails($sisId);

        return view('pages.taxon.show', compact('taxon'));
    }
}
