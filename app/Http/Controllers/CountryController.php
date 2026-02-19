<?php

namespace App\Http\Controllers;

use App\Services\IucnApiService;
use Illuminate\Http\Request;

class CountryController extends Controller
{
    public function show(Request $request, string $code, IucnApiService $api)
    {

        $page = $request->query('page', 1);

        // dd($page);

        $data = $api->getAssessmentsByCountry($code, $page);
        $country = $data['country'];
        $assessments = $data['assessments'];

        // traduzione categorie
        foreach ($assessments as &$assessment) {
            $assessment['category_translated'] = \App\Helpers\CategoryHelper::translate($assessment['red_list_category_code']);
        }

        $pagination = [
            'current_page' => $data['current_page'],
            'total' => $data['total'],
            'per_page' => $data['per_page'],
            'last_page' => $data['total_pages']
        ];

        return view('pages.countries.show', compact('assessments', 'country', 'pagination', 'code'));
    }
}
