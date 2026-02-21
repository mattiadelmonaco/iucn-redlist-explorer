<?php

namespace App\Http\Controllers;

use App\Services\IucnApiService;
use App\Traits\Filters;
use App\Traits\FooterData;
use Illuminate\Http\Request;

class SystemController extends Controller
{

    use FooterData;
    use Filters;

    public function show(Request $request, string $code, IucnApiService $api)
    {

        $page = $request->query('page', 1);

        // dd($page);

        $data = $api->getAssessmentsBySystem($code, $page);
        $system = $data['system'];
        $assessments = $data['assessments'];

        $assessments = $this->applyFilters($assessments, $request);

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

        $footerData = $this->getFooterData($api);

        return view('pages.systems.show', compact('assessments', 'system', 'pagination', 'code', 'footerData'));
    }
}
