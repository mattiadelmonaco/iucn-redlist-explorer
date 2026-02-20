<?php

namespace App\Http\Controllers;

use App\Services\IucnApiService;
use App\Traits\FooterData;

class AssessmentController extends Controller
{

    use FooterData;

    public function show(int $assessmentId, IucnApiService $api)
    {
        $assessment = $api->getAssessmentDetails($assessmentId);

        // Traduci categoria
        $assessment['category_translated'] = \App\Helpers\CategoryHelper::translate($assessment['red_list_category']['code']);

        $footerData = $this->getFooterData($api);

        return view('pages.assessments.show', compact('assessment', 'footerData'));
    }
}
