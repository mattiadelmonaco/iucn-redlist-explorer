<?php

namespace App\Http\Controllers;

use App\Services\IucnApiService;
use App\Traits\FooterData;

class HomeController extends Controller
{

    use FooterData;

    public function index(IucnApiService $api)
    {

        $systems = $api->getSystems();
        $countries = $api->getCountries();

        $footerData = $this->getFooterData($api);

        return view('pages.home', compact('systems', 'countries', 'footerData'));
    }
}
