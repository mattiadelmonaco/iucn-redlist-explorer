<?php

namespace App\Http\Controllers;

use App\Services\IucnApiService;

class AssessmentController extends Controller
{
    public function show(int $assessmentId, IucnApiService $api)
    {
        $assessment = $api->getAssessmentDetails($assessmentId);

        // Traduci categoria
        $assessment['category_translated'] = \App\Helpers\CategoryHelper::translate($assessment['red_list_category']['code']);

        return view('pages.assessments.show', compact('assessment'));
    }
}
