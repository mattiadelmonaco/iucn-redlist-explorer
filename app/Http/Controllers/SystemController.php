<?php

namespace App\Http\Controllers;

use App\Services\IucnApiService;

class SystemController extends Controller
{
    public function show(string $code, IucnApiService $api)
    {
        $data = $api->getAssessmentsBySystem($code);
        $system = $data['system'];
        $assessments = $data['assessments'];

        // traduzione categorie
        foreach ($assessments as &$assessment) {
            $assessment['category_translated'] = \App\Helpers\CategoryHelper::translate($assessment['red_list_category_code']);
        }

        return view('pages.systems.show', compact('assessments', 'system'));
    }
}
