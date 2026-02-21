<?php

namespace App\Traits;

use Illuminate\Http\Request;

trait Filters
{
    protected function applyFilters(array $assessments, Request $request): array
    {
        // FILTRO ANNO
        if ($request->has('year') && $request->year != '') {
            $assessments = array_filter($assessments, function ($a) use ($request) {
                return $a['year_published'] == $request->year;
            });
        }

        // FILTRO POSSIBILE ESTINTO
        if ($request->has('possibly_extinct') && $request->possibly_extinct == '1') {
            $assessments = array_filter($assessments, function ($a) {
                return $a['possibly_extinct'] == true;
            });
        }

        // FILTRO POSSIBILE ESTINTO IN NATURA
        if ($request->has('possibly_extinct_in_the_wild') && $request->possibly_extinct_in_the_wild == '1') {
            $assessments = array_filter($assessments, function ($a) {
                return $a['possibly_extinct_in_the_wild'] == true;
            });
        }

        return $assessments;
    }
}
