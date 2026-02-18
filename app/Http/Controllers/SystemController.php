<?php

namespace App\Http\Controllers;

use App\Services\IucnApiService;

class SystemController extends Controller
{
    public function show(string $code, IucnApiService $api)
    {
        $assessments = $api->getAssessmentsBySystem($code);

        return view('pages.systems.show', compact('assessments', 'code'));
    }
}
